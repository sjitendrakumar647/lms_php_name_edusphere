-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 04:22 PM
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
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(12, 'admin', '2025-01-26 00:17:02', 'Add Subject m113'),
(13, 'admin', '2025-01-26 00:21:33', 'Add Subject N113we'),
(14, 'admin', '2025-01-26 16:06:23', 'Add School Year 2024-2025'),
(15, 'admin', '2025-01-26 16:06:49', 'Add School Year 2023-2024'),
(16, 'admin', '2025-02-03 21:27:44', 'Add Subject ytvytvu'),
(17, 'admin', '2025-02-03 23:08:24', 'Add Subject jojnjno'),
(18, 'admin', '2025-02-03 23:24:15', 'Added Subject oio'),
(19, 'admin', '2025-02-03 23:42:30', 'Added Subject ijnjin'),
(20, 'admin', '2025-02-04 16:38:26', 'Added Subject java001'),
(21, 'admin', '2025-02-04 16:39:03', 'Added Subject python002'),
(22, 'admin', '2025-02-05 00:39:14', 'Added Subject jnjni'),
(23, 'admin', '2025-02-05 00:40:45', 'Added Subject gyufu'),
(24, 'admin', '2025-02-05 00:41:30', 'Added Subject tuuyguhu'),
(25, 'admin', '2025-02-05 00:43:55', 'Added Subject N113we'),
(26, 'admin', '2025-02-05 00:44:27', 'Added Subject m113'),
(27, 'admin', '2025-02-05 00:44:48', 'Added Subject jkjj'),
(28, 'admin', '2025-02-05 00:44:59', 'Added Subject refvg'),
(29, 'admin', '2025-02-05 00:45:11', 'Added Subject m113'),
(30, 'admin', '2025-02-05 00:52:22', 'Added Subject uuiu'),
(31, 'admin', '2025-02-05 15:15:56', 'Added Subject uinijkl'),
(32, 'admin', '2025-02-05 15:26:26', 'Added Subject jkk'),
(33, 'admin', '2025-02-05 15:26:39', 'Added Subject hbujnk'),
(34, 'admin', '2025-02-05 15:26:56', 'Added Subject m113'),
(35, 'admin', '2025-02-05 15:29:09', 'Added Subject N113we'),
(36, 'admin', '2025-02-05 15:29:39', 'Added Subject gbhjn'),
(37, 'admin', '2025-02-05 15:34:29', 'Added Subject jhn'),
(38, 'admin', '2025-02-05 15:34:42', 'Added Subject ghbjn'),
(39, 'admin', '2025-02-05 15:34:56', 'Added Subject ghgjk'),
(40, 'admin', '2025-02-07 12:27:57', 'Added User sankar'),
(41, 'admin', '2025-02-12 23:30:13', 'Added User iuiu'),
(42, 'admin', '2025-02-14 22:09:42', 'Added School Year 2026'),
(43, 'admin', '2025-02-14 23:49:41', 'Updated School Year 2024-2027'),
(44, 'admin', '2025-02-14 23:51:21', 'Updated School Year 2023-2025'),
(45, 'admin', '2025-02-15 00:41:02', 'Added School Year 2024-2027'),
(46, 'admin', '2025-02-15 00:41:27', 'Added School Year 2027'),
(47, 'admin', '2025-02-15 16:14:24', 'Added User sankar'),
(48, 'admin', '2025-02-16 18:21:25', 'Added School Year 2025'),
(49, '', '2025-02-16 18:29:59', 'Added School Year 2022'),
(50, '', '2025-02-16 18:31:02', 'Added School Year 2000'),
(51, 'admin', '2025-02-16 22:34:02', 'Added School Year 2021'),
(52, '', '2025-02-16 22:36:18', 'Added School Year 2012'),
(53, 'admin', '2025-02-21 01:53:07', 'Updated School Year 2023'),
(54, 'admin', '2025-03-04 15:12:10', 'Added Subject 5tgbbf'),
(55, 'admin', '2025-03-28 00:16:04', 'Updated School Year 2025'),
(56, 'admin', '2025-03-28 13:16:02', 'Added User 43f34'),
(57, 'admin', '2025-04-10 11:35:13', 'Added Subject java001');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(117, 62, 'jitu', 'A'),
(118, 62, 'dfdgnb', 'B'),
(119, 62, 'wsdfg', 'C'),
(120, 62, 'sdfg', 'D'),
(121, 63, 'programming language', 'A'),
(122, 63, 'rfeg', 'B'),
(123, 63, 'rfgwg', 'C'),
(124, 63, 'jhgjh', 'D'),
(125, 65, 'platform independent', 'A'),
(126, 65, 'not platform independent', 'B'),
(127, 65, 'all of the above', 'C'),
(128, 65, 'none', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(32, 'uploads/5973_File_interview.pdf', '2025-03-09 02:01:22', 'ersgrhdtfghjk', 21, 191, 'kumari'),
(33, '../uploads/7706_File_COLLAGE TIME TABLE.pdf', '2025-03-10 20:18:03', 'pokpo', 21, 191, 'lkml'),
(34, '../uploads/7511_File_BONAFIED_CERTIFICATE.pdf', '2025-03-10 20:20:46', 'gubhjkl', 21, 191, 'bhnjmk'),
(35, '../uploads/3901_File_cast certificate.pdf', '2025-03-10 20:32:32', 'qwertyu', 21, 191, 'asdfghjkl'),
(36, '../uploads/3901_File_cast certificate.pdf', '2025-03-10 20:32:32', 'qwertyu', 21, 196, 'asdfghjkl'),
(37, '../uploads/3901_File_cast certificate.pdf', '2025-03-10 20:32:32', 'qwertyu', 21, 198, 'asdfghjkl'),
(38, '../uploads/9621_File_sap_resume.doc', '2025-04-15 20:55:03', 'sample SAP developer resume...', 21, 205, 'SAP resume'),
(42, '../uploads/6080_File_Avinash Ohja.pdf', '2025-04-18 11:47:22', 'random certificate', 21, 202, 'document'),
(43, '../uploads/6080_File_Avinash Ohja.pdf', '2025-04-18 11:47:22', 'random certificate', 21, 203, 'document'),
(44, '../uploads/6080_File_Avinash Ohja.pdf', '2025-04-18 11:47:22', 'random certificate', 21, 204, 'document'),
(45, '../uploads/6080_File_Avinash Ohja.pdf', '2025-04-18 11:47:23', 'random certificate', 21, 205, 'document');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(26, 'MCA'),
(27, 'java'),
(30, 'MCA 1st year'),
(31, 'MCA 2nd year');

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`) VALUES
(23, 191, 540, 9),
(24, 191, 60, 9),
(25, 191, 300, 9),
(26, 191, 300, 9),
(27, 196, 300, 9),
(28, 202, 300, 9),
(29, 203, 300, 9),
(30, 202, 120, 10),
(31, 202, 180, 10),
(32, 203, 180, 10),
(33, 202, 180, 10),
(34, 203, 180, 10),
(35, 202, 180, 10),
(36, 203, 180, 10),
(37, 202, 60, 9),
(38, 203, 60, 9),
(39, 204, 60, 9),
(40, 205, 60, 9),
(41, 202, 600, 9),
(42, 203, 600, 9),
(43, 204, 600, 9),
(44, 205, 600, 9),
(45, 202, 300, 9),
(46, 203, 300, 9),
(47, 204, 300, 9),
(48, 205, 300, 9),
(49, 202, 300, 10),
(50, 203, 300, 10),
(51, 204, 300, 10),
(52, 205, 300, 10),
(53, 202, 120, 10),
(54, 203, 120, 10),
(55, 204, 120, 10),
(56, 205, 120, 10),
(57, 202, 180, 10),
(58, 203, 180, 10),
(59, 204, 180, 10),
(60, 205, 180, 10);

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(1, 167, '<p>Chapter&nbsp; 1</p>\r\n\r\n<p>Cha</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(13, 'motto', '<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">CHMSC EXCELS:</span></span></strong></p>\r\n\r\n<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Excellence, Competence and Educational</span></span></strong></p>\r\n\r\n<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Leadership in Science and Technology</span></span></strong></p>\r\n'),
(14, 'Campuses', '<pre>\r\n<span style=\"font-size:16px\"><strong>Campuses</strong></span></pre>\r\n\r\n<ul>\r\n	<li>Alijis Campus</li>\r\n	<li>Binalbagan Campus</li>\r\n	<li>Fortunetown Campus</li>\r\n	<li>Talisay Campus<br />\r\n	&nbsp;</li>\r\n</ul>\r\n'),
(15, 'hello', 'erxtcffffffffffffffffffffffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(11, 'MCA', 'jitu'),
(12, 'MBA', 'sankar'),
(14, 'btech', 'tat');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(21, 'holi', 0, '2025-02-16', '2025-02-18'),
(28, 'sports', 0, '2025-02-25', '2025-02-28'),
(30, 'holiday', 0, '2025-04-01', '2025-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(158, 'uploads/5277_File_Shyam Sundar.pdf', '2025-04-18 20:03:38', 'uhnuh', 21, 203, 'kumari', 'sankar swain'),
(157, 'uploads/5277_File_Shyam Sundar.pdf', '2025-04-18 20:03:38', 'uhnuh', 21, 202, 'kumari', 'sankar swain'),
(156, 'uploads/5426_File_Income Certificate(2023).pdf', '2025-04-03 01:32:53', ';lkjbn', 21, 201, '[]poiuyhgf', 'sankar swain'),
(155, 'uploads/5426_File_Income Certificate(2023).pdf', '2025-04-03 01:32:53', ';lkjbn', 21, 200, '[]poiuyhgf', 'sankar swain'),
(154, 'uploads/5426_File_Income Certificate(2023).pdf', '2025-04-03 01:32:53', ';lkjbn', 21, 199, '[]poiuyhgf', 'sankar swain'),
(153, 'uploads/3226_File_CSAgoogledownload.pdf', '2025-04-03 01:28:18', 'uhnuh', 21, 201, 'JITENDRA KUMAR SWAIN', 'sankar swain'),
(152, 'uploads/3226_File_CSAgoogledownload.pdf', '2025-04-03 01:28:18', 'uhnuh', 21, 200, 'JITENDRA KUMAR SWAIN', 'sankar swain'),
(151, 'uploads/3226_File_CSAgoogledownload.pdf', '2025-04-03 01:28:18', 'uhnuh', 21, 199, 'JITENDRA KUMAR SWAIN', 'sankar swain'),
(150, 'uploads/5756_File_Ankita Das sample resume.pdf', '2025-04-03 00:17:51', 'ijjoollp', 241, 199, 'opkol;', ' '),
(149, 'uploads/3854_File_ServicePlus- Issuance of SEBC Certificate.pdf', '2025-04-02 23:13:10', 'sebc', 21, 201, 'cast', 'sankar swain'),
(148, 'uploads/3854_File_ServicePlus- Issuance of SEBC Certificate.pdf', '2025-04-02 23:13:10', 'sebc', 21, 200, 'cast', 'sankar swain'),
(147, 'uploads/3854_File_ServicePlus- Issuance of SEBC Certificate.pdf', '2025-04-02 23:13:10', 'sebc', 21, 199, 'cast', 'sankar swain'),
(146, 'uploads/1848_File_E-INC_2024_192046 (1).pdf', '2025-03-08 22:54:17', 'it7ur456r7t89', 21, 191, 'puja rani', 'sankar swain'),
(145, 'uploads/7243_File_COLLAGE TIME TABLE.pdf', '2025-03-08 22:48:28', 'jvjy', 241, 191, 'jbkj', ' '),
(144, 'uploads/7007_File_hosteler_bonafied_certificate.pdf', '2025-03-08 20:21:19', 'j kjkj kjkj', 21, 191, 'mn k kjk', 'sankar swain'),
(143, 'admin/uploads/1419_File_COLLAGE TIME TABLE.pdf', '2025-03-08 19:19:26', 'uhnuh', 21, 191, 'JITENDRA KUMAR SWAIN', 'sankarswain'),
(142, 'admin/uploads/5238_File_BONAFIED_CERTIFICATE.pdf', '2025-03-02 13:47:15', 'ugu', 0, 191, 'uiuguy', 'jitukumar'),
(159, 'uploads/5277_File_Shyam Sundar.pdf', '2025-04-18 20:03:38', 'uhnuh', 21, 204, 'kumari', 'sankar swain'),
(160, 'uploads/5277_File_Shyam Sundar.pdf', '2025-04-18 20:03:38', 'uhnuh', 21, 205, 'kumari', 'sankar swain'),
(165, '../teacher/uploads/7872_File_Avinash Ohja.pdf', '2025-04-19 00:42:40', 'vgh', 0, 202, ' bbbh', 'jitu kumar'),
(166, 'uploads/5169_File_Shyam Sundar.pdf', '2025-04-19 00:43:34', 'qwerty', 21, 202, 'shyam', 'sankar swain'),
(167, 'uploads/6517_File_Jitendra_Kumar_Swain-Abap_Basic.pdf', '2025-04-19 00:47:59', 'ppppp', 21, 202, 'llllll', 'sankar swain'),
(168, 'uploads/6517_File_Jitendra_Kumar_Swain-Abap_Basic.pdf', '2025-04-19 00:47:59', 'ppppp', 21, 203, 'llllll', 'sankar swain'),
(169, 'uploads/8152_File_Jitendra_Kumar_Swain-Abap_Restful_API_certificate.pdf', '2025-04-19 00:48:52', 'dddddd', 21, 202, 'hhhhhh', 'sankar swain'),
(170, 'uploads/8152_File_Jitendra_Kumar_Swain-Abap_Restful_API_certificate.pdf', '2025-04-19 00:48:52', 'dddddd', 21, 203, 'hhhhhh', 'sankar swain'),
(171, 'uploads/8152_File_Jitendra_Kumar_Swain-Abap_Restful_API_certificate.pdf', '2025-04-19 00:48:52', 'dddddd', 21, 204, 'hhhhhh', 'sankar swain'),
(172, 'uploads/8152_File_Jitendra_Kumar_Swain-Abap_Restful_API_certificate.pdf', '2025-04-19 00:48:52', 'dddddd', 21, 205, 'hhhhhh', 'sankar swain'),
(173, 'uploads/7717_File_9621_File_sap_resume.doc', '2025-04-19 00:49:25', 'aaaaa', 21, 202, 'qqqq', 'sankar swain'),
(174, 'uploads/7717_File_9621_File_sap_resume.doc', '2025-04-19 00:49:25', 'aaaaa', 21, 203, 'qqqq', 'sankar swain'),
(175, 'uploads/7717_File_9621_File_sap_resume.doc', '2025-04-19 00:49:25', 'aaaaa', 21, 204, 'qqqq', 'sankar swain'),
(176, 'uploads/7717_File_9621_File_sap_resume.doc', '2025-04-19 00:49:25', 'aaaaa', 21, 205, 'qqqq', 'sankar swain');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(179, 0, 'ijibietibnie', '2025-02-26 10:16:37', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(180, 0, 'iuinvuit', '2025-02-26 10:33:19', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(181, 0, 'trugyoij', '2025-02-28 15:59:10', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(182, 0, 'vyvuyuyuyy', '2025-02-28 15:59:54', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(183, 0, 'uiuiiuiuh', '2025-02-28 16:26:44', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(184, 0, 'uhbubiu', '2025-02-28 16:27:14', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(185, 0, 'tttttttttttttttttttttttttttttttttt', '2025-02-28 16:28:17', 241, 'jitu kumar', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslms\reply_inbox_message_modal_student.php</b> on line <b>14</b><br />\r\n', ''),
(187, 0, 'good bye...', '2025-02-28 16:42:58', 241, '', '<br />\r\n<b>Warning</b>:  Undefined variable $reciever_name in <b>C:Xampphtdocslmsstudent\reply_inbox_message_modal_student.php</b> on line <b>19</b><br />\r\n', ''),
(188, 246, 'hjgcujvggggh', '2025-02-28 16:56:50', 241, 'eqf ef', 'jitu kumar', ''),
(189, 246, 'hjgcujvggggh', '2025-02-28 16:57:15', 241, 'eqf ef', 'jitu kumar', ''),
(191, 241, 'uhj5g98h54h', '2025-02-28 19:45:54', 241, 'jitu kumar', 'jitu kumar', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(15, 241, 'good job...', '2025-01-29 16:27:15', 21, 'jitu kumar', 'sankar swain'),
(171, 241, 'inininiuiuniun', '2025-02-28 16:40:22', 245, 'jitu kumar', 'jitendra swain');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(24, 187, 'Add Practice Quiz file', '2025-01-29 16:30:57', 'student_quiz_list.php'),
(25, 187, 'Add Practice Quiz file', '2025-01-29 16:31:44', 'student_quiz_list.php'),
(26, 189, 'Add Annoucements', '2025-02-02 18:26:26', 'announcements_student.php'),
(27, 191, 'Add Practice Quiz file', '2025-03-03 12:54:32', 'student_quiz_list.php'),
(28, 191, 'Add Practice Quiz file', '2025-03-03 15:33:53', 'student_quiz_list.php'),
(29, 191, 'Add Downloadable Materials file name <b>JITENDRA KUMAR SWAIN</b>', '2025-03-08 19:19:26', 'downloadable_student.php'),
(30, 191, 'Added Downloadable Material: <b>mn k kjk</b>', '2025-03-08 20:21:19', 'downloadable_student.php'),
(31, 191, 'Added Downloadable Material: <b>jbkj</b>', '2025-03-08 22:48:28', 'downloadable_student.php'),
(32, 191, 'Added Downloadable Material: <b>puja rani</b>', '2025-03-08 22:54:17', 'downloadable_student.php'),
(33, 191, 'Add Annoucements', '2025-03-09 00:21:21', 'announcements_student.php'),
(34, 196, 'Add Annoucements', '2025-03-09 00:21:21', 'announcements_student.php'),
(35, 198, 'Add Annoucements', '2025-03-09 00:21:21', 'announcements_student.php'),
(36, 191, 'Add Assignment file name <b>kumari</b>', '2025-03-09 02:01:22', 'assignment_student.php'),
(37, 191, 'Add Assignment file name <b>lkml</b>', '2025-03-10 20:18:03', 'assignment_student.php'),
(38, 191, 'Add Assignment file name <b>bhnjmk</b>', '2025-03-10 20:20:46', 'assignment_student.php'),
(39, 191, 'Add Assignment file name <b>asdfghjkl</b>', '2025-03-10 20:32:32', 'assignment_student.php'),
(40, 196, 'Add Assignment file name <b>asdfghjkl</b>', '2025-03-10 20:32:32', 'assignment_student.php'),
(41, 198, 'Add Assignment file name <b>asdfghjkl</b>', '2025-03-10 20:32:32', 'assignment_student.php'),
(42, 191, 'New Practice Quiz Added', '2025-03-10 22:14:12', 'student_quiz_list.php'),
(43, 191, 'New Practice Quiz Added', '2025-03-18 23:46:19', 'student_quiz_list.php'),
(44, 191, 'New Practice Quiz Added', '2025-03-19 00:01:07', 'student_quiz_list.php'),
(45, 191, 'New Practice Quiz Added', '2025-03-19 00:24:13', 'student_quiz_list.php'),
(46, 191, 'New Practice Quiz Added', '2025-03-19 00:35:13', 'student_quiz_list.php'),
(47, 196, 'New Practice Quiz Added', '2025-03-19 00:35:13', 'student_quiz_list.php'),
(48, 199, 'Added Downloadable Material: <b>cast</b>', '2025-04-02 23:13:10', 'downloadable_student.php'),
(49, 200, 'Added Downloadable Material: <b>cast</b>', '2025-04-02 23:13:10', 'downloadable_student.php'),
(50, 201, 'Added Downloadable Material: <b>cast</b>', '2025-04-02 23:13:10', 'downloadable_student.php'),
(51, 199, 'Added Downloadable Material: <b>opkol;</b>', '2025-04-03 00:17:51', 'downloadable_student.php'),
(52, 199, 'Added Downloadable Material: <b>JITENDRA KUMAR SWAIN</b>', '2025-04-03 01:28:18', 'downloadable_student.php'),
(53, 200, 'Added Downloadable Material: <b>JITENDRA KUMAR SWAIN</b>', '2025-04-03 01:28:18', 'downloadable_student.php'),
(54, 201, 'Added Downloadable Material: <b>JITENDRA KUMAR SWAIN</b>', '2025-04-03 01:28:18', 'downloadable_student.php'),
(55, 199, 'Added Downloadable Material: <b>[]poiuyhgf</b>', '2025-04-03 01:32:53', 'downloadable_student.php'),
(56, 200, 'Added Downloadable Material: <b>[]poiuyhgf</b>', '2025-04-03 01:32:53', 'downloadable_student.php'),
(57, 201, 'Added Downloadable Material: <b>[]poiuyhgf</b>', '2025-04-03 01:32:53', 'downloadable_student.php'),
(58, 199, 'Add Annoucements', '2025-04-03 02:27:32', 'announcements_student.php'),
(59, 200, 'Add Annoucements', '2025-04-03 02:27:32', 'announcements_student.php'),
(60, 201, 'Add Annoucements', '2025-04-03 02:27:32', 'announcements_student.php'),
(61, 202, 'New Practice Quiz Added', '2025-04-11 16:04:59', 'student_quiz_list.php'),
(62, 203, 'New Practice Quiz Added', '2025-04-11 16:04:59', 'student_quiz_list.php'),
(63, 202, 'New Practice Quiz Added', '2025-04-11 16:16:19', 'student_quiz_list.php'),
(64, 202, 'New Practice Quiz Added', '2025-04-12 09:57:39', 'student_quiz_list.php'),
(65, 203, 'New Practice Quiz Added', '2025-04-12 09:57:39', 'student_quiz_list.php'),
(66, 202, 'New Practice Quiz Added', '2025-04-12 10:06:21', 'student_quiz_list.php'),
(67, 203, 'New Practice Quiz Added', '2025-04-12 10:06:21', 'student_quiz_list.php'),
(68, 202, 'New Practice Quiz Added', '2025-04-12 10:23:17', 'student_quiz_list.php'),
(69, 203, 'New Practice Quiz Added', '2025-04-12 10:23:17', 'student_quiz_list.php'),
(70, 202, 'New Practice Quiz Added', '2025-04-13 00:17:52', 'student_quiz_list.php'),
(71, 203, 'New Practice Quiz Added', '2025-04-13 00:17:52', 'student_quiz_list.php'),
(72, 204, 'New Practice Quiz Added', '2025-04-13 00:17:52', 'student_quiz_list.php'),
(73, 205, 'New Practice Quiz Added', '2025-04-13 00:17:52', 'student_quiz_list.php'),
(74, 202, 'New Practice Quiz Added', '2025-04-13 00:26:56', 'student_quiz_list.php'),
(75, 203, 'New Practice Quiz Added', '2025-04-13 00:26:56', 'student_quiz_list.php'),
(76, 204, 'New Practice Quiz Added', '2025-04-13 00:26:56', 'student_quiz_list.php'),
(77, 205, 'New Practice Quiz Added', '2025-04-13 00:26:56', 'student_quiz_list.php'),
(78, 202, 'New Practice Quiz Added', '2025-04-13 00:37:39', 'student_quiz_list.php'),
(79, 203, 'New Practice Quiz Added', '2025-04-13 00:37:39', 'student_quiz_list.php'),
(80, 204, 'New Practice Quiz Added', '2025-04-13 00:37:39', 'student_quiz_list.php'),
(81, 205, 'New Practice Quiz Added', '2025-04-13 00:37:39', 'student_quiz_list.php'),
(82, 202, 'New Practice Quiz Added', '2025-04-13 13:09:30', 'student_quiz_list.php'),
(83, 203, 'New Practice Quiz Added', '2025-04-13 13:09:30', 'student_quiz_list.php'),
(84, 204, 'New Practice Quiz Added', '2025-04-13 13:09:30', 'student_quiz_list.php'),
(85, 205, 'New Practice Quiz Added', '2025-04-13 13:09:30', 'student_quiz_list.php'),
(86, 202, 'New Practice Quiz Added', '2025-04-13 13:27:56', 'student_quiz_list.php'),
(87, 203, 'New Practice Quiz Added', '2025-04-13 13:27:56', 'student_quiz_list.php'),
(88, 204, 'New Practice Quiz Added', '2025-04-13 13:27:56', 'student_quiz_list.php'),
(89, 205, 'New Practice Quiz Added', '2025-04-13 13:27:56', 'student_quiz_list.php'),
(90, 202, 'New Practice Quiz Added', '2025-04-13 14:54:17', 'student_quiz_list.php'),
(91, 203, 'New Practice Quiz Added', '2025-04-13 14:54:17', 'student_quiz_list.php'),
(92, 204, 'New Practice Quiz Added', '2025-04-13 14:54:17', 'student_quiz_list.php'),
(93, 205, 'New Practice Quiz Added', '2025-04-13 14:54:17', 'student_quiz_list.php'),
(94, 202, 'Add Assignment file name <b>SAP resume</b>', '2025-04-15 20:55:03', 'assignment_student.php'),
(95, 203, 'Add Assignment file name <b>SAP resume</b>', '2025-04-15 20:55:03', 'assignment_student.php'),
(96, 204, 'Add Assignment file name <b>SAP resume</b>', '2025-04-15 20:55:03', 'assignment_student.php'),
(97, 205, 'Add Assignment file name <b>SAP resume</b>', '2025-04-15 20:55:03', 'assignment_student.php'),
(98, 202, 'Add Assignment file name <b>document</b>', '2025-04-18 11:47:22', 'assignment_student.php'),
(99, 203, 'Add Assignment file name <b>document</b>', '2025-04-18 11:47:22', 'assignment_student.php'),
(100, 204, 'Add Assignment file name <b>document</b>', '2025-04-18 11:47:23', 'assignment_student.php'),
(101, 205, 'Add Assignment file name <b>document</b>', '2025-04-18 11:47:23', 'assignment_student.php'),
(102, 202, 'Added Downloadable Material: <b>kumari</b>', '2025-04-18 20:03:38', 'downloadable_student.php'),
(103, 203, 'Added Downloadable Material: <b>kumari</b>', '2025-04-18 20:03:38', 'downloadable_student.php'),
(104, 204, 'Added Downloadable Material: <b>kumari</b>', '2025-04-18 20:03:38', 'downloadable_student.php'),
(105, 205, 'Added Downloadable Material: <b>kumari</b>', '2025-04-18 20:03:38', 'downloadable_student.php'),
(106, 202, 'Added Downloadable Material: <b>puja rani</b>', '2025-04-18 23:49:06', 'downloadable_student.php'),
(107, 202, 'Added Downloadable Material: <b>JITENDRA KUMAR SWAIN</b>', '2025-04-19 00:09:18', 'downloadable_student.php'),
(108, 202, 'Added Downloadable Material: <b>shyam</b>', '2025-04-19 00:43:34', 'downloadable_student.php'),
(109, 202, 'Added Downloadable Material: <b>llllll</b>', '2025-04-19 00:47:59', 'downloadable_student.php'),
(110, 203, 'Added Downloadable Material: <b>llllll</b>', '2025-04-19 00:47:59', 'downloadable_student.php'),
(111, 202, 'Added Downloadable Material: <b>hhhhhh</b>', '2025-04-19 00:48:52', 'downloadable_student.php'),
(112, 203, 'Added Downloadable Material: <b>hhhhhh</b>', '2025-04-19 00:48:52', 'downloadable_student.php'),
(113, 204, 'Added Downloadable Material: <b>hhhhhh</b>', '2025-04-19 00:48:52', 'downloadable_student.php'),
(114, 205, 'Added Downloadable Material: <b>hhhhhh</b>', '2025-04-19 00:48:52', 'downloadable_student.php'),
(115, 202, 'Added Downloadable Material: <b>qqqq</b>', '2025-04-19 00:49:25', 'downloadable_student.php'),
(116, 203, 'Added Downloadable Material: <b>qqqq</b>', '2025-04-19 00:49:25', 'downloadable_student.php'),
(117, 204, 'Added Downloadable Material: <b>qqqq</b>', '2025-04-19 00:49:25', 'downloadable_student.php'),
(118, 205, 'Added Downloadable Material: <b>qqqq</b>', '2025-04-19 00:49:25', 'downloadable_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(6, 241, 'yes', 25),
(7, 241, 'yes', 30),
(8, 241, 'yes', 29),
(9, 241, 'yes', 28),
(10, 241, 'yes', 27),
(11, 241, 'yes', 32),
(12, 241, 'yes', 31),
(13, 241, 'yes', 42),
(14, 241, 'yes', 39),
(15, 241, 'yes', 40),
(16, 241, 'yes', 38),
(17, 241, 'yes', 37),
(18, 241, 'yes', 36),
(19, 241, 'yes', 33),
(20, 241, 'yes', 34),
(21, 241, 'yes', 48),
(22, 241, 'yes', 50),
(23, 241, 'yes', 51),
(24, 241, 'yes', 51),
(25, 241, 'yes', 48),
(26, 241, 'yes', 50),
(27, 241, 'yes', 51),
(28, 241, 'yes', 48),
(29, 241, 'yes', 50),
(30, 241, 'yes', 52),
(31, 241, 'yes', 54),
(32, 241, 'yes', 51),
(33, 241, 'yes', 48),
(34, 241, 'yes', 50),
(35, 241, 'yes', 55),
(36, 241, 'yes', 57),
(37, 241, 'yes', 78),
(38, 241, 'yes', 79),
(39, 241, 'yes', 80),
(40, 241, 'yes', 74),
(41, 241, 'yes', 75),
(42, 241, 'yes', 76),
(43, 241, 'yes', 70),
(44, 241, 'yes', 71),
(45, 241, 'yes', 72),
(46, 241, 'yes', 68),
(47, 241, 'yes', 69),
(48, 241, 'yes', 66),
(49, 241, 'yes', 67),
(50, 241, 'yes', 64),
(51, 241, 'yes', 65),
(52, 241, 'yes', 63),
(53, 241, 'yes', 61),
(54, 241, 'yes', 62),
(55, 241, 'yes', 94),
(56, 241, 'yes', 95),
(57, 241, 'yes', 96),
(58, 241, 'yes', 97),
(59, 241, 'yes', 90),
(60, 241, 'yes', 91),
(61, 241, 'yes', 92),
(62, 241, 'yes', 93),
(63, 241, 'yes', 86),
(64, 241, 'yes', 87),
(65, 241, 'yes', 88),
(66, 241, 'yes', 89),
(67, 241, 'yes', 82),
(68, 241, 'yes', 83),
(69, 241, 'yes', 84),
(70, 241, 'yes', 85),
(71, 241, 'yes', 81),
(72, 241, 'yes', 77),
(73, 241, 'yes', 73);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(1, 12, 'yes', 14),
(2, 12, 'yes', 13),
(3, 12, 'yes', 12),
(4, 12, 'yes', 11),
(5, 12, 'yes', 10),
(6, 12, 'yes', 9),
(7, 12, 'yes', 8),
(8, 12, 'yes', 7);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(9, 'qwerfgb ', 'fgfbvds', '2025-03-10 21:56:10', 21),
(10, 'java', 'question', '2025-04-11 16:14:54', 21);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(100) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(39, 7, '<p>HTML full from?</p>\r\n', 1, 0, '2025-01-29 16:29:02', 'B'),
(40, 7, '<p>iuguigiuh</p>\r\n', 2, 0, '2025-01-29 16:29:34', 'True'),
(62, 9, 'name?', 1, 0, '2025-03-11 23:59:40', ''),
(63, 10, 'what is java?', 1, 0, '2025-04-11 16:15:45', 'A'),
(64, 10, 'why java use', 2, 0, '2025-04-13 14:51:53', 'True'),
(65, 10, 'java is a ...', 1, 0, '2025-04-13 14:53:48', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(8, '2025'),
(13, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `department_id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `department_id`, `username`, `password`, `location`, `status`) VALUES
(254, 'ram', 'biswal', 27, 11, '1234567', '', 'uploads/green_turtle_in_blue_sea_4k_hd_animals-3840x2160.jpg', 'Unregistered'),
(241, 'jitu', 'kumar', 26, 11, '123', '123', 'uploads/1069253.jpg', 'Registered'),
(247, '000', '000', 26, 11, '000', '000', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(248, '111', '111', 26, 11, '111', '111', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered'),
(256, 'jitendra', 'kumar', 31, 11, '1234', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `floc`, `assignment_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(2, 38, 'admin/uploads/6993_File_9621_File_sap_resume.doc', '2025-04-16 00:38:58', 'gtgfyguhijo', 'ijinkl', 241, ''),
(3, 42, 'admin/uploads/5706_File_Avinash Ohja (1).pdf', '2025-04-18 11:58:21', 'pol', 'pooui', 241, 'A'),
(4, 42, 'admin/uploads/1500_File_Avinash Ohja.pdf', '2025-04-18 13:11:41', 'desc', 'avinash', 241, 'B'),
(5, 42, 'admin/uploads/1271_File_Shyam Sundar.pdf', '2025-04-18 13:23:28', 'ghjopijh', 'shyam', 241, 'C'),
(6, 42, 'admin/uploads/9654_File_Shyam Sundar.pdf', '2025-04-18 15:06:41', 'ghj', 'hgjk', 241, 'O'),
(7, 42, 'admin/uploads/6650_File_Rohit Khandelwal.pdf', '2025-04-18 16:23:06', 'ertyui', 'rohit', 241, 'C'),
(8, 42, 'admin/uploads/3086_File_Integrated Business Processes(jitendra).pdf', '2025-04-18 16:25:04', 'ihyihyb', 'ibp', 241, 'A'),
(9, 42, 'admin/uploads/1852_File_CT20244491411_Application (3).pdf', '2025-04-18 16:52:31', 'demo', 'demo', 241, 'O');

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_backpack`
--

INSERT INTO `student_backpack` (`file_id`, `floc`, `fdatein`, `fdesc`, `student_id`, `fname`) VALUES
(18, 'uploads/5426_File_Income Certificate(2023).pdf', '2025-04-03 02:23:53', ';lkjbn', 241, '[]poiuyhgf'),
(19, 'uploads/5277_File_Shyam Sundar.pdf', '2025-04-18 20:59:22', 'uhnuh', 241, 'kumari');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `student_quiz_time`, `grade`) VALUES
(11, 23, 241, '748', '0 out of 1'),
(12, 24, 241, '748', '1 out of 1'),
(13, 25, 241, '748', '1 out of 1'),
(14, 24, 21, '57', ''),
(15, 26, 241, '748', ''),
(16, 30, 241, '748', '0 out of 1'),
(17, 28, 241, '748', '0 out of 1'),
(18, 31, 241, '748', '1 out of 1'),
(19, 33, 241, '748', '0 out of 1'),
(20, 35, 241, '748', '1 out of 1'),
(21, 29, 241, '748', '0 out of 1'),
(22, 32, 241, '748', '1 out of 1'),
(23, 34, 241, '748', '0 out of 1'),
(24, 36, 241, '748', '1 out of 1'),
(28, 45, 241, '748', '0 out of 1'),
(29, 42, 241, '748', ''),
(30, 46, 241, '748', '0 out of 1'),
(31, 39, 241, '748', '1 out of 1'),
(32, 43, 241, '748', '1 out of 1'),
(33, 47, 241, '748', ''),
(34, 40, 241, '3600', '0 out of 1'),
(35, 44, 241, '3600', '0 out of 1'),
(39, 49, 241, '600', '1 out of 1'),
(40, 50, 241, '60', ''),
(41, 54, 241, '60', '1 out of 1'),
(42, 55, 241, '120', ''),
(43, 51, 241, '300', ''),
(44, 56, 241, '3600', '0 out of 1'),
(45, 52, 241, '3600', '0 out of 1'),
(46, 48, 241, '300', ''),
(47, 57, 241, '3600', '3 out of 3'),
(48, 53, 241, '120', ''),
(49, 41, 241, '3600', '0 out of 1'),
(50, 37, 241, '3600', '0 out of 1'),
(51, 38, 241, '3600', '1 out of 1'),
(52, 58, 241, '3600', '2 out of 3'),
(53, 59, 241, '3600', '0 out of 3');

-- --------------------------------------------------------

--
-- Table structure for table `student_log`
--

CREATE TABLE `student_log` (
  `student_log_id` int(30) NOT NULL,
  `username` varchar(200) NOT NULL,
  `login_date` varchar(50) NOT NULL,
  `logout_date` varchar(50) NOT NULL,
  `student_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_log`
--

INSERT INTO `student_log` (`student_log_id`, `username`, `login_date`, `logout_date`, `student_id`) VALUES
(1, '123', '2025-02-14 20:00:06', '2025-05-03 10:47:40', 241),
(2, '123', '2025-02-14 20:01:19', '2025-05-03 10:47:40', 241),
(3, '123', '2025-02-14 20:08:26', '2025-05-03 10:47:40', 241),
(4, '123', '2025-02-14 20:10:15', '2025-05-03 10:47:40', 241),
(5, '123', '2025-02-14 20:12:14', '2025-05-03 10:47:40', 241),
(6, '123', '2025-02-14 20:16:34', '2025-05-03 10:47:40', 241),
(7, '123', '2025-02-16 14:07:59', '2025-05-03 10:47:40', 241),
(8, '123', '2025-02-16 15:16:32', '2025-05-03 10:47:40', 241),
(9, '123', '2025-02-16 23:35:03', '2025-05-03 10:47:40', 241),
(10, '123', '2025-02-16 23:51:48', '2025-05-03 10:47:40', 241),
(11, '123', '2025-02-17 00:02:15', '2025-05-03 10:47:40', 241),
(12, '123', '2025-02-20 20:35:52', '2025-05-03 10:47:40', 241),
(13, '123', '2025-02-28 16:28:01', '2025-05-03 10:47:40', 241),
(14, '123', '2025-02-28 16:40:38', '2025-05-03 10:47:40', 241),
(15, '123', '2025-03-02 13:42:55', '2025-05-03 10:47:40', 241),
(16, '1234', '2025-03-03 00:37:41', '', 245),
(17, '123', '2025-03-03 00:57:42', '2025-05-03 10:47:40', 241),
(18, '1234', '2025-03-03 12:53:16', '', 245),
(19, '123', '2025-03-03 15:15:07', '2025-05-03 10:47:40', 241),
(20, '123', '2025-03-03 15:32:05', '2025-05-03 10:47:40', 241),
(21, '123', '2025-03-03 15:36:19', '2025-05-03 10:47:40', 241),
(22, '123', '2025-03-04 00:10:34', '2025-05-03 10:47:40', 241),
(23, '123', '2025-03-04 00:12:58', '2025-05-03 10:47:40', 241),
(24, '123', '2025-03-04 00:14:53', '2025-05-03 10:47:40', 241),
(25, '123', '2025-03-04 00:15:28', '2025-05-03 10:47:40', 241),
(26, '123', '2025-03-04 00:15:45', '2025-05-03 10:47:40', 241),
(27, '123', '2025-03-04 15:36:44', '2025-05-03 10:47:40', 241),
(28, '123', '2025-03-04 15:59:22', '2025-05-03 10:47:40', 241),
(29, '123', '2025-03-04 15:59:48', '2025-05-03 10:47:40', 241),
(30, '123', '2025-03-04 15:59:54', '2025-05-03 10:47:40', 241),
(31, '123', '2025-03-04 16:00:05', '2025-05-03 10:47:40', 241),
(32, '123', '2025-03-05 11:05:01', '2025-05-03 10:47:40', 241),
(33, '123', '2025-03-05 11:06:39', '2025-05-03 10:47:40', 241),
(34, '123', '2025-03-05 12:50:07', '2025-05-03 10:47:40', 241),
(35, '123', '2025-03-05 23:12:26', '2025-05-03 10:47:40', 241),
(36, '123', '2025-03-05 23:33:05', '2025-05-03 10:47:40', 241),
(37, '123', '2025-03-05 23:41:46', '2025-05-03 10:47:40', 241),
(38, '123', '2025-03-08 20:31:58', '2025-05-03 10:47:40', 241),
(39, '123', '2025-03-08 21:45:28', '2025-05-03 10:47:40', 241),
(40, '123', '2025-03-08 21:51:44', '2025-05-03 10:47:40', 241),
(41, '123', '2025-03-08 21:57:21', '2025-05-03 10:47:40', 241),
(42, '123', '2025-03-08 22:55:07', '2025-05-03 10:47:40', 241),
(43, '123', '2025-03-18 23:24:18', '2025-05-03 10:47:40', 241),
(44, '123', '2025-03-18 23:46:42', '2025-05-03 10:47:40', 241),
(45, '123', '2025-03-19 00:01:34', '2025-05-03 10:47:40', 241),
(46, '123', '2025-03-19 00:17:37', '2025-05-03 10:47:40', 241),
(47, '123', '2025-03-19 00:24:29', '2025-05-03 10:47:40', 241),
(48, '123', '2025-03-19 00:35:38', '2025-05-03 10:47:40', 241),
(49, '123', '2025-03-23 00:09:58', '2025-05-03 10:47:40', 241),
(50, '123', '2025-03-28 00:49:03', '2025-05-03 10:47:40', 241),
(51, '123', '2025-03-28 13:20:07', '2025-05-03 10:47:40', 241),
(52, '123', '2025-03-29 00:24:33', '2025-05-03 10:47:40', 241),
(53, '123', '2025-03-29 00:27:35', '2025-05-03 10:47:40', 241),
(54, '123', '2025-03-30 23:35:01', '2025-05-03 10:47:40', 241),
(55, '000', '2025-03-31 01:41:30', '2025-03-31 01:44:52', 247),
(56, '111', '2025-03-31 01:58:22', '', 248),
(57, '111', '2025-03-31 02:00:17', '', 248),
(58, '123', '2025-04-01 00:45:56', '2025-05-03 10:47:40', 241),
(59, '123', '2025-04-02 22:46:33', '2025-05-03 10:47:40', 241),
(60, '123', '2025-04-02 23:13:32', '2025-05-03 10:47:40', 241),
(61, '123', '2025-04-03 00:12:42', '2025-05-03 10:47:40', 241),
(62, '123', '2025-04-03 00:13:45', '2025-05-03 10:47:40', 241),
(63, '123', '2025-04-03 00:15:33', '2025-05-03 10:47:40', 241),
(64, '123', '2025-04-03 00:29:04', '2025-05-03 10:47:40', 241),
(65, '123', '2025-04-03 01:28:46', '2025-05-03 10:47:40', 241),
(66, '123', '2025-04-03 01:33:12', '2025-05-03 10:47:40', 241),
(67, '123', '2025-04-03 01:38:37', '2025-05-03 10:47:40', 241),
(68, '123', '2025-04-03 02:28:02', '2025-05-03 10:47:40', 241),
(69, '123', '2025-04-07 11:49:43', '2025-05-03 10:47:40', 241),
(70, '123', '2025-04-07 11:50:13', '2025-05-03 10:47:40', 241),
(71, '123', '2025-04-07 12:22:23', '2025-05-03 10:47:40', 241),
(72, '123', '2025-04-07 16:12:35', '2025-05-03 10:47:40', 241),
(73, '123', '2025-04-09 14:23:38', '2025-05-03 10:47:40', 241),
(74, '123', '2025-04-09 14:25:33', '2025-05-03 10:47:40', 241),
(75, '123', '2025-04-10 10:44:02', '2025-05-03 10:47:40', 241),
(76, '123', '2025-04-10 10:44:20', '2025-05-03 10:47:40', 241),
(77, '123', '2025-04-10 11:12:08', '2025-05-03 10:47:40', 241),
(78, '123', '2025-04-10 11:14:54', '2025-05-03 10:47:40', 241),
(79, '123', '2025-04-10 11:45:36', '2025-05-03 10:47:40', 241),
(80, '123', '2025-04-10 11:47:01', '2025-05-03 10:47:40', 241),
(81, '123', '2025-04-10 14:24:49', '2025-05-03 10:47:40', 241),
(82, '123', '2025-04-10 14:26:52', '2025-05-03 10:47:40', 241),
(83, '123', '2025-04-10 14:27:23', '2025-05-03 10:47:40', 241),
(84, '123', '2025-04-10 14:28:32', '2025-05-03 10:47:40', 241),
(85, '123', '2025-04-10 14:30:16', '2025-05-03 10:47:40', 241),
(86, '123', '2025-04-10 14:38:58', '2025-05-03 10:47:40', 241),
(87, '123', '2025-04-10 22:22:41', '2025-05-03 10:47:40', 241),
(88, '123', '2025-04-10 22:32:55', '2025-05-03 10:47:40', 241),
(89, '123', '2025-04-10 22:34:03', '2025-05-03 10:47:40', 241),
(90, '123', '2025-04-10 22:35:16', '2025-05-03 10:47:40', 241),
(91, '123', '2025-04-10 22:36:42', '2025-05-03 10:47:40', 241),
(92, '123', '2025-04-10 22:41:48', '2025-05-03 10:47:40', 241),
(93, '123', '2025-04-10 22:42:30', '2025-05-03 10:47:40', 241),
(94, '123', '2025-04-10 22:46:01', '2025-05-03 10:47:40', 241),
(95, '123', '2025-04-10 22:47:02', '2025-05-03 10:47:40', 241),
(96, '123', '2025-04-10 22:51:21', '2025-05-03 10:47:40', 241),
(97, '123', '2025-04-10 22:54:55', '2025-05-03 10:47:40', 241),
(98, '123', '2025-04-10 23:38:09', '2025-05-03 10:47:40', 241),
(99, '123', '2025-04-10 23:52:29', '2025-05-03 10:47:40', 241),
(100, '123', '2025-04-10 23:53:08', '2025-05-03 10:47:40', 241),
(101, '123', '2025-04-11 01:42:22', '2025-05-03 10:47:40', 241),
(102, '123', '2025-04-11 01:43:29', '2025-05-03 10:47:40', 241),
(103, '123', '2025-04-11 15:12:31', '2025-05-03 10:47:40', 241),
(104, '123', '2025-04-11 15:13:01', '2025-05-03 10:47:40', 241),
(105, '123', '2025-04-11 16:07:28', '2025-05-03 10:47:40', 241),
(106, '123', '2025-04-11 16:16:39', '2025-05-03 10:47:40', 241),
(107, '123', '2025-04-11 20:33:38', '2025-05-03 10:47:40', 241),
(108, '123', '2025-04-12 09:55:01', '2025-05-03 10:47:40', 241),
(109, '123', '2025-04-12 09:58:01', '2025-05-03 10:47:40', 241),
(110, '123', '2025-04-12 10:06:38', '2025-05-03 10:47:40', 241),
(111, '123', '2025-04-12 10:23:40', '2025-05-03 10:47:40', 241),
(112, '123', '2025-04-12 23:28:56', '2025-05-03 10:47:40', 241),
(113, '123', '2025-04-13 00:18:11', '2025-05-03 10:47:40', 241),
(114, '123', '2025-04-13 00:25:27', '2025-05-03 10:47:40', 241),
(115, '123', '2025-04-13 00:27:36', '2025-05-03 10:47:40', 241),
(116, '123', '2025-04-13 00:37:53', '2025-05-03 10:47:40', 241),
(117, '123', '2025-04-13 10:00:40', '2025-05-03 10:47:40', 241),
(118, '123', '2025-04-13 10:01:40', '2025-05-03 10:47:40', 241),
(119, '123', '2025-04-13 10:03:19', '2025-05-03 10:47:40', 241),
(120, '123', '2025-04-13 13:10:22', '2025-05-03 10:47:40', 241),
(121, '123', '2025-04-13 13:28:16', '2025-05-03 10:47:40', 241),
(122, '123', '2025-04-13 14:54:29', '2025-05-03 10:47:40', 241),
(123, '123', '2025-04-13 15:02:14', '2025-05-03 10:47:40', 241),
(124, '123', '2025-04-15 20:29:49', '2025-05-03 10:47:40', 241),
(125, '123', '2025-04-15 20:55:23', '2025-05-03 10:47:40', 241),
(126, '123', '2025-04-16 00:33:25', '2025-05-03 10:47:40', 241),
(127, '123', '2025-04-16 22:37:43', '2025-05-03 10:47:40', 241),
(128, '123', '2025-04-16 22:50:57', '2025-05-03 10:47:40', 241),
(129, '123', '2025-04-16 22:51:36', '2025-05-03 10:47:40', 241),
(130, '123', '2025-04-16 22:54:18', '2025-05-03 10:47:40', 241),
(131, '123', '2025-04-18 11:39:26', '2025-05-03 10:47:40', 241),
(132, '123', '2025-04-18 11:47:42', '2025-05-03 10:47:40', 241),
(133, '123', '2025-04-18 17:17:32', '2025-05-03 10:47:40', 241),
(134, '123', '2025-04-18 19:31:40', '2025-05-03 10:47:40', 241),
(135, '123', '2025-04-18 20:00:48', '2025-05-03 10:47:40', 241),
(136, '123', '2025-04-18 20:03:59', '2025-05-03 10:47:40', 241),
(137, '123', '2025-04-18 20:17:51', '2025-05-03 10:47:40', 241),
(138, '123', '2025-04-18 22:59:11', '2025-05-03 10:47:40', 241),
(139, '123', '2025-04-18 23:17:36', '2025-05-03 10:47:40', 241),
(140, '123', '2025-04-19 00:04:26', '2025-05-03 10:47:40', 241),
(141, '123', '2025-04-19 00:39:54', '2025-05-03 10:47:40', 241),
(142, '123', '2025-04-19 00:42:08', '2025-05-03 10:47:40', 241),
(143, '123', '2025-04-19 00:44:44', '2025-05-03 10:47:40', 241),
(144, '123', '2025-04-19 00:50:46', '2025-05-03 10:47:40', 241),
(145, '123', '2025-04-19 00:59:38', '2025-05-03 10:47:40', 241),
(146, '123', '2025-05-03 10:36:39', '2025-05-03 10:47:40', 241);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(70, 'java001', 'java', '', 'java class\r\n', 4, '', ''),
(65, 'gbhjn', 'gbhjn', '', 'tgyuhi', 7, '', ''),
(66, 'jhn', 'bhjk', '', 'ghjk', 5, '', ''),
(67, 'ghbjn', '  bjn', '', 'guhij', 4, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(24, '', '', 'jhon', 'deo', 14, 'uploads/j.jpg', '', '', ''),
(21, '12345', '123', 'sankar', 'swain', 11, 'uploads/J.jpg', '', 'Registered', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(191, 21, 26, 62, 'uploads/thumbnails.jpg', '2027'),
(196, 21, 26, 67, 'uploads/thumbnails.jpg', '2027'),
(198, 21, 27, 62, 'uploads/thumbnails.jpg', '2027'),
(202, 21, 26, 66, 'uploads/thumbnails.jpg', '2025'),
(203, 21, 26, 65, 'uploads/thumbnails.jpg', '2025'),
(204, 21, 30, 70, 'uploads/thumbnails.jpg', '2025'),
(205, 21, 31, 70, 'uploads/thumbnails.jpg', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class_announcements`
--

INSERT INTO `teacher_class_announcements` (`teacher_class_announcements_id`, `content`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(40, '<p>goodjob</p>\r\n', '21', 189, '2025-02-02 18:26:26'),
(41, 'yvgubhinjokm', '21', 191, '2025-03-09 00:21:21'),
(42, 'yvgubhinjokm', '21', 196, '2025-03-09 00:21:21'),
(43, 'yvgubhinjokm', '21', 198, '2025-03-09 00:21:21'),
(44, 'anything that to be added', '21', 199, '2025-04-03 02:27:32'),
(45, 'anything that to be added', '21', 200, '2025-04-03 02:27:32'),
(46, 'anything that to be added', '21', 201, '2025-04-03 02:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(384, 189, 241, 21),
(385, 191, 241, 21),
(386, 193, 241, 21),
(387, 191, 245, 21),
(388, 194, 245, 21),
(389, 194, 241, 21),
(390, 195, 246, 21),
(391, 196, 245, 21),
(392, 196, 241, 21),
(393, 197, 245, 21),
(394, 197, 241, 21),
(395, 198, 246, 21),
(396, 199, 245, 21),
(397, 199, 241, 21),
(398, 200, 246, 21),
(399, 201, 245, 21),
(400, 201, 241, 21),
(401, 201, 247, 21),
(402, 199, 247, 21),
(406, 201, 248, 21),
(409, 200, 248, 21),
(411, 200, 247, 21),
(412, 199, 248, 21),
(413, 200, 241, 21),
(414, 202, 241, 21),
(415, 202, 247, 21),
(416, 202, 248, 21),
(417, 203, 241, 21),
(418, 203, 247, 21),
(419, 203, 248, 21),
(420, 204, 247, 21),
(421, 204, 241, 21),
(422, 205, 241, 21);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `assignment_id`) VALUES
(15, 160, 'Submit Assignment file name <b>my_assginment</b>', '2013-11-25 10:39:52', 'view_submit_assignment.php', 93, 16),
(17, 161, 'Submit Assignment file name <b>q</b>', '2013-11-25 15:54:19', 'view_submit_assignment.php', 71, 17),
(18, 186, 'Submit Assignment file name <b>asdasd</b>', '2020-12-21 10:12:04', 'view_submit_assignment.php', 219, 31),
(19, 191, 'Add Downloadable Materials file name <b class=\"text-primary\">uiuguy</b>', '2025-03-02 13:47:15', 'downloadable.php', 241, 0),
(20, 202, 'Submit Assignment file name <b>ijinkl</b>', '2025-04-16 00:38:58', 'view_submit_assignment.php', 241, 38),
(21, 202, 'Submit Assignment file name <b>pooui</b>', '2025-04-18 11:58:21', 'view_submit_assignment.php', 241, 42),
(22, 202, 'Submit Assignment file name <b>avinash</b>', '2025-04-18 13:11:41', 'view_submit_assignment.php', 241, 42),
(23, 202, 'Submit Assignment file name <b>shyam</b>', '2025-04-18 13:23:28', 'view_submit_assignment.php', 241, 42),
(24, 202, 'Submit Assignment file name <b>hgjk</b>', '2025-04-18 15:06:41', 'view_submit_assignment.php', 241, 42),
(25, 202, 'Submit Assignment file name <b>rohit</b>', '2025-04-18 16:23:06', 'view_submit_assignment.php', 241, 42),
(26, 202, 'Submit Assignment file name <b>ibp</b>', '2025-04-18 16:25:04', 'view_submit_assignment.php', 241, 42),
(27, 202, 'Submit Assignment file name <b>demo</b>', '2025-04-18 16:52:31', 'view_submit_assignment.php', 241, 42),
(28, 202, 'Add Downloadable Materials file name <b>rfgthyjkl</b>', '2025-04-18 21:13:26', 'downloadable.php', 241, 0),
(29, 202, 'Add Downloadable Materials file name <b>tyuiop</b>', '2025-04-18 21:18:42', 'downloadable.php', 241, 0),
(30, 202, 'Add Downloadable Materials file name <b> bbbh</b>', '2025-04-19 00:42:40', 'downloadable.php', 241, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teacher_shared`
--

INSERT INTO `teacher_shared` (`teacher_shared_id`, `teacher_id`, `shared_teacher_id`, `floc`, `fdatein`, `fdesc`, `fname`) VALUES
(1, 12, 14, 'admin/uploads/7939_File_449E26DB.jpg', '2014-02-20 09:55:32', 'sas', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `date`) VALUES
(17, 'jitu', '$2y$10$rZRSO3TPnGVuY18z0j6ti.H2oNR/wnngXW20592tRcjFRqzETUbRy', 'jhi', 'iuiu', '2025-02-15 16:06:38'),
(19, 'admin', 'admin', 'jitendra kumar', 'swain', '2025-02-15'),
(20, 'sankar', '$2y$10$XBnhb/yGO4KbkfvmaISyGu6oBxIek20K3KSX1sS2hMeiwnv5zW5ge', 'sankar', 'swain', '2025-02-15 16:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(88, 'admin', '2025-01-26 16:04:51', '2025-02-03 17:16:40', 15),
(89, 'jkev', '2025-01-28 12:46:24', '2025-01-28 12:46:44', 14),
(90, 'admin', '2025-01-28 17:40:32', '2025-02-03 17:16:40', 15),
(91, 'jkev', '2025-01-28 17:41:13', '', 14),
(92, 'admin', '2025-01-29 12:06:43', '2025-02-03 17:16:40', 15),
(93, 'admin', '2025-01-29 13:38:21', '2025-02-03 17:16:40', 15),
(94, 'admin', '2025-01-29 15:19:16', '2025-02-03 17:16:40', 15),
(95, 'jkev', '2025-01-29 18:07:25', '', 14),
(96, 'admin', '2025-01-31 01:31:23', '2025-02-03 17:16:40', 15),
(97, 'admin', '2025-01-31 01:32:25', '2025-02-03 17:16:40', 15),
(98, 'admin', '2025-02-02 18:20:10', '2025-02-03 17:16:40', 15),
(99, 'admin', '2025-02-03 12:31:40', '2025-02-03 17:16:40', 15),
(100, 'admin', '2025-02-03 12:33:52', '2025-02-03 17:16:40', 15),
(101, 'admin', '2025-02-03 13:04:42', '2025-02-03 17:16:40', 15),
(102, 'admin', '2025-02-03 16:21:49', '2025-02-03 17:16:40', 15),
(103, 'admin', '2025-02-03 16:28:55', '2025-02-03 17:16:40', 15),
(104, 'admin', '2025-02-03 16:29:00', '2025-02-03 17:16:40', 15),
(105, 'admin', '2025-02-03 16:29:02', '2025-02-03 17:16:40', 15),
(106, 'admin', '2025-02-03 16:29:02', '2025-02-03 17:16:40', 15),
(107, 'admin', '2025-02-03 16:29:03', '2025-02-03 17:16:40', 15),
(108, 'admin', '2025-02-03 16:29:03', '2025-02-03 17:16:40', 15),
(109, 'admin', '2025-02-03 16:29:03', '2025-02-03 17:16:40', 15),
(110, 'admin', '2025-02-03 16:29:03', '2025-02-03 17:16:40', 15),
(111, 'admin', '2025-02-03 16:29:03', '2025-02-03 17:16:40', 15),
(112, 'admin', '2025-02-03 16:29:04', '2025-02-03 17:16:40', 15),
(113, 'admin', '2025-02-03 16:29:04', '2025-02-03 17:16:40', 15),
(114, 'admin', '2025-02-03 16:29:04', '2025-02-03 17:16:40', 15),
(115, 'admin', '2025-02-03 16:29:04', '2025-02-03 17:16:40', 15),
(116, 'admin', '2025-02-03 16:29:04', '2025-02-03 17:16:40', 15),
(117, 'admin', '2025-02-03 16:29:05', '2025-02-03 17:16:40', 15),
(118, 'admin', '2025-02-03 16:29:05', '2025-02-03 17:16:40', 15),
(119, 'admin', '2025-02-03 16:29:05', '2025-02-03 17:16:40', 15),
(120, 'admin', '2025-02-03 16:29:05', '2025-02-03 17:16:40', 15),
(121, 'admin', '2025-02-03 16:29:05', '2025-02-03 17:16:40', 15),
(122, 'admin', '2025-02-03 16:29:06', '2025-02-03 17:16:40', 15),
(123, 'admin', '2025-02-03 16:29:06', '2025-02-03 17:16:40', 15),
(124, 'admin', '2025-02-03 16:29:06', '2025-02-03 17:16:40', 15),
(125, 'admin', '2025-02-03 16:29:06', '2025-02-03 17:16:40', 15),
(126, 'admin', '2025-02-03 16:29:06', '2025-02-03 17:16:40', 15),
(127, 'admin', '2025-02-03 16:29:06', '2025-02-03 17:16:40', 15),
(128, 'admin', '2025-02-03 16:29:07', '2025-02-03 17:16:40', 15),
(129, 'admin', '2025-02-03 16:29:07', '2025-02-03 17:16:40', 15),
(130, 'admin', '2025-02-03 16:29:07', '2025-02-03 17:16:40', 15),
(131, 'admin', '2025-02-03 16:29:07', '2025-02-03 17:16:40', 15),
(132, 'admin', '2025-02-03 16:29:07', '2025-02-03 17:16:40', 15),
(133, 'admin', '2025-02-03 16:29:08', '2025-02-03 17:16:40', 15),
(134, 'admin', '2025-02-03 16:29:08', '2025-02-03 17:16:40', 15),
(135, 'admin', '2025-02-03 16:29:08', '2025-02-03 17:16:40', 15),
(136, 'admin', '2025-02-03 16:29:24', '2025-02-03 17:16:40', 15),
(137, 'admin', '2025-02-03 16:29:26', '2025-02-03 17:16:40', 15),
(138, 'admin', '2025-02-03 16:29:27', '2025-02-03 17:16:40', 15),
(139, 'admin', '2025-02-03 16:29:28', '2025-02-03 17:16:40', 15),
(140, 'admin', '2025-02-03 16:29:28', '2025-02-03 17:16:40', 15),
(141, 'admin', '2025-02-03 16:29:29', '2025-02-03 17:16:40', 15),
(142, 'admin', '2025-02-03 16:29:30', '2025-02-03 17:16:40', 15),
(143, 'admin', '2025-02-03 16:36:30', '2025-02-03 17:16:40', 15),
(144, 'admin', '2025-02-03 16:55:47', '2025-02-03 17:16:40', 15),
(145, 'admin', '2025-02-03 17:17:18', '', 15),
(146, 'admin', '2025-02-03 17:17:33', '', 15),
(147, 'admin', '2025-02-03 17:42:36', '', 15),
(148, 'admin', '2025-02-03 18:04:01', '', 15),
(149, 'admin', '2025-02-03 18:07:45', '', 15),
(150, 'admin', '2025-02-03 18:12:23', '', 15),
(151, 'admin', '2025-02-03 18:12:56', '', 15),
(152, 'admin', '2025-02-04 01:19:23', '', 15),
(153, 'admin', '2025-02-04 11:09:13', '', 15),
(154, 'admin', '2025-02-04 12:27:30', '', 15),
(155, 'admin', '2025-02-04 14:17:55', '', 15),
(156, 'admin', '2025-02-05 01:28:24', '', 15),
(157, 'admin', '2025-02-05 11:02:24', '', 15),
(158, 'admin', '2025-02-05 15:59:29', '', 15),
(159, 'admin', '2025-02-05 16:41:39', '', 15),
(160, 'admin', '2025-02-05 16:41:55', '', 15),
(161, 'admin', '2025-02-05 16:42:47', '', 15),
(162, 'admin', '2025-02-05 18:07:58', '', 15),
(163, 'admin', '2025-02-05 18:08:19', '', 15),
(164, 'admin', '2025-02-05 18:11:23', '', 15),
(165, 'admin', '2025-02-06 14:46:31', '', 15),
(166, 'admin', '2025-02-07 12:13:40', '', 15),
(167, 'admin', '2025-02-07 12:50:44', '', 15),
(168, 'admin', '2025-02-07 12:51:15', '', 15),
(169, 'admin', '2025-02-12 21:32:13', '', 15),
(170, 'admin', '2025-02-13 01:04:28', '', 15),
(171, 'admin', '2025-02-13 10:04:23', '', 15),
(172, 'admin', '2025-02-13 10:08:09', '', 15),
(173, 'admin', '2025-02-13 10:43:13', '', 15),
(174, 'admin', '2025-02-14 00:35:09', '', 15),
(175, 'admin', '2025-02-14 19:01:04', '', 15),
(176, 'admin', '2025-02-14 20:22:01', '', 15),
(177, 'admin', '2025-02-14 23:12:19', '', 15),
(178, 'admin', '2025-02-15 15:52:10', '', 15),
(179, 'admin', '2025-02-15 16:11:44', '', 15),
(180, 'admin', '2025-02-15 16:12:50', '2025-05-03 11:17:27', 19),
(181, 'admin', '2025-02-15 23:26:03', '2025-05-03 11:17:27', 19),
(182, 'admin', '2025-02-16 14:06:13', '2025-05-03 11:17:27', 19),
(183, 'admin', '2025-02-16 14:06:17', '2025-05-03 11:17:27', 19),
(184, 'admin', '2025-02-16 14:06:18', '2025-05-03 11:17:27', 19),
(185, 'admin', '2025-02-16 14:06:18', '2025-05-03 11:17:27', 19),
(186, 'admin', '2025-02-16 14:06:18', '2025-05-03 11:17:27', 19),
(187, 'admin', '2025-02-16 14:06:18', '2025-05-03 11:17:27', 19),
(188, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(189, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(190, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(191, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(192, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(193, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(194, 'admin', '2025-02-16 14:06:19', '2025-05-03 11:17:27', 19),
(195, 'admin', '2025-02-16 14:06:20', '2025-05-03 11:17:27', 19),
(196, 'admin', '2025-02-16 14:06:20', '2025-05-03 11:17:27', 19),
(197, 'admin', '2025-02-16 14:06:20', '2025-05-03 11:17:27', 19),
(198, 'admin', '2025-02-16 14:06:20', '2025-05-03 11:17:27', 19),
(199, 'admin', '2025-02-16 14:06:20', '2025-05-03 11:17:27', 19),
(200, 'admin', '2025-02-16 14:06:24', '2025-05-03 11:17:27', 19),
(201, 'admin', '2025-02-16 14:06:26', '2025-05-03 11:17:27', 19),
(202, 'admin', '2025-02-16 14:06:26', '2025-05-03 11:17:27', 19),
(203, 'admin', '2025-02-16 14:06:27', '2025-05-03 11:17:27', 19),
(204, 'admin', '2025-02-16 14:06:27', '2025-05-03 11:17:27', 19),
(205, 'admin', '2025-02-16 14:06:27', '2025-05-03 11:17:27', 19),
(206, 'admin', '2025-02-16 14:06:27', '2025-05-03 11:17:27', 19),
(207, 'admin', '2025-02-16 14:06:27', '2025-05-03 11:17:27', 19),
(208, 'admin', '2025-02-16 14:06:27', '2025-05-03 11:17:27', 19),
(209, 'admin', '2025-02-16 14:06:28', '2025-05-03 11:17:27', 19),
(210, 'admin', '2025-02-16 14:06:28', '2025-05-03 11:17:27', 19),
(211, 'admin', '2025-02-16 14:06:28', '2025-05-03 11:17:27', 19),
(212, 'admin', '2025-02-16 14:06:28', '2025-05-03 11:17:27', 19),
(213, 'admin', '2025-02-16 14:06:28', '2025-05-03 11:17:27', 19),
(214, 'admin', '2025-02-16 14:07:02', '2025-05-03 11:17:27', 19),
(215, 'admin', '2025-02-16 14:07:03', '2025-05-03 11:17:27', 19),
(216, 'admin', '2025-02-16 14:07:03', '2025-05-03 11:17:27', 19),
(217, 'admin', '2025-02-16 14:07:04', '2025-05-03 11:17:27', 19),
(218, 'admin', '2025-02-16 14:07:05', '2025-05-03 11:17:27', 19),
(219, 'admin', '2025-02-16 14:09:28', '2025-05-03 11:17:27', 19),
(220, 'admin', '2025-02-16 14:09:34', '2025-05-03 11:17:27', 19),
(221, 'admin', '2025-02-16 14:09:35', '2025-05-03 11:17:27', 19),
(222, 'admin', '2025-02-16 14:13:54', '2025-05-03 11:17:27', 19),
(223, 'admin', '2025-02-16 14:15:07', '2025-05-03 11:17:27', 19),
(224, 'admin', '2025-02-16 14:15:09', '2025-05-03 11:17:27', 19),
(225, 'admin', '2025-02-16 14:15:10', '2025-05-03 11:17:27', 19),
(226, 'admin', '2025-02-16 14:15:10', '2025-05-03 11:17:27', 19),
(227, 'admin', '2025-02-16 14:15:10', '2025-05-03 11:17:27', 19),
(228, 'admin', '2025-02-16 14:15:10', '2025-05-03 11:17:27', 19),
(229, 'admin', '2025-02-16 14:15:11', '2025-05-03 11:17:27', 19),
(230, 'admin', '2025-02-16 15:04:58', '2025-05-03 11:17:27', 19),
(231, 'admin', '2025-02-16 15:05:02', '2025-05-03 11:17:27', 19),
(232, 'admin', '2025-02-16 15:05:03', '2025-05-03 11:17:27', 19),
(233, 'admin', '2025-02-16 15:05:20', '2025-05-03 11:17:27', 19),
(234, 'admin', '2025-02-16 15:24:50', '2025-05-03 11:17:27', 19),
(235, 'admin', '2025-02-16 15:24:54', '2025-05-03 11:17:27', 19),
(236, 'admin', '2025-02-16 15:24:55', '2025-05-03 11:17:27', 19),
(237, 'admin', '2025-02-16 15:24:55', '2025-05-03 11:17:27', 19),
(238, 'admin', '2025-02-16 15:24:56', '2025-05-03 11:17:27', 19),
(239, 'admin', '2025-02-16 15:24:56', '2025-05-03 11:17:27', 19),
(240, 'admin', '2025-02-16 15:24:56', '2025-05-03 11:17:27', 19),
(241, 'admin', '2025-02-16 15:24:56', '2025-05-03 11:17:27', 19),
(242, 'admin', '2025-02-16 15:24:56', '2025-05-03 11:17:27', 19),
(243, 'admin', '2025-02-16 15:24:57', '2025-05-03 11:17:27', 19),
(244, 'admin', '2025-02-16 15:24:57', '2025-05-03 11:17:27', 19),
(245, 'admin', '2025-02-16 15:24:57', '2025-05-03 11:17:27', 19),
(246, 'admin', '2025-02-16 15:24:57', '2025-05-03 11:17:27', 19),
(247, 'admin', '2025-02-16 15:24:57', '2025-05-03 11:17:27', 19),
(248, 'admin', '2025-02-16 15:24:57', '2025-05-03 11:17:27', 19),
(249, 'admin', '2025-02-16 15:24:58', '2025-05-03 11:17:27', 19),
(250, 'admin', '2025-02-16 15:24:58', '2025-05-03 11:17:27', 19),
(251, 'admin', '2025-02-16 15:24:58', '2025-05-03 11:17:27', 19),
(252, 'admin', '2025-02-16 15:24:58', '2025-05-03 11:17:27', 19),
(253, 'admin', '2025-02-16 15:24:58', '2025-05-03 11:17:27', 19),
(254, 'admin', '2025-02-16 15:31:45', '2025-05-03 11:17:27', 19),
(255, 'admin', '2025-02-16 15:31:48', '2025-05-03 11:17:27', 19),
(256, 'admin', '2025-02-16 15:31:48', '2025-05-03 11:17:27', 19),
(257, 'admin', '2025-02-16 15:31:48', '2025-05-03 11:17:27', 19),
(258, 'admin', '2025-02-16 15:31:49', '2025-05-03 11:17:27', 19),
(259, 'admin', '2025-02-16 15:31:49', '2025-05-03 11:17:27', 19),
(260, 'admin', '2025-02-16 15:31:49', '2025-05-03 11:17:27', 19),
(261, 'admin', '2025-02-16 15:31:49', '2025-05-03 11:17:27', 19),
(262, 'admin', '2025-02-16 15:31:49', '2025-05-03 11:17:27', 19),
(263, 'admin', '2025-02-16 15:31:50', '2025-05-03 11:17:27', 19),
(264, 'admin', '2025-02-16 15:31:50', '2025-05-03 11:17:27', 19),
(265, 'admin', '2025-02-16 15:31:50', '2025-05-03 11:17:27', 19),
(266, 'admin', '2025-02-16 15:31:50', '2025-05-03 11:17:27', 19),
(267, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(268, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(269, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(270, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(271, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(272, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(273, 'admin', '2025-02-16 15:31:51', '2025-05-03 11:17:27', 19),
(274, 'admin', '2025-02-16 15:31:52', '2025-05-03 11:17:27', 19),
(275, 'admin', '2025-02-16 15:31:52', '2025-05-03 11:17:27', 19),
(276, 'admin', '2025-02-16 15:31:52', '2025-05-03 11:17:27', 19),
(277, 'admin', '2025-02-16 15:31:53', '2025-05-03 11:17:27', 19),
(278, 'admin', '2025-02-16 15:34:24', '2025-05-03 11:17:27', 19),
(279, 'admin', '2025-02-16 15:34:27', '2025-05-03 11:17:27', 19),
(280, 'admin', '2025-02-16 15:34:32', '2025-05-03 11:17:27', 19),
(281, 'admin', '2025-02-16 15:34:32', '2025-05-03 11:17:27', 19),
(282, 'admin', '2025-02-16 15:34:32', '2025-05-03 11:17:27', 19),
(283, 'admin', '2025-02-16 15:34:33', '2025-05-03 11:17:27', 19),
(284, 'admin', '2025-02-16 15:34:33', '2025-05-03 11:17:27', 19),
(285, 'admin', '2025-02-16 15:34:33', '2025-05-03 11:17:27', 19),
(286, 'admin', '2025-02-16 15:34:34', '2025-05-03 11:17:27', 19),
(287, 'admin', '2025-02-16 15:34:34', '2025-05-03 11:17:27', 19),
(288, 'admin', '2025-02-16 15:34:34', '2025-05-03 11:17:27', 19),
(289, 'admin', '2025-02-16 15:34:35', '2025-05-03 11:17:27', 19),
(290, 'admin', '2025-02-16 15:34:35', '2025-05-03 11:17:27', 19),
(291, 'admin', '2025-02-16 15:34:35', '2025-05-03 11:17:27', 19),
(292, 'admin', '2025-02-16 15:34:35', '2025-05-03 11:17:27', 19),
(293, 'admin', '2025-02-16 15:34:35', '2025-05-03 11:17:27', 19),
(294, 'admin', '2025-02-16 15:34:36', '2025-05-03 11:17:27', 19),
(295, 'admin', '2025-02-16 15:34:36', '2025-05-03 11:17:27', 19),
(296, 'admin', '2025-02-16 15:34:36', '2025-05-03 11:17:27', 19),
(297, 'admin', '2025-02-16 15:34:36', '2025-05-03 11:17:27', 19),
(298, 'admin', '2025-02-16 15:34:37', '2025-05-03 11:17:27', 19),
(299, 'admin', '2025-02-16 15:34:37', '2025-05-03 11:17:27', 19),
(300, 'admin', '2025-02-16 15:34:37', '2025-05-03 11:17:27', 19),
(301, 'admin', '2025-02-16 15:34:37', '2025-05-03 11:17:27', 19),
(302, 'admin', '2025-02-16 15:34:37', '2025-05-03 11:17:27', 19),
(303, 'admin', '2025-02-16 15:34:38', '2025-05-03 11:17:27', 19),
(304, 'admin', '2025-02-16 15:34:38', '2025-05-03 11:17:27', 19),
(305, 'admin', '2025-02-16 15:34:38', '2025-05-03 11:17:27', 19),
(306, 'admin', '2025-02-16 15:34:38', '2025-05-03 11:17:27', 19),
(307, 'admin', '2025-02-16 15:34:39', '2025-05-03 11:17:27', 19),
(308, 'admin', '2025-02-16 15:34:39', '2025-05-03 11:17:27', 19),
(309, 'admin', '2025-02-16 15:34:39', '2025-05-03 11:17:27', 19),
(310, 'admin', '2025-02-16 15:34:40', '2025-05-03 11:17:27', 19),
(311, 'admin', '2025-02-16 15:34:40', '2025-05-03 11:17:27', 19),
(312, 'admin', '2025-02-16 17:25:48', '2025-05-03 11:17:27', 19),
(313, 'admin', '2025-02-16 17:25:49', '2025-05-03 11:17:27', 19),
(314, 'admin', '2025-02-16 17:25:50', '2025-05-03 11:17:27', 19),
(315, 'admin', '2025-02-16 17:25:51', '2025-05-03 11:17:27', 19),
(316, 'admin', '2025-02-16 17:25:52', '2025-05-03 11:17:27', 19),
(317, 'admin', '2025-02-16 17:25:52', '2025-05-03 11:17:27', 19),
(318, 'admin', '2025-02-16 17:26:03', '2025-05-03 11:17:27', 19),
(319, 'admin', '2025-02-16 17:26:04', '2025-05-03 11:17:27', 19),
(320, 'admin', '2025-02-16 17:26:05', '2025-05-03 11:17:27', 19),
(321, 'admin', '2025-02-16 17:27:36', '2025-05-03 11:17:27', 19),
(322, 'admin', '2025-02-16 17:27:37', '2025-05-03 11:17:27', 19),
(323, 'admin', '2025-02-16 17:27:38', '2025-05-03 11:17:27', 19),
(324, 'admin', '2025-02-16 17:27:38', '2025-05-03 11:17:27', 19),
(325, 'admin', '2025-02-16 17:27:39', '2025-05-03 11:17:27', 19),
(326, 'admin', '2025-02-16 17:27:40', '2025-05-03 11:17:27', 19),
(327, 'admin', '2025-02-16 17:27:41', '2025-05-03 11:17:27', 19),
(328, 'admin', '2025-02-16 17:27:41', '2025-05-03 11:17:27', 19),
(329, 'admin', '2025-02-16 17:27:42', '2025-05-03 11:17:27', 19),
(330, 'admin', '2025-02-16 17:27:43', '2025-05-03 11:17:27', 19),
(331, 'admin', '2025-02-16 17:27:43', '2025-05-03 11:17:27', 19),
(332, 'admin', '2025-02-16 17:27:44', '2025-05-03 11:17:27', 19),
(333, 'admin', '2025-02-16 17:27:45', '2025-05-03 11:17:27', 19),
(334, 'admin', '2025-02-16 17:27:45', '2025-05-03 11:17:27', 19),
(335, 'admin', '2025-02-16 17:27:46', '2025-05-03 11:17:27', 19),
(336, 'admin', '2025-02-16 17:27:47', '2025-05-03 11:17:27', 19),
(337, 'admin', '2025-02-16 17:27:47', '2025-05-03 11:17:27', 19),
(338, 'admin', '2025-02-16 17:27:48', '2025-05-03 11:17:27', 19),
(339, 'admin', '2025-02-16 17:44:39', '2025-05-03 11:17:27', 19),
(340, 'admin', '2025-02-16 17:45:15', '2025-05-03 11:17:27', 19),
(341, 'admin', '2025-02-16 17:45:16', '2025-05-03 11:17:27', 19),
(342, 'admin', '2025-02-16 17:45:17', '2025-05-03 11:17:27', 19),
(343, 'admin', '2025-02-16 17:45:17', '2025-05-03 11:17:27', 19),
(344, 'admin', '2025-02-16 17:45:17', '2025-05-03 11:17:27', 19),
(345, 'admin', '2025-02-16 17:45:17', '2025-05-03 11:17:27', 19),
(346, 'admin', '2025-02-16 17:45:17', '2025-05-03 11:17:27', 19),
(347, 'admin', '2025-02-16 17:45:17', '2025-05-03 11:17:27', 19),
(348, 'admin', '2025-02-16 17:45:18', '2025-05-03 11:17:27', 19),
(349, 'admin', '2025-02-16 17:45:18', '2025-05-03 11:17:27', 19),
(350, 'admin', '2025-02-16 17:45:18', '2025-05-03 11:17:27', 19),
(351, 'admin', '2025-02-16 17:45:18', '2025-05-03 11:17:27', 19),
(352, 'admin', '2025-02-16 17:45:18', '2025-05-03 11:17:27', 19),
(353, 'admin', '2025-02-16 17:45:21', '2025-05-03 11:17:27', 19),
(354, 'admin', '2025-02-16 17:45:22', '2025-05-03 11:17:27', 19),
(355, 'admin', '2025-02-16 17:45:22', '2025-05-03 11:17:27', 19),
(356, 'admin', '2025-02-16 17:45:23', '2025-05-03 11:17:27', 19),
(357, 'admin', '2025-02-16 17:47:07', '2025-05-03 11:17:27', 19),
(358, 'admin', '2025-02-16 18:21:01', '2025-05-03 11:17:27', 19),
(359, 'admin', '2025-02-16 18:33:42', '2025-05-03 11:17:27', 19),
(360, 'admin', '2025-02-16 18:37:30', '2025-05-03 11:17:27', 19),
(361, 'admin', '2025-02-16 22:33:17', '2025-05-03 11:17:27', 19),
(362, 'admin', '2025-02-16 22:36:46', '2025-05-03 11:17:27', 19),
(363, 'admin', '2025-02-16 22:43:03', '2025-05-03 11:17:27', 19),
(364, 'admin', '2025-02-16 22:43:07', '2025-05-03 11:17:27', 19),
(365, 'admin', '2025-02-16 22:43:08', '2025-05-03 11:17:27', 19),
(366, 'admin', '2025-02-16 22:43:08', '2025-05-03 11:17:27', 19),
(367, 'admin', '2025-02-16 22:43:08', '2025-05-03 11:17:27', 19),
(368, 'admin', '2025-02-16 22:43:08', '2025-05-03 11:17:27', 19),
(369, 'admin', '2025-02-16 22:43:17', '2025-05-03 11:17:27', 19),
(370, 'admin', '2025-02-20 14:29:40', '2025-05-03 11:17:27', 19),
(371, 'admin', '2025-02-20 14:29:42', '2025-05-03 11:17:27', 19),
(372, 'admin', '2025-02-20 14:29:42', '2025-05-03 11:17:27', 19),
(373, 'admin', '2025-02-20 14:29:42', '2025-05-03 11:17:27', 19),
(374, 'admin', '2025-02-20 14:29:43', '2025-05-03 11:17:27', 19),
(375, 'admin', '2025-02-20 14:29:43', '2025-05-03 11:17:27', 19),
(376, 'admin', '2025-02-20 14:29:43', '2025-05-03 11:17:27', 19),
(377, 'admin', '2025-02-20 14:29:43', '2025-05-03 11:17:27', 19),
(378, 'admin', '2025-02-20 14:29:43', '2025-05-03 11:17:27', 19),
(379, 'admin', '2025-02-20 14:29:44', '2025-05-03 11:17:27', 19),
(380, 'admin', '2025-02-20 14:33:06', '2025-05-03 11:17:27', 19),
(381, 'admin', '2025-02-20 14:35:46', '2025-05-03 11:17:27', 19),
(382, 'admin', '2025-02-20 20:14:11', '2025-05-03 11:17:27', 19),
(383, 'admin', '2025-02-20 20:38:18', '2025-05-03 11:17:27', 19),
(384, 'admin', '2025-02-21 01:16:04', '2025-05-03 11:17:27', 19),
(385, 'admin', '2025-02-22 11:36:50', '2025-05-03 11:17:27', 19),
(386, 'admin', '2025-02-22 13:39:31', '2025-05-03 11:17:27', 19),
(387, 'admin', '2025-02-22 14:35:53', '2025-05-03 11:17:27', 19),
(388, 'admin', '2025-02-22 14:51:01', '2025-05-03 11:17:27', 19),
(389, 'admin', '2025-02-22 14:51:36', '2025-05-03 11:17:27', 19),
(390, 'admin', '2025-02-22 14:57:08', '2025-05-03 11:17:27', 19),
(391, 'admin', '2025-02-22 14:58:27', '2025-05-03 11:17:27', 19),
(392, 'admin', '2025-02-22 15:00:38', '2025-05-03 11:17:27', 19),
(393, 'admin', '2025-02-22 15:00:54', '2025-05-03 11:17:27', 19),
(394, 'admin', '2025-02-22 18:00:37', '2025-05-03 11:17:27', 19),
(395, 'admin', '2025-02-23 11:35:02', '2025-05-03 11:17:27', 19),
(396, 'admin', '2025-02-24 09:58:17', '2025-05-03 11:17:27', 19),
(397, 'admin', '2025-02-24 17:46:09', '2025-05-03 11:17:27', 19),
(398, 'admin', '2025-02-24 19:56:12', '2025-05-03 11:17:27', 19),
(399, 'admin', '2025-02-24 20:03:51', '2025-05-03 11:17:27', 19),
(400, 'admin', '2025-02-24 20:29:07', '2025-05-03 11:17:27', 19),
(401, 'admin', '2025-02-24 20:34:48', '2025-05-03 11:17:27', 19),
(402, 'admin', '2025-02-24 20:35:30', '2025-05-03 11:17:27', 19),
(403, 'admin', '2025-02-24 20:36:43', '2025-05-03 11:17:27', 19),
(404, 'admin', '2025-02-24 20:38:26', '2025-05-03 11:17:27', 19),
(405, 'admin', '2025-02-24 21:14:35', '2025-05-03 11:17:27', 19),
(406, 'admin', '2025-02-24 21:16:34', '2025-05-03 11:17:27', 19),
(407, 'admin', '2025-02-24 21:19:51', '2025-05-03 11:17:27', 19),
(408, 'admin', '2025-02-24 21:23:10', '2025-05-03 11:17:27', 19),
(409, 'admin', '2025-02-25 23:57:10', '2025-05-03 11:17:27', 19),
(410, 'admin', '2025-02-26 08:20:24', '2025-05-03 11:17:27', 19),
(411, 'admin', '2025-02-28 16:33:12', '2025-05-03 11:17:27', 19),
(412, 'admin', '2025-03-03 00:41:09', '2025-05-03 11:17:27', 19),
(413, 'admin', '2025-03-03 02:08:58', '2025-05-03 11:17:27', 19),
(414, 'admin', '2025-03-03 12:09:38', '2025-05-03 11:17:27', 19),
(415, 'admin', '2025-03-04 00:41:29', '2025-05-03 11:17:27', 19),
(416, 'admin', '2025-03-04 11:08:03', '2025-05-03 11:17:27', 19),
(417, 'admin', '2025-03-04 11:20:02', '2025-05-03 11:17:27', 19),
(418, 'admin', '2025-03-05 11:11:33', '2025-05-03 11:17:27', 19),
(419, 'admin', '2025-03-23 00:23:42', '2025-05-03 11:17:27', 19),
(420, 'admin', '2025-03-27 12:20:55', '2025-05-03 11:17:27', 19),
(421, 'admin', '2025-03-27 23:28:08', '2025-05-03 11:17:27', 19),
(422, 'admin', '2025-03-27 23:30:43', '2025-05-03 11:17:27', 19),
(423, 'admin', '2025-03-27 23:33:01', '2025-05-03 11:17:27', 19),
(424, 'admin', '2025-03-27 23:37:41', '2025-05-03 11:17:27', 19),
(425, 'admin', '2025-03-27 23:39:10', '2025-05-03 11:17:27', 19),
(426, 'admin', '2025-03-27 23:46:58', '2025-05-03 11:17:27', 19),
(427, 'admin', '2025-03-27 23:55:36', '2025-05-03 11:17:27', 19),
(428, 'admin', '2025-03-28 13:14:36', '2025-05-03 11:17:27', 19),
(429, 'admin', '2025-03-28 13:22:50', '2025-05-03 11:17:27', 19),
(430, 'admin', '2025-03-29 21:25:18', '2025-05-03 11:17:27', 19),
(431, 'admin', '2025-03-30 10:15:08', '2025-05-03 11:17:27', 19),
(432, 'admin', '2025-03-31 00:40:44', '2025-05-03 11:17:27', 19),
(433, 'admin', '2025-03-31 01:14:31', '2025-05-03 11:17:27', 19),
(434, 'admin', '2025-03-31 01:49:45', '2025-05-03 11:17:27', 19),
(435, 'admin', '2025-03-31 10:34:59', '2025-05-03 11:17:27', 19),
(436, 'admin', '2025-03-31 16:57:54', '2025-05-03 11:17:27', 19),
(437, 'admin', '2025-04-08 14:08:18', '2025-05-03 11:17:27', 19),
(438, 'admin', '2025-04-09 13:45:09', '2025-05-03 11:17:27', 19),
(439, 'admin', '2025-04-09 14:26:33', '2025-05-03 11:17:27', 19),
(440, 'admin', '2025-04-10 10:22:43', '2025-05-03 11:17:27', 19),
(441, 'admin', '2025-04-10 10:56:54', '2025-05-03 11:17:27', 19),
(442, 'admin', '2025-04-10 11:21:10', '2025-05-03 11:17:27', 19),
(443, 'admin', '2025-04-10 11:33:25', '2025-05-03 11:17:27', 19),
(444, 'admin', '2025-04-11 01:08:20', '2025-05-03 11:17:27', 19),
(445, 'admin', '2025-04-11 01:15:04', '2025-05-03 11:17:27', 19),
(446, 'admin', '2025-04-11 14:32:37', '2025-05-03 11:17:27', 19),
(447, 'admin', '2025-05-03 11:07:16', '2025-05-03 11:17:27', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `student_log`
--
ALTER TABLE `student_log`
  ADD PRIMARY KEY (`student_log_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `student_log`
--
ALTER TABLE `student_log`
  MODIFY `student_log_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=423;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
