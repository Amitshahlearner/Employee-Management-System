-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2025 at 10:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(41, '234'),
(36, 'Agriculture'),
(34, 'Farmer'),
(38, 'Finance'),
(2, 'Finances'),
(42, 'Financessss'),
(1, 'HR'),
(5, 'Management'),
(37, 'name'),
(3, 'Software Developer'),
(7, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_password` varchar(25) NOT NULL,
  `emp_phone` varchar(20) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_address` text NOT NULL,
  `emp_gender` enum('M','F','O') NOT NULL,
  `emp_image` varchar(255) DEFAULT NULL,
  `emp_joining_date` date NOT NULL,
  `emp_status` enum('0','1') NOT NULL,
  `emp_department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_email`, `emp_password`, `emp_phone`, `emp_dob`, `emp_address`, `emp_gender`, `emp_image`, `emp_joining_date`, `emp_status`, `emp_department_id`) VALUES
(4, 'Sumit', 'sumit@gmail.com', '1234567890', '8764463754', '2024-08-09', 'Ram Nagar', 'M', '', '2025-03-13', '0', 2),
(5, 'Veshal', 'veshal@gmail.com', '14789655232', '875634872', '2002-06-14', 'jkasgh87defw', 'M', 'colorChange.html', '2025-03-24', '1', 42),
(7, 'Aman', 'aman@gmail.com', '213243', '7826863233', '2025-03-20', 'jhsauidhqbdydqqq', 'O', 'quiz_app.html', '2025-03-01', '0', 5),
(8, 'Amisha', 'amisha1@gmail.com', '1231322323', '2786336373', '2025-03-29', 'jajgfuwqefjrwebhfbuywedfh', 'F', '', '2025-03-20', '1', 2),
(9, 'Gurleen', 'gurleen@gmail.com', '1234567890', '9876534622', '2025-02-27', 'ddsklahqwyhdijqwhdqedyuqij', 'M', '', '2025-03-10', '0', 1),
(10, 'Armaan', 'armaan@gmail.com', '1234567890', '7655136546', '2025-03-30', 'dsqefr3gtergrtgh', 'M', '', '2025-04-05', '0', 1),
(11, 'vashisht', 'vashisht@gmail.com', '1234567890', '9672345378', '2025-03-13', ',ajsciuwhfnwjdghfcwbfcwfcdwuch ', 'M', '', '2025-04-03', '0', 2),
(12, 'raja', 'raja@gmail.com', '1234567890', '9537533567', '2025-03-20', 'jkasdugq dbqiudg quiwdyhqxn ', 'M', '', '2025-04-05', '1', 2),
(14, 'vikrant', 'vikrant@gmail.com', '1234567890', '9826356738', '2025-03-06', 'mnabjhgsda cacajk cahf h io  iojjm ', 'M', '', '2025-03-20', '1', 2),
(16, 'Amit', 'amit3456@gmail.com', '12324354546', '7826863233', '2025-03-08', 'asdwgfrfbvbdgfnbfn', 'M', '', '2025-03-28', '1', 2),
(17, 'Veshal', 'veshal123@gmail.com', '1234567890-', '8764463754', '2020-01-23', 'awsedrfcvbnm syt4rrhn', 'M', '', '2025-03-27', '1', 2),
(22, 'Devesh', 'devesh567@gmail.com', '1234567890', '9115643994', '2025-03-22', 'qwerp[asdfghjkl xcvbnm,', 'M', '', '2025-03-07', '1', 42),
(23, 'Devesh', 'devesh56778@gmail.com', '1234567890', '9115643994', '2025-03-22', 'qwerp[asdfghjkl xcvbnm,', 'M', '', '2025-03-07', '1', 42),
(24, 'Devesh', 'amit56734@gmail.com', '1245787423', '8764463754', '2025-04-01', 'werefgxcffdghdb sdfdsx rfdg', 'M', 'to-do-task.html', '2025-03-27', '1', 38),
(25, 'Veshal', 'veshal582@gmail.com', '147895623', '9876534622', '2025-04-03', 'qwrtuo fvhjkkm bnmmmj', 'M', 'colorChange.html', '2025-03-30', '1', 38),
(26, 'Amisha', 'amisha234@gmail.com', '3253434635', '8764463754', '2025-03-21', 'qwertu tyuiikn fgnn', 'F', 'colorChange.html', '2025-03-28', '1', 38),
(27, 'Amina', 'amina@gmail.com', '14785522565', '8764463754', '2025-03-28', 'adasaerqweref dwsdqae dwsdq', 'F', 'quiz_json.html', '2025-03-07', '1', 38),
(29, 'Aman', 'aman12233@gmail.com', '14786225525225', '8764463754', '2025-03-29', 'aswerv fdgvgfg rgrrtygryf fgfbb  fgfg ', 'M', 'quiz_json.html', '2025-03-20', '1', 2),
(31, 'Devesh', 'deveshery@gmail.com', '123456789765', '7826863233', '2025-03-29', 'qwqewe sscxc', 'M', 'quiz_json.html', '2025-03-22', '1', 38),
(34, 'Amit', 'amitaas@gmail.com', '2433443432', '8764463754', '2025-03-31', 'qwwqwe cwed d wdwdx we ', 'M', 'quiz_app.html', '2025-03-22', '1', 38),
(36, 'Sumit', 'sumitasd@gmail.com', '12345679987', '7826863233', '2025-03-27', 'wedadc ew rfvsd ecfvsd  fwdscscs', 'M', 'color.html', '2025-03-27', '1', 38),
(38, 'Veshal', 'veshal6789@gmail.com', '147895623', '9115643994', '2025-03-27', 'njiuhjju hjjb jsghjka', 'M', 'colorChange.html', '2025-03-06', '1', 38),
(40, 'Devesh', 'amit3324@gmail.com', '12222321321312', '9115643994', '2025-03-15', 'sdaefdae ', 'M', 'Clones.html', '2025-03-13', '1', 38),
(42, 'Amisha', 'amisha122234@gmail.com', '12324342v 45 ', '9115643994', '2025-03-26', 'adsadsd wqwd', 'F', 'to-do-task.html', '2025-03-14', '1', 38),
(44, 'Aman', 'aman78945@gmail.com', '123456776', '8756267523', '2025-03-26', 'qwqewrer rtrgd ddfgf', 'M', 'colorChange.html', '2025-03-08', '1', 2),
(48, 'Devesh', 'veshal67w289@gmail.com', '1223422343', '8756267523', '2025-03-08', 'wqewqqffdq wewqr qreqrewq', 'M', 'Clone.html', '2025-03-28', '0', 38),
(50, 'Aman', 'veshalws6789@gmail.com', '`12323141', '9115643994', '2025-03-26', 'ewrqw erefdf erewdf rewrdf ewre', 'M', 'quiz_app.html', '2025-03-31', '0', 38),
(52, 'Amitian', 'amitian@gmail.com', '112233434', '9115643994', '2025-03-31', 'wqeqwre rewr t rwtw werwe ', 'M', 'quiz_app.html', '2025-03-27', '1', 38),
(53, 'Devesh', 'devesh12345@gmail.com', '789456123', '8756267523', '2025-03-07', 'ajjjjkgdh kiagujyuib jkaghhg kjshsg', 'M', 'quiz_app.html', '2025-03-12', '1', 38),
(54, 'ayansh', 'ayansh@gmail.com', '12324325454', '7826863233', '2025-03-05', 'qwrew wer sdc  qewe qerwrewq', 'M', 'quiz_json.html', '2025-03-13', '1', 2),
(55, 'Deva', 'deva@gmail.com', '12314324234324', '9876534622', '2025-03-08', 'wqdds qwredew qwed cd', 'M', 'quiz_json.html', '2025-03-28', '1', 2),
(56, 'Amit', 'amit555@gmail.com', '1478895623', '9876534622', '2025-03-14', 'asdfgjkllkjhgds hjkkkjhgf hjjkkl', 'M', 'quiz_json.html', '2025-03-13', '1', 42),
(58, 'Amit', 'aman12321312@gmail.com', '1478955632', '8764463754', '2025-03-30', 'qwert treryter rrfgffgd xcbvc', 'M', 'color.html', '2025-03-01', '1', 42),
(60, 'Amit', 'amisha5556@gmail.com', '1214342342342423', '8764463754', '2025-03-14', 'sdafsa v we f rwf wf wc', 'M', 'to-do-task.html', '2025-03-07', '1', 38);

