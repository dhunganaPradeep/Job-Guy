-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 06:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_qualification`
--

CREATE TABLE `tbl_academic_qualification` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `timeframe` varchar(255) NOT NULL,
  `certificate` longblob NOT NULL,
  `transcript` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alerts`
--

CREATE TABLE `tbl_alerts` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alerts`
--

INSERT INTO `tbl_alerts` (`id`, `code`, `description`, `type`) VALUES
(1, '1123', 'You have been registered successfully', 'success'),
(2, '4568', 'Unknown error occurred while performing your request', 'danger'),
(3, '0927', 'Email address is already registered', 'warning'),
(4, '0346', 'Invalid email or password', 'danger'),
(5, '9837', 'Your profile have been updated successfully', 'success'),
(6, '9564', 'Password updated successfully', 'success'),
(9, '2305', 'Professional qualification was added successfully', 'success'),
(11, '0521', 'Qualification was deleted successfully', 'success'),
(13, '9367', 'language have been added', 'success'),
(14, '0591', 'Language was deleted successfully', 'success'),
(15, '8763', 'Language have been updated', 'success'),
(16, '6734', 'Professional qualification was updated', 'success'),
(17, '9843', 'Your job advertise have been posted successfully', 'success'),
(18, '1964', 'Training / Workshop have been added successfully', 'success'),
(20, '9210', 'working experience have been added', 'success'),
(22, '9215', 'working experience updated successfully', 'success'),
(24, '0593', 'working experience was deleted', 'success'),
(26, '9522', 'Training / workshop record have been deleted', 'success'),
(28, '2303', 'Academic qualification have been added successfully', 'success'),
(30, '1521', 'Academic qualification was deleted', 'success'),
(32, '3214', 'Academic qualification have been updated', 'success'),
(34, '2380', 'Referee was added successfully', 'success'),
(36, '7642', 'Referee information have been updated', 'success'),
(38, '0173', 'Job Ad have been deleted', 'success'),
(40, '0369', 'Job Ad has been updated successfully', 'success'),
(42, '2974', 'An error occurred while sending your message', 'danger'),
(43, '5634', 'Your message was sent successfully', 'success'),
(44, '3091', 'You have successfully changed your password', 'success'),
(45, '3591', 'An error occurred while updating your password', 'danger'),
(46, '2290', 'Your certificate size must be less or equal to <strong>1MB</strong>', 'warning'),
(47, '2490', 'Your transcript size must be less or equal to <strong>1MB</strong>', 'warning'),
(48, '5790', 'Training information was updated', 'success'),
(50, '3478', 'Your image size must be less or equal to <strong>1MB</strong>', 'warning'),
(51, '6789', 'Attachment was added successfully', 'success'),
(53, '6784', 'Attachment was deleted successfully', 'success'),
(55, '7764', 'Attachment was updated successfully', 'success'),
(57, '9517', 'Referee have been deleted', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category`) VALUES
(1, 'Accounting'),
(2, 'Auditing'),
(3, 'Banking and Financial Services'),
(4, 'CEO and General Management'),
(5, 'Community and Social Devt'),
(6, 'Creative and Design'),
(7, 'Education and Training'),
(8, 'Engineering and Construction'),
(9, 'Farming and Agribusiness'),
(10, 'Healthcare and Pharmaceutical'),
(11, 'HR & Administration'),
(12, 'IT and Telecoms'),
(13, 'Legal'),
(14, 'Manufacturing'),
(15, 'Marketing,Media and Brand'),
(16, 'Mining and Natural Resources'),
(17, 'Project & Programme Mngmnt'),
(18, 'Research,Science and Biotech'),
(19, 'Security'),
(20, 'Strategy and Consulting'),
(21, 'Tourism and Travel'),
(22, 'Trades and Services'),
(23, 'Transport and Logistics'),
(24, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'tp', 'Taplejung'),
(2, 'pa', 'Panchthar'),
(3, 'il', 'Ilam'),
(4, 'jh', 'Jhapa'),
(5, 'mo', 'Morang'),
(6, 'su', 'Sunsari'),
(7, 'dh', 'Dhankutta'),
(8, 'sa', 'Sankhuwasabha'),
(9, 'bh', 'Bhojpur'),
(10, 'te', 'Terathum'),
(11, 'ok', 'Okhaldhunga'),
(12, 'kh', 'Khotang'),
(13, 'so', 'Solukhumbu'),
(14, 'ud', 'Udayapur'),
(15, 'sa', 'Saptari'),
(16, 'si', 'Siraha'),
(17, 'dh', 'Dhanusa'),
(18, 'ma', 'Mahottari'),
(19, 'sa', 'Sarlahi'),
(20, 'si', 'Sindhuli'),
(21, 'ra', 'Ramechhap'),
(22, 'Bd', 'Dolkha'),
(23, 'si', 'Sindhupalchok'),
(24, 'ka', 'Kavrepalanchok'),
(25, 'la', 'Lalitpur'),
(26, 'bh', 'Bhaktapur'),
(27, 'ka', 'Kathmandu'),
(28, 'nu', 'Nuwakot'),
(29, 'ra', 'Rasuwa'),
(30, 'dh', 'Dhading'),
(31, 'ma', 'Makwanpur'),
(32, 'ra', 'Rautahat'),
(33, 'ba', 'Bara'),
(34, 'pa', 'Parsa'),
(35, 'ch', 'Chitwan'),
(36, 'go', 'Gorkha'),
(37, 'la', 'Lamjung'),
(38, 'ta', 'Tanahun'),
(39, 'sy', 'Syangja'),
(40, 'ka', 'Kaski'),
(41, 'ma', 'Manang'),
(42, 'mu', 'Mustang'),
(43, 'pa', 'Parwat'),
(44, 'my', 'Myagdi'),
(45, 'cx', 'Baglung'),
(46, 'gu', 'Gulmi'),
(47, 'pa', 'Palpa'),
(48, 'na', 'Nawalparasi'),
(49, 'ru', 'Rupandehi'),
(50, 'ar', 'Arghakhanchi'),
(51, 'ka', 'Kapilvastu'),
(52, 'py', 'Pyuthan'),
(53, 'ro', 'Rolpa'),
(54, 'ru', 'Rukum'),
(55, 'sa', 'Salyan'),
(56, 'da', 'Dang'),
(57, 'ba', 'Bardiya'),
(58, 'su', 'Surkhet'),
(59, 'da', 'Dailekh'),
(60, 'ba', 'Banke'),
(61, 'ja', 'Jajarkot'),
(62, 'do', 'Dolpa'),
(63, 'hu', 'Humla'),
(64, 'ka', 'Kalikot'),
(65, 'mu', 'Mugu'),
(66, 'ju', 'Jumla'),
(67, 'ba', 'Bajura'),
(68, 'ba', 'Bajhang'),
(69, 'ac', 'Achham'),
(70, 'do', 'Doti'),
(71, 'ka', 'Kailali'),
(72, 'ka', 'Kanchanpur'),
(73, 'da', 'Dadeldhura'),
(74, 'ba', 'Baitadi'),
(75, 'da', 'Darchula');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_experience`
--

CREATE TABLE `tbl_experience` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `supervisor_phone` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `duties` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `job_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `responsibility` longtext NOT NULL,
  `requirements` longtext NOT NULL,
  `company` varchar(255) NOT NULL,
  `date_posted` varchar(255) NOT NULL,
  `closing_date` varchar(255) NOT NULL,
  `enc_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `title`, `city`, `country`, `category`, `type`, `experience`, `description`, `responsibility`, `requirements`, `company`, `date_posted`, `closing_date`, `enc_id`) VALUES
('1', 'Software Engineer', 'Kathmandu', 'Kathmandu', 'IT and Telecoms', 'Freelance', '1 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2022', 1),
('2', 'Cyber Security', 'Pokhara', 'Kaski', 'IT and Telecoms', 'Full-time', '2 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2022', 2),
('3', 'Data Scientist', 'Bhaktapur', 'Kathmandu', 'IT and Telecoms', 'Part-time', '3 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2022', 3),
('4', 'Web Developer', 'Lalitpur', 'Kathmandu', 'IT and Telecoms', 'Part-time', '1 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2022', 4),
('5', 'Graphics Designer', 'Balkumari', 'Kathmandu', 'IT and Telecoms', 'Full-time', '2 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2022', 5),
('6', 'UI/UX Designer', 'Baneshwor', 'Kathmandu', 'IT and Telecoms', 'Full-time', '2 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2022', 6),
('7', 'IT Expert', 'Lakeside', 'Kaski', 'IT and Telecoms', 'Full-time', '5 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2021', 7),
('8', 'Game Developer', 'New Road', 'Kaski', 'IT and Telecoms', 'Part-time', '5 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2021', 8),
('9', 'AI Expert', 'Hemja', 'Kaski', 'IT and Telecoms', 'Full-time', '7 Years', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'Welcome to Job Guy. You can search your dream Job here.<br>', 'CM858235891', 'August 06, 2021', '01/09/2021', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_applications`
--

