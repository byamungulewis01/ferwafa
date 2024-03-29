-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 08:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `home` varchar(30) NOT NULL,
  `away` varchar(30) NOT NULL,
  `week` int(11) NOT NULL,
  `stadium` varchar(40) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `season` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'future'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `home`, `away`, `week`, `stadium`, `date`, `time`, `season`, `status`) VALUES
(1, 'Police fc', 'Rayon sport fc', 1, 'Nyanza Stadium', '13/8/2022', '5:45:00 PM', '2020 - 2021', 'terminated'),
(2, 'Mukura ', 'As kigali', 1, 'Huye Stadium', '12/8/2022', '3:45:00 PM', '2020 - 2021', 'terminated'),
(3, 'Kiyovu fc', 'Gasogi united', 1, 'Kigali Stadium', '12/8/2022', '4:45:00 PM', '2020 - 2021', 'terminated'),
(4, 'Apr fc', 'Marine fc', 1, 'Amahoro Stadium', '13/8/2022', '6:45:00 PM', '2020 - 2021', 'terminated'),
(5, 'Gasogi united', 'As kigali', 2, 'Huye Stadium', '20/8/2022', '7:45:00 PM', '2020 - 2021', 'next'),
(6, 'Apr fc', 'Mukura ', 2, 'Kigali Stadium', '20/8/2022', '3:45:00 PM', '2020 - 2021', 'next'),
(7, 'Kiyovu fc', 'Rayon sport fc', 2, 'Nyanza Stadium', '21/8/2022', '4:45:00 PM', '2020 - 2021', 'next'),
(8, 'Police fc', 'Marine fc', 2, 'Amahoro Stadium', '21/8/2022', '5:45:00 PM', '2020 - 2021', 'next'),
(9, 'Rayon sport fc', 'As kigali', 3, 'Huye Stadium', '30/8/2022', '6:45:00 PM', '2020 - 2021', 'future'),
(10, 'Gasogi united', 'Mukura ', 3, 'Huye Stadium', '31/8/2022', '3:45:00 PM', '2020 - 2021', 'future'),
(11, 'Kiyovu fc', 'Marine fc', 3, 'Kigali Stadium', '1/9/2022', '4:45:00 PM', '2020 - 2021', 'future'),
(12, 'Apr fc', 'Police fc', 3, 'Nyanza Stadium', '1/9/2022', '5:45:00 PM', '2020 - 2021', 'future'),
(13, 'Marine fc', 'As kigali', 4, 'Amahoro Stadium', '10/9/2022', '6:45:00 PM', '2020 - 2021', 'future'),
(14, 'Rayon sport fc', 'Mukura ', 4, 'Huye Stadium', '10/9/2022', '3:45:00 PM', '2020 - 2021', 'future'),
(15, 'Apr fc', 'Gasogi united', 4, 'Kigali Stadium', '10/10/2022', '4:45:00 PM', '2020 - 2021', 'future'),
(16, 'Kiyovu fc', 'Police fc', 4, 'Nyanza Stadium', '10/10/2022', '5:45:00 PM', '2020 - 2021', 'future'),
(17, 'Police fc', 'As kigali', 5, 'Amahoro Stadium', '1/10/1900', '6:45:00 PM', '2020 - 2021', 'future'),
(18, 'Marine fc', 'Mukura ', 5, 'Huye Stadium', '10/9/2022', '3:45:00 PM', '2020 - 2021', 'future'),
(19, 'Rayon sport fc', 'Gasogi united', 5, 'Huye Stadium', '12/8/2022', '4:45:00 PM', '2020 - 2021', 'future'),
(20, 'Apr fc', 'Kiyovu fc', 5, 'Kigali Stadium', '12/8/2022', '5:45:00 PM', '2020 - 2021', 'future'),
(21, 'Kiyovu fc', 'As kigali', 6, 'Huye Stadium', '13/8/2022', '6:45:00 PM', '2020 - 2021', 'future'),
(22, 'Police fc', 'Mukura ', 6, 'Kigali Stadium', '13/8/2022', '3:45:00 PM', '2020 - 2021', 'future'),
(23, 'Marine fc', 'Gasogi united', 6, 'Nyanza Stadium', '20/8/2022', '4:45:00 PM', '2020 - 2021', 'future'),
(24, 'Apr fc', 'Rayon sport fc', 6, 'Amahoro Stadium', '20/8/2022', '5:45:00 PM', '2020 - 2021', 'future'),
(25, 'Apr fc', 'As kigali', 7, 'Huye Stadium', '21/8/2022', '6:45:00 PM', '2020 - 2021', 'future'),
(26, 'Kiyovu fc', 'Mukura ', 7, 'Kigali Stadium', '21/8/2022', '3:45:00 PM', '2020 - 2021', 'future'),
(27, 'Police fc', 'Gasogi united', 7, 'Nyanza Stadium', '30/8/2022', '4:45:00 PM', '2020 - 2021', 'future'),
(28, 'Marine fc', 'Rayon sport fc', 7, 'Amahoro Stadium', '31/8/2022', '5:45:00 PM', '2020 - 2021', 'future');

