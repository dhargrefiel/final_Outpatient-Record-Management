-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 05:05 PM
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
-- Database: `patient_records_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_patientadmission`
--

CREATE TABLE `add_patientadmission` (
  `a_id` int(11) NOT NULL,
  `a_wardname` varchar(255) NOT NULL,
  `a_date` date NOT NULL,
  `a_admittedby` varchar(255) NOT NULL,
  `a_user_id` int(11) NOT NULL,
  `a_fname` varchar(255) NOT NULL,
  `a_mname` varchar(255) NOT NULL,
  `a_lname` varchar(255) NOT NULL,
  `a_gender` varchar(255) NOT NULL,
  `a_age` varchar(255) NOT NULL,
  `a_physician_id` varchar(255) NOT NULL,
  `a_father` varchar(255) NOT NULL,
  `a_mother` varchar(255) NOT NULL,
  `a_chargetoaccount` varchar(255) NOT NULL,
  `a_relationtopatient` varchar(255) NOT NULL,
  `a_address` varchar(255) NOT NULL,
  `a_number` varchar(255) NOT NULL,
  `a_totalpayment` varchar(255) NOT NULL,
  `a_dischargedate` date NOT NULL,
  `a_complaint` text NOT NULL,
  `a_completediagnosis` text NOT NULL,
  `a_medication` varchar(255) NOT NULL,
  `a_conditiontodischarge` varchar(255) NOT NULL,
  `a_remarks` varchar(255) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_patientadmission`
--

INSERT INTO `add_patientadmission` (`a_id`, `a_wardname`, `a_date`, `a_admittedby`, `a_user_id`, `a_fname`, `a_mname`, `a_lname`, `a_gender`, `a_age`, `a_physician_id`, `a_father`, `a_mother`, `a_chargetoaccount`, `a_relationtopatient`, `a_address`, `a_number`, `a_totalpayment`, `a_dischargedate`, `a_complaint`, `a_completediagnosis`, `a_medication`, `a_conditiontodischarge`, `a_remarks`, `log_time`) VALUES
(5, 'Pulmonary', '2019-05-02', 'Nina', 1, 'James', 'Fernandez', 'Navarro', 'Male', '25', '53', '', '', '', '', '', '', '', '0000-00-00', '', 'abab', 'ab', '', '', '2019-05-02 15:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `add_patientfindings`
--

CREATE TABLE `add_patientfindings` (
  `a_id` int(11) NOT NULL,
  `a_user_id` int(11) NOT NULL,
  `a_fname` varchar(255) NOT NULL,
  `a_mname` varchar(255) NOT NULL,
  `a_lname` varchar(255) NOT NULL,
  `a_gender` varchar(255) NOT NULL,
  `a_age` int(11) NOT NULL,
  `a_complaint` text NOT NULL,
  `a_historypresentillness` text NOT NULL,
  `a_bp` varchar(255) NOT NULL,
  `a_rr` varchar(255) NOT NULL,
  `a_cr` varchar(255) NOT NULL,
  `a_temp` varchar(255) NOT NULL,
  `a_wt` varchar(255) NOT NULL,
  `a_pr` varchar(255) NOT NULL,
  `a_physicalexam` text NOT NULL,
  `a_diagnosis` text NOT NULL,
  `a_medication` text NOT NULL,
  `a_physician_id` int(11) NOT NULL,
  `a_date` date NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_patientfindings`
--

INSERT INTO `add_patientfindings` (`a_id`, `a_user_id`, `a_fname`, `a_mname`, `a_lname`, `a_gender`, `a_age`, `a_complaint`, `a_historypresentillness`, `a_bp`, `a_rr`, `a_cr`, `a_temp`, `a_wt`, `a_pr`, `a_physicalexam`, `a_diagnosis`, `a_medication`, `a_physician_id`, `a_date`, `log_time`, `status`) VALUES
(13, 1, 'Jenna', 'Castro', 'Hassan', 'Female', 26, 'asdasdd', '*Under Observation', '', '', '', '', '', '', 'a', 'a', 'a', 1, '2019-05-02', '2022-12-23 13:16:30', 0),
(14, 1, 'James', 'Fernandez', 'Navarro', 'Male', 25, '', '*Under Observation', '', '', '', '', '', '', '', '', '', 1, '2019-05-02', '2022-12-23 13:16:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admission_record`
--

CREATE TABLE `admission_record` (
  `ad_id` int(11) NOT NULL,
  `ad_wardname` varchar(255) NOT NULL,
  `ad_date` date NOT NULL,
  `ad_admittedby` varchar(255) NOT NULL,
  `pr_admission_id` int(11) NOT NULL,
  `ad_physician` varchar(255) NOT NULL,
  `ad_father` varchar(255) NOT NULL,
  `ad_mother` varchar(255) NOT NULL,
  `ad_chargetoaccount` varchar(255) NOT NULL,
  `ad_relationtopatient` varchar(255) NOT NULL,
  `ad_address` varchar(255) NOT NULL,
  `ad_number` varchar(255) NOT NULL,
  `ad_totalpayment` varchar(255) NOT NULL,
  `ad_dischargedate` date NOT NULL,
  `ad_complaint` text NOT NULL,
  `ad_completediagnosis` text NOT NULL,
  `ad_medication` varchar(255) NOT NULL,
  `ad_conditiontodischarge` varchar(255) NOT NULL,
  `ad_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_record`
--

INSERT INTO `admission_record` (`ad_id`, `ad_wardname`, `ad_date`, `ad_admittedby`, `pr_admission_id`, `ad_physician`, `ad_father`, `ad_mother`, `ad_chargetoaccount`, `ad_relationtopatient`, `ad_address`, `ad_number`, `ad_totalpayment`, `ad_dischargedate`, `ad_complaint`, `ad_completediagnosis`, `ad_medication`, `ad_conditiontodischarge`, `ad_remarks`) VALUES
(11, 'ICU', '2019-04-21', 'Neli', 3, 'James.Santos', '', '', '', '', '', '', '', '0000-00-00', '', ' Coughing up blood', 'Isoniazid', '', ''),
(12, '*Under.Observation', '2019-04-21', 'Neli', 2, 'Jobelle.Castro', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', ''),
(13, 'Male', '2019-05-01', 'Noel', 4, 'Gabriel.Lopez', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', ''),
(14, 'Gyne', '2019-05-02', '', 2, 'Jobelle.Castro', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `civilstat`
--

CREATE TABLE `civilstat` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `civilstat`
--

INSERT INTO `civilstat` (`c_id`, `c_name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Separated');

-- --------------------------------------------------------

--
-- Table structure for table `fieldsphysician`
--

CREATE TABLE `fieldsphysician` (
  `fp_id` int(11) NOT NULL,
  `fp_name` varchar(255) NOT NULL,
  `fp_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fieldsphysician`
--

INSERT INTO `fieldsphysician` (`fp_id`, `fp_name`, `fp_description`) VALUES
(1, 'Gynecologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(2, 'Ophthalmologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(3, 'Surgeon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(4, 'Pediatrician', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(5, 'Orthopedic Surgeon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(6, 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(7, 'Psychiatrist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(8, 'Dermatologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(9, 'Endocrinologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(10, 'Gastroenterologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(11, 'Immunologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(12, 'Neurologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit');

-- --------------------------------------------------------

--
-- Table structure for table `findings`
--

CREATE TABLE `findings` (
  `f_id` int(11) NOT NULL,
  `pr_findings_id` int(11) NOT NULL,
  `f_chiefcomplaint` text NOT NULL,
  `f_historypresentillness` text NOT NULL,
  `f_status` varchar(255) NOT NULL,
  `f_bp` varchar(255) NOT NULL,
  `f_rr` varchar(255) NOT NULL,
  `f_cr` varchar(255) NOT NULL,
  `f_temp` varchar(255) NOT NULL,
  `f_wt` varchar(255) NOT NULL,
  `f_pr` varchar(255) NOT NULL,
  `f_physicalexam` text NOT NULL,
  `f_diagnosis` text NOT NULL,
  `f_medication` text NOT NULL,
  `f_nameofphysician` varchar(255) NOT NULL,
  `f_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `findings`
--

INSERT INTO `findings` (`f_id`, `pr_findings_id`, `f_chiefcomplaint`, `f_historypresentillness`, `f_status`, `f_bp`, `f_rr`, `f_cr`, `f_temp`, `f_wt`, `f_pr`, `f_physicalexam`, `f_diagnosis`, `f_medication`, `f_nameofphysician`, `f_date`) VALUES
(30, 3, '', 'Tuberculosis', '', '', '', '', '', '', '', '', 'fever, night sweats, cough', 'initial Phase Daily INH, RIF, PZA, and EMB* for 56 doses (8 weeks)', 'Juan.Monton', '2019-04-16'),
(33, 2, '', 'High Blood Pressure', '', '134/80', '', '', '', '', '', '', 'dizziness, headache', 'Exercise, Eat a low-sodium, low-fat diet, Eat potassium-rich foods ', 'Noa.Santiago', '2019-04-18'),
(36, 1, '', 'Headache', '', '', '', '', '', '', '', '', 'vomiting', 'ibuprofen ', 'Jobelle.Castro', '2019-04-18'),
(43, 2, '', '*Under Observation', '', '', '', '', '', '', '', '', '', '', '', '2019-05-02'),
(44, 1, 'sad', '*Under Observation', '', '', '', '', '', '', '', '', '', '', ' Dr. Marilyn Teodor Madrid', '2019-05-03'),
(45, 18, 'sadasdsa', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(46, 1, 'Test', 'Test', '', '', '', '', '', '', '', 'Test', 'Test', 'Test', 'Dr. Marilyn Teodor Madrid', '2022-12-23'),
(49, 1, 'sada', 'asdas', '', '', '', '', '', '', '', '', '', '', 'Dr. Marilyn Teodor Madrid', '2022-12-23'),
(50, 1, 'sd', 'dhar', '', '', '', '  ', '', '', '', '', '', '', ' ', '2022-12-23'),
(51, 1, 'ddd', 'ddddd', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(53, 1, 'gtrg', 'gfd', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(54, 1, '', 'wqe', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(55, 14, 'dsad', 'asdasd', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(56, 18, 'dsad', 'dasd', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(57, 17, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(58, 17, '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(59, 16, 'xc', 'd', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(60, 15, 'eqwe', 'eqwe', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(61, 13, 'sadasd', 'asda', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`g_id`, `g_name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `log_admission`
--

CREATE TABLE `log_admission` (
  `lo_id` int(11) NOT NULL,
  `lo_wardname` varchar(255) NOT NULL,
  `lo_date` date NOT NULL,
  `lo_admittedby` varchar(255) NOT NULL,
  `lo_user_id` int(11) NOT NULL,
  `lo_fname` varchar(255) NOT NULL,
  `lo_mname` varchar(255) NOT NULL,
  `lo_lname` varchar(255) NOT NULL,
  `lo_gender` varchar(255) NOT NULL,
  `lo_age` varchar(255) NOT NULL,
  `lo_physician_id` varchar(255) NOT NULL,
  `lo_father` varchar(255) NOT NULL,
  `lo_mother` varchar(255) NOT NULL,
  `lo_chargetoaccount` varchar(255) NOT NULL,
  `lo_relationtopatient` varchar(255) NOT NULL,
  `lo_address` varchar(255) NOT NULL,
  `lo_number` varchar(255) NOT NULL,
  `lo_totalpayment` varchar(255) NOT NULL,
  `lo_dischargedate` date NOT NULL,
  `lo_complaint` text NOT NULL,
  `lo_completediagnosis` text NOT NULL,
  `lo_medication` varchar(255) NOT NULL,
  `lo_conditiontodischarge` varchar(255) NOT NULL,
  `lo_remarks` varchar(255) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_admission`
--

INSERT INTO `log_admission` (`lo_id`, `lo_wardname`, `lo_date`, `lo_admittedby`, `lo_user_id`, `lo_fname`, `lo_mname`, `lo_lname`, `lo_gender`, `lo_age`, `lo_physician_id`, `lo_father`, `lo_mother`, `lo_chargetoaccount`, `lo_relationtopatient`, `lo_address`, `lo_number`, `lo_totalpayment`, `lo_dischargedate`, `lo_complaint`, `lo_completediagnosis`, `lo_medication`, `lo_conditiontodischarge`, `lo_remarks`, `log_time`) VALUES
(16, 'Pulmonary', '0000-00-00', 'Nina', 53, 'James', 'Fernandez', 'Navarro', '', '', '1', '', '', '', '', '', '', '', '0000-00-00', '', 'abab', 'ab', '', '', '2019-05-02 16:14:53'),
(17, 'Pulmonary', '0000-00-00', 'Nina', 53, 'James', 'Fernandez', 'Navarro', '', '', '1', '', '', '', '', '', '', '', '0000-00-00', '', 'abab', 'ab', '', '', '2019-05-03 03:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `log_findings`
--

CREATE TABLE `log_findings` (
  `lo_id` int(11) NOT NULL,
  `lo_user_id` varchar(255) NOT NULL,
  `lo_fname` varchar(255) NOT NULL,
  `lo_mname` varchar(255) NOT NULL,
  `lo_lname` varchar(255) NOT NULL,
  `lo_gender` varchar(255) NOT NULL,
  `lo_age` int(11) NOT NULL,
  `lo_complaint` text NOT NULL,
  `lo_historypresentillness` text NOT NULL,
  `lo_bp` varchar(255) NOT NULL,
  `lo_rr` varchar(255) NOT NULL,
  `lo_cr` varchar(255) NOT NULL,
  `lo_temp` varchar(255) NOT NULL,
  `lo_wt` varchar(255) NOT NULL,
  `lo_pr` varchar(255) NOT NULL,
  `lo_physicalexam` text NOT NULL,
  `lo_diagnosis` text NOT NULL,
  `lo_medication` text NOT NULL,
  `lo_physician_id` int(11) NOT NULL,
  `lo_date` date NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_findings`
--

INSERT INTO `log_findings` (`lo_id`, `lo_user_id`, `lo_fname`, `lo_mname`, `lo_lname`, `lo_gender`, `lo_age`, `lo_complaint`, `lo_historypresentillness`, `lo_bp`, `lo_rr`, `lo_cr`, `lo_temp`, `lo_wt`, `lo_pr`, `lo_physicalexam`, `lo_diagnosis`, `lo_medication`, `lo_physician_id`, `lo_date`, `log_time`) VALUES
(17, '53', 'Jenna', 'Castro', 'Hassan', '', 0, '', '', '', '', '', '', '', '', '', '', '', 1, '0000-00-00', '2019-05-02 16:15:27'),
(18, '53', 'Jenna', 'Castro', 'Hassan', '', 0, '', '*Under Observation', '', '', '', '', '', '', 'dsaad', 'dsaad', 'asd', 1, '0000-00-00', '2019-05-02 16:15:33'),
(20, '53', 'Jenna', 'Castro', 'Hassan', '', 0, '', '*Under Observation', '', '', '', '', '', '', 'a', 'a', 'a', 1, '0000-00-00', '2019-05-03 04:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `oldadmission`
--

CREATE TABLE `oldadmission` (
  `oad_id` int(11) NOT NULL,
  `oad_wardname` varchar(255) NOT NULL,
  `oad_date` date NOT NULL,
  `oad_admittedby` varchar(255) NOT NULL,
  `oad_user_id` int(11) NOT NULL,
  `oad_fname` varchar(255) NOT NULL,
  `oad_mname` varchar(255) NOT NULL,
  `oad_lname` varchar(255) NOT NULL,
  `oad_gender` varchar(255) NOT NULL,
  `oad_age` varchar(255) NOT NULL,
  `oad_physician_id` varchar(255) NOT NULL,
  `oad_father` varchar(255) NOT NULL,
  `oad_mother` varchar(255) NOT NULL,
  `oad_chargetoaccount` varchar(255) NOT NULL,
  `oad_relationtopatient` varchar(255) NOT NULL,
  `oad_address` varchar(255) NOT NULL,
  `oad_number` varchar(255) NOT NULL,
  `oad_totalpayment` varchar(255) NOT NULL,
  `oad_dischargedate` date NOT NULL,
  `oad_complaint` text NOT NULL,
  `oad_completediagnosis` text NOT NULL,
  `oad_medication` varchar(255) NOT NULL,
  `oad_conditiontodischarge` varchar(255) NOT NULL,
  `oad_remarks` varchar(255) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oldadmission`
--

INSERT INTO `oldadmission` (`oad_id`, `oad_wardname`, `oad_date`, `oad_admittedby`, `oad_user_id`, `oad_fname`, `oad_mname`, `oad_lname`, `oad_gender`, `oad_age`, `oad_physician_id`, `oad_father`, `oad_mother`, `oad_chargetoaccount`, `oad_relationtopatient`, `oad_address`, `oad_number`, `oad_totalpayment`, `oad_dischargedate`, `oad_complaint`, `oad_completediagnosis`, `oad_medication`, `oad_conditiontodischarge`, `oad_remarks`, `log_time`) VALUES
(1, 'Gyne', '2019-05-02', '', 1, 'James', 'Fernandez', 'Navarro', 'Male', '25', '53', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '2019-05-02 09:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `oldfindings`
--

CREATE TABLE `oldfindings` (
  `of_id` int(11) NOT NULL,
  `of_user_id` int(11) NOT NULL,
  `of_fname` varchar(255) NOT NULL,
  `of_mname` varchar(255) NOT NULL,
  `of_lname` varchar(255) NOT NULL,
  `of_gender` varchar(255) NOT NULL,
  `of_age` int(11) NOT NULL,
  `of_complaint` text NOT NULL,
  `of_historypresentillness` text NOT NULL,
  `of_bp` varchar(255) NOT NULL,
  `of_rr` varchar(255) NOT NULL,
  `of_cr` varchar(255) NOT NULL,
  `of_temp` varchar(255) NOT NULL,
  `of_wt` varchar(255) NOT NULL,
  `of_pr` varchar(255) NOT NULL,
  `of_physicalexam` text NOT NULL,
  `of_diagnosis` text NOT NULL,
  `of_medication` text NOT NULL,
  `of_physician_id` int(11) NOT NULL,
  `of_date` date NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oldfindings`
--

INSERT INTO `oldfindings` (`of_id`, `of_user_id`, `of_fname`, `of_mname`, `of_lname`, `of_gender`, `of_age`, `of_complaint`, `of_historypresentillness`, `of_bp`, `of_rr`, `of_cr`, `of_temp`, `of_wt`, `of_pr`, `of_physicalexam`, `of_diagnosis`, `of_medication`, `of_physician_id`, `of_date`, `log_time`) VALUES
(4, 1, 'Jenna', 'Castro', 'Hassan', 'Female', 26, '', 'Headache', '', '', '', '', '', '', '', 'vomiting', 'ibuprofen ', 53, '2019-05-02', '2019-05-02 08:04:09');

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `pr_id` int(11) NOT NULL,
  `pr_user_id` int(11) NOT NULL,
  `pr_date` date NOT NULL,
  `pr_lname` varchar(255) NOT NULL,
  `pr_fname` varchar(255) NOT NULL,
  `pr_mname` varchar(255) NOT NULL,
  `pr_addrs` varchar(255) NOT NULL,
  `pr_age` int(11) NOT NULL,
  `pr_bdate` date NOT NULL,
  `pr_bplace` varchar(255) NOT NULL,
  `pr_civilstat` varchar(255) NOT NULL,
  `pr_gen` varchar(255) NOT NULL,
  `pr_number` varchar(255) NOT NULL,
  `pr_religion` varchar(255) NOT NULL,
  `pr_occup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`pr_id`, `pr_user_id`, `pr_date`, `pr_lname`, `pr_fname`, `pr_mname`, `pr_addrs`, `pr_age`, `pr_bdate`, `pr_bplace`, `pr_civilstat`, `pr_gen`, `pr_number`, `pr_religion`, `pr_occup`) VALUES
(1, 1, '2019-03-13', 'Grefiel', 'Dharlene', 'Ibon', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09293932931', 'Catholic', 'Call Center'),
(2, 1, '2019-03-19', 'Grefiel', 'Irene', 'Ibon', 'Manila', 60, '2022-12-21', 'Manila', 'Married', 'Female', '09292342923', 'Catholic', 'Merchandiser'),
(3, 1, '2019-04-13', 'Soler', 'Jomina Crista', 'Delos Santos', 'Makati', 23, '2022-12-21', 'Manila', 'Single', 'Female', '09292234122', 'Catholic', 'Factory Worker'),
(4, 1, '2019-04-26', 'Castro', 'Cherilu', 'Molina', 'Tondo', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09023923020', 'Catholic', 'Factory Worker'),
(12, 0, '0000-00-00', 'Paraiso', 'Hanna Nicole', 'Santos', 'Tondo, Manila', 20, '2022-12-21', 'Manila', 'Single', 'Female', '9619916193', 'Catholic', 'Student'),
(13, 0, '0000-00-00', 'Amparo', 'Nicole Alexandria', 'De Luna', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '9619916193', 'Catholic', 'Student'),
(14, 0, '0000-00-00', 'Grefiel', 'A', 'Ibon', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09619916193', 'Catholic', 'Student'),
(15, 0, '0000-00-00', 'Grefiel', 'B', 'Ibon', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09101314386', 'Catholic', 'Housekeeper'),
(16, 0, '2022-12-21', 'Grefiel', 'C', 'Ibon', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09619916193', 'Catholic', 'None'),
(17, 0, '2022-12-21', 'Grefiel', 'D', 'Ibon', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09619916193', 'Catholic', 'Student'),
(18, 0, '2022-12-21', 'Grefiel', 'F', 'Ibon', 'Manila', 21, '2022-12-21', 'Manila', 'Single', 'Female', '09619916193', 'Catholic', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `physicians`
--

CREATE TABLE `physicians` (
  `d_id` int(11) NOT NULL,
  `d_lname` varchar(255) NOT NULL,
  `d_fname` varchar(255) NOT NULL,
  `d_mname` varchar(255) NOT NULL,
  `d_address` varchar(255) NOT NULL,
  `d_gen` varchar(255) NOT NULL,
  `d_age` int(11) NOT NULL,
  `d_number` varchar(12) NOT NULL,
  `d_field` varchar(255) NOT NULL,
  `d_ward` varchar(255) NOT NULL,
  `d_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physicians`
--

INSERT INTO `physicians` (`d_id`, `d_lname`, `d_fname`, `d_mname`, `d_address`, `d_gen`, `d_age`, `d_number`, `d_field`, `d_ward`, `d_date`) VALUES
(1, 'Alvarez', 'Samantha', 'Manalo', 'Tondo, Manila', 'Female', 22, '09876543213', 'Pediatrician', 'Pedia', '2022-12-23'),
(2, 'Grefiel', 'Dhar', 'Ibon', 'Tondo, Manila', 'Female', 22, '09101314386', 'Surgeon', 'Orthopedic Surgeon', '2022-12-23'),
(3, 'Aguilar', 'Christine', 'Jaime', 'Tondo', 'Female', 22, '09619916193', 'Psychiatrist', 'Male Ward', '2022-12-23'),
(4, 'De Guzman', 'Clyden John', 'Santos', 'Tondo, Manila', 'Male', 22, '09123456723', 'Psychiatrist', 'Male Ward', '2022-12-23'),
(5, 'Soler', 'Amy', 'Genetia', 'Makati', 'Female', 22, '09213456789', 'Dermatologist', 'Female Ward', '2022-12-23'),
(45, 'Bernardo', 'Crizelle Ann', 'Molina', 'Mandaluyong', 'Female', 25, '09827436837', 'General', 'Pulmonary', '2022-12-23'),
(46, 'Dela Cruz', 'Juan', 'Genetia', 'San Andres, Manila', 'Male', 26, '09483729174', 'Neurologist', 'ICU', '2022-12-23'),
(47, 'Raquiza', 'Elvira', 'Lim', 'Manila', 'Female', 43, '09124563453', 'Gynecologist', 'Caesarian Section', '2022-12-23'),
(48, 'Recio', 'Abygail', 'Yu', 'Makati', 'Female', 50, '09263847263', 'Gynecologist', 'OB-Gyne', '2022-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `standardusers`
--

CREATE TABLE `standardusers` (
  `su_id` int(11) NOT NULL,
  `su_userid` int(11) NOT NULL,
  `su_user` varchar(255) NOT NULL,
  `su_pass` varchar(255) NOT NULL,
  `su_fname` varchar(255) NOT NULL,
  `su_position` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standardusers`
--

INSERT INTO `standardusers` (`su_id`, `su_userid`, `su_user`, `su_pass`, `su_fname`, `su_position`, `date_created`) VALUES
(47, 1, 'marilyn', '$2y$12$i1smyg0fT4rbFFiocy58lOaRFj/g7.TPwSBznxhyuyTWXqurPkW/C', 'Marilyn', 'Doctor', '2019-04-28 10:48:51'),
(49, 1, 'noa', '$2y$12$QrsjNiuyC8dQTg3k/FfVxO2at6mEEocVuMKSXBnDlri0rLaKFh47q', 'Noa', 'Doctor', '2019-04-29 01:43:49'),
(52, 1, 'juan', '$2y$12$IKToBmzw43SRz7tOXHcpSemnBizmxMFPv8g017JmO.Hp6PrN.yLJ.', 'Juan', 'Doctor', '2019-04-29 01:49:56'),
(53, 1, 'jobelle', '$2y$12$7ryPDjB4QM5RJzH3tcyu.uEEe82Is0Mq5eX3rmuKSkIBOsSpa49CC', 'Jobelle', 'Doctor', '2019-05-01 06:49:30'),
(54, 1, 'gabriel', '$2y$12$Dk9NNuBkqv9WvPwNJp9BuOYySQdfpvxkv9rtcDGwl9XTCALPIvgsi', 'Gabriel', 'Doctor', '2019-05-01 16:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_username`, `u_password`) VALUES
(1, 'admin', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(2, 'admin2', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_user` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_secretquestion` varchar(255) NOT NULL,
  `u_secretanswer` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_user`, `u_pass`, `u_secretquestion`, `u_secretanswer`, `date_registered`) VALUES
(1, 'Jomer', 'admin', '$2y$10$eclpnpHC0v8QCiHNU62cJOzock3Ar1SnI840AguzpyTPkIhJ8Riv6', 'What was your childhood nickname?', '0043f605eeeae08811074cc2f26c5126d21b24da', '2019-03-12 13:35:12'),
(3, 'admin', 'admin1', '$2y$10$sPNp25r0Y9yPae4neC3TK.RdIliPu0lu6rnZmP3EQAgNiiDeD56TO', 'What was your childhood nickname?', 'a58f327705b16842a432710949f4fc0cee0071da', '2019-05-09 02:22:24'),
(5, 'admin', 'admin12', '$2y$10$sPNp25r0Y9yPae4neC3TK.RdIliPu0lu6rnZmP3EQAgNiiDeD56TO', '', '', '2019-05-09 03:19:30');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `w_id` int(11) NOT NULL,
  `w_name` varchar(255) NOT NULL,
  `w_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`w_id`, `w_name`, `w_description`) VALUES
(1, 'Male Ward', 'Lorem ipsum dolor sit amet'),
(2, 'Female Ward', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(3, 'Pulmonary', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(5, 'Orthopedic Surgeon', 'Lorem ipsum dolor sit amet, consectetur adipiscing'),
(6, 'Caesarian Section', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(7, 'NSD', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(8, 'Male Surgical', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(9, 'Female Surgical', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(11, 'OB-Gyne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(13, '*Under.Observation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(15, 'Pedia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
(16, 'ICU', 'Lorem ipsum dolor sit amet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_patientadmission`
--
ALTER TABLE `add_patientadmission`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `add_patientfindings`
--
ALTER TABLE `add_patientfindings`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admission_record`
--
ALTER TABLE `admission_record`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `civilstat`
--
ALTER TABLE `civilstat`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `fieldsphysician`
--
ALTER TABLE `fieldsphysician`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indexes for table `findings`
--
ALTER TABLE `findings`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `log_admission`
--
ALTER TABLE `log_admission`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `log_findings`
--
ALTER TABLE `log_findings`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `oldadmission`
--
ALTER TABLE `oldadmission`
  ADD PRIMARY KEY (`oad_id`);

--
-- Indexes for table `oldfindings`
--
ALTER TABLE `oldfindings`
  ADD PRIMARY KEY (`of_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `physicians`
--
ALTER TABLE `physicians`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `standardusers`
--
ALTER TABLE `standardusers`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_patientadmission`
--
ALTER TABLE `add_patientadmission`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_patientfindings`
--
ALTER TABLE `add_patientfindings`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admission_record`
--
ALTER TABLE `admission_record`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `civilstat`
--
ALTER TABLE `civilstat`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fieldsphysician`
--
ALTER TABLE `fieldsphysician`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `findings`
--
ALTER TABLE `findings`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_admission`
--
ALTER TABLE `log_admission`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `log_findings`
--
ALTER TABLE `log_findings`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `oldadmission`
--
ALTER TABLE `oldadmission`
  MODIFY `oad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oldfindings`
--
ALTER TABLE `oldfindings`
  MODIFY `of_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `physicians`
--
ALTER TABLE `physicians`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `standardusers`
--
ALTER TABLE `standardusers`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