-- --------------------------------------------------------

--
-- Table structure for table `employee_has_position`
--

CREATE TABLE `employee_has_position` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `assign_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_has_position`
--

INSERT INTO `employee_has_position` (`id`, `employee_id`, `position_id`, `assign_date`) VALUES
(1, 55, 4, '2025-03-18'),
(2, 60, 1, '2025-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_has_projects`
--

CREATE TABLE `employee_has_projects` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `project_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`project_id`)),
  `assign_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_has_projects`
--

INSERT INTO `employee_has_projects` (`id`, `employee_id`, `project_id`, `assign_date`) VALUES
(1, 54, '2', '2025-03-18'),
(2, 55, '1', '2025-03-18'),
(3, 58, '[\"2\",\"6\",\"9\"]', '2025-03-19'),
(4, 60, '[\"2\",\"6\",\"1\"]', '2025-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_has_roles`
--

CREATE TABLE `employee_has_roles` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `role_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`role_id`)),
  `assign_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_has_roles`
--

INSERT INTO `employee_has_roles` (`id`, `employee_id`, `role_id`, `assign_date`) VALUES
(1, 26, '[\"11\",\"13\",\"15\",\"16\"]', '2025-03-19'),
(3, 12, '8', '2025-03-18'),
(4, 12, '9', '2025-03-18'),
(5, 36, '13', '2025-03-18'),
(6, 36, '15', '2025-03-18'),
(7, 36, '11', '2025-03-18'),
(8, 36, '16', '2025-03-18'),
(9, 42, '[\"23\",\"22\",\"45\",\"35\"]', '2025-03-18'),
(11, 52, '[\"11\",\"13\",\"15\",\"16\"]', '2025-03-18'),
(12, 53, '[\"11\",\"13\",\"15\",\"16\"]', '2025-03-18'),
(13, 54, '[\"12\",\"17\"]', '2025-03-18'),
(14, 55, '[\"12\",\"17\"]', '2025-03-18'),
(15, 56, '[\"8\"]', '2025-03-19'),
(16, 58, '[\"8\"]', '2025-03-19'),
(17, 60, '[\"11\",\"13\",\"15\"]', '2025-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `gross_salary` int(11) DEFAULT NULL,
  `deduction_on_salary` int(11) DEFAULT NULL,
  `net_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `employee_id`, `pay_date`, `gross_salary`, `deduction_on_salary`, `net_salary`) VALUES