-- --------------------------------------------------------

--
-- Table structure for table `fa_user`
--

CREATE TABLE `fa_user` (
  `id` int(11) NOT NULL,
  `names` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fa_user`
--

INSERT INTO `fa_user` (`id`, `names`, `username`, `password`) VALUES
(1, 'Lewis', 'Lewis', '123'),
(3, 'Jackelin', 'jack', '123'),
(4, 'Aliane', 'Aliane', '123');

-- --------------------------------------------------------

--
-- Table structure for table `match_day_reports`
--

CREATE TABLE `match_day_reports` (
  `report_id` int(11) NOT NULL,
  `team_member` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `goal` varchar(2) NOT NULL,
  `goal_min` varchar(3) NOT NULL,
  `card` varchar(10) NOT NULL,
  `card_min` varchar(3) NOT NULL,
  `week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_day_reports`
--

INSERT INTO `match_day_reports` (`report_id`, `team_member`, `team`, `goal`, `goal_min`, `card`, `card_min`, `week`) VALUES
(1, 53, 6, '2', '69', '', '', 1),
(2, 54, 6, '', '', '', '', 1),
(3, 55, 6, '1', '23', 'Yellow', '36', 1),
(4, 59, 6, '', '', '', '', 1),
(5, 60, 6, '', '', '', '', 1),
(6, 62, 7, '', '', '', '', 1),
(7, 63, 7, '', '', 'Yellow', '5', 1),
(8, 64, 7, '', '', '', '', 1),
(9, 67, 7, '', '', '', '', 1),
(10, 70, 7, '', '', '', '', 1),
(11, 1, 1, '1', '23', 'Red', '69', 1),
(12, 2, 1, '', '', 'Yellow', '33', 1),
(13, 3, 1, '', '', '', '', 1),
(14, 5, 1, '', '', 'Yellow', '63', 1),
(15, 14, 1, '', '', '', '', 1),
(16, 15, 1, '', '', '', '', 1),
(17, 72, 9, '2', '', 'Yellow', '25', 1),
(18, 73, 9, '', '', '', '', 1),
(19, 74, 9, '', '', '', '', 1),
(20, 78, 9, '', '', '', '', 1),
(21, 79, 9, '', '', 'Yellow', '2', 1),
(26, 18, 4, '', '', 'Red', '35', 1),
(27, 36, 4, '1', '36', '', '', 1),
(28, 37, 4, '', '', '', '', 1),
(29, 41, 4, '', '', '', '', 1),
(30, 42, 4, '', '', '', '', 1),
(31, 44, 5, '1', '36', '', '', 1),
(32, 45, 5, '', '', '', '', 1),
(33, 46, 5, '', '', '', '', 1),
(34, 50, 5, '', '', '', '', 1),
(35, 51, 5, '', '', '', '', 1),
(36, 2, 1, '', '', 'Red', '', 2),
(37, 3, 1, '', '', '', '', 2),
(38, 32, 1, '', '', 'Double', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `referee`
--

CREATE TABLE `referee` (
  `referee_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `image` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referee`
--

INSERT INTO `referee` (`referee_id`, `fname`, `lname`, `image`, `email`, `status`) VALUES
(1, 'RUZINDANA', 'Nsoro', '1-old.jpg', 'nsororuzindana', 1),
(2, 'HAKIZIMANA', 'Louis', '3.jpg', 'Hakizimana', 0),
(3, 'ISHIMWE', 'JEAN CLAUDE', 's4.jpg', 'ishimwe', 0),
(4, 'KAGABO', 'Issa', 'N1.jpg', 'IssaKagabo', 1),
(5, 'TWAGIRUMUKIZA', 'ABDOUL KARIM ', '', 'ABDOULKARIM ', 0),
(6, 'MUNYANZIZA', 'GERVAIS', 'N2.jpg', 'GERVAIS', 0),
(8, 'UWIKUNDA', 'Samuel', 'ffff.jpg', 'Samuel', 0),
(9, 'MUKANSANGA', 'Salima', 'pro4.jpg', 'mukansanga', 0),
(10, 'BUREGEYA', 'JANVIER ', '', 'JANVIER', 0),
(11, 'MUNYEMANA', 'LOUIS ', '', 'Munyemana', 0),
(12, 'GATERA', 'JONATHAN', '5.jpg', 'JONATHAN', 0),
(13, 'SEBAHUTU', 'JUSEPH ', '2.jpg', 'JUSEPH', 0),
(14, 'NYANDWI', 'CHRISTOPHE', '3.jpg', 'CHRISTOPHE', 0),
(15, 'KIWANUKA', 'JOSEPH ', '', 'KIWANUKA', 0),
(16, 'RUTERANA', 'J M ', '8.jpg', 'RUTERANA', 0),
(17, 'KALIMBA KIROHA', 'JANVIER', '', 'KALIMBA', 0),
(18, 'TWAGIRAYEZU', 'RICHARD ', '7.jpg', 'RICHARD', 1),
(19, 'BAHIZI', 'EDOUARD ', '', 'EDOUARD', 0),
(20, 'HAMULI', 'Thomas', '2.jpg', 'hamuli@gmail.com', 0),
(21, 'RUKILIZA', 'Reverier', '1.jpg', 'reverir@gmail.com', 0),
(22, 'MATUNGUHA', 'IDI ', 'N2.jpg', 'MATUNGUHA', 0),
(23, 'BYAMUNGU', 'Lewis', 'ffff.jpg', 'byamungulewis@gmail.com', 1),
(26, 'Dusabe', 'Rose', '6.jpg', 'rosedusabe003@gmail.com', 0),
(27, 'Ntwari', 'Lebon', 'N3.jpg', 'ntwarilebon09@gmail.com', 0),
(28, 'Chantal', 'Habimana', 'N2.jpg', 'habichantal627@gmail.com', 0),
(29, 'NIYONASENZE', 'Aliane', 'pro4.jpg', 'alianeniyo03@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logon` varchar(30) NOT NULL,
  `stadium` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `name`, `logon`, `stadium`, `username`, `password`) VALUES