CREATE TABLE `tbl_job_applications` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `job_id` varchar(255) NOT NULL,
  `application_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `speak` varchar(255) NOT NULL,
  `reading` varchar(255) NOT NULL,
  `writing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_attachments`
--

CREATE TABLE `tbl_other_attachments` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `issuer` varchar(255) NOT NULL,
  `attachment` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professional_qualification`
--

CREATE TABLE `tbl_professional_qualification` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timeframe` varchar(255) NOT NULL,
  `certificate` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referees`
--

CREATE TABLE `tbl_referees` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `ref_name` varchar(255) NOT NULL,
  `ref_mail` varchar(255) NOT NULL,
  `ref_title` varchar(255) NOT NULL,
  `ref_phone` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tokens`
--

CREATE TABLE `tbl_tokens` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `id` int(255) NOT NULL,
  `member_no` varchar(255) NOT NULL,
  `training` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `timeframe` varchar(255) NOT NULL,
  `certificate` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT '-',
  `bdate` varchar(255) NOT NULL DEFAULT '-',
  `bmonth` varchar(255) NOT NULL DEFAULT '-',
  `byear` varchar(255) NOT NULL DEFAULT '-',
  `email` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL DEFAULT '-',
  `title` varchar(255) NOT NULL DEFAULT 'Your professional',
  `city` varchar(255) NOT NULL DEFAULT '-',
  `street` varchar(255) NOT NULL DEFAULT '-',
  `zip` varchar(255) NOT NULL DEFAULT '-',
  `country` varchar(255) NOT NULL DEFAULT '-',
  `phone` varchar(255) NOT NULL DEFAULT '-',
  `about` longtext DEFAULT NULL,
  `avatar` longblob DEFAULT NULL,
  `services` longtext DEFAULT NULL,
  `expertise` longtext DEFAULT NULL,
  `people` varchar(255) NOT NULL DEFAULT '-',
  `last_login` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL DEFAULT '-',
  `login` varchar(255) NOT NULL,
  `member_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`first_name`, `last_name`, `gender`, `bdate`, `bmonth`, `byear`, `email`, `education`, `title`, `city`, `street`, `zip`, `country`, `phone`, `about`, `avatar`, `services`, `expertise`, `people`, `last_login`, `role`, `website`, `login`, `member_no`) VALUES
