-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 08:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ramos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'tylerjaquish', '$2y$10$JWFhhK6pKjaA.0o9MlzUgOEMgOpD4GetHsNPolCAxMYWybdigIef.'),
(2, 'aaronramos', '$2y$10$V0ikHq.E4VTcdAxcFDVkuuBolCHQ3NHwEvM9fBwRANsSLUm1qFhuG');

-- --------------------------------------------------------

--
-- Table structure for table `background_checklist`
--

CREATE TABLE IF NOT EXISTS `background_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `background_checklist`
--

INSERT INTO `background_checklist` (`id`, `content_text`) VALUES
(1, 'Graduated with honors and was a member of the Palmer West Sports Council'),
(2, 'National Board Certified and Washington State licensed Chiropractor'),
(3, 'Member of ProSport Chiropractic and the internationally recognized Pi Tau Delta Chiropractic Honor Society'),
(4, 'The only Selective Functional Movement Assessment (SFMA) level 1 certified clinician in the Tri-Cities'),
(5, 'Currently working towards a certification as a golf injury specialist'),
(6, 'Bilingual');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(55) DEFAULT NULL,
  `content_text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `identifier`, `content_text`) VALUES
(1, 'mission', '<p>We are committed to serving families and athletes of all ages with high quality, non-invasive care (no medication, no surgery) that promotes the natural healing of your body. Our mission is to provide you with exceptional care while supporting you on your path to reaching your health potential.</p>'),
(2, 'what we do', '<p>We look for the underlying cause of your discomfort and treat it hands-on, rather than masking your symptoms through medication or other invasive means. If you want to pursue an active and healthy lifestyle without being held back by your body, we would love to team up with you and help you reach your goals. <strong>Contact us today if you experience any of the following:</strong></p>'),
(6, 'how we do it', '<p>What sets our office apart is our integrative and progressive approach to treatment &ndash; an effective mix of chiropractic, massage, injury rehabilitation, and movement / sport specific therapies. We take this approach during each treatment and tailor it to every individual depending on what their specific condition and goals are. Using this approach, all of the components (joints, muscles, tendons, ligaments, and nerves) of a condition or injury are treated so the body is structurally balanced and able to reach its maximum potential.</p>\r\n<p>We offer free, no obligation consultations. Same day appointments are also available for those times you need an appointment on short notice. As your Richland, Pasco, and Kennewick Chiropractor, we are a preferred provider with most health insurance plans. We also provide affordable out of pocket fees for everyone without coverage.</p>'),
(7, 'background', '<p>Always one to take care of injuries without the use of medication or surgery when possible, Dr. Ramos became interested in health and wellness during his high school years. Having grown up playing various sports year-round, Dr. Ramos understands the effects sports and everyday life can have on our bodies. Due to numerous sports injuries and wear and tear on the body, he decided to use his interest in health to help others who aren''t feeling their absolute best. Dr. Ramos has always believed it was much more effective to take a <strong>proactive and preventative approach to health care</strong>, which led him to where he is today.</p>\r\n<p>Dr. Ramos began his practice in the Seattle area where he was able to collaborate and learn a great deal from some of the top musculoskeletal professionals around. Following the birth of his first child, he decided to return to Eastern Washington and raise his family closer to where he grew up. He is excited to provide high quality musculoskeletal care to families and athletes of all ages.</p>'),
(8, 'overlay1 (mobile)', '<p>We understand. You''re in pain, tired, busy and just want to get on with your life. We''d love the opportunity to step in and help you feel better.</p>'),
(9, 'overlay1 (desktop)', '<p>We understand. You''re in pain, tired, busy and just want to get on with your life. The last thing you want to do is wonder where you can get honest and effective care to help you feel and move better. Wonder no more, and give us the pleasure of stepping in and helping you become pain free.</p>'),
(10, 'overlay2', '<p>Our goal is to offer you a welcoming and warm atmosphere, where your specific needs are given the attention they deserve.</p>'),
(11, 'overlay3', '<p>We take a comprehensive approach to treatment in order to achieve results that are fast and long lasting, allowing you to return to what you love doing - pain free!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `office_hours`
--

CREATE TABLE IF NOT EXISTS `office_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(55) NOT NULL,
  `content_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `office_hours`
--

INSERT INTO `office_hours` (`id`, `day`, `content_text`) VALUES
(1, 'Monday', '<p>9am-12pm,</p>\r\n<p>2pm-6pm</p>'),
(2, 'Tuesday', '<p>9am-12pm,</p>\r\n<p>2pm-6pm</p>'),
(3, 'Wednesday', '<p>9am-12pm,</p>\r\n<p>2pm-6pm</p>'),
(4, 'Thursday', '<p>9am-12pm,</p>\r\n<p>2pm-6pm</p>'),
(5, 'Friday', '<p>9am-12pm,</p>\r\n<p>2pm-5pm</p>\r\n<p>&nbsp;</p>'),
(6, 'Saturday', '<p>By appointment only</p>');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE IF NOT EXISTS `treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `content_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `title`, `content_text`) VALUES
(1, 'CHIROPRACTIC', '<p style="text-align: center;">Consists of adjustments of the spinal and extremity joints to reduce pain while improving range of motion and nervous system function.</p>'),
(2, 'MASSAGE / MYOFASCIAL RELEASE THERAPY', '<p style="text-align: center;">Utilizing up to date soft tissue techniques to decrease unnecessary tension and discomfort and improve range of motion.</p>'),
(3, 'KINESIOLOGY TAPING', '<p style="text-align: center;">A must try! Supports muscles and joints while helping improve movement biomechanics and reduce pain.</p>'),
(4, 'INSTRUMENT ASSISTED SOFT TISSUE MOBILIZATION', '<p style="text-align: center;">Specialized tools are used to stimulate stubborn scar tissue and adhesions to decrease pain and improve mobility. Great for chronic conditions!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `what_we_do_checklist`
--

CREATE TABLE IF NOT EXISTS `what_we_do_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `what_we_do_checklist`
--

INSERT INTO `what_we_do_checklist` (`id`, `content_text`) VALUES
(1, 'Auto Accidents'),
(2, 'Work Injury'),
(3, 'Sports Injuries'),
(4, 'Repetitive Stress Injuries (RSI''s)'),
(5, 'Hand Pain/Carpal Tunnel Syndrome'),
(6, 'Hip/Knee/Ankle Pain'),
(7, 'Stress'),
(8, 'Crossfit Injuries/Performance'),
(9, 'Wellness & Sports Performance Care'),
(10, 'Other Spinal or Musculoskeletal Conditions'),
(11, 'Back Pain'),
(12, 'Neck Pain'),
(13, 'Pregnancy Aches/Pain'),
(14, 'Headaches/Migraines'),
(15, 'Strains/Sprains'),
(16, 'Sciatica'),
(17, 'Foot Pain/Plantar Fasciitis'),
(18, 'Disc Herniations'),
(19, 'Shoulder/Elbow/Wrist Pain'),
(20, 'Fibromyalgia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