(1, 'Apr fc', 'Apr.jpg', 'Amahoro Stadium', 'aprfc', 'aprfc'),
(2, 'Mukura', 'Mukura.png', 'Huye Stadium', 'mukurafc', 'mukurafc'),
(3, 'As kigali', 'AS_Kigali_logo.png', 'Shrorongi stadium', 'Askigalifc', 'Askigalifc'),
(4, 'Kiyovu fc', 'Kiyovu.jpg', 'Stade Regional', 'Kiyovufc', 'Kiyovufc'),
(5, 'Gasogi united', 'Gasogi.png', 'Kigali Stadium', 'Gasogi', 'Gasogi'),
(6, 'Police fc', 'Police.jpg', 'Bugesera Stadium', 'Policefc', 'Policefc'),
(7, 'Rayon sport fc', 'Rayon.jpg', 'Nyanza Stadium', 'Rayonsportfc', 'Rayonsportfc'),
(9, 'Marine fc', 'Marine.jpg', 'Umuganda Stadium', 'marinefc', 'marinefc');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `number` varchar(3) NOT NULL,
  `role_in_team` varchar(10) NOT NULL,
  `post` varchar(20) NOT NULL,
  `position` varchar(30) NOT NULL,
  `team` int(11) NOT NULL,
  `yellow` int(11) NOT NULL,
  `double_yellow` int(11) NOT NULL,
  `red` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`member_id`, `fname`, `lname`, `number`, `role_in_team`, `post`, `position`, `team`, `yellow`, `double_yellow`, `red`) VALUES