('vision', 'vision', '-', '-', '-', '-', 'vision@gmail.com', '-', 'Your professional', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, '-', '-', 'employee', '-', '5d54f837b9d1dec77c770a34556492ff', '109'),
('deepu', '', '-', '-', '-', '-', 'deepu@gmail.com', '-', 'Your professional', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, '-', '-', 'employee', '-', '827ccb0eea8a706c4c34a16891f84e7b', '705'),
('hello', 'hello', '-', '-', '-', '-', 'hello@gmail.com', '-', 'Your professional', '-', '-', '-', '-', '-', NULL, NULL, NULL, NULL, '-', '-', 'employee', '-', 'e10adc3949ba59abbe56e057f20f883e', '849'),
('JOBGUY', '', '-', '-', '-', '2022', 'jobguy@gmail.com', '-', 'Software Company', 'bhaktapur', '', '12345', 'Kathmandu', '016656567', 'job guy is the leading job portal of nepal with more than 10000 monthly users', 0x89504e470d0a1a0a0000000d4948445200000168000000c80803000000f2508bbd000000ff504c5445ffffff91d8f67acfed231f2091d8f67acfed231f207acfed231f2091d8f67acfed231f207acfed231f2091d8f67acfed231f2091d8f67acfed231f207acfed231f205d819143555f91d8f67acfed231f20343c4291d8f67acfed231f2091d8f67acfed231f206b97ab7acfed231f2091d8f67acfed231f2081bcd671a2b839454c91d8f67acfed231f2073a5bb91d8f67acfed231f2024202274a7be252223fffffff1f1f1d6d5d5c8c7c791d8f68acce9bab9b97acfed83c1dbacabab7cb5ce75aac0918f8f6892a58381816187987572735a7b8b53707d6764654c64705956574558624c52563e4d553741473e3a3b37383b30353a302c2d292a2d231f20756d6dd30000003574524e5300101010202020303040404050506060607070708181898991919199a1a1a1b1b1b1b9c1c1d1d1d1d7dddde1e1e1e9f1f1f1f3f5f5563f4e3e000007a84944415478daed9c6b97d2561486cf100391408702690b4a0a25425ba1925e5446c6411d2fa3a5ad0effffb774914072aeb91e58ce5aeff369cc1c47e761b3b3f73e2710020000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000005f1946cb91d03260462ffdad02076e7486f374ab648aa03e413cefe8c38f2eac6d22160c9d22a011d2faf0029f7ed3e668fac1373c18d22ada52e51488d62b5af61d8886688806107d5a5a236f5b0a6fd482c554ecf95603731b2653c279ab09047599663b0f68ccd36f7b5ac02df234018d904ec209871a25ef64b68f2d811446c27dec7e2eeed177d4117ca6a4e84340df7bf87899971fbfd9853492740ed1673f2c0bf1f83e44e7117df66859946f203abbe8b39fd7ef04d697b4cf0be58aefca8bae6a6c2deb95af5774f55779c97613a9bebc51aff843295a7232845f6234dd7d35ef7b8ea85b3c5ed2b195fbf08dde78b10a980cdb35f67b66f780495f8eaed6e925e7fc0f96ffe5dca2addf55c5f1ed55e8f9ea3661c55a293ab5afb15c6e68e218195aaaa9ace137077bc907668c957a74bd4effade86a971073215f436af10f2d273ae118c7ed4590366ed52bfe292ebaea8a0b7c56b597718a5519ac240ccc3ca2493b7e9198f43389aeb74ba50e27a9e17bb713fd2e714551d12d5f7e44c7ca32246083bab15849599ce7114d86d11f7b747a89ae8e8b7574993aebdbe5e5e5f236d3523b9f68e5a906bf95651ad3a4fe9dde4ac9791ed1959964559c3816151da2dfbce278c3ff6a692bf28976330d5dd5a2fd38c50cd49e2337994453abe2e411278e06d120faefbf043eb2bfd9c7b415b9443bd9265409f34527433caff2a50e3a4df488eaca9d129d92b7e6062f7aeeed60d61cf27382e731c9299a8cb97571e298906389e67ffbfca2bd033e27da6076d0461ddb6e3a4cede3f2a2f7f16b8de235fb7a83b90fce06bb6a7778c8b5b5dca2e31a2f4c1e51e258d48e25fa292ffa696ed162aaf5c4c4d13f442fb37f59958ba673bb2d248e4994456bbd05fb66cf2a9a7a83f498c4d12685a94e13453f0fab8ecd66b309ab8ee789a2a755925db42f2d310c570869517495155da13c3349b4d263aa84cca2a95b6b9d4a1c435d3b59ff09165ff075f40b61c9bf59f7b238d12d553d4cfd8f0c8568c2a68eb8c91062ae5e274544572671f298c83b9862a23b8a0cfc2ab87cbd137d1d7cf94a91c5af738b1ea9ce001b3ef70a2444f4942bbe92632ebb682a8c678a9ebc606738978b7e1b5c5eef4487bddf5bb9e8cfebdca27d2e6ef9ddb5387724e4e80e97394c5da2e97789e4bbc5457b72d161020ea64a578afa2eb8bcc92dda128a8b38a4b76cc0aaab8e29e76f40b489a65af192959d4cf44b4ee2b32fc1e5707a177cf9e519b7e46541d176c2b91b8f4dc15c1d4ddd442dae9d68c4a999c7cc2b9a2d19570b538fe87d907c90b5d79f43d19f654df887f0e2a7dca29d848ab0af10ad983c75c5ccb192bef17389a65633ed6549d19d8416ed26147d93b0e4ba8468d51188a80df752c64eb168a25334f57353935276d1c69f6a8beb50f43a69627d7ad1dbb97364d1543533abe8124dbe575a7c7fd8ca7aaf5cf29a1ffc5b87878b8c23a68e437f944974bb80e87ad9999d4cf4fdd7c989232979bc5ef2a23d89455674b3c0cd504c1f5556744d2dba5e4a745da3e8e5d527c9afb259d3bbe0eb8d64c9a7ab6501d145ca3b77ff089ecbb6a20db12f14459b4c17428bab28e3f648a277ba782ef8031c17c2123a81e7104d84d9518e86c5f2e9b78319a7d2c382f19ea8ad5ba863b7a1d4793cd1c5e144b3ad5bc89cd53752857486163c1e9404a7fd66ca226cc6560d0b59f73150f6957740b4238e992c6e5b4439541a65182a55992c1e27696e60ccb7324389b9b8319991bb27ba254af4b832830a5cc674963129f5aa594cee604d9ff33945769660a8ae95ef80e838e2fc307918719cfa921d43371afc4fb30cfea9a8b7b99dd9457443ac7485be8e7a4526e12b52a1461a8d3b289a3e8f33773a8eeb8b3b5486cf6f65d9ec56565fb195c5ec6519ecded32e58db4129d79dadc49b243d291a76db5dfa64d38cdc45d1098f7a454546b3d8e62c5356fbaaa1a650444be617ab9469c65d104de6193eea23e958c7613497f238939b7eac8329e686ca4513721ad1f7348bb6d3e254c7011aeaeda136c8dce4a87348dc299bda894413cda24927254e934dfb76962361f4d349832c9e09a9294ee835c8a9443fd22c5a7a0ec9e71f90eb6c4b1c72645b1d459ee6b76ba5a617757232d1dfea164d9ac249514f3c8e6079b263bbe9e7a3e3ca313e1d3d961c5312334245cc3263939c4ef4d913dda289e130aae7f287c5ed519183e85bbf2fbe6a752e7f8ce582eaec2b3239cfb7c7585274b990fe4531f86fb9fbd278da571f6232a255bee7884fdfca3eb9b3a57848b7723ed85b5c8cdbea6d3eb3bd3f31361bb7d5c7bccc924f534886ecc17bf56171cf4f1e247d4a9b95e93120cbd6f60191e657f8b0d0fe6ee4ec06bd3fad0bf2db03615607f8c3773a1fbaafc2a71a579f6717361330e6ba3ccff121bcc937a1a91ecf537c5a475a4cf77578ee239e33a8967ec87c1ef081f4000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000705cfe07018c0c27cfa5f0ce0000000049454e44ae426082, 'online job portal and management system', 'job market ', '11-100', '16-06-2022 12:06 PM [EAT +03:00]', 'employer', 'https://jobguy.com', '5d54f837b9d1dec77c770a34556492ff', 'CM858235891');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_academic_qualification`
--
ALTER TABLE `tbl_academic_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`enc_id`),
  ADD UNIQUE KEY `job_id` (`job_id`);

--
-- Indexes for table `tbl_job_applications`
--
ALTER TABLE `tbl_job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other_attachments`
--
ALTER TABLE `tbl_other_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_professional_qualification`
--
ALTER TABLE `tbl_professional_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_referees`
--
ALTER TABLE `tbl_referees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`member_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_academic_qualification`
--
ALTER TABLE `tbl_academic_qualification`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_alerts`
--
ALTER TABLE `tbl_alerts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `enc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_job_applications`
--
ALTER TABLE `tbl_job_applications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_other_attachments`
--
ALTER TABLE `tbl_other_attachments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_professional_qualification`
--
ALTER TABLE `tbl_professional_qualification`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_referees`
--
ALTER TABLE `tbl_referees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tokens`
--
ALTER TABLE `tbl_tokens`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
