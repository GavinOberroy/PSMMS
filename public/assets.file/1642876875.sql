-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 04:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psmms`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `Lecturer_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lecturer_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lecturer_Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lecturer_OfficeNo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lecturer_Biography` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lecturer_Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`Lecturer_ID`, `Lecturer_Name`, `Lecturer_Email`, `Lecturer_OfficeNo`, `Lecturer_Biography`, `Lecturer_Image`, `User_ID`) VALUES
('0159', 'Dr. Noorlin Binti Mohd Ali', 'norlin@ump.edu.my', '094244694', 'Noorlin Mohd Ali is a senior lecturer in the Faculty of Computing, Universiti Malaysia Pahang. She holds a PhD in Engineering from Kyusyu Institute Of Technology, Japan. She also obtained Master of  Science (Intelligent System)', 'noorlin.jpg', 5),
('0164', 'Ts. Dr. Wan Isni Sofiah Binti Wan Din', 'sofiah@ump.edu.my', '094244726', 'Wan Isni Sofiah is a senior lecturer at the Faculty of Computing, Universiti Malaysia Pahang. Field of research interest are Data Communication & Networking, Network Design & Algorithm, Wireless Sensor Network, Clustering, Network Security and Fuzzy Logic', 'isni.jpg', 6),
('0335', 'Ts. Dr. Mohd Faizal Bin Ab Razak', 'faizalrazak@ump.edu.my', '094244676', 'Mohd Faizal Bin Ab Razak is a senior lecturer at the Faculty of Computing, Universiti Malaysia Pahang. His research interests include Intrusion Detection Systems, Intrusion Response Systems, and Network Security.', 'faizal.png', 11),
('0397', 'Ts. Dr. Mohd Izham Bin Mohd Jaya', 'izhamjaya@ump.edu.my', '095492310', 'Mohd Izham Mohd Jaya is a senior lecturer in Faculty of Computing, Universiti Malaysia Pahang.\r\n', 'izham.jpg', 10),
('0427', 'Muhammad Zulfahmi Toh Bin Abdullah @ Toh Chin Lai', 'zulfahmi@ump.edu.my', '-', 'Muhammad Zulfahmi Toh is a lecturer at the Department of Software Engineering, Faculty of Computing, Universiti Malaysia Pahang.', 'zulfahmi.jpg', 7),
('0467', 'Dr. Danakorn Nincarean A/L Eh Phon', 'danakorn@ump.edu.my', '094244643', 'Danakorn Nincarean is currently a senior lecturer at the Faculty of Computing at Universiti Malaysia Pahang', 'danakorn.jpg', 9),
('0476', 'Dr. Syifak Binti Izhar Hisham', 'syifakizhar@ump.edu.my', '094245000', 'I believe I have strong background in researching, academic writing and presenting in various viva, speech, conference and product competition sessions. ', 'syifak.jpg', 12),
('0567', 'Imran Edzereiq Bin Kamarudin', 'edzereiq@ump.edu.my', '095492431', 'Imran Edzereiq Kamarudin is a lecturer at Faculty of Computing, Universiti Malaysia Pahang.', 'imran.jpg', 14),
('0689', 'Ts. Aziman Bin Abdullah', 'aziman@ump.edu.my', '095492106', 'Aziman Abdullah is a lecturer specialized in Internet Computing. With over 16 years of teaching experience, he works from conventional teaching practice to transformative teaching practice using digital technologies like e-learning and web technology.', 'aziman.jpg', 13),
('0715', 'Dr. Yusnita Binti Muhamad Noor', 'yusnitanoor@ump.edu.my', '095492048', 'A mom for three beautiful princess and two great little boys. Graduated from UUM and UMP is my first academic teaching experience.', 'yusnita.jpg', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`Lecturer_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
