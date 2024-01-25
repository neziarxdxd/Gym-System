-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 12:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness_connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'f2d0ff370380124029c2b807a924156c', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `message`, `date`, `status`) VALUES
(7, 'This is to announce that our GYM will remain close for 51 days due to COVID-19.', '2020-03-30', 1),
(8, 'Opening of GYM Halls and Clubs are not fixed yet. Stay tuned for more updates!!', '2020-04-03', 1),
(9, 'Renovation Going On...', '2020-04-04', 1),
(10, 'This is a demo announcement from admin', '2022-06-03', 1),
(11, 'Free Shirt for the next 20 customers. ', '2024-01-09', 1),
(12, 'This is my test Jan - 25 - 2024', '2024-02-10', 1),
(13, 'Close on Feb 14, 2024 due to private event ', '2024-02-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `amount`, `quantity`, `vendor`, `description`, `address`, `contact`, `date`) VALUES
(3, 'Treadmill', 909, 4, 'DnS', 'Edited Description', '7 Cedarstone Drive', '8521479633', '2019-03-07'),
(4, 'Vertical Press Machine', 949, 3, 'SS Industries', 'For Biceps And Triceps, Upper Back, Chest', '7 Cedarstone Drive', '1245558980', '2020-03-19'),
(5, 'Dumbell - Adjustable', 102, 26, 'Uptown Suppliers', 'Material: Steel, Rubber Plastic, Concrete', '7 Cedarstone Drive', '9875552100', '2020-03-29'),
(6, 'Multi Bench Press Machine', 219, 2, 'DnS Suppliers', '6 In 1 Multi Bench With Incline, Flat, Decline Ben', '7 Cedarstone Drive', '7410001010', '2020-04-05'),
(7, 'Demo', 265, 5, 'Demo', 'This is a demo test.', '77 Demo Lane', '8524445452', '2020-04-03'),
(10, 'RowWarrior Fitness Rowing Mach', 5616, 12, 'Roww Stores', 'HIGHEST QUALITY: This best of class air rowing mac', '52 Weekley Street', '7412585555', '2021-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dor` date NOT NULL,
  `services` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `paid_date` date NOT NULL,
  `p_year` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `attendance_count` int(100) NOT NULL,
  `ini_weight` int(100) NOT NULL DEFAULT 0,
  `curr_weight` int(100) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(50) NOT NULL,
  `curr_bodytype` varchar(50) NOT NULL,
  `progress_date` date NOT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `dor`, `services`, `amount`, `paid_date`, `p_year`, `plan`, `address`, `contact`, `status`, `attendance_count`, `ini_weight`, `curr_weight`, `ini_bodytype`, `curr_bodytype`, `progress_date`, `reminder`) VALUES
(6, 'Harry Denn', 'harry', '', 'Male', '2019-12-25', 'Sauna', 300, '2024-01-23', 2021, '3', '64 Mulberry Lane', '8545878545', 'Active', 4, 0, 62, '0', '0', '2024-01-06', 0),
(8, 'Charles Anderson', 'charles', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2020-01-02', 'Fitness', 55, '2023-12-14', 2020, '1', '99 Heron Way', '8520258520', 'Active', 14, 92, 85, 'Fat', 'Bulked', '2020-04-22', 0),
(11, 'Justin Schexnayder', 'justin', '', 'Male', '2019-01-25', '', 31500, '2020-03-31', 2020, '30', '14 Blair Court', '7535752220', 'Active', 9, 0, 0, '', '', '0000-00-00', 0),
(14, 'Ryan Crowl', 'ryan', '', 'Male', '2019-07-13', 'Fitness', 55, '2024-01-09', 2020, '1', '34 Twin Oaks Drive', '1578880010', 'Active', 13, 59, 63, 'Slim', 'Slim', '2020-04-23', 0),
(16, 'TrialsChanged', 'trials', '', 'Male', '2020-04-01', '', 0, '2021-06-12', 2021, '30', '4 Demo Lane', '741111110', 'Expired', 26, 50, 61, 'Slim', 'Slim', '2021-06-11', 1),
(17, 'Karen McGray', 'karen', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2020-04-02', 'Cardio', 120, '2022-05-31', 2020, '3', '23 Rubaiyat Road', '7441002540', 'Active', 12, 0, 0, '', '', '0000-00-00', 0),
(18, 'Jeanne Pratt', 'prattj', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2020-04-04', 'Fitness', 55, '2021-06-11', 2021, '1', '86 Hilltop Street', '7854445410', 'Active', 11, 0, 0, '', '', '0000-00-00', 0),
(19, 'George Fann', 'george', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2019-04-02', 'Fitness', 55, '2021-06-11', 2021, '1', '43 Oak Drive', '0258987850', 'Active', 22, 0, 0, '', '', '0000-00-00', 1),
(20, 'Wendy Scott', 'wendy', 'cac29d7a34687eb14b37068ee4708e7b', 'Female', '2020-03-21', 'Fitness', 55, '2021-06-11', 2021, '1', '24 Cody Ridge Road', '8547896520', 'Active', 18, 0, 0, '', '', '0000-00-00', 0),
(21, 'Patrick Wilson', 'patrick', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2020-04-02', 'Cardio', 120, '2022-06-01', 2021, '3', '24 Cody Ridge Road', '9874568520', 'Active', 11, 0, 0, '', '', '0000-00-00', 0),
(22, 'Tommy Marks', 'tommy', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2020-04-01', 'Fitness', 55, '2020-04-05', 2020, '3', '22 Franklin Street', '8529997500', 'Active', 7, 0, 0, '', '', '0000-00-00', 0),
(23, 'Keith Martin', 'martin', 'cac29d7a34687eb14b37068ee4708e7b', 'Male', '2020-04-02', 'Cardio', 120, '2022-06-02', 2021, '3', '89 Smithfield Avenue', '7895456250', 'Active', 24, 51, 68, 'Slim', 'Muscular', '2022-06-02', 0),
(30, 'Adolfo Senior', 'adolf_hitler', '', 'Male', '2024-01-06', '', 0, '2023-12-14', 2023, '30', 'Purok 2 Barangay Anu', '6666666666', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(31, 'Liezel castor', 'zel2000-10', '20zel24', 'Female', '2024-01-05', 'Fitness', 55, '2024-01-05', 0, '1', 'Balibago Angeles Cit', '0926181517', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(33, 'Liezel castor', 'zel2000-10', '20zel24', 'Female', '2024-01-05', 'Fitness', 0, '0000-00-00', 0, '1', 'Balibago Angeles Cit', '0926181517', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(34, 'Liezel castor', 'zel2000-10', '20zel24', 'Female', '2024-01-05', 'Fitness', 0, '0000-00-00', 0, '1', 'Balibago Angeles Cit', '0926181517', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(35, 'Liezel castor', 'zel2000-10', '20zel24', 'Female', '2024-01-05', 'Fitness', 0, '0000-00-00', 0, '1', 'Balibago Angeles Cit', '0926181517', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(36, 'kyd day', 'kyd_wolf', '123abc', 'Male', '2024-01-05', 'Fitness', 0, '0000-00-00', 0, '1', 'Angeles City', '0933986782', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(37, 'kyd day', 'kyd_wolf', '123abc', 'Male', '2024-01-05', 'Fitness', 0, '0000-00-00', 0, '1', 'Angeles City', '0933986782', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(38, 'Liezel castor', 'zel2000-10', '20zel24', 'Female', '2024-01-05', 'Fitness', 0, '0000-00-00', 0, '1', 'Balibago Angeles Cit', '0926151718', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(41, 'Raizen Sangalang', 'raizensangalang@gmai', '123456', 'Male', '2024-01-05', 'Fitness', 55, '2024-01-05', 0, '1', 'Angeles City, Pampan', '0961453678', 'Expired', 0, 23, 2, '0', '0', '2024-01-06', 0),
(42, 'Jay', 'Chavzz', '123456', 'Male', '1990-10-10', 'Fitness', 0, '2024-01-06', 2024, '30', 'earth', '9', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(43, '', 'admin', 'codeastro.com', 'Male', '2024-01-07', '', 0, '0000-00-00', 0, '', '', '', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(44, '', 'admin', 'codeastro.com', 'Male', '2024-01-07', '', 0, '0000-00-00', 0, '', '', '', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(45, 'jjjjj', 'sdksdks', 'Pass', 'Male', '2024-01-07', 'Fitness', 0, '0000-00-00', 0, '1', 'jjjj', '934934', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(46, 'kjkk', 'sdksdks', 'Pass', 'Male', '2024-01-07', 'Fitness', 0, '0000-00-00', 0, '1', '7hyy', '777', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(47, 'kjkk', 'sdksdks', '1', 'Male', '2024-01-07', 'Fitness', 0, '0000-00-00', 0, '1', '7hyy', '777', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(48, 'Karl Korpus Kastillo', 'sdksdks', 'Rao@123', 'Male', '2024-01-07', 'Fitness', 0, '0000-00-00', 0, '1', 'juu', '8777', 'Pending', 0, 0, 0, '', '', '0000-00-00', 0),
(49, 'k', 'k', 'l88', 'Male', '0000-00-00', '', 0, '2024-01-07', 2024, '1', '', '', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(50, '', 'admin', 'codeastr', 'Male', '0000-00-00', '', 0, '2024-01-09', 2024, '1', '', '', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(51, '', 'harry', 'Test1234!', 'Male', '0000-00-00', '', 0, '2024-01-09', 2024, '1', '', '', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(52, 'kjkkkk', 'harry', 'Test1234!', 'Male', '2024-01-31', 'Fitness', 0, '2024-01-09', 2024, '1', '88788', '88888889', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(53, 'mkjkkk', 'harrykjhjj', 'Test1234!', 'Male', '2024-01-31', 'Fitness', 0, '2024-01-09', 2024, '1', 'yyyyy', '877788', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(54, 'ikkkkkk', 'harrykjhjj', 'Password12345!', 'Male', '2024-01-25', 'Cardio', 40, '2024-01-22', 2024, '1', '6666', '7777777777', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(56, 'Harry Pot', 'harrypot', 'Password12345!', 'Male', '1999-12-22', 'Sauna', 4296, '2024-01-23', 2024, '12', 'Purok 2 Barangay Anu', '7777777777', 'Active', 0, 0, 0, '', '', '0000-00-00', 0),
(57, 'kkfddkfkd', 'sangoku', 'Password12345!', 'Male', '1999-07-07', 'Fitness', 300, '2024-01-25', 2024, '3', 'Purok 2 Barangay Anu', '7777777777', 'Active', 0, 0, 0, '', '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `user_id` int(11) NOT NULL,
  `paid_date` datetime NOT NULL,
  `services` text NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user_id`, `paid_date`, `services`, `amount`) VALUES
(666, '2024-01-23 01:58:29', 'Sauna', 679),
(56, '2024-01-23 00:00:00', 'Sauna', 4296),
(57, '2024-01-23 00:00:00', 'Fitness', 55),
(57, '2024-01-23 00:00:00', 'Fitness', 100),
(57, '2024-01-23 09:24:10', 'Fitness', 900),
(57, '2024-01-25 18:51:41', 'Fitness', 300);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `charge`) VALUES
(1, 'Fitness', '55'),
(2, 'Sauna', '35'),
(3, 'Cardio', '40');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE `reminder` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`id`, `name`, `message`, `status`, `date`, `user_id`) VALUES
(12, 'staff', 'asd', 'unread', '2020-04-16 22:39:59', 0),
(13, 'staff', 'asdasdas', 'unread', '2020-04-16 22:40:49', 0),
(14, 'staff', 'ASasA', 'unread', '2020-04-16 22:41:59', 0),
(15, 'staff', 'asdasdasd', 'unread', '2020-04-16 22:42:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`user_id`, `username`, `password`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`) VALUES
(1, 'bruno', 'cac29d7a34687eb14b37068ee4708e7b', 'brunoden@mail.com', 'Bruno Den', '26 Morris Street', 'Cashier', 'Male', 852028120),
(2, 'michelle', 'cac29d7a34687eb14b37068ee4708e7b', 'michelle@mail.com', 'Michelle R. Lane', '61 Stone Lane', 'Trainer', 'Female', 2147483647),
(3, 'james', 'cac29d7a34687eb14b37068ee4708e7b', 'jamesb@mail.com', 'James Brown', '12 Deer Ridge Drive', 'Trainer', 'Male', 2147483647),
(4, 'bruce', 'cac29d7a34687eb14b37068ee4708e7b', 'bruce@mail.com', 'Bruce H. Klaus', '68 Lake Floyd Circle', 'Manager', 'Male', 1458887788),
(5, 'pedroe', '123', 'dev@gmail.com', 'Pedro Escoto', 'sdskdsk', 'Cashier', 'Male', 3472444),
(6, 'brunoden@mail.com', '123', 'yyy@gmail.com', 'test', 'Purok 2 Barangay Anu', 'Cashier', 'Male', 666666666),
(7, 'trish123', 'Password12345!', 'trish123@gmail.com', 'Trish Kastillo', 'kkkkk', 'Cashier', 'Male', 3472444),
(8, 'Jay', '123456', 'chaveniajeffry19@gmail.com', 'Jay', 'earth', 'Manager', 'Male', 9);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(30) NOT NULL,
  `user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task_status`, `task_desc`, `user_id`) VALUES
(20, 'In Progress', 'Test Completed', 14),
(21, 'Pending', 'Mastering Crunches', 6),
(22, 'In Progress', 'Standing Workouts For Flat Abs', 6),
(23, 'In Progress', 'Triceps Buildup - 3 set', 14),
(24, 'Pending', 'Decline dumbbell bench press', 6),
(27, 'Pending', 'dddd', 0),
(28, 'In Progress', 'Test 1', 23),
(30, 'In Progress', '', 31),
(31, 'In Progress', 'Leg Day', 41),
(33, 'Pending', 'Leg Day', 55),
(36, 'In Progress', 'ggggnnn', 56),
(37, 'In Progress', 'ggggnnn', 56),
(38, 'In Progress', 'mmmm', 56),
(39, 'In Progress', 'mmmmmmmmmm', 56),
(40, 'In Progress', 'jnjnnn', 0),
(41, 'In Progress', 'jnjnnn', 56),
(45, 'In Progress', '', 56),
(46, 'In Progress', 'nhnn', 56),
(47, 'In Progress', '    ', 56);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminder`
--
ALTER TABLE `reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reminder`
--
ALTER TABLE `reminder`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
