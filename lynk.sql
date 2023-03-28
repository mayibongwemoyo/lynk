-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2018 at 12:35 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lynk`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` VARCHAR(90) NOT NULL,
  `fname` VARCHAR(90) NOT NULL,
  `lname` VARCHAR(90) NOT NULL,
  `institution` VARCHAR(90) NOT NULL,
  `status` INT(1) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `sex` VARCHAR(11) NOT NULL,
  `civil_status` VARCHAR(30) NOT NULL,
  `birth_date` DATE NOT NULL,
  `birth_place` VARCHAR(255) NOT NULL,
  `age` INT(2) NOT NULL,
  `username` VARCHAR(90) NOT NULL,
  `password` VARCHAR(90) NOT NULL,
  `email_address` VARCHAR(90) NOT NULL,
  `contact_no` VARCHAR(90) NOT NULL,
  `degree` TEXT NOT NULL,
  `photo` VARCHAR(255) NOT NULL,
  `national_id` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2018016;

--
-- Dumping data for table `students`
--

INSERT INTO students (student_id, fname, lname, institution, status, address, sex, civil_status, birth_date, birth_place, age, username, password, email_address, contact_no, degree, photo, national_id)
VALUES
('2018001', 'Tendai', 'Moyo', 'University of Zimbabwe', 1, '123 Main Street, Harare', 'Male', 'Single', '2002-05-10', 'Harare', 19, 'tmoyo', 'password123', 'tmoyo@email.com', '+263712345678', 'Bachelor of Science in Computer Science', 'https://example.com/tmoyo.jpg', '12-345678-12'),
('2018002', 'Samantha', 'Mukanya', 'National University of Science and Technology', 1, '456 Second Street, Bulawayo', 'Female', 'Married', '2001-08-18', 'Bulawayo', 20, 'smukanya', 'password456', 'smukanya@email.com', '+263773456789', 'Bachelor of Business Administration', 'https://example.com/smukanya.jpg', '23-456789-23'),
('2018003', 'Tatenda', 'Maposa', 'Midlands State University', 1, '789 Third Street, Gweru', 'Male', 'Single', '2000-12-01', 'Gweru', 21, 'tmaposa', 'password789', 'tmaposa@email.com', '+263734567890', 'Bachelor of Arts in English and Communication', 'https://example.com/tmaposa.jpg', '34-567890-34');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `employer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(90) NOT NULL,
  `lname` VARCHAR(90) NOT NULL,
  `role` VARCHAR(90) NOT NULL,
  `company_name` VARCHAR(90) NOT NULL,
  `employer_email` VARCHAR(90) NOT NULL,
  `employer_pass` VARCHAR(90) NOT NULL,
  `company_id` INT(11) NOT NULL,
  PRIMARY KEY (`employer_id`),
  FOREIGN KEY (`company_id`) REFERENCES `companies`(`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`fname`, `lname`, `role`, `company_name`, `employer_email`, `employer_pass`, `company_id`)
VALUES
('John', 'Doe', 'HR Manager', 'ABC Inc.', 'johndoe@abcinc.com', 'password123', 1),
('Jane', 'Smith', 'Recruiter', 'XYZ Corp.', 'janesmith@xyzcorp.com', 'letmein', 2),
('Bob', 'Johnson', 'Talent Acquisition Manager', 'DEF Co.', 'bobjohnson@defco.com', 'qwerty', 3);

-- ------------------------------------------------------

--
-- Table structure for table `attachmentfile`
--

