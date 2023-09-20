-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `place`, `specialization`) VALUES
(1, 'jeeva@admin.com', 'jeevan', 'Jeevan', 'Bengaluru', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `worker_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `worker_id`, `customer_id`, `booking_date`, `status`) VALUES
(42, 154, 2, '2023-08-04', 'Pending'),
(43, 154, 1, '2023-08-04', 'Pending'),
(44, 154, 1, '2023-08-04', 'Pending'),
(45, 59, 1, '2023-08-04', 'Complete'),
(46, 115, 1, '2023-08-04', 'Complete'),
(47, 90, 1, '2023-08-04', 'Complete'),
(48, 63, 1, '2023-08-04', 'Complete'),
(49, 56, 1, '2023-08-05', 'Complete'),
(50, 56, 2, '2023-08-05', 'Accept'),
(51, 95, 1, '2023-08-06', 'Cancel'),
(52, 58, 2, '2023-09-08', 'Accept'),
(53, 61, 2, '2023-09-08', 'Pending'),
(54, 53, 2, '2023-09-08', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `customerid` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `customerid`, `message`) VALUES
(1, NULL, '12 ,not responded'),
(2, NULL, '12 ,not responded'),
(3, 1, '12 ,not responded'),
(4, 1, 'srt'),
(5, 2, 'booking unsuccessful');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone_number`, `date_of_birth`, `address`) VALUES
(1, 'jeevan s', 'jeevan@gmail.com', '8088395224', '2002-03-01', 'nagarbhavi'),
(2, 'kantha', 'kantha@gmail.com', '12345678', '2002-03-01', 'nagarbhavi'),
(3, 'K Santosh', 'santoshkalyankar379@gmail.com', '09902492379', '2023-08-10', 'bengaluru'),
(4, 'Canara bank', 'jeevanchuppi2002@gmail.com', '08951113794', '2023-08-15', 'mysuru'),
(5, 'lokesh', 'lokesh@gmail.com', '1234567', '2023-09-07', 'bengaluru');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `service_cost` decimal(10,2) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `earnings` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone_number`, `date_of_birth`, `gender`, `address`, `service_cost`, `specialization`, `photo`, `earnings`) VALUES
(53, 'Aarav Sharma', 'aarav.sharma@worker.com', '9876543210', '1990-05-15', 'Male', 'HSR Layout', 781.00, 'Carpenter', 'https://media.istockphoto.com/id/1143270524/photo/top-of-view-vintage-carpenter-tools-in-a-carpentry-workshop.jpg?s=612x612&w=0&k=20&c=Umlxkm0lOkK-SLz7D5timYc-LlCeV_mhVCSLBBGIQhE=', 0.00),
(54, 'Vivaan Singh', 'vivaan.singh@worker.com', '8765432109', '1992-08-23', 'Male', 'Koramangala', 854.00, 'Barber', 'https://media.istockphoto.com/id/1182857439/photo/various-hair-dresser-tools.jpg?s=612x612&w=0&k=20&c=dueu9lDWgI4Z92OEFF4tJW1iRoGEicuGAQH-vJkDKBk=', 0.00),
(55, 'Arjun Gupta', 'arjun.gupta@worker.com', '7654321098', '1991-02-12', 'Male', 'Indiranagar', 927.00, 'Plumber', 'https://media.istockphoto.com/id/504899590/photo/work-tool-with-plan.jpg?s=1024x1024&w=is&k=20&c=GCtIwTURwLNvIE-Dbtyd0Khc3-aG7jrsIBWfVxSuJoU=', 0.00),
(56, 'Aditya Patel', 'aditya.patel@worker.com', '6543210987', '1993-04-27', 'Male', 'Whitefield', 572.00, 'Electrician', 'https://media.istockphoto.com/id/612248188/photo/electrical-tools-and-cables-used-in-electrical-installations.jpg?s=612x612&w=0&k=20&c=HZYqsuQOL_ktpejF7-2b4Po43uyuG1VaHJ5eu522R84=', 0.00),
(57, 'Rudra Verma', 'rudra.verma@worker.com', '5432109876', '1995-10-09', 'Male', 'Jayanagar', 579.00, 'Painter', 'https://media.istockphoto.com/id/502281464/photo/decorators-work-table-with-tools.jpg?s=612x612&w=0&k=20&c=EbcdISlitVimhLsIsa6Bp_S7yPxUQh3gQxLRDBKLTRQ=', 0.00),
(58, 'Vihaan Kumar', 'vihaan.kumar@worker.com', '4321098765', '1990-12-18', 'Male', 'Malleswaram', 681.00, 'Gardener', 'https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=', 0.00),
(59, 'Advait Singh', 'advait.singh@worker.com', '3210987654', '1994-06-21', 'Male', 'Marathahalli', 668.00, 'Barber', 'https://media.istockphoto.com/id/1182857439/photo/various-hair-dresser-tools.jpg?s=612x612&w=0&k=20&c=dueu9lDWgI4Z92OEFF4tJW1iRoGEicuGAQH-vJkDKBk=', 0.00),
(60, 'Kabir Sharma', 'kabir.sharma@worker.com', '2109876543', '1993-03-06', 'Male', 'JP Nagar', 796.00, 'Carpenter', 'https://media.istockphoto.com/id/1143270524/photo/top-of-view-vintage-carpenter-tools-in-a-carpentry-workshop.jpg?s=612x612&w=0&k=20&c=Umlxkm0lOkK-SLz7D5timYc-LlCeV_mhVCSLBBGIQhE=', 0.00),
(61, 'Arnav Kapoor', 'arnav.kapoor@worker.com', '1098765432', '1991-07-14', 'Male', 'BTM Layout', 976.00, 'Plumber', 'https://media.istockphoto.com/id/504899590/photo/work-tool-with-plan.jpg?s=1024x1024&w=is&k=20&c=GCtIwTURwLNvIE-Dbtyd0Khc3-aG7jrsIBWfVxSuJoU=', 0.00),
(62, 'Aryan Singh', 'aryan.singh@worker.com', '9876543210', '1990-05-15', 'Male', 'Bellandur', 991.00, 'Electrician', 'https://media.istockphoto.com/id/612248188/photo/electrical-tools-and-cables-used-in-electrical-installations.jpg?s=612x612&w=0&k=20&c=HZYqsuQOL_ktpejF7-2b4Po43uyuG1VaHJ5eu522R84=', 0.00),
(63, 'chandan', 'chandan@worker.com', '1234567890', '2002-05-01', NULL, 'jayanagar', 1000.00, 'Electrician', 'https://media.istockphoto.com/id/612248188/photo/electrical-tools-and-cables-used-in-electrical-installations.jpg?s=612x612&w=0&k=20&c=HZYqsuQOL_ktpejF7-2b4Po43uyuG1VaHJ5eu522R84=', 0.00),
(71, 'abhi', 'abhi@worker.com', '123478911', '2023-07-08', NULL, 'Mallathalli', 1000.00, 'Gardener', 'https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=', 0.00),
(72, 'jaga', 'jaga@worker.com', '123498653', '2023-08-12', NULL, 'bengaluru', 1000.00, 'Gardener', 'https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=', 0.00),
(73, 'Reyansh Singh', 'reyansh.singh@worker.com', '9876543271', '1992-04-15', 'Male', 'Malleswaram, Bangalore', 572.00, 'Gardener', 'https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=', 0.00),
(74, 'Rohan Gupta', 'rohan.gupta@worker.com', '9876543272', '1993-06-08', 'Male', 'JP Nagar, Bangalore', 572.00, 'Gardener', 'https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=', 0.00),
(75, 'Aarush Patel', 'aarush.patel@worker.com', '9876543273', '1994-09-20', 'Male', 'Indiranagar, Bangalore', 572.00, 'Gardener', 'https://media.istockphoto.com/id/1128479561/photo/various-gardening-tools-in-the-garden.jpg?s=612x612&w=0&k=20&c=jNSt9dIpMuJeq-auFZnt6deeQW7wNOsuRLmOFzzCTEE=', 0.00),
(76, 'Vivaan Verma', 'vivaan.verma@worker.com', '9876543274', '1995-10-09', 'Male', 'Jayanagar, Bangalore', 599.00, 'House Cleaner', 'https://media.istockphoto.com/id/654153664/photo/cleaning-service-sponges-chemicals-and-mop.jpg?s=612x612&w=0&k=20&c=vHQzKbz7L8oEKEp5oQzfx8rwsOMAV3pHTV_1VPZsREA=', 0.00),
(77, 'Advait Kumar', 'advait.kumar@worker.com', '9876543275', '1991-03-21', 'Male', 'BTM Layout, Bangalore', 599.00, 'House Cleaner', 'https://media.istockphoto.com/id/654153664/photo/cleaning-service-sponges-chemicals-and-mop.jpg?s=612x612&w=0&k=20&c=vHQzKbz7L8oEKEp5oQzfx8rwsOMAV3pHTV_1VPZsREA=', 0.00),
(78, 'Kabir Singh', 'kabir.singh@worker.com', '9876543276', '1993-08-17', 'Male', 'Malleswaram, Bangalore', 599.00, 'House Cleaner', 'https://media.istockphoto.com/id/654153664/photo/cleaning-service-sponges-chemicals-and-mop.jpg?s=612x612&w=0&k=20&c=vHQzKbz7L8oEKEp5oQzfx8rwsOMAV3pHTV_1VPZsREA=', 0.00),
(79, 'Arjun Kapoor', 'arjun.kapoor@worker.com', '9876543277', '1990-11-27', 'Male', 'Indiranagar, Bangalore', 615.00, 'Handyman', 'https://media.istockphoto.com/id/1437985539/photo/man-in-apron-and-gloves-holds-cordless-screwdriver-on-white-background.jpg?s=612x612&w=0&k=20&c=aRQt62kFA5inAg-NwYUj1tPIzDBS0X4bI-hY9r8dyPE=', 0.00),
(80, 'Aarush Sharma', 'aarush.sharma@worker.com', '9876543278', '1992-02-04', 'Male', 'JP Nagar, Bangalore', 615.00, 'Handyman', 'https://media.istockphoto.com/id/1437985539/photo/man-in-apron-and-gloves-holds-cordless-screwdriver-on-white-background.jpg?s=612x612&w=0&k=20&c=aRQt62kFA5inAg-NwYUj1tPIzDBS0X4bI-hY9r8dyPE=', 0.00),
(82, 'Rudra Gupta', 'rudra.gupta@worker.com', '9876543280', '1994-07-24', 'Male', 'Marathahalli, Bangalore', 730.00, 'HVAC Technician', 'https://media.istockphoto.com/id/929901516/photo/tool-for-air-conditioner-maintenance.jpg?s=612x612&w=0&k=20&c=TnYVHSvBYfLYgEee2CO0NAfj8wF2jOQCA_IRHswHrJk=', 0.00),
(83, 'Aryan Verma', 'aryan.verma@worker.com', '9876543281', '1995-02-16', 'Male', 'Indiranagar, Bangalore', 730.00, 'HVAC Technician', 'https://media.istockphoto.com/id/929901516/photo/tool-for-air-conditioner-maintenance.jpg?s=612x612&w=0&k=20&c=TnYVHSvBYfLYgEee2CO0NAfj8wF2jOQCA_IRHswHrJk=', 0.00),
(84, 'Vihaan Singh', 'vihaan.singh@worker.com', '9876543282', '1991-09-19', 'Male', 'BTM Layout, Bangalore', 730.00, 'HVAC Technician', 'https://media.istockphoto.com/id/929901516/photo/tool-for-air-conditioner-maintenance.jpg?s=612x612&w=0&k=20&c=TnYVHSvBYfLYgEee2CO0NAfj8wF2jOQCA_IRHswHrJk=', 0.00),
(86, 'Aarav Singh', 'aarav.singh@worker.com', '9876543284', '1993-11-27', 'Male', 'JP Nagar, Bangalore', 680.00, 'Roofing Contractor', 'https://media.istockphoto.com/id/1175090625/photo/roof-repair-construction-worker-roofer-man-roofing-security-rope.jpg?s=612x612&w=0&k=20&c=SclRJKkVmGqOZR0jSI7C82nco2QFXWxTGNQ-MCRyVmU=', 0.00),
(89, 'Aadi Kumar', 'aadi.kumar@worker.com', '9876543287', '1990-07-02', 'Male', 'Indiranagar, Bangalore', 625.00, 'Pest Control Services', 'https://media.istockphoto.com/id/1351445474/photo/worker-spraying-pesticide-onto-green-bush-outdoors-closeup-pest-control.jpg?s=612x612&w=0&k=20&c=Qja4e6kFoxsXqQi4DE-xQKwumVrGMVKds_OuKFu452A=', 0.00),
(90, 'Vihaan Sharma', 'vihaan.sharma@worker.com', '9876543288', '1992-12-24', 'Male', 'BTM Layout, Bangalore', 625.00, 'Pest Control Services', 'https://media.istockphoto.com/id/1351445474/photo/worker-spraying-pesticide-onto-green-bush-outdoors-closeup-pest-control.jpg?s=612x612&w=0&k=20&c=Qja4e6kFoxsXqQi4DE-xQKwumVrGMVKds_OuKFu452A=', 0.00),
(95, 'Aarush Singh', 'aarush.singh@worker.com', '9876543293', '1991-08-27', 'Male', 'Indiranagar, Bangalore', 637.00, 'Appliance Repair Technician', 'https://media.istockphoto.com/id/1025966854/photo/set-of-household-kitchen-technics-on-yellow-background-set-of-appliance-in-the-new.jpg?s=612x612&w=0&k=20&c=blrExWEZ0AtRFbgh4aKiU5PRtk2GodrYQ499wqQfDug=', 0.00),
(96, 'Rudra Singh', 'rudra.singh@worker.com', '9876543294', '1992-01-09', 'Male', 'BTM Layout, Bangalore', 637.00, 'Appliance Repair Technician', 'https://media.istockphoto.com/id/1025966854/photo/set-of-household-kitchen-technics-on-yellow-background-set-of-appliance-in-the-new.jpg?s=612x612&w=0&k=20&c=blrExWEZ0AtRFbgh4aKiU5PRtk2GodrYQ499wqQfDug=', 0.00),
(99, 'Reyansh Verma', 'reyansh.verma@worker.com', '9876543297', '1995-11-14', 'Male', 'Whitefield, Bangalore', 591.00, 'Moving Company', 'https://media.istockphoto.com/id/1395748211/photo/van-full-of-moving-boxes-and-furniture-near-house.jpg?s=612x612&w=0&k=20&c=pa1S7xB4fw6R5i3wdibeO1DdwfQ5a9gGJLQDTu5I3LM=', 0.00),
(100, 'Arjun Singh', 'arjun.singh@worker.com', '9876543298', '1990-04-02', 'Male', 'Malleswaram, Bangalore', 613.00, 'Carpet Cleaner', 'https://media.istockphoto.com/id/1277190972/photo/human-cleaning-carpet-in-the-living-room-using-vacuum-cleaner-at-home.jpg?s=612x612&w=0&k=20&c=tDo_ubVBezJ421RglzfMIGzCu38dhyKxuadtgoj5J9k=', 0.00),
(101, 'Kabir Verma', 'kabir.verma@worker.com', '9876543299', '1991-12-26', 'Male', 'JP Nagar, Bangalore', 613.00, 'Carpet Cleaner', 'https://media.istockphoto.com/id/1277190972/photo/human-cleaning-carpet-in-the-living-room-using-vacuum-cleaner-at-home.jpg?s=612x612&w=0&k=20&c=tDo_ubVBezJ421RglzfMIGzCu38dhyKxuadtgoj5J9k=', 0.00),
(102, 'Arnav Singh', 'arnav.singh@worker.com', '9876543300', '1992-09-09', 'Male', 'Whitefield, Bangalore', 613.00, 'Carpet Cleaner', 'https://media.istockphoto.com/id/1277190972/photo/human-cleaning-carpet-in-the-living-room-using-vacuum-cleaner-at-home.jpg?s=612x612&w=0&k=20&c=tDo_ubVBezJ421RglzfMIGzCu38dhyKxuadtgoj5J9k=', 0.00),
(103, 'Advait Kapoor', 'advait.kapoor@worker.com', '9876543301', '1993-03-25', 'Male', 'Marathahalli, Bangalore', 785.00, 'Interior Designer', 'https://media.istockphoto.com/id/499719900/photo/home-decoration-and-renovation-concept.jpg?s=612x612&w=0&k=20&c=iyIaKwmjwACN1tK152h6llUzW-59K1uk8O4iIJPZ7VU=', 0.00),
(104, 'Aadi Verma', 'aadi.verma@worker.com', '9876543302', '1994-06-28', 'Male', 'Indiranagar, Bangalore', 785.00, 'Interior Designer', 'https://media.istockphoto.com/id/499719900/photo/home-decoration-and-renovation-concept.jpg?s=612x612&w=0&k=20&c=iyIaKwmjwACN1tK152h6llUzW-59K1uk8O4iIJPZ7VU=', 0.00),
(107, 'Kabir Kapoor', 'kabir.kapoor@worker.com', '9876543305', '1991-04-12', 'Male', 'Indiranagar, Bangalore', 721.00, 'Home Security System Installation', 'https://media.istockphoto.com/id/1023491058/photo/man-install-outdoor-surveillance-ip-camera-for-home-security.jpg?s=612x612&w=0&k=20&c=5YH3yW8p5XNgEXpDbEJAJr0_GeZkLkC5zo1EhyDrMHU=', 0.00),
(108, 'Arjun Verma', 'arjun.verma@worker.com', '9876543306', '1992-11-06', 'Male', 'BTM Layout, Bangalore', 721.00, 'Home Security System Installation', 'https://media.istockphoto.com/id/1023491058/photo/man-install-outdoor-surveillance-ip-camera-for-home-security.jpg?s=612x612&w=0&k=20&c=5YH3yW8p5XNgEXpDbEJAJr0_GeZkLkC5zo1EhyDrMHU=', 0.00),
(112, 'Arnav Verma', 'arnav.verma@worker.com', '9876543310', '1990-05-19', 'Male', 'Malleswaram, Bangalore', 608.00, 'Landscaping Services', 'https://media.istockphoto.com/id/475958716/photo/lawn-mower.jpg?s=612x612&w=0&k=20&c=TIGBHDkXS9IJbq84NHtfsFIPp_aqy6APWni2r_oS2NQ=', 0.00),
(113, 'Advait Sharma', 'advait.sharma@worker.com', '9876543311', '1991-08-02', 'Male', 'JP Nagar, Bangalore', 608.00, 'Landscaping Services', 'https://media.istockphoto.com/id/475958716/photo/lawn-mower.jpg?s=612x612&w=0&k=20&c=TIGBHDkXS9IJbq84NHtfsFIPp_aqy6APWni2r_oS2NQ=', 0.00),
(114, 'Aarush Kapoor', 'aarush.kapoor@worker.com', '9876543312', '1992-12-14', 'Male', 'Whitefield, Bangalore', 608.00, 'Landscaping Services', 'https://media.istockphoto.com/id/475958716/photo/lawn-mower.jpg?s=612x612&w=0&k=20&c=TIGBHDkXS9IJbq84NHtfsFIPp_aqy6APWni2r_oS2NQ=', 0.00),
(115, 'Rudra Kumar', 'rudra.kumar@worker.com', '9876543313', '1993-06-15', 'Male', 'Marathahalli, Bangalore', 701.00, 'Auto Mechanic', 'https://media.istockphoto.com/id/1347150429/photo/professional-mechanic-working-on-the-engine-of-the-car-in-the-garage.jpg?s=612x612&w=0&k=20&c=5zlDGgLNNaWsp_jq_L1AsGT85wrzpdl3kVH-75S-zTU=', 0.00),
(122, 'Aryan Sharma', 'aryan.sharma@worker.com', '9876543320', '1994-03-05', 'Male', 'Indiranagar, Bangalore', 672.00, 'Computer Repair Technician', 'https://media.istockphoto.com/id/928791064/photo/technician-repairing-laptop-computer-closeup.jpg?s=612x612&w=0&k=20&c=QF43BNi5BL9wXRYBbUiRrp-oqnQgM1hsN7XhlHsvTSc=', 0.00),
(123, 'Vihaan Verma', 'vihaan.verma@worker.com', '9876543321', '1995-10-18', 'Male', 'BTM Layout, Bangalore', 672.00, 'Computer Repair Technician', 'https://media.istockphoto.com/id/928791064/photo/technician-repairing-laptop-computer-closeup.jpg?s=612x612&w=0&k=20&c=QF43BNi5BL9wXRYBbUiRrp-oqnQgM1hsN7XhlHsvTSc=', 0.00),
(127, 'Aadi Singh', 'aadi.singh@worker.com', '9876543325', '1993-03-16', 'Male', 'Marathahalli, Bangalore', 780.00, 'Personal Trainer', 'https://media.istockphoto.com/id/671714484/photo/athletes-set-with-female-clothing-sneakers-and-bottle-of-water-on-gray-background.jpg?s=612x612&w=0&k=20&c=QGRgAmN6Siv3kNlWioQ-l5VuWXUaab45XsgXpifON5U=', 0.00),
(129, 'Reyansh Kapoor', 'reyansh.kapoor@worker.com', '9876543327', '1995-10-20', 'Male', 'BTM Layout, Bangalore', 780.00, 'Personal Trainer', 'https://media.istockphoto.com/id/671714484/photo/athletes-set-with-female-clothing-sneakers-and-bottle-of-water-on-gray-background.jpg?s=612x612&w=0&k=20&c=QGRgAmN6Siv3kNlWioQ-l5VuWXUaab45XsgXpifON5U=', 0.00),
(134, 'Aarav Kapoor', 'aarav.kapoor@worker.com', '9876543332', '1994-07-09', 'Male', 'Indiranagar, Bangalore', 890.00, 'Catering Services', 'https://media.istockphoto.com/id/637765812/photo/cuisine-culinary-buffet-dinner-catering-dining-food-celebration.jpg?s=612x612&w=0&k=20&c=7l_HRkrBJ6ewkfYx1rQtNbDDWcf4V8dyo1GbiHmWGYs=', 0.00),
(146, 'Aryan Kapoor', 'aryan.kapoor@worker.com', '9876543344', '1994-09-01', 'Male', 'Indiranagar, Bangalore', 750.00, 'Tutoring Services', 'https://media.istockphoto.com/id/1220200250/photo/chef-cooking-vegetables-in-pan.jpg?s=612x612&w=0&k=20&c=HoMt5HaMu0P-SiZ8mGglSqln55Aw9gCxSwTDoS8VK5U=', 0.00),
(154, 'Jeevan', 'jeevan121@worker.com', '1238726351', '2023-08-05', NULL, 'bengaluru', 500.00, 'Pet Grooming', 'https://media.istockphoto.com/id/969097426/photo/cavalier-king-charles-spaniel-dog-grooming-session.jpg?s=612x612&w=0&k=20&c=uWJaDFF7hVPrQIQ0L-fpH3nm99ehqiC1JUPkA-cLhfw=', 0.00),
(155, 'nidhish', 'nidhish@worker.com', '12345678', '2023-08-03', NULL, 'ullal', 1000.00, 'Carpet Cleaner', 'https://media.istockphoto.com/id/969097426/photo/cavalier-king-charles-spaniel-dog-grooming-session.jpg?s=612x612&w=0&k=20&c=uWJaDFF7hVPrQIQ0L-fpH3nm99ehqiC1JUPkA-cLhfw=', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `employee_id`, `message`) VALUES
(7, 154, 'delete my account'),
(8, 115, 'i want to change the service cost'),
(9, 90, 'i want to change the service charges'),
(10, 63, 'hii change my name to abhi'),
(11, 56, 'change the service cost to 500'),
(12, 95, 'hiii'),
(13, 155, 'hii sir'),
(14, 58, 'payment unsuccesful'),
(15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newprice`
--

CREATE TABLE `newprice` (
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newprice`
--

INSERT INTO `newprice` (`price`) VALUES
(1000),
(20000);

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `name` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `photo` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `worker_id` (`worker_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`worker_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