(1, 'Mugheni', 'Fabrice', '22', 'player', '', 'Midfielder', 1, 0, 0, 1),
(2, 'Mukunzi', 'Yannick', '17', 'player', '', 'Midfielder', 1, 0, 0, 3),
(3, 'HAKIZIMANA', 'Muhadjir', '10', 'player', '', 'Attacker', 1, 0, 0, 0),
(5, 'Addil ', 'Muhamed', '', 'staff', 'HC', '', 1, 1, 0, 0),
(8, 'NIYONZIMA', 'Haruna', '10', 'player', '', 'Midfielder', 3, 0, 0, 0),
(14, 'Bernmoussa', 'Abdesattar', '', 'staff', 'AC', '', 1, 0, 0, 0),
(15, 'Mugabo', 'Alex', '', 'staff', 'GC', '', 1, 0, 0, 0),
(16, 'Lt Urwibutso', 'Jean de Dieu', '', 'staff', 'Do', '', 1, 0, 0, 0),
(17, 'Maj Twagirayezu', 'Jaquues', '', 'staff', 'Ph', '', 1, 0, 0, 0),
(18, 'Bishunga', 'Latifu', '17', 'player', '', 'Deffence', 4, 0, 0, 2),
(19, 'Manga', 'Steve ', '23', 'player', '', 'Deffence', 2, 0, 0, 0),
(20, 'Mugisha', 'Gilbert ', '25', 'player', '', 'Deffence', 2, 0, 0, 0),
(21, 'Were', 'Paul ', '31', 'player', '', 'Attacker', 2, 0, 0, 0),
(22, 'Kevin', ' Muhire', '10', 'player', '', 'Midfielder', 2, 0, 0, 0),
(23, 'Rwasamanzi', 'Innocent', '', 'staff', 'HC', '', 2, 0, 0, 0),
(24, 'Bukuru', 'CHRISTOPHE', '', 'staff', 'AC', '', 2, 0, 0, 0),
(25, 'Niyibizi', 'Ramadhan', '11', 'player', '', 'Attacker', 3, 0, 0, 0),
(26, 'Uwimana ', 'Guilain', '20', 'player', '', 'Deffence', 3, 0, 0, 0),
(27, 'Fabrice', ' Mugheni', '21', 'player', '', 'Midfielder', 3, 0, 0, 0),
(28, 'Hassan', ' Rugirayabo', '6', 'player', '', 'Deffence', 3, 0, 0, 0),
(29, 'Masudi', 'Djuma', '', 'staff', 'HC', '', 3, 0, 0, 0),
(30, 'Miradji', 'Habuhumure', '', 'staff', 'GC', '', 3, 0, 0, 0),
(32, 'Nova ', 'Bayama', '1', 'player', '', 'Goal Keeper', 1, 0, 2, 0),
(33, 'Lawrence ', 'Juma', '17', 'player', '', 'Attacker', 2, 0, 0, 0),
(34, 'Jean Bosco ', 'Kayitaba', '1', 'player', '', 'Goal Keeper', 2, 0, 0, 0),
(35, 'Ibrahim ', 'Nshimiyimana', '1', 'player', '', 'Goal Keeper', 3, 0, 0, 0),
(36, 'Chaffi ', 'Songayingabo', '1', 'player', '', 'Goal Keeper', 4, 0, 0, 0),
(37, 'Eric', ' Ndayishimiye', '16', 'player', '', 'Goal Keeper', 4, 0, 0, 0),
(38, 'Christian ', 'Ishimwe', '12', 'player', '', 'Midfielder', 4, 0, 0, 0),
(39, 'Denis', ' Rukundo', '22', 'player', '', 'Attacker', 4, 0, 0, 0),
(40, 'Olivier ', 'Niyonzima', '8', 'player', '', 'Midfielder', 4, 0, 0, 0),
(41, 'Eric ', 'Nshimiyimana', '', 'staff', 'HC', '', 4, 0, 0, 0),
(42, 'Thierry ', 'Makon', '', 'staff', 'AC', '', 4, 0, 0, 0),
(43, 'Rachid ', 'Kalisa', '', 'staff', 'GC', '', 4, 0, 0, 0),
(44, 'Edward ', 'Satulo', '2', 'player', '', 'Deffence', 5, 0, 0, 0),
(45, 'Robert ', 'Saba', '10', 'player', '', 'Attacker', 5, 0, 0, 0),
(46, 'Ramadhan ', 'Niyibizi', '21', 'player', '', 'Midfielder', 5, 0, 0, 0),
(47, 'Clement ', 'Niyigena', '5', 'player', '', 'Deffence', 5, 0, 0, 0),
(48, 'Gabriel ', 'Mugabo', '1', 'player', '', 'Goal Keeper', 5, 0, 0, 0),
(49, 'Soter ', 'Kayumba', '33', 'player', '', 'Deffence', 5, 0, 0, 0),
(50, 'Eric ', 'Iradukunda', '', 'staff', 'HC', '', 5, 0, 0, 0),
(51, 'Saddam ', 'Nyandwi', '', 'staff', 'AC', '', 5, 0, 0, 0),
(52, 'Pierre ', 'Kwizera', '', 'staff', 'GC', '', 5, 0, 0, 0),
(53, 'Imran ', 'Nshimiyimana', '32', 'player', '', 'Goal Keeper', 6, 0, 0, 0),
(54, 'Blaise ', 'Nishimwe', '8', 'player', '', 'Midfielder', 6, 0, 0, 0),
(55, 'Kevin', ' Muhire', '10', 'player', '', 'Midfielder', 6, 1, 0, 0),
(56, 'Jean-Claude ', 'Iranzi', '21', 'player', '', 'Attacker', 6, 0, 0, 0),
(57, 'Innocent', ' Mugabo', '15', 'player', '', 'Deffence', 6, 0, 0, 0),
(58, 'Heritier ', 'Luvumbu', '11', 'player', '', 'Attacker', 6, 0, 0, 0),
(59, 'Paul ', 'Were', '', 'staff', 'HC', '', 6, 0, 0, 0),
(60, 'Gilbert', ' Mugisha', '', 'staff', 'AC', '', 6, 0, 0, 0),
(61, 'Steve ', 'Manga', '', 'staff', 'GC', '', 6, 0, 0, 0),
(62, 'Aimable ', 'Nsabimana', '2', 'player', '', 'Deffence', 7, 0, 0, 0),
(63, 'Sulaiman', ' Kakira', '5', 'player', '', 'Deffence', 7, 1, 0, 0),
(64, 'Michel ', 'Ndahinduka', '36', 'player', '', 'Midfielder', 7, 0, 0, 0),
(65, 'Bienvenu ', 'Mugenzi', '21', 'player', '', 'Midfielder', 7, 0, 0, 0),
(66, 'Bonheur', ' Mugisha', '10', 'player', '', 'Attacker', 7, 0, 0, 0),
(67, 'Gylain ', 'Ngabonziza', '', 'staff', 'HC', '', 7, 0, 0, 0),
(68, 'Blaise ', 'Itangishaka', '27', 'player', '', 'Attacker', 7, 0, 0, 0),
(69, 'Ernest ', 'Kwizera', '6', 'player', '', 'Midfielder', 7, 0, 0, 0),
(70, 'Mouhamed ', 'Mushimiyimana', '', 'staff', 'AC', '', 7, 0, 0, 0),
(71, 'Christophe ', 'Bukuru', '', 'staff', 'GC', '', 7, 0, 0, 0),
(72, 'Keddy ', 'Nsanzimfura', '1', 'player', '', 'Goal Keeper', 9, 1, 0, 0),
(73, 'Yannick', ' Bizimana', '20', 'player', '', 'Midfielder', 9, 0, 0, 0),
(74, 'Anicet ', 'Ishimwe', '5', 'player', '', 'Deffence', 9, 0, 0, 0),
(75, 'Jean Bosco ', 'Ngaboyisibo', '32', 'player', '', 'Midfielder', 9, 0, 0, 0),
(76, 'Pierre ', 'Ishimwe', '24', 'player', '', 'Midfielder', 9, 0, 0, 0),
(77, 'Umar ', 'Rwabugiri', '10', 'player', '', 'Attacker', 9, 0, 0, 0),
(78, 'Rodrigue', ' Murengezi', '', 'staff', 'HC', '', 9, 0, 0, 0),
(79, 'Stephen ', 'Bonney', '', 'staff', 'AC', '', 9, 1, 0, 0),
(80, 'Samuel ', 'Ekele', '', 'staff', 'GC', '', 9, 0, 0, 0),
(81, 'Aimable', ' Rucogoza', '', 'staff', 'Do', '', 9, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_fixtures`
--

CREATE TABLE `weekly_fixtures` (
  `fixture_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `referee` int(11) NOT NULL,
  `assistant1` int(11) NOT NULL,
  `assistant2` int(11) NOT NULL,
  `official` int(11) NOT NULL,
  `access_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekly_fixtures`
--

INSERT INTO `weekly_fixtures` (`fixture_id`, `match_id`, `referee`, `assistant1`, `assistant2`, `official`, `access_code`) VALUES
(1, 1, 1, 2, 12, 23, ''),
(2, 4, 3, 5, 21, 29, ''),
(3, 3, 2, 3, 18, 23, '11'),
(4, 6, 1, 4, 18, 23, '517743');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa_user`
--
ALTER TABLE `fa_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `match_day_reports`
--
ALTER TABLE `match_day_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `referee`
--
ALTER TABLE `referee`
  ADD PRIMARY KEY (`referee_id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `weekly_fixtures`
--
ALTER TABLE `weekly_fixtures`
  ADD PRIMARY KEY (`fixture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fa_user`
--
ALTER TABLE `fa_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `match_day_reports`
--
ALTER TABLE `match_day_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `referee`
--
ALTER TABLE `referee`
  MODIFY `referee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `weekly_fixtures`
--
ALTER TABLE `weekly_fixtures`
  MODIFY `fixture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
