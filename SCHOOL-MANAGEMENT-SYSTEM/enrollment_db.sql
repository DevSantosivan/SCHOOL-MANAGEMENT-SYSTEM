-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 05:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`id`, `username`, `email`, `contact`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '09561648797', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `students_tb`
--

CREATE TABLE `students_tb` (
  `id` int(11) NOT NULL,
  `profilepic` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `BOD` varchar(100) NOT NULL,
  `POB` varchar(100) NOT NULL,
  `yearlevel` varchar(200) NOT NULL,
  `contact_num` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mothername` varchar(200) NOT NULL,
  `fathername` varchar(200) NOT NULL,
  `mother_contact` varchar(200) NOT NULL,
  `father_contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_tb`
--

INSERT INTO `students_tb` (`id`, `profilepic`, `fname`, `mname`, `lname`, `sex`, `age`, `BOD`, `POB`, `yearlevel`, `contact_num`, `email`, `mothername`, `fathername`, `mother_contact`, `father_contact`) VALUES
(23, 'porf.jpg', 'Ivan', 'Francisco', 'Santos', 'Male', '23', '2024-05-29', 'San Jose', 'Grade-12', '09561648797', 'ivansantos@gmail.com', 'Elena Santos', 'Geraldo Santos', '', '09661648797'),
(24, 'prof1.jpg', 'Riza', 'Casro', 'Tolentino', 'Female', '21', '2024-05-29', 'Calintaan', 'Grade-11', '09561648797', 'riza@gmail.com', 'Elena Tolentino', 'Geraldo Tolentino', '', '09661648797'),
(25, 'asas.jpg', 'Carlos', 'Manuel', 'Salvador', 'Male', '21', '2024-05-29', 'san jose', 'Grade-10', '89898989', 'carlos@gmail.com', 'Rose', 'John', '', '0957173774'),
(26, 'OIP.jpg', 'Rosers', 'DI-maano', 'Cy', 'Female', '13', '2024-05-22', 'Rizal', 'Grade-9', '067646', 'rose@gmail.com', 'rosers', 'gar', '', '12121211313'),
(27, 'R.jpg', 'Cardo', 'SY', 'Dalisay', 'Male', '14', '2024-05-24', 'San jose', 'Grade-8', '05765645312', 'Cardo@gmail.com', 'Cyrl', 'Car;', '', ''),
(28, 'OIP (1).jpg', 'Jopaks', 'Barrios', 'Senpai', 'male', '14', '2024-05-16', 'Sablayan', 'Grade-7', '89898989', 'Siza@gmail.com', 'Ers', 'Ern', '', '121350444224');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `password_db` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `contact`, `password_db`) VALUES
(3, 'SNHS', 'SNHS@gmail.com', '12121212121222', ' SNHS'),
(4, 'santos', 'santos@gmail.com', '1212121121', ' santos@gmail.com'),
(9, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_tb`
--
ALTER TABLE `students_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_tb`
--
ALTER TABLE `students_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