CREATE TABLE IF NOT EXISTS `attachmentfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` varchar(30) NULL,
  `company_id` int(11) NOT NULL,
  `file_name` varchar(90) NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `user_attachement_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `attachmentfile`
--

INSERT INTO `attachmentfile` (`id`,`file_id`, `company_id`, `file_name`, `file_location`, `user_attachement_id`) VALUES
(2147483647, 2, 'Resume', 'photos/27052018124027PLATENO FE95483.docx', 2018013);

-- --------------------------------------------------------

--
-- Table structure for table `autonumbers`
--

CREATE TABLE IF NOT EXISTS `autonumbers` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `auto_start` varchar(30) NOT NULL,
  `auto_end` int(11) NOT NULL,
  `auto_inc` int(11) NOT NULL,
  `auto_key` varchar(30) NOT NULL,
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `autonumbers`
--

INSERT INTO `autonumbers` (`auto_id`, `auto_start`, `auto_end`, `auto_inc`, `auto_key`) VALUES
(1, '02983', 7, 1, 'ADMINID'),
(2, '000', 78, 1, 'employee_id'),
(3, '0', 16, 1, 'applicant'),
(4, '69125', 29, 1, 'file_id');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES

(1, 'Accounting and finance'),
(2,'Administrative and office support'),
(3,'Advertising, marketing, and public relations'),
(4,'Architecture and engineering'),
(5,'Art, fashion, and design'),
(6,'Business operations'),
(7,'Consulting and project management'),
(8,'Customer service and support'),
(9,'Education and training'),
(10,'Healthcare and medical'),
(11,'Hospitality and tourism'),
(12,'Human resources and recruitment'),
(13,'Information technology and software development'),
(14,'Legal and law enforcement'),
(15,'Maintenance and repair'),
(16,'Manufacturing and production'),
(17,'Sales and business development'),
(18,'Science and research'),
(19,'Social services and non-profit'),
(20,'Transportation and logistics');
-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(90) NOT NULL,
  `company_location` varchar(90) NOT NULL,
  `category` varchar(90) NOT NULL,
  `company_website` varchar(90) NOT NULL,
  `company_email` varchar(90) NOT NULL,
  `company_address` varchar(90) NOT NULL,
  `company_contact_no` varchar(30) NOT NULL,
  `company_size` varchar(90) NOT NULL,
  `company_mission` text,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_location`, `category`, `company_website`, `company_email`, `company_address`, `company_contact_no`, `company_size`, `company_mission`)
