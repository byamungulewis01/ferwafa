<?php
require 'init.php';
if(isset($_POST['import'])){
    $season = $_POST['season'];
    $sql1 = 'SELECT season FROM calender WHERE season=:season';
    $statement = $connection->prepare($sql1);
    $statement->execute([':season' => $season]);
    $row = $statement->rowCount();
    if ($row > 0) {
        header("Location: ../calender.php?Pending");
    }
    else {
    
      $filename =$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0){
            $file = fopen($filename, "r");
            while(($data = fgetcsv($file, 10000, ",")) !== FALSE){
                $sql = 'INSERT INTO calender (home, away, week, stadium, date, time ,season)
                VALUES(:home,  :away, :week, :stadium, :date, :time, :season)';
                $statement = $connection->prepare($sql);
                if($statement->execute([
                    ':home' => $data[0],
                     ':away' => $data[1], 
                      ':week' => $data[2],
                    ':stadium' => $data[3], 
                    ':date' => $data[4], 
                    ':time' => $data[5],
                    ':season' => $season
                ]))
                {
                    $sql = 'UPDATE calender SET status="next" where week=1';
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                }
            }
            fclose($file);
            header("Location: ../calender.php?imported");
        }
        else {
            echo "Please rechech your file";
        }
    }
      
    }
?>