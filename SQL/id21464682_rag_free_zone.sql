-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2023 at 04:09 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21464682_rag_free_zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Your_Name` varchar(100) NOT NULL,
  `Your_Mobile_No` varchar(15) DEFAULT NULL,
  `Your_Email` varchar(100) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Student_Name` varchar(100) NOT NULL,
  `Student_Mobile_No` varchar(15) DEFAULT NULL,
  `Guardian_Name` varchar(100) NOT NULL,
  `Guardian_Mobile_No` varchar(15) DEFAULT NULL,
  `Student_Email` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `College_Name` varchar(100) NOT NULL,
  `College_Code` int(10) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Semester` varchar(10) NOT NULL,
  `Student_Address` varchar(200) NOT NULL,
  `Identity_Proof` longblob NOT NULL,
  `Complaint_Category` varchar(100) NOT NULL,
  `Any_Evidence` longblob NOT NULL,
  `Date_of_Incident` date NOT NULL,
  `Time_of_Incident` time NOT NULL,
  `Incident_Details` varchar(200) NOT NULL,
  `Reference_ID` varchar(50) DEFAULT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Uninformed',
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Your_Name`, `Your_Mobile_No`, `Your_Email`, `Relation`, `Student_Name`, `Student_Mobile_No`, `Guardian_Name`, `Guardian_Mobile_No`, `Student_Email`, `Gender`, `College_Name`, `College_Code`, `Branch`, `Semester`, `Student_Address`, `Identity_Proof`, `Complaint_Category`, `Any_Evidence`, `Date_of_Incident`, `Time_of_Incident`, `Incident_Details`, `Reference_ID`, `Status`, `Date`) VALUES
('', '', '', '', 'bhcabh', '5342222222', 'bvdfjbbj', '5646545465', 'jhtdg@gmail.com', 'Male', 'hdchwiu', 43, 'chb', '3', 'djajjhg', 0x70686f746f2d313534363431303533312d626234636161366234323464312e706e67, 'ragging', '', '7854-05-06', '07:59:00', 'jhddhd', 'REF202311280843297787', 'Rejected', '2023-12-02'),
('jhfh', '6777373537', '', '', 'ncmhmh', '8646533883', 'gmgddg', '6848664848', 'gdhf@mhf.com', 'Male', 'nvgnx', 42, 'fxf', '2', 'hnssnfnsfn', 0x70686f746f2d313534363431303533312d6262346361613662343234642e706e67, 'mhddjdgg', '', '0422-03-06', '05:04:00', 'gjdyhffh', 'REF202311281527094408', 'Informed', '2023-12-02'),
('abcd', '8686868686', 'abcd@gmail.com', '', 'defg', '9898989898', 'dwrf', '5858585858', 'defg@gmail.com', 'Male', 'ABCD College', 45859, 'BCA', '2', 'BUGAUDGU', 0x63616c6c312e706e67, 'SCSWCW', '', '2023-11-30', '02:57:00', 'ACAACASSCWSCWCCWCF', 'REF202312021823289344', 'Informed', '2023-12-02'),
('cacasca', '8787878787', 'adad@gmail.com', 'Father', 'gagdagudg', '4545454545', 'cavwvwvvw', '2525252525', 'adqad@gmail.com', 'selected', 'AABCD College', 54876, 'BCA', '3', 'CSVSSVSVWVWEV', 0x63616c6c312e706e67, 'CCCVC', '', '2023-12-01', '04:28:00', 'CCSWVVWVSWV', 'REF202312021958218778', 'Rejected', '2023-12-03'),
('', '', '', '', 'Sujoy Das', '8764262272', 'Bikash Das', '9879333838', 'sujoy@gmail.com', 'Male', 'BCRAPC', 323, 'BCA', '2nd', 'Durgapur, West Bengal', 0x37646263336462382d626239622d346434312d383338662d3661313766623062386530632e6a7067, 'Ragging', '', '2023-12-02', '12:56:00', 'bjvigwggiy', 'REF202312050429574469', 'Informed', '2023-12-05'),
('', '', '', '', 'Indrajit Gon', '9878584536', 'Bibek Gon', '9654872514', 'indrajit@gmail.com', 'Male', 'Durgapur College', 456987, 'BCA', '2', 'City Center, Durgapur', 0x47414e5454204348415254204f4620414e54495f70616765732d746f2d6a70672d303030312e6a7067, 'Mental Harassment', '', '2023-12-03', '17:00:00', 'During coming back home they have ragged me in the road. And has beaten me very much.', 'REF202312050504551893', 'Informed', '2023-12-05'),
('', '', '', '', 'Nisha Dutta', '7895455234', 'Anirban Dutta', '6214587064', 'nisha@gmail.com', 'Female', 'Annapurna Nursing Institute', 201, 'BBA', '2nd', 'Benachity, Durgapur-13', 0x62637265636170632d6c6f676f69636f6e2e706e67, 'Torture', '', '2022-12-20', '10:15:00', 'A boy named Arnab Majhi came to me and forced to propose him and when I ignored him he slapped me behind so many peoples.', 'REF202312050509027852', 'Rejected', '2023-12-05'),
('Nirmal Saha', '7895214052', 'nirmal@gmail.com', 'Brother', 'Jagat Saha', '8520963741', 'Parimal Saha', '6260540398', 'jagat@gmail.com', 'Male', 'Durgapur College', 845, 'BBA', '2nd', 'Benachity, Durgapur', 0x62637265636170632d6c6f676f69636f6e2e706e67, 'Ragging', '', '2023-10-20', '05:20:00', 'I am on my way home from college and some boys came up to me and told me bad things and forced me to do some bad things in front of some girls', 'REF202312050518137923', 'Informed', '2023-12-05'),
('', '', '', '', 'Isha Debnath', '7810938106', 'Ashis kumar Debnath', '9775370025', 'isha677@gmail.com', 'Female', 'ABC  College', 323, 'BCA', '5th', '10/16 Sharatpully, Durgapur', 0x53637265656e73686f7420283130292e706e67, 'Harassment', '', '2023-11-08', '01:30:00', 'Two boys named Briti Sundar Das and Indrajit Gon. Everyday message me on phone and pressurizrd me for bad work. So please help me. Now i panic when i see them...', 'REF202312050541444686', 'Rejected', '2023-12-05'),
('', '', '', '', 'Sanjay Shil', '7845100556', 'Bhaskar Shil', '8957812652', 'sanjay@gmail.com', 'Male', 'Raniganj College', 2545, 'BCOM', '2nd', 'Raniganj', 0x62637265636170632d6c6f676f69636f6e2e706e67, 'Ragging', '', '2023-11-30', '04:20:00', 'Some senior students snatched my bag and burned all my thing', 'REF202312050606447601', 'Rejected', '2023-12-05'),
('', '', '', '', 'Rick Dutta', '7845452255', 'Animesh Dutta', '9782105217', 'rick@gmail.com', 'Male', 'Durgapur College', 201, 'BBA', '1st', 'Durgapur', 0x6c6f676f2e706e67, 'Ragging', '', '2002-02-12', '04:05:00', 'Please help me to attend classes as seniors not letting me to attend classes ', 'REF202312050932249906', 'Informed', '2023-12-05'),
('', '', '', '', 'Briti Das', '9686585236', 'Ram Das', '8986557458', 'briti@gmail.com', 'Male', 'Durgapur College', 585685, 'BHM', '2', 'Fuljhore, Durgapur', 0x696e6472616a69742e6a706567, 'Harrasment', '', '2023-12-01', '18:07:00', 'Seniors are harrasing me everyday.', 'REF202312050935303721', 'Rejected', '2023-12-05'),
('', '', '', '', 'Indrajit Gon', '9091025711', 'Prabir Gon', '9933166064', 'gdhdhs@gshh.cj', 'Male', 'Hdhdh', 2737, 'Hdh', '3', 'Fhdjdej', 0x494d4732303233313230353132313835302e6a7067, 'Dhdj', '', '2023-12-06', '12:08:00', 'Dhdhdhdhfh', 'REF202312051038534642', 'Informed', '2023-12-05'),
('', '', '', '', 'Sonai Halder', '7679043830', 'Bshija', '7679043830', 'sourav2168@gmail.com', 'Male', 'Jjzbb', 414, 'Jjz', '2', 'Hsjsjn', 0x536e6170696e7374612e6170705f3430353231363336385f313133363938303131373434313431325f313736353738363237343435343235323436335f6e5f313038302e6a7067, 'Husbb', '', '2023-12-04', '22:33:00', 'Huxjnaklla ', 'REF202312061503509311', 'Informed', '2023-12-06'),
('', '', '', '', 'Jyotibrata Mondal', '8987898485', 'Baba Mondal', '9687453625', 'jyoti.brata@gmail.com', 'Male', 'VB', 36589, 'Hindi', '2', 'Jambuni', 0x323032335f31315f333020345f353520504d204f6666696365204c656e732e6a7067, 'Ragging', '', '2023-12-16', '00:02:00', 'Beaten by them', 'REF202312161104278610', 'Uninformed', '2023-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `rfzusers`
--

CREATE TABLE `rfzusers` (
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rfzusers`
--

INSERT INTO `rfzusers` (`firstname`, `middlename`, `lastname`, `dob`, `address`, `mobile`, `email`, `gender`, `city`, `state`, `password`) VALUES
('Indrajit', 'with', 'Gon', '2003-11-27', 'Nivedita place', '9933166064', 'indrajit@gmail.com', 'male', 'Durgapur', 'West Bengal', '$2y$10$hMqVbjNg8tS7YZ.NjhJbu.sg0CO9v1DNhMJjYe1BbJTww66TE9.lW'),
('Krishna', '', 'Roy', '2001-04-05', 'Nivedita place', '9933166064', 'krishna@gmail.com', 'male', 'PASCHIM BARDHAMAN', 'West Bengal', '$2y$10$KET6gafz4Sq59euYRHPlHeyWyvGt71yCVCLxBurpWov2ePdPjol..'),
('Prabir', '', 'Gon', '2000-09-08', 'Nivedita place', '9933166064', 'prabir@gmail.com', 'male', 'PASCHIM BARDHAMAN', 'West Bengal', '$2y$10$b26EtACs9MIbRQ7E/eOPYeD.YfevX9jrjX8UcAKhK.XjLXiYubSvG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
