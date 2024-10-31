-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2024 at 04:55 AM
-- Server version: 8.0.39-0ubuntu0.22.04.1
-- PHP Version: 8.0.30

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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `seeker_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coverLetter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `interview_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `company_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `view_count` int NOT NULL DEFAULT '0',
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `seeker_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Software Development', '/uploads/software_development.png', NULL, NULL),
(2, 'Design', '/uploads/design.png', NULL, NULL),
(3, 'Marketing', '/uploads/marketing.png', NULL, NULL),
(4, 'Data Analysis', '/uploads/data_analysis.png', NULL, NULL),
(5, 'Human Resources', '/uploads/human_resources.png', NULL, NULL),
(6, 'Project Management', '/uploads/project_management.png', NULL, NULL),
(7, 'Content Writing', '/uploads/content_writing.png', NULL, NULL),
(8, 'SEO', '/uploads/seo.png', NULL, NULL),
(9, 'Sales', '/uploads/sales.png', NULL, NULL),
(10, 'IT Support', '/uploads/it_support.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tech Innovations Ltd', 1, NULL, NULL),
(2, 'Green Solutions Inc', 1, NULL, NULL),
(3, 'Creative Designs Co', 1, NULL, NULL),
(4, 'IT Support Co.', 1, NULL, NULL),
(5, 'SEO Masters', 1, NULL, NULL),
(6, 'Sales Experts', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_review`
--

CREATE TABLE `company_review` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bagerhat', NULL, NULL),
(2, 'Bandarban', NULL, NULL),
(3, 'Barguna', NULL, NULL),
(4, 'Barisal', NULL, NULL),
(5, 'Bhola', NULL, NULL),
(6, 'Bogura', NULL, NULL),
(7, 'Brahmanbaria', NULL, NULL),
(8, 'Chandpur', NULL, NULL),
(9, 'Chapai Nawabganj', NULL, NULL),
(10, 'Chattogram', NULL, NULL),
(11, 'Chuadanga', NULL, NULL),
(12, 'Cox\'s Bazar', NULL, NULL),
(13, 'Cumilla', NULL, NULL),
(14, 'Dhaka', NULL, NULL),
(15, 'Dinajpur', NULL, NULL),
(16, 'Faridpur', NULL, NULL),
(17, 'Feni', NULL, NULL),
(18, 'Gaibandha', NULL, NULL),
(19, 'Gazipur', NULL, NULL),
(20, 'Gopalganj', NULL, NULL),
(21, 'Habiganj', NULL, NULL),
(22, 'Jamalpur', NULL, NULL),
(23, 'Jashore', NULL, NULL),
(24, 'Jhalokathi', NULL, NULL),
(25, 'Jhenaidah', NULL, NULL),
(26, 'Joypurhat', NULL, NULL),
(27, 'Khagrachari', NULL, NULL),
(28, 'Khulna', NULL, NULL),
(29, 'Kishoreganj', NULL, NULL),
(30, 'Kurigram', NULL, NULL),
(31, 'Kushtia', NULL, NULL),
(32, 'Lakshmipur', NULL, NULL),
(33, 'Lalmonirhat', NULL, NULL),
(34, 'Madaripur', NULL, NULL),
(35, 'Magura', NULL, NULL),
(36, 'Manikganj', NULL, NULL),
(37, 'Meherpur', NULL, NULL),
(38, 'Moulvibazar', NULL, NULL),
(39, 'Munshiganj', NULL, NULL),
(40, 'Mymensingh', NULL, NULL),
(41, 'Naogaon', NULL, NULL),
(42, 'Narail', NULL, NULL),
(43, 'Narayanganj', NULL, NULL),
(44, 'Narsingdi', NULL, NULL),
(45, 'Natore', NULL, NULL),
(46, 'Netrokona', NULL, NULL),
(47, 'Nilphamari', NULL, NULL),
(48, 'Noakhali', NULL, NULL),
(49, 'Pabna', NULL, NULL),
(50, 'Panchagarh', NULL, NULL),
(51, 'Patuakhali', NULL, NULL),
(52, 'Pirojpur', NULL, NULL),
(53, 'Rajbari', NULL, NULL),
(54, 'Rajshahi', NULL, NULL),
(55, 'Rangamati', NULL, NULL),
(56, 'Rangpur', NULL, NULL),
(57, 'Satkhira', NULL, NULL),
(58, 'Shariatpur', NULL, NULL),
(59, 'Sherpur', NULL, NULL),
(60, 'Sirajganj', NULL, NULL),
(61, 'Sunamganj', NULL, NULL),
(62, 'Sylhet', NULL, NULL),
(63, 'Tangail', NULL, NULL),
(64, 'Thakurgaon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontendmanages`
--

CREATE TABLE `frontendmanages` (
  `id` bigint UNSIGNED NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontendmanages`
--

INSERT INTO `frontendmanages` (`id`, `location`, `email`, `phone`, `map`, `facebook`, `youtube`, `linkedin`, `twitter`, `image`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, '631/5, TMSS Bhaban (5th floor), West Kazilpara, Mirpur-10, Dhaka-1216, Dhaka, Bangladesh', 'admin@tmss-ict.com', '018933******', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d467269.85203977005!2d90.371239!3d23.799186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d20d6ab031%3A0x9b156afb312d6fba!2sTMSS%20Head%20Office!5e0!3m2!1sen!2sus!4v1726932213993!5m2!1sen!2sus', 'https://www.facebook.com/tmssictdomain', 'https://www.youtube.com/@tmssict7109', 'https://bd.linkedin.com/in/tmssict', 'https://bd/in/tmssict', '/uploads/Screenshot from 2024-09-30 21-57-42.png', 'We Help To Get The Best Job And Find A Talent', 'At Job Portal, we specialize in connecting individuals with their ideal job opportunities and helping organizations find exceptional talent. Our dedicated team leverages industry insights, personalized coaching, and a vast network to ensure that job seekers not only find roles that align with their skills and passions but also thrive in their careers.Talent Sourcing and Screening Comprehensive Recruitment Solutions Employer Branding Services', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frontend_static_contents`
--

CREATE TABLE `frontend_static_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frontend_static_contents`
--

INSERT INTO `frontend_static_contents` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'newsletter', 'Here\'s an improved footer design for your Vue.js application that maintains functionality while enhancing the visual appeal. This design focuses on a cleaner layout, responsive styling, and better alignment for the various sections', NULL, '2024-10-30 22:55:00'),
(2, 'contlocation', '631/5, TMSS Bhaban (5th floor), West Kazilpara, Mirpur-10, Dhaka-1216, Dhaka, Bangladesh', NULL, NULL),
(3, 'contemail', 'jobportal@gmail.com', NULL, NULL),
(4, 'contphone', '0189333*****', NULL, NULL),
(5, 'contmap', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d467269.85203977005!2d90.371239!3d23.799186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d20d6ab031%\n                3A0x9b156afb312d6fba!2sTMSS%20Head%20Office!5e0!3m2!1sen!2sus!4v1726932213993!5m2!1sen!2sus', NULL, NULL),
(6, 'aboutTitle', 'We Help To Get The Best Job And Find A Talent', NULL, NULL),
(7, 'aboutDetails', 'At Job Portal, we specialize in connecting individuals with their ideal job \n                opportunities and helping organizations find exceptional talent. Our dedicated team \n                leverages industry insights, personalized coaching, and a vast network to ensure that \n                job seekers not only find roles that align with their skills and passions but also thrive in their careers.Talent\n                 Sourcing and Screening Comprehensive Recruitment Solutions Employer Branding Services', NULL, NULL),
(8, 'aboutimage1', 'https://img.freepik.com/free-vector/man-having-online-job-interview_52683-43379.jpg?t=st=1729759111~exp=1729762711~hmac=a73b8cb191213271c645bf782ee057a9c93324f49ebbdae27b0b172f270306fc&w=740', NULL, NULL),
(9, 'aboutimage2', 'https://img.freepik.com/premium-photo/recruiter-updating-companys-job-portal-highlighting-hiring-process_1266280-82495.jpg?w=1380', NULL, NULL),
(10, 'aboutimage3', 'https://img.freepik.com/premium-photo/3d-job-search-portal-businesses_541443-6867.jpg?w=740', NULL, NULL),
(11, 'aboutimage4', 'https://img.freepik.com/premium-photo/job-search-concept-find-your-career-business-man-looking-online-website_1241984-2900.jpg?w=1380', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interview_schedules`
--

CREATE TABLE `interview_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interview_date` date NOT NULL,
  `interview_time` time NOT NULL,
  `interview_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_post_models`
--

CREATE TABLE `job_post_models` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int NOT NULL,
  `vacancy` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int NOT NULL,
  `date_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `interview_status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_models`
--

INSERT INTO `job_post_models` (`id`, `user_id`, `category_id`, `position`, `company_id`, `vacancy`, `address`, `details`, `image`, `job_type`, `salary`, `date_time`, `status`, `interview_status`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Senior Developer', 1, 5, 'Dhaka', 'Develop high-quality software', '/uploads/dev1.png', '2', 30000, '2024-10-01', 1, 0, NULL, NULL),
(2, '2', 4, 'Junior Developer', 2, 3, 'Chittagong', 'Assist in software development', '/uploads/dev2.png', '1', 20000, '2024-10-02', 1, 0, NULL, NULL),
(3, '3', 3, 'Marketing Manager', 3, 7, 'Sylhet', 'Lead marketing campaigns', '/uploads/marketing1.png', '3', 25000, '2024-10-03', 1, 0, NULL, NULL),
(4, '1', 4, 'Data Analyst', 1, 4, 'Khulna', 'Analyze and interpret data', '/uploads/data1.png', '1', 27000, '2024-10-04', 1, 0, NULL, NULL),
(5, '2', 5, 'Project Manager', 3, 2, 'Rajshahi', 'Oversee project deliverables', '/uploads/project1.png', '2', 40000, '2024-10-05', 1, 0, NULL, NULL),
(6, '3', 6, 'HR Manager', 2, 6, 'Barishal', 'Manage human resources', '/uploads/hr1.png', '3', 35000, '2024-10-06', 1, 0, NULL, NULL),
(7, '1', 4, 'Content Writer', 1, 10, 'Comilla', 'Write and edit content', '/uploads/content1.png', '1', 15000, '2024-10-07', 1, 0, NULL, NULL),
(8, '2', 2, 'Graphic Designer', 3, 8, 'Rangpur', 'Design digital assets', '/uploads/graphic1.png', '2', 22000, '2024-10-08', 1, 0, NULL, NULL),
(9, '3', 4, 'IT Support', 2, 5, 'Gazipur', 'Provide technical support', '/uploads/it1.png', '1', 18000, '2024-10-09', 1, 0, NULL, NULL),
(10, '1', 3, 'Sales Executive', 1, 15, 'Jessore', 'Lead sales initiatives', '/uploads/sales1.png', '2', 20000, '2024-10-10', 1, 0, NULL, NULL),
(11, '2', 3, 'Operations Manager', 2, 3, 'Bogura', 'Manage day-to-day operations', '/uploads/operations1.png', '3', 50000, '2024-10-11', 1, 0, NULL, NULL),
(12, '3', 2, 'UI/UX Designer', 3, 7, 'Narayanganj', 'Design user interfaces and experiences', '/uploads/uiux1.png', '1', 30000, '2024-10-12', 1, 0, NULL, NULL),
(13, '1', 1, 'Backend Developer', 1, 5, 'Barishal', 'Develop and manage backend systems', '/uploads/backend1.png', '2', 35000, '2024-10-13', 1, 0, NULL, NULL),
(14, '2', 3, 'Front-end Developer', 2, 6, 'Mymensingh', 'Create and maintain web interfaces', '/uploads/frontend1.png', '3', 28000, '2024-10-14', 1, 0, NULL, NULL),
(15, '3', 2, 'SEO Specialist', 3, 9, 'Noakhali', 'Optimize websites for search engines', '/uploads/seo1.png', '1', 25000, '2024-10-15', 1, 0, NULL, NULL),
(16, '1', 1, 'System Admin', 2, 4, 'Khulna', 'Manage system infrastructures', '/uploads/sysadmin1.png', '2', 37000, '2024-10-16', 1, 0, NULL, NULL),
(17, '1', 7, 'Content Strategist', 1, 2, 'Dhaka', 'Develop and implement content strategies. Requirements: Excellent writing skills, experience in content marketing, knowledge of SEO.', '/uploads/content_strategist.png', '2', 30000, '2024-10-17', 1, 0, NULL, NULL),
(18, '2', 7, 'Copywriter', 2, 3, 'Chittagong', 'Write clear and persuasive copy for various mediums. Requirements: Strong writing skills, creativity, and attention to detail.', '/uploads/copywriter.png', '1', 25000, '2024-10-18', 1, 0, NULL, NULL),
(19, '3', 7, 'Blog Writer', 3, 4, 'Sylhet', 'Create engaging blog posts on various topics. Requirements: Research skills, ability to write in a conversational tone, and knowledge of blogging best practices.', '/uploads/blog_writer.png', '1', 20000, '2024-10-19', 1, 0, NULL, NULL),
(20, '1', 7, 'Technical Writer', 1, 1, 'Rajshahi', 'Create manuals and documentation for technical products. Requirements: Strong technical knowledge, ability to write clearly, and experience with documentation tools.', '/uploads/technical_writer.png', '2', 32000, '2024-10-20', 1, 0, NULL, NULL),
(21, '2', 8, 'SEO Specialist', 2, 3, 'Chittagong', 'Optimize website for search engines and improve rankings. Requirements: Knowledge of SEO tools, analytical skills, and experience with on-page and off-page SEO.', '/uploads/seo_specialist.png', '1', 25000, '2024-10-21', 1, 0, NULL, NULL),
(22, '3', 8, 'SEO Analyst', 1, 2, 'Dhaka', 'Analyze website data and SEO performance. Requirements: Strong analytical skills, knowledge of Google Analytics, and experience with SEO metrics.', '/uploads/seo_analyst.png', '2', 28000, '2024-10-22', 1, 0, NULL, NULL),
(23, '1', 8, 'Link Building Specialist', 3, 4, 'Sylhet', 'Build and maintain backlinks for better SEO. Requirements: Strong networking skills, experience with link building strategies, and knowledge of SEO tools.', '/uploads/link_building_specialist.png', '1', 23000, '2024-10-23', 1, 0, NULL, NULL),
(24, '2', 8, 'Content SEO Specialist', 2, 1, 'Rajshahi', 'Create SEO-friendly content and improve visibility. Requirements: Strong writing skills, knowledge of SEO principles, and ability to conduct keyword research.', '/uploads/content_seo_specialist.png', '2', 30000, '2024-10-24', 1, 0, NULL, NULL),
(25, '3', 8, 'Local SEO Specialist', 1, 2, 'Khulna', 'Optimize local search rankings for businesses. Requirements: Knowledge of local SEO strategies, experience with Google My Business, and strong communication skills.', '/uploads/local_seo_specialist.png', '1', 27000, '2024-10-25', 1, 0, NULL, NULL),
(26, '1', 9, 'Sales Manager', 1, 5, 'Sylhet', 'Manage the sales team and develop sales strategies. Requirements: Strong leadership skills, experience in sales management, and excellent communication abilities.', '/uploads/sales_manager.png', '2', 40000, '2024-10-26', 1, 0, NULL, NULL),
(27, '2', 9, 'Sales Executive', 2, 3, 'Dhaka', 'Generate leads and close sales. Requirements: Excellent communication skills, proven sales experience, and ability to work independently.', '/uploads/sales_executive.png', '1', 22000, '2024-10-27', 1, 0, NULL, NULL),
(28, '3', 9, 'Sales Coordinator', 3, 2, 'Chittagong', 'Coordinate sales activities and support the sales team. Requirements: Strong organizational skills, experience in sales support, and ability to multitask.', '/uploads/sales_coordinator.png', '2', 24000, '2024-10-28', 1, 0, NULL, NULL),
(29, '1', 10, 'IT Technician', 4, 6, 'Rajshahi', 'Provide technical support and troubleshooting. Requirements: Knowledge of hardware and software troubleshooting, excellent communication skills, and relevant certifications.', '/uploads/it_technician.png', '1', 22000, '2024-10-29', 1, 0, NULL, NULL),
(30, '2', 10, 'Help Desk Support', 5, 4, 'Khulna', 'Assist users with technical issues and provide solutions. Requirements: Strong problem-solving skills, customer service experience, and knowledge of IT systems.', '/uploads/help_desk_support.png', '2', 20000, '2024-10-30', 1, 0, NULL, NULL),
(31, '3', 10, 'System Administrator', 6, 3, 'Chittagong', 'Ensure system availability and security. Requirements: Strong knowledge of system administration, troubleshooting skills, and relevant certifications.', '/uploads/system_administrator.png', '1', 30000, '2024-11-01', 1, 0, NULL, NULL),
(32, '2', 10, 'Technical Support Engineer', 4, 2, 'Rajshahi', 'Provide technical assistance and support to customers. Requirements: Excellent communication skills, experience in technical support, and ability to work under pressure.', '/uploads/technical_support_engineer.png', '2', 25000, '2024-11-02', 1, 0, NULL, NULL),
(33, '3', 10, 'IT Support Specialist', 6, 1, 'Sylhet', 'Assist in IT-related issues and support. Requirements: Strong technical knowledge, customer service skills, and relevant experience.', '/uploads/it_support_specialist.png', '1', 27000, '2024-11-03', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_id` int NOT NULL,
  `sender_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` int NOT NULL,
  `receiver_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2024_10_21_055111_create_frontendmanages_table', 1),
(64, '2014_10_12_000000_create_users_table', 2),
(65, '2014_10_12_100000_create_password_resets_table', 2),
(66, '2019_08_19_000000_create_failed_jobs_table', 2),
(67, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(68, '2024_09_23_041040_create_categories_table', 2),
(69, '2024_09_23_041213_create_companies_table', 2),
(70, '2024_09_23_162757_create_files_table', 2),
(71, '2024_09_24_041653_create_job_post_models_table', 2),
(72, '2024_09_24_052627_create_blogs_table', 2),
(73, '2024_09_29_051124_create_employer_table', 2),
(74, '2024_09_29_051831_create_company_review_table', 2),
(75, '2024_09_29_051949_create_interview_schedules_table', 2),
(76, '2024_10_01_160143_create_contacts_table', 2),
(77, '2024_10_03_043604_create_applications_table', 2),
(78, '2024_10_04_034035_create_roles_table', 2),
(79, '2024_10_04_034056_create_modules_table', 2),
(80, '2024_10_04_034122_create_permissions_table', 2),
(81, '2024_10_04_034134_create_role_permissions_table', 2),
(82, '2024_10_04_034152_create_role_modules_table', 2),
(83, '2024_10_05_115712_create_districts_table', 2),
(84, '2024_10_06_063236_create_blog_comments_table', 2),
(85, '2024_10_15_035032_create_partnerships_table', 2),
(86, '2024_10_15_084042_create_saved_jobs_table', 2),
(87, '2024_10_16_180625_create_seekers_table', 2),
(88, '2024_10_22_065831_create_newsletters_table', 2),
(89, '2024_10_22_074901_create_jobs_table', 2),
(90, '2024_10_24_060304_create_sliders_table', 2),
(91, '2024_10_24_112117_create_settings_table', 2),
(92, '2024_10_27_094741_create_messages_table', 2),
(93, '2024_10_31_045040_create_frontendmanages_table', 2),
(94, '2024_10_31_045338_create_frontend_static_contents_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `parent_id`, `link`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Job', '0', '#', 'fas fa-briefcase', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(2, 'Job Category', '1', '/admin/jobcategory/category', 'fas fa-folder', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(3, 'Company', '1', '/admin/jobcategory/company', 'fas fa-building', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(4, 'Job Post', '1', '/admin/jobcategory/joblist', 'fas fa-file-alt', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(5, 'Blog', '0', '#', 'fas fa-newspaper', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(6, 'Blog Post', '5', '/admin/blog/blogpost', 'fas fa-pen', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(7, 'Blog Comment', '5', '/admin/blog/blogcomment', 'fas fa-pen', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(8, 'Applicant Information', '0', '#', 'fas fa-file-alt', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(9, 'Application', '8', '/admin/seeker/application', 'fas fa-pen', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(10, 'Interview', '0', '#', 'fas fa-file-alt', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(11, 'Interview Schedules', '10', '/admin/interview', 'fas fa-pen', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(12, 'RolePermission', '0', '#', 'fas fa-file-alt', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(13, 'Role User Management', '12', '/admin/role/rolepermissions', 'fas fa-users', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(14, 'User', '12', '/admin/user/registration', 'fas fa-users', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(15, 'Role', '12', '/admin/role/role', 'fas fa-user-shield', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(16, 'Role Permission', '12', '/admin/role/permissions', 'fas fa-lock', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(17, 'Visitor', '0', '#', 'fas fa-user', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(18, 'NewsLetter', '17', '/admin/visitor/newsletter', 'fas fa-newspaper', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(19, 'Subscriber Mails', '17', '/admin/subscribe/emails', 'fas fa-envelope', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(20, 'Contact', '17', '/admin/visitor/contact', 'fas fa-address-book', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(21, 'Support', '17', '/admin/seeker/messagetable', 'fas fa-headset', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(22, 'Partnerships', '0', '#', 'fas fa-handshake', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(23, 'Collaboartions', '22', '/admin/client/partnership', 'fas fa-users', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(24, 'Employee', '0', '#', 'fas fa-user', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(25, 'Employee List', '24', '/admin/employer/employerlist', 'fas fa-users', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(26, 'Frontend Manage', '0', '#', 'fas fa-desktop', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(27, 'Frontend Management', '26', '/admin/frontend/manage', 'fas fa-tasks', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(28, 'Slider', '26', '/admin/frontend/slider', 'fas fa-sliders-h', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(29, 'Configuration', '0', '#', 'fas fa-cogs', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(30, 'Setting', '29', '/admin/soft/setting', 'fas fa-cog', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `Url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partnerships`
--

CREATE TABLE `partnerships` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weblink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `module_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'job.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(2, '1', 'job.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(3, '1', 'job.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(4, '1', 'job.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(5, '1', 'job.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(6, '1', 'job.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(7, '1', 'job.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(8, '2', 'categories.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(9, '2', 'categories.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(10, '2', 'categories.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(11, '2', 'categories.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(12, '2', 'categories.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(13, '2', 'categories.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(14, '2', 'categories.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(15, '3', 'company.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(16, '3', 'company.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(17, '3', 'company.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(18, '3', 'company.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(19, '3', 'company.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(20, '3', 'company.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(21, '3', 'company.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(22, '4', 'joblist.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(23, '4', 'joblist.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(24, '4', 'joblist.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(25, '4', 'joblist.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(26, '4', 'joblist.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(27, '4', 'joblist.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(28, '4', 'joblist.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(29, '5', 'blog.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(30, '5', 'blog.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(31, '5', 'blog.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(32, '5', 'blog.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(33, '5', 'blog.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(34, '5', 'blog.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(35, '5', 'blog.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(36, '6', 'blogpost.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(37, '6', 'blogpost.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(38, '6', 'blogpost.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(39, '6', 'blogpost.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(40, '6', 'blogpost.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(41, '6', 'blogpost.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(42, '6', 'blogpost.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(43, '7', 'blogcomment.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(44, '7', 'blogcomment.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(45, '7', 'blogcomment.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(46, '7', 'blogcomment.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(47, '7', 'blogcomment.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(48, '7', 'blogcomment.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(49, '7', 'blogcomment.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(50, '8', 'apply.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(51, '8', 'apply.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(52, '8', 'apply.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(53, '8', 'apply.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(54, '8', 'apply.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(55, '8', 'apply.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(56, '8', 'apply.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(57, '9', 'application.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(58, '9', 'application.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(59, '9', 'application.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(60, '9', 'application.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(61, '9', 'application.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(62, '9', 'application.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(63, '9', 'application.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(64, '10', 'interview.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(65, '10', 'interview.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(66, '10', 'interview.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(67, '10', 'interview.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(68, '10', 'interview.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(69, '10', 'interview.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(70, '10', 'interview.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(71, '11', 'interview.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(72, '11', 'interview.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(73, '11', 'interview.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(74, '11', 'interview.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(75, '11', 'interview.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(76, '11', 'interview.update', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(77, '11', 'interview.destroy', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(78, '12', 'rolepermission.index', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(79, '12', 'rolepermission.store', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(80, '12', 'rolepermission.show', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(81, '12', 'rolepermission.create', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(82, '12', 'rolepermission.edit', 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(83, '12', 'rolepermission.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(84, '12', 'rolepermission.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(85, '13', 'roleusermanagement.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(86, '13', 'roleusermanagement.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(87, '13', 'roleusermanagement.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(88, '13', 'roleusermanagement.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(89, '13', 'roleusermanagement.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(90, '13', 'roleusermanagement.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(91, '13', 'roleusermanagement.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(92, '14', 'users.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(93, '14', 'users.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(94, '14', 'users.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(95, '14', 'users.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(96, '14', 'users.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(97, '14', 'users.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(98, '14', 'users.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(99, '15', 'roles.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(100, '15', 'roles.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(101, '15', 'roles.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(102, '15', 'roles.getRolePermissions', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(103, '15', 'roles.updateRolePermissions', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(104, '15', 'roles.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(105, '15', 'roles.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(106, '16', 'permissions.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(107, '16', 'permissions.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(108, '16', 'permissions.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(109, '16', 'permissions.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(110, '16', 'permissions.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(111, '16', 'permissions.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(112, '16', 'permissions.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(113, '17', 'visitor.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(114, '17', 'visitor.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(115, '17', 'visitor.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(116, '17', 'visitor.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(117, '17', 'visitor.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(118, '17', 'visitor.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(119, '17', 'visitor.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(120, '18', 'newsletter.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(121, '18', 'newsletter.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(122, '18', 'newsletter.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(123, '18', 'newsletter.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(124, '18', 'newsletter.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(125, '18', 'newsletter.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(126, '18', 'newsletter.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(127, '19', 'sendMail.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(128, '19', 'sendMail.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(129, '19', 'sendMail.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(130, '19', 'sendMail.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(131, '19', 'sendMail.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(132, '19', 'sendMail.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(133, '19', 'sendMail.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(134, '20', 'contact.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(135, '20', 'contact.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(136, '20', 'contact.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(137, '20', 'contact.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(138, '20', 'contact.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(139, '20', 'contact.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(140, '20', 'contact.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(141, '21', 'messages.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(142, '21', 'messages.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(143, '21', 'messages.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(144, '21', 'messages.getMessagesByReceiver', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(145, '21', 'messages.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(146, '21', 'messages.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(147, '21', 'messages.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(148, '22', 'client.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(149, '22', 'client.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(150, '22', 'client.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(151, '22', 'client.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(152, '22', 'client.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(153, '22', 'client.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(154, '22', 'client.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(155, '23', 'partnership.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(156, '23', 'partnership.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(157, '23', 'partnership.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(158, '23', 'partnership.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(159, '23', 'partnership.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(160, '23', 'partnership.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(161, '23', 'partnership.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(162, '24', 'employee.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(163, '24', 'employee.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(164, '24', 'employee.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(165, '24', 'employee.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(166, '24', 'employee.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(167, '24', 'employee.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(168, '24', 'employee.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(169, '25', 'employer.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(170, '25', 'employer.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(171, '25', 'employer.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(172, '25', 'employer.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(173, '25', 'employer.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(174, '25', 'employer.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(175, '25', 'employer.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(176, '26', 'frontendmanage.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(177, '26', 'frontendmanage.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(178, '26', 'frontendmanage.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(179, '26', 'frontendmanage.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(180, '26', 'frontendmanage.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(181, '26', 'frontendmanage.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(182, '26', 'frontendmanage.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(183, '27', 'frontmanage.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(184, '27', 'frontmanage.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(185, '27', 'frontmanage.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(186, '27', 'frontmanage.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(187, '27', 'frontmanage.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(188, '27', 'frontmanage.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(189, '27', 'frontmanage.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(190, '28', 'slider.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(191, '28', 'slider.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(192, '28', 'slider.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(193, '28', 'slider.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(194, '28', 'slider.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(195, '28', 'slider.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(196, '28', 'slider.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(197, '29', 'config.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(198, '29', 'config.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(199, '29', 'config.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(200, '29', 'config.create', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(201, '29', 'config.edit', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(202, '29', 'config.update', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(203, '29', 'config.destroy', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(204, '30', 'setting.index', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(205, '30', 'setting.store', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(206, '30', 'setting.show', 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(207, '30', 'setting.create', 1, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(208, '30', 'setting.edit', 1, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(209, '30', 'setting.update', 1, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(210, '30', 'setting.destroy', 1, '2024-10-30 22:54:49', '2024-10-30 22:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Seeker', 1, 'Seeker Token', '35f927b02e4771e2229bd13fcbd1d1d128a2e0ffd6ef5af9f0ee19c938105424', '[\"*\"]', NULL, NULL, '2024-10-30 22:55:29', '2024-10-30 22:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, NULL, NULL),
(2, 'Admin', 1, NULL, NULL),
(3, 'Editor', 1, NULL, NULL),
(4, 'Employer', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE `role_modules` (
  `id` bigint UNSIGNED NOT NULL,
  `module_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`id`, `module_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(2, 2, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(3, 3, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(4, 4, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(5, 5, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(6, 6, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(7, 7, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(8, 8, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(9, 9, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(10, 10, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(11, 11, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(12, 12, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(13, 13, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(14, 14, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(15, 15, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(16, 16, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(17, 17, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(18, 18, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(19, 19, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(20, 20, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(21, 21, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(22, 22, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(23, 23, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(24, 24, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(25, 25, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(26, 26, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(27, 27, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(28, 28, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(29, 29, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(30, 30, 1, '2024-10-30 22:54:48', '2024-10-30 22:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(2, 1, 2, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(3, 1, 3, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(4, 1, 4, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(5, 1, 5, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(6, 1, 6, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(7, 1, 7, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(8, 1, 8, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(9, 1, 9, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(10, 1, 10, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(11, 1, 11, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(12, 1, 12, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(13, 1, 13, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(14, 1, 14, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(15, 1, 15, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(16, 1, 16, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(17, 1, 17, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(18, 1, 18, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(19, 1, 19, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(20, 1, 20, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(21, 1, 21, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(22, 1, 22, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(23, 1, 23, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(24, 1, 24, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(25, 1, 25, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(26, 1, 26, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(27, 1, 27, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(28, 1, 28, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(29, 1, 29, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(30, 1, 30, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(31, 1, 31, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(32, 1, 32, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(33, 1, 33, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(34, 1, 34, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(35, 1, 35, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(36, 1, 36, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(37, 1, 37, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(38, 1, 38, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(39, 1, 39, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(40, 1, 40, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(41, 1, 41, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(42, 1, 42, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(43, 1, 43, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(44, 1, 44, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(45, 1, 45, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(46, 1, 46, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(47, 1, 47, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(48, 1, 48, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(49, 1, 49, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(50, 1, 50, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(51, 1, 51, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(52, 1, 52, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(53, 1, 53, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(54, 1, 54, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(55, 1, 55, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(56, 1, 56, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(57, 1, 57, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(58, 1, 58, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(59, 1, 59, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(60, 1, 60, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(61, 1, 61, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(62, 1, 62, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(63, 1, 63, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(64, 1, 64, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(65, 1, 65, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(66, 1, 66, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(67, 1, 67, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(68, 1, 68, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(69, 1, 69, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(70, 1, 70, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(71, 1, 71, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(72, 1, 72, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(73, 1, 73, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(74, 1, 74, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(75, 1, 75, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(76, 1, 76, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(77, 1, 77, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(78, 1, 78, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(79, 1, 79, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(80, 1, 80, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(81, 1, 81, '2024-10-30 22:54:47', '2024-10-30 22:54:47'),
(82, 1, 82, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(83, 1, 83, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(84, 1, 84, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(85, 1, 85, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(86, 1, 86, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(87, 1, 87, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(88, 1, 88, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(89, 1, 89, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(90, 1, 90, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(91, 1, 91, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(92, 1, 92, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(93, 1, 93, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(94, 1, 94, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(95, 1, 95, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(96, 1, 96, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(97, 1, 97, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(98, 1, 98, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(99, 1, 99, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(100, 1, 100, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(101, 1, 101, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(102, 1, 102, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(103, 1, 103, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(104, 1, 104, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(105, 1, 105, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(106, 1, 106, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(107, 1, 107, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(108, 1, 108, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(109, 1, 109, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(110, 1, 110, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(111, 1, 111, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(112, 1, 112, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(113, 1, 113, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(114, 1, 114, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(115, 1, 115, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(116, 1, 116, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(117, 1, 117, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(118, 1, 118, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(119, 1, 119, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(120, 1, 120, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(121, 1, 121, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(122, 1, 122, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(123, 1, 123, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(124, 1, 124, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(125, 1, 125, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(126, 1, 126, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(127, 1, 127, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(128, 1, 128, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(129, 1, 129, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(130, 1, 130, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(131, 1, 131, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(132, 1, 132, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(133, 1, 133, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(134, 1, 134, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(135, 1, 135, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(136, 1, 136, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(137, 1, 137, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(138, 1, 138, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(139, 1, 139, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(140, 1, 140, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(141, 1, 141, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(142, 1, 142, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(143, 1, 143, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(144, 1, 144, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(145, 1, 145, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(146, 1, 146, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(147, 1, 147, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(148, 1, 148, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(149, 1, 149, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(150, 1, 150, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(151, 1, 151, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(152, 1, 152, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(153, 1, 153, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(154, 1, 154, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(155, 1, 155, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(156, 1, 156, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(157, 1, 157, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(158, 1, 158, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(159, 1, 159, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(160, 1, 160, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(161, 1, 161, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(162, 1, 162, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(163, 1, 163, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(164, 1, 164, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(165, 1, 165, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(166, 1, 166, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(167, 1, 167, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(168, 1, 168, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(169, 1, 169, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(170, 1, 170, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(171, 1, 171, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(172, 1, 172, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(173, 1, 173, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(174, 1, 174, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(175, 1, 175, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(176, 1, 176, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(177, 1, 177, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(178, 1, 178, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(179, 1, 179, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(180, 1, 180, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(181, 1, 181, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(182, 1, 182, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(183, 1, 183, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(184, 1, 184, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(185, 1, 185, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(186, 1, 186, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(187, 1, 187, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(188, 1, 188, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(189, 1, 189, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(190, 1, 190, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(191, 1, 191, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(192, 1, 192, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(193, 1, 193, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(194, 1, 194, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(195, 1, 195, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(196, 1, 196, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(197, 1, 197, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(198, 1, 198, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(199, 1, 199, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(200, 1, 200, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(201, 1, 201, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(202, 1, 202, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(203, 1, 203, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(204, 1, 204, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(205, 1, 205, '2024-10-30 22:54:48', '2024-10-30 22:54:48'),
(206, 1, 206, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(207, 1, 207, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(208, 1, 208, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(209, 1, 209, '2024-10-30 22:54:49', '2024-10-30 22:54:49'),
(210, 1, 210, '2024-10-30 22:54:49', '2024-10-30 22:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `seeker_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seekers`
--

CREATE TABLE `seekers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seekers`
--

INSERT INTO `seekers` (`id`, `name`, `email`, `education`, `experience`, `skills`, `password`, `phone`, `address`, `bio`, `image`, `created_at`, `updated_at`) VALUES
(1, 'shimon', 'jibon@gmail.com', NULL, NULL, NULL, '$2y$10$HMsYtm.J8g.OEkCVVQ0pDumZksWRIl7ULy/SyPKogZzjT4.K74c9G', NULL, NULL, NULL, NULL, '2024-10-30 22:55:25', '2024-10-30 22:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'softlogo', '/uploads/imgpsh_fullsize_anim.png', NULL, NULL),
(2, 'APP_NAME', 'Job Portal', NULL, NULL),
(3, 'MAIL_MAILER', 'smtp', NULL, NULL),
(4, 'MAIL_HOST', 'smtp.gmail.com', NULL, NULL),
(5, 'MAIL_PORT', '587', NULL, NULL),
(6, 'MAIL_USERNAME', 'smshimonahamed06@gmail.com', NULL, NULL),
(7, 'MAIL_PASSWORD', 'rlqtikplmixzjupd', NULL, NULL),
(8, 'MAIL_ENCRYPTION', 'tls', NULL, NULL),
(9, 'MAIL_FROM_ADDRESS', 'smshimonahamed06@gmail.com', NULL, NULL),
(10, 'jobPost', '1', NULL, NULL),
(11, 'blogPost', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slide_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `company_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', 1, '1', NULL, '$2y$10$eiP4TlmBYTYKYOVgpEln1eQE6IzfgR8TUrPdInEa0X2lk5t3d48zW', NULL, NULL, '2024-10-30 22:54:47'),
(2, 'Admin', 'admin@gmail.com', 2, '1', NULL, '$2y$10$d9V72QUp26dqu3y/nN6EGObI6Z2VH36lgnIf3/oD3biDbqrzfU92O', NULL, NULL, NULL),
(3, 'Mohon Sarker', 'mohon@gmail.com', 1, '1', NULL, '$2y$10$pOShQkSbc3Scg9tuYLli5OCfGR56i7/ww/kqdwgKPxIY04O62MgZ.', NULL, NULL, NULL),
(4, 'Rabby Hasan', 'rabby@gmail.com', 1, '1', NULL, '$2y$10$kSCv7fkbFXCX53ZB0f0.NOMtti7cxaH7aIBeLMClqBy/yzicfRUfG', NULL, NULL, NULL),
(5, ' Jibon Ahamed', 'jibon@gmail.com', 1, '1', NULL, '$2y$10$hO.r1.wPKL39oiMh7NC95.cQ6d/Rs1roWQbD3dLE5ZygZEuUa.pHy', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_review`
--
ALTER TABLE `company_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontendmanages`
--
ALTER TABLE `frontendmanages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_static_contents`
--
ALTER TABLE `frontend_static_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `frontend_static_contents_key_unique` (`key`);

--
-- Indexes for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_post_models`
--
ALTER TABLE `job_post_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `partnerships`
--
ALTER TABLE `partnerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekers`
--
ALTER TABLE `seekers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seekers_email_unique` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_review`
--
ALTER TABLE `company_review`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontendmanages`
--
ALTER TABLE `frontendmanages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frontend_static_contents`
--
ALTER TABLE `frontend_static_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_post_models`
--
ALTER TABLE `job_post_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partnerships`
--
ALTER TABLE `partnerships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seekers`
--
ALTER TABLE `seekers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
