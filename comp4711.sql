-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 02:45 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp4711`
--

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

DROP TABLE IF EXISTS `league`;
CREATE TABLE IF NOT EXISTS `league` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `conference` varchar(64) NOT NULL,
  `division` varchar(64) NOT NULL,
  `filename` varchar(256) NOT NULL,
  `code` varchar(3) NOT NULL,
  `wins` int(3) NOT NULL,
  `losses` int(3) NOT NULL,
  `ties` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `league`
--

INSERT INTO `league` (`id`, `name`, `city`, `conference`, `division`, `filename`, `code`, `wins`, `losses`, `ties`) VALUES
(1, 'New England Patriots', 'New England', 'American Football Conference', 'AFC East', 'ne.jpg', 'NE', 3, 0, 0),
(2, 'Buffalo Bills', 'Buffalo', 'American Football Conference', 'AFC East', 'buf.jpg', 'BUF', 3, 0, 0),
(3, 'New York Jets', 'New York', 'American Football Conference', 'AFC East', 'nyj.jpg', 'NYJ', 3, 0, 0),
(4, 'Miami Dolphins', 'Miami', 'American Football Conference', 'AFC East', 'mia.jpg', 'MIA', 3, 0, 0),
(5, 'Cincinatti Bengals', 'New Jersey', 'American Football Conference', 'AFC North', 'cin.jpg', 'CIN', 3, 0, 0),
(6, 'Pittsburgh Steelers', 'Pittsburgh', 'American Football Conference', 'AFC North', 'pit.jpg', 'PIT', 3, 0, 0),
(7, 'Cleveland Browns', 'Cleveland', 'American Football Conference', 'AFC North', 'cle.jpg', 'CLE', 3, 0, 0),
(8, 'Baltimore Ravens', 'Baltimore', 'American Football Conference', 'AFC North', 'bal.jpg', 'BAL', 3, 0, 0),
(9, 'Indianapolis Colts', 'Indianapolis', 'American Football Conference', 'AFC South', 'ind.jpg', 'IND', 3, 0, 0),
(10, 'Tennesee Titans', 'Tennesee', 'American Football Conference', 'AFC South', 'ten.jpg', 'TEN', 3, 0, 0),
(11, 'Houston Texans', 'Houston', 'American Football Conference', 'AFC South', 'hou.jpg', 'HOU', 3, 0, 0),
(12, 'Jackson Jaguars', 'Jackson', 'American Football Conference', 'AFC South', 'jac.jpg', 'JAC', 3, 0, 0),
(13, 'Denver Broncos', 'Denver', 'American Football Conference', 'AFC West', 'den.jpg', 'DEN', 3, 0, 0),
(14, 'Oakland Raiders', 'Oakland', 'American Football Conference', 'AFC West', 'oak.jpg', 'OAK', 3, 0, 0),
(15, 'Kansas City Chiefs', 'Kansas', 'American Football Conference', 'AFC West', 'kc.jpg', 'KC', 3, 0, 0),
(16, 'San Diego Chargers', 'San Diego', 'American Football Conference', 'AFC West', 'sd.jpg', 'SD', 3, 0, 0),
(17, 'Dallas Cowboys', 'Dallas', 'National Football Conference', 'NFC East', 'dal.jpg', 'DAL', 3, 0, 0),
(18, 'New York Giants', 'New York Giants', 'National Football Conference', 'NFC East', 'nyg.jpg', 'NYG', 3, 0, 0),
(19, 'Washington Redskins', 'Washington', 'National Football Conference', 'NFC East', 'was.jpg', 'WAS', 3, 0, 0),
(20, 'Philadephia Eagles', 'Philadelphia', 'National Football Conference', 'NFC East', 'phi.jpg', 'PHI', 3, 0, 0),
(21, 'Green Bay Packers', 'Green Bay', 'National Football Conference', 'NFC North', 'gb.jpg', 'GB', 3, 0, 0),
(22, 'Minnesota Vikings', 'Minnesota', 'National Football Conference', 'NFC North', 'min.jpg', 'MIN', 3, 0, 0),
(23, 'Detroit Lions', 'Detroit', 'National Football Conference', 'NFC North', 'det.jpg', 'DET', 3, 0, 0),
(24, 'Chicago Bears', 'Chicago', 'National Football Conference', 'NFC North', 'chi.jpg', 'CHI', 3, 0, 0),
(25, 'Carolina Panthers', 'Carolina', 'National Football Conference', 'NFC South', 'car.jpg', 'CAR', 3, 0, 0),
(26, 'Atlanta Falcons', 'Atlanta', 'National Football Conference', 'NFC South', 'atl.jpg', 'ATL', 3, 0, 0),
(27, 'Tampa Bay Buccaneers', 'Tampa Bay', 'National Football Conference', 'NFC South', 'tb.jpg', 'TB', 3, 0, 0),
(28, 'New Orleans Saints', 'New Orleans', 'National Football Conference', 'NFC South', 'no.jpg', 'NO', 3, 0, 0),
(29, 'Arizona Cardinals', 'Arizona', 'National Football Conference', 'NFC West', 'ari.jpg', 'ARI', 3, 0, 0),
(30, 'St. Louis Panthers', 'St. Louis', 'National Football Conference', 'NFC West', 'stl.jpg', 'STL', 3, 0, 0),
(31, 'San Francisco 49ers', 'San Francisco', 'National Football Conference', 'NFC West', 'sf.jpg', 'SF', 3, 0, 0),
(32, 'Seattle Seahawks', 'Seattle', 'National Football Conference', 'NFC West', 'sea.jpg', 'SEA', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `jersey` int(3) NOT NULL,
  `position` varchar(2) NOT NULL,
  `weight` int(3) NOT NULL,
  `age` int(3) NOT NULL,
  `college` varchar(64) NOT NULL,
  `mug` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `surname`, `firstname`, `jersey`, `position`, `weight`, `age`, `college`, `mug`) VALUES
(1, 'Bailey', 'Dan', 5, 'K', 195, 27, 'Oklahoma State', 'profile_08.png'),
(2, 'Beasley', 'Cole', 11, 'WR', 180, 26, 'Southern Methodist', 'profile_12.png'),
(3, 'Bernadeau', 'Mackenzy', 73, 'G', 322, 29, 'Bentley', 'profile_02.png'),
(4, 'Bishop', 'Ken', 93, 'NT', 305, 25, 'Northern Illinois', 'profile_01.png'),
(5, 'Brown', 'Charles', 78, 'OL', 297, 28, 'USC', 'profile_11.png'),
(6, 'Bryant', 'Dez', 88, 'WR', 220, 26, 'Oklahoma State', 'profile_02.png'),
(7, 'Butler', 'Brice', 19, 'WR', 215, 25, 'San Diego State', 'profile_04.png'),
(8, 'Carr', 'Brandon', 39, 'CB', 210, 29, 'Grand Valley State', 'profile_03.png'),
(9, 'Cassel', 'Matt', 16, 'QB', 228, 33, 'USC', 'profile_04.png'),
(10, 'Church', 'Barry', 42, 'S', 218, 27, 'Toledo', 'profile_07.png'),
(11, 'Claiborne', 'Morris', 24, 'CB', 192, 25, 'LSU', 'profile_06.png'),
(12, 'Clutts', 'Tyler', 44, 'FB', 250, 30, 'Fresno State', 'profile_03.png'),
(13, 'Collins', 'Lael', 71, 'OL', 321, 22, 'Louisiana State University - Shreveport', 'profile_05.png'),
(14, 'Crawford', 'Jack', 58, 'DE', 288, 27, 'Penn State', 'profile_06.png'),
(15, 'Crawford', 'Tyrone', 98, 'DT', 285, 25, 'Boise State', 'profile_09.png'),
(16, 'Dunbar', 'Lance', 25, 'RB', 195, 25, 'North Texas', 'profile_05.png'),
(17, 'Escobar', 'Gavin', 89, 'TE', 260, 24, 'San Diego State', 'profile_08.png'),
(18, 'Frederick', 'Travis', 72, 'C', 315, 24, 'Wisconsin', 'profile_07.png'),
(19, 'Free', 'Doug', 68, 'OT', 325, 31, 'Northern Illinois', 'profile_10.png'),
(20, 'Gachkar', 'Andrew', 52, 'LB', 224, 26, 'Missouri', 'profile_07.png'),
(21, 'Gregory', 'Randy', 94, 'DE', 245, 22, 'Nebraska', 'profile_01.png'),
(22, 'Hanna', 'James', 84, 'TE', 260, 26, 'Oklahoma', 'profile_02.png'),
(23, 'Hayden', 'Nick', 96, 'DT', 303, 29, 'Wisconsin', 'profile_12.png'),
(24, 'Heath', 'Jeff', 38, 'S', 212, 24, 'Saginaw Valley State', 'profile_03.png'),
(25, 'Hitchens', 'Anthony', 59, 'LB', 235, 23, 'Iowa', 'profile_06.png'),
(26, 'Irving', 'David', 95, 'DL', 273, 22, 'Iowa State', 'profile_04.png'),
(27, 'Jones', 'Byron', 31, 'CB', 199, 23, 'Connecticut', 'profile_08.png'),
(28, 'Jones', 'Chris', 6, 'P', 205, 26, 'Carson-Newman', 'profile_01.png'),
(29, 'LaDouceur', 'L.P.', 91, 'LS', 256, 34, 'California', 'profile_07.png'),
(30, 'Lawrence', 'DeMarcus', 90, 'DE', 251, 23, 'Boise State', 'profile_02.png'),
(31, 'Leary', 'Ronald', 65, 'G', 320, 26, 'Memphis', 'profile_07.png'),
(32, 'Lee', 'Sean', 50, 'LB', 238, 29, 'Penn State', 'profile_08.png'),
(33, 'Martin', 'Zack', 70, 'G', 310, 24, 'Notre Dame', 'profile_07.png'),
(34, 'McCray', 'Danny', 40, 'S', 221, 27, 'LSU', 'profile_11.png'),
(35, 'McFadden', 'Darren', 20, 'RB', 210, 28, 'Arkansas', 'profile_07.png'),
(36, 'Michael', 'Christine', 30, 'RB', 221, 24, 'Texas A&M', 'profile_06.png'),
(37, 'Mincey', 'Jeremy', 92, 'DE', 280, 31, 'Florida', 'profile_06.png'),
(38, 'Moore', 'Kellen', 17, 'QB', 200, 26, 'Boise State', 'profile_07.png'),
(39, 'Patmon', 'Tyler', 26, 'CB', 185, 24, 'Oklahoma State', 'profile_05.png'),
(40, 'Randle', 'Joseph', 21, 'RB', 210, 23, 'Oklahoma State', 'profile_07.png'),
(41, 'Russell', 'Ryan', 99, 'DE', 267, 23, 'Purdue', 'profile_03.png'),
(42, 'Smith', 'Keith', 56, 'LB', 232, 23, 'San Jose State', 'profile_02.png'),
(43, 'Smith', 'Tyron', 77, 'OT', 320, 24, 'USC', 'profile_05.png'),
(44, 'Street', 'Devin', 15, 'WR', 200, 24, 'Pittsburgh', 'profile_09.png'),
(45, 'Swaim', 'Geoff', 87, 'TE', 250, 22, 'Texas', 'profile_07.png'),
(46, 'Weeden', 'Brandon', 3, 'QB', 228, 31, 'Oklahoma State', 'profile_06.png'),
(47, 'White', 'Corey', 23, 'CB', 206, 25, 'Samford', 'profile_03.png'),
(48, 'Whitehead', 'Lucky', 13, 'WR', 163, 23, 'Florida Atlantic', 'profile_03.png'),
(49, 'Wilber', 'Kyle', 51, 'LB', 245, 26, 'Wake Forest', 'profile_11.png'),
(50, 'Wilcox', 'J.J.', 27, 'S', 212, 24, 'Georgia Southern', 'profile_09.png'),
(51, 'Williams', 'Terrance', 83, 'WR', 208, 26, 'Baylor', 'profile_12.png'),
(52, 'Wilson', 'Damien', 57, 'LB', 243, 22, 'Minnesota', 'profile_03.png'),
(53, 'Witten', 'Jason', 82, 'TE', 263, 33, 'Tennessee', 'profile_07.png');


DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(40) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);


--
-- Indexes for dumped tables
--

--
-- Indexes for table `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

  
--
-- Indexes for table `ci_sessions`
--  
ALTER TABLE `ci_sessions`
    ADD PRIMARY KEY (id);
  
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `league`
--
ALTER TABLE `league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
