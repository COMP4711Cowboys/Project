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
(1, 'Bailey', 'Dan', 5, 'K', 195, 27, 'Oklahoma State', 'bailey_dan.jpg'),
(2, 'Beasley', 'Cole', 11, 'WR', 180, 26, 'Southern Methodist', 'beasley_cole.jpg'),
(3, 'Bernadeau', 'Mackenzy', 73, 'G', 322, 29, 'Bentley', 'bernadeau_mackenzy.jpg'),
(4, 'Brown', 'Charles', 78, 'OL', 297, 28, 'USC', 'brown_charles.jpg'),
(5, 'Bryant', 'Dez', 88, 'WR', 220, 26, 'Oklahoma State', 'bryant_dez.jpg'),
(6, 'Butler', 'Brice', 19, 'WR', 215, 25, 'San Diego State', 'butler_brice.jpg'),
(7, 'Carr', 'Brandon', 39, 'CB', 210, 29, 'Grand Valley State', 'carr_brandon.jpg'),
(8, 'Cassel', 'Matt', 16, 'QB', 228, 33, 'USC', 'cassel_matt.jpg'),
(9, 'Church', 'Barry', 42, 'S', 218, 27, 'Toledo', 'church_barry.jpg'),
(10, 'Claiborne', 'Morris', 24, 'CB', 192, 25, 'LSU', 'claiborne_morris.jpg'),
(11, 'Clutts', 'Tyler', 44, 'FB', 250, 30, 'Fresno State', 'clutts_tyler.jpg'),
(12, 'Collins', 'Lael', 71, 'OL', 321, 22, 'Louisiana State University - Shreveport', 'collins_lael.jpg'),
(13, 'Crawford', 'Jack', 58, 'DE', 288, 27, 'Penn State', 'crawford_jack.jpg'),
(14, 'Crawford', 'Tyrone', 98, 'DT', 285, 25, 'Boise State', 'crawford_tyrone.jpg'),
(15, 'Dunbar', 'Lance', 25, 'RB', 195, 25, 'North Texas', 'dunbar_lance.jpg'),
(16, 'Escobar', 'Gavin', 89, 'TE', 260, 24, 'San Diego State', 'escobar_gavin.jpg'),
(17, 'Frederick', 'Travis', 72, 'C', 315, 24, 'Wisconsin', 'frederick_travis.jpg'),
(18, 'Free', 'Doug', 68, 'OT', 325, 31, 'Northern Illinois', 'free_doug.jpg'),
(19, 'Gachkar', 'Andrew', 52, 'LB', 224, 26, 'Missouri', 'gachkar_andrew.jpg'),
(20, 'Green', 'Chaz', 79, 'OL', 300, 23, 'Florida', 'green_chaz.jpg'),
(21, 'Gregory', 'Randy', 94, 'DE', 245, 22, 'Nebraska', 'gregory_randy.jpg'),
(22, 'Hanna', 'James', 84, 'TE', 260, 26, 'Oklahoma', 'hanna_james.jpg'),
(23, 'Hayden', 'Nick', 96, 'DT', 303, 29, 'Wisconsin', 'hayden_nick.jpg'),
(24, 'Heath', 'Jeff', 38, 'S', 212, 24, 'Saginaw Valley State', 'heath_jeff.jpg'),
(25, 'Hitchens', 'Anthony', 59, 'LB', 235, 23, 'Iowa', 'hitchens_anthony.jpg'),
(26, 'Irving', 'David', 95, 'DL', 273, 22, 'Iowa State', 'irving_david.jpg'),
(27, 'Jones', 'Byron', 31, 'CB', 199, 23, 'Connecticut', 'jones_byron.jpg'),
(28, 'Jones', 'Chris', 6, 'P', 205, 26, 'Carson-Newman', 'jones_chris.jpg'),
(29, 'LaDouceur', 'L.P.', 91, 'LS', 256, 34, 'California', 'ladouceur_lp.jpg'),
(30, 'Lawrence', 'DeMarcus', 90, 'DE', 251, 23, 'Boise State', 'lawrence_demarcus.jpg'),
(31, 'Leary', 'Ronald', 65, 'G', 320, 26, 'Memphis', 'leary_ronald.jpg'),
(32, 'Lee', 'Sean', 50, 'LB', 238, 29, 'Penn State', 'lee_sean.jpg'),
(33, 'Martin', 'Zack', 70, 'G', 310, 24, 'Notre Dame', 'martin_zack.jpg'),
(34, 'McCray', 'Danny', 40, 'S', 221, 27, 'LSU', 'mccray_danny.jpg'),
(35, 'McFadden', 'Darren', 20, 'RB', 210, 28, 'Arkansas', 'mcfadden_darren.jpg'),
(36, 'Michael', 'Christine', 30, 'RB', 221, 24, 'Texas A&M', 'michael_christine.jpg'),
(37, 'Mincey', 'Jeremy', 92, 'DE', 280, 31, 'Florida', 'mincey_jeremy.jpg'),
(38, 'Moore', 'Kellen', 17, 'QB', 200, 26, 'Boise State', 'moore_kellen.jpg'),
(39, 'Patmon', 'Tyler', 26, 'CB', 185, 24, 'Oklahoma State', 'patmon_tyler.jpg'),
(40, 'Russell', 'Ryan', 99, 'DE', 267, 23, 'Purdue', 'russell_ryan.jpg'),
(41, 'Smith', 'Keith', 56, 'LB', 232, 23, 'San Jose State', 'smith_keith.jpg'),
(42, 'Smith', 'Tyron', 77, 'OT', 320, 24, 'USC', 'smith_tyron.jpg'),
(43, 'Street', 'Devin', 15, 'WR', 200, 24, 'Pittsburgh', 'street_devin.jpg'),
(44, 'Swaim', 'Geoff', 87, 'TE', 250, 22, 'Texas', 'swaim_geoff.jpg'),
(45, 'Weeden', 'Brandon', 3, 'QB', 228, 31, 'Oklahoma State', 'weeden_brandon.jpg'),
(46, 'White', 'Corey', 23, 'CB', 206, 25, 'Samford', 'white_corey.jpg'),
(47, 'Whitehead', 'Lucky', 13, 'WR', 163, 23, 'Florida Atlantic', 'whitehead_lucky.jpg'),
(48, 'Wilber', 'Kyle', 51, 'LB', 245, 26, 'Wake Forest', 'wilber_kyle.jpg'),
(49, 'Wilcox', 'J.J.', 27, 'S', 212, 24, 'Georgia Southern', 'wilcox_jj.jpg'),
(50, 'Williams', 'Terrance', 83, 'WR', 208, 26, 'Baylor', 'williams_terrance.jpg'),
(51, 'Williams', 'Trey', 28, 'RB', 195, 22, 'Texas A&M', 'williams_trey.jpg'),
(52, 'Wilson', 'Damien', 57, 'LB', 243, 22, 'Minnesota', 'wilson_damien.jpg'),
(53, 'Witten', 'Jason', 82, 'TE', 263, 33, 'Tennessee', 'witten_jason.jpg');


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