(1, 10, '2025-03-15', 2334455, 12334, 2322121),
(2, 10, '2025-03-15', 2334455, 12334, 2322121),
(3, 14, '2025-03-18', 2345, 12, 2333),
(4, 11, '2025-02-26', 5000, 123, 4877);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`) VALUES
(3, 'Employee page'),
(4, 'Salary page '),
(2, 'Update Employee'),
(5, 'Update Salary');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `pos_name` varchar(255) DEFAULT NULL,
  `pos_department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `pos_name`, `pos_department_id`) VALUES
(1, 'Managers', 1),
(3, 'Senior HR', 1),
(4, 'Maang', 2),
(7, 'Chattings', 1),
(12, 'Guiness', 1),
(13, 'Chattings', 1),
(15, 'Chattings', 1),
(16, 'Chattingss', 1),
(17, 'Maang', 38),
(18, 'Maang', 38),
(19, 'Senior HR', 38),
(20, 'Senior HR', 38),
(21, 'Intern ', 5),
(22, 'Intern ', 5),
(23, 'Intern ', 36),
(24, 'Intern ', 3),
(25, 'Intern ', 37);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `status`) VALUES
(1, 'EMS', '1'),
(2, 'Blogs', '1'),
(6, 'sdwq', '0'),
(9, 'juniors', '0');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `role_department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_department_id`) VALUES
(8, 'Lokaaa', 42),
(9, 'dfghhh', 5),
(11, 'dfghhh', 38),
(12, 'finance Department', 2),
(13, 'financers', 38),
(14, 'dfghhh', 41),
(15, 'dfghhh', 38),
(16, 'dfghhh', 38),
(17, 'financer', 2),
(18, 'financersss', 2),
(19, '', 36),
(20, '', 34),
(21, 'financers', 36);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `base_salary` int(11) NOT NULL,
  `allowance` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `base_salary`, `allowance`, `bonus`, `total`, `employee_id`) VALUES
(1, 20000, 50000, 1000, 71000, 11),
(3, 23456, 2334, 2343, 28133, 10),
(5, 10000, 2000, 1000, 13000, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_email` (`emp_email`),
  ADD KEY `emp_department_id` (`emp_department_id`);

--
-- Indexes for table `employee_has_position`
--
ALTER TABLE `employee_has_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `employee_has_projects`
--
ALTER TABLE `employee_has_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `project_id` (`project_id`(768));

--
-- Indexes for table `employee_has_roles`
--
ALTER TABLE `employee_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `role_id` (`role_id`(768));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_name` (`permission_name`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pos_department_id` (`pos_department_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_department_id` (`role_department_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `employee_has_position`
--
ALTER TABLE `employee_has_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_has_projects`
--
ALTER TABLE `employee_has_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_has_roles`
--
ALTER TABLE `employee_has_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`emp_department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `employee_has_position`
--
ALTER TABLE `employee_has_position`
  ADD CONSTRAINT `employee_has_position_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_has_position_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_has_projects`
--
ALTER TABLE `employee_has_projects`
  ADD CONSTRAINT `employee_has_projects_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `employee_has_projects_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_has_roles`
--
ALTER TABLE `employee_has_roles`
  ADD CONSTRAINT `employee_has_roles_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`pos_department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`role_department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `fk_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