VALUES
(1, 'Zimbank', 'Harare', 'Banking', 'www.zimbank.co.zw', 'info@zimbank.co.zw', '1st Street, Harare', '0771234567', 'Large', 'To provide quality financial services to our clients.'),
(2, 'Simba Cement', 'Bulawayo', 'Manufacturing', 'www.simba.co.zw', 'info@simba.co.zw', '2nd Street, Bulawayo', '0712345678', 'Medium', 'To produce and supply high-quality cement products.'),
(3, 'ZESA', 'Harare', 'Energy', 'www.zesa.co.zw', 'info@zesa.co.zw', 'Samora Machel Avenue, Harare', '0789123456', 'Large', 'To provide reliable and efficient energy to the nation.');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `institution_id` int(11) NOT NULL AUTO_INCREMENT,
  `institution` varchar(90) NOT NULL,
  `institution_location` varchar(90) NOT NULL,
  `institution_website` varchar(90) NOT NULL,
  `institution_email` varchar(90) NOT NULL,
  `institution_address` varchar(90) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `enrollment` int(11) NOT NULL,
  PRIMARY KEY (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `institution`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

-- CREATE TABLE IF NOT EXISTS `employees` (
--   `INCID` int(11) NOT NULL AUTO_INCREMENT,
--   `employee_id` varchar(30) NOT NULL,
--   `fname` varchar(50) NOT NULL,
--   `lname` varchar(50) NOT NULL,
--   `institution` varchar(50) NOT NULL,
--   `address` varchar(90) NOT NULL,
--   `DEGREE` varchar(90) NOT NULL,
--   `birth_date` date NOT NULL,
--   `sex` varchar(30) NOT NULL,
--   `CIVILSTATUS` varchar(30) NOT NULL,
--   `EMAILADDRESS` varchar(90) NOT NULL,
--   `CELLNO` varchar(30) NOT NULL,
--   `WORKSTATS` varchar(90) NOT NULL,
--   `EMPPHOTO` varchar(255) NOT NULL,
--   `USERNAME` varchar(90) NOT NULL,
--   `password` varchar(125) NOT NULL,
--   `DATEHIRED` date NOT NULL,
--   `company_id` int(11) NOT NULL,
--   PRIMARY KEY (`INCID`),
--   UNIQUE KEY `employee_id` (`employee_id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

-- --
-- -- Dumping data for table `employees`
-- --

-- INSERT INTO `employees` (`INCID`, `employee_id`, `fname`, `lname`, `institution`,  `address`,`DEGREE`, `birth_date`, `sex`, `CIVILSTATUS`, `EMAILADDRESS`, `CELLNO`, `WORKSTATS`, `EMPPHOTO`, `USERNAME`, `password`, `DATEHIRED`, `company_id`) VALUES
-- (76, '2018001', 'Chambe', 'Narciso','', 'mabinay', '1992-01-23', 'Mabinay', 26, 'Male', 'Married', '032656', 'chambe@yahoo.com', '', 'Fuel Tender', '', '', '2018001', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', '2018-05-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `occupation_title` varchar(90) NOT NULL,
  `req_no_employees` int(11) NOT NULL,
  `salaries` varchar(11) NOT NULL,
  `duration_employment` varchar(90) NOT NULL,
  `qualification_work_experience` text NOT NULL,
  `job_description` text NOT NULL,
  `prefered_sex` varchar(30) NOT NULL,
  `sector_vacancy` text NOT NULL,
  `job_status` varchar(90) NOT NULL,
  `date_posted` datetime NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `company_id`, `category`, `occupation_title`, `req_no_employees`, `salaries`, `duration_employment`, `qualification_work_experience`, `job_description`, `prefered_sex`, `sector_vacancy`, `job_status`, `date_posted`) VALUES
(1, 2, 'Technology', 'ISD', 6, 15000, 'jan 30', 'Two year Experience', 'We are looking for bachelor of science in information technology.\r\nasdasdasd', 'Male/Female', 'yes', '', '2018-05-20 00:00:00'),
(2, 2, 'Technology', 'Accounting', 1, 15000, 'may 20', 'Two years Experience', 'We are looking for bachelor of science in Acountancy', 'Female', 'yes', '', '2018-05-20 02:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobregistration`
--

CREATE TABLE IF NOT EXISTS `jobregistration` (
  `registration_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `applicant` varchar(90) NOT NULL,
  `registration_date` date NOT NULL,
  `remarks` varchar(255) NOT NULL DEFAULT 'Pending',
  `file_id` varchar(30) NULL,
  `pending_application` tinyint(1) NOT NULL DEFAULT '1',
  `hview` tinyint(1) NOT NULL DEFAULT '1',
  `date_time_approved` datetime NOT NULL,
  PRIMARY KEY (`registration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobregistration`
--

INSERT INTO `jobregistration` (`registration_id`, `company_id`, `company_id`, `applicant_id`, `applicant`, `registration_date`, `remarks`, `file_id`, `pending_application`, `hview`, `date_time_approved`) VALUES
(1, 2, 2, 2018013, 'Kim Domingo', '2018-05-27', 'Ive seen your work and its really interesting', 2147483647, 0, 1, '2018-05-26 16:13:01'),
(2, 2, 2, 2018015, 'Janry Tan', '2018-05-26', 'aasd', 2147483647, 0, 0, '2018-05-28 14:14:45');

-- --------------------------------------------------------

--
-- -- Table structure for table `admins`
-- --

-- CREATE TABLE IF NOT EXISTS `admins` (
--   `ADMINID` varchar(30) NOT NULL,
--   `FULLNAME` varchar(40) NOT NULL,
--   `USERNAME` varchar(90) NOT NULL,
--   `PASS` varchar(90) NOT NULL,
--   `ROLE` varchar(30) NOT NULL,
--   `PICLOCATION` varchar(255) NOT NULL,
--   PRIMARY KEY (`ADMINID`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--  --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `lecturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(90) NOT NULL,
  `lname` varchar(90) NOT NULL,
  `institution` varchar(90) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(90) NOT NULL,
  `email_address` varchar(90) NOT NULL,
  `contact_no` varchar(90) NOT NULL,
  `discipline` varchar(90) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`lecturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `lecturers`
--

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `USERID` varchar(30) NOT NULL,
  `FULLNAME` varchar(40) NOT NULL,
  `USERNAME` varchar(90) NOT NULL,
  `PASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PICLOCATION` varchar(255) NOT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'JANO ', 'janobe', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'photos/Koala.jpg'),
('2018001', 'Chambe Narciso', 'Narciso', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', 'Employee', '');

-- ------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` INT (11) NOT NULL AUTO_INCREMENT,
  `student_id` VARCHAR(90) NOT NULL,
  `internship_id` INT (11) NOT NULL,
  `employer_id` INT (11) NOT NULL,
  `application_status` VARCHAR(50),
  `application_date` DATE,
  PRIMARY KEY (`application_id`),
  FOREIGN KEY (`student_id`) REFERENCES `students`(`student_id`),
  FOREIGN KEY (`internship_id`) REFERENCES `internships`(`internship_id`),
  FOREIGN KEY (`employer_id`) REFERENCES `employers`(`employer_id`)
);


--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `INCID` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` INT (11) NOT NULL AUTO_INCREMENT,
  `student_id` VARCHAR(90) NOT NULL,
  `role` VARCHAR(90) NOT NULL,
  `company_id` INT (11) NOT NULL,
  `assessment_1` INT (11),
  `assessment_2` INT (11),
  `assessment_3` INT (11),
  `assessment_final` INT (11),
  `start_date` DATE,
  PRIMARY KEY (`employee_id`),
  FOREIGN KEY (`student_id`) REFERENCES `students`(`student_id`),
  FOREIGN KEY (`company_id`) REFERENCES `company`(`company_id`)
);
