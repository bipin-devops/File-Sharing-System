-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2018 at 07:34 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `join_date` date NOT NULL,
  `images` varchar(150) NOT NULL,
  `superadmin` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fname`, `lname`, `email`, `address`, `phone`, `username`, `password`, `status`, `join_date`, `images`, `superadmin`) VALUES
(26, 'aakash', 'pandey', 'admin@admin.com', 'Baneshore', '213123', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'active', '2007-11-19', '21427366_755263831264883_6821461117853350457_o.jpg', 'yes'),
(53, 'nikita', 'chapagain', 'nikita@chapagain.com', 'virginia', '0017035050177', 'nikita', 'b00a50c448238a71ed479f81fa4d9066', 'active', '2017-12-24', '17758580_1425778610828442_5012023337681477383_o.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` char(250) DEFAULT NULL,
  `upload_date` date NOT NULL,
  `images` varchar(150) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `description`, `upload_date`, `images`, `status`) VALUES
(12, 'Lifestyle', '', '2017-12-18', 'lifestyle.jpg', 'active'),
(13, 'Presentation & Public Speacking', '', '2017-12-18', 'presentation.png', 'active'),
(14, 'Social Media', '', '2017-12-18', 'social.jpg', 'active'),
(15, 'Science', '', '2017-12-18', 'science.jpg', 'active'),
(17, 'Technology', '', '2017-12-18', 'Technology.jpg', 'active'),
(18, 'Travel', '', '2017-12-18', 'travel.jpg', 'active'),
(20, 'Education', '', '2017-12-18', 'education.jpg', 'active'),
(21, 'Sports', '', '2017-12-18', 'sports111.png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `comment` text,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `user_id`, `file_id`, `comment`, `date`) VALUES
(24, 16, 37, 'comment check', '2016-01-09'),
(25, 16, 37, 'comment check', '2016-01-09'),
(26, 25, 3, 'Ekdam Shai kura garnu vo sir tapai le ...', '2016-01-10'),
(27, 25, 1, 'Faceboook Vanney chij nai yestai ho...kam xaina ', '2016-01-10'),
(28, 25, 22, 'La thik xa ..', '2016-01-10'),
(29, 25, 22, 'Big b Is great', '2016-01-10'),
(30, 25, 23, ' the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your on a table, click ', '2016-01-10'),
(31, 25, 4, 'Nepal Government thag..sab chor haru', '2016-01-10'),
(32, 21, 24, 'hai...khattam vo', '2016-01-10'),
(33, 21, 5, 'ekdam shaii kura garish bhai...ramro lago tero article padera...', '2016-01-10'),
(34, 21, 1, 'hahaha...la thik xa', '2016-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `phone`, `email`, `message`, `date`) VALUES
(2, 'pratik', 21, 'thatsmepk@live.com', '', '2016-01-04'),
(3, 'sailesh', 2147483647, 'thatsmepk1@gmail.com', 'I want to Work with you.', '2016-01-04'),
(4, 'Name', 0, 'Email', 'Message', '2016-01-09'),
(5, 'Name', 0, 'Email', 'Message', '2016-01-09'),
(6, 'Name', 0, 'thatsmepk@live.com', 'Message', '2016-01-09'),
(7, 'Name', 0, 'thatsmepk@live.com', 'Message', '2016-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE IF NOT EXISTS `tbl_file` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(150) DEFAULT NULL,
  `description` varchar(10000) NOT NULL,
  `upload_date` date NOT NULL,
  `images` varchar(150) DEFAULT NULL,
  `files` varchar(150) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `download_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id`, `cat_id`, `admin_id`, `user_id`, `file_name`, `description`, `upload_date`, `images`, `files`, `status`, `view_count`, `download_count`) VALUES
(1, 14, 0, 21, 'Facebook', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. ', '2016-01-10', 'facebook.png', 'facebook.docx', 'active', 8, 5),
(2, 14, 0, 21, 'Youtube', ' You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. ', '2016-01-10', 'youtube.jpg', 'you.docx', 'active', 0, 0),
(6, 12, 0, 25, 'Neapli Style', 'Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries.  ', '2016-01-10', 'nepali.jpg', 'chapter 3.pdf', 'active', 1, 1),
(7, 17, 0, 25, 'Robort world', 'want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you  ', '2016-01-10', 'robert.jpg', '229059_1_Case-Study-HH.docx', 'active', 0, 0),
(9, 21, 26, 0, 'TBC Esports ', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.', '2017-12-24', '14086474_583257971861932_9039223584262796157_o.jpg', 'Form.docx', 'active', 1, 0),
(10, 21, 26, 0, 'Football in Nepal', 'Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your ', '2017-12-24', 'download.jpg', 'Day-1.docx', 'active', 3, 0),
(11, 21, 26, 0, 'Nepal National Team', 'The Nepal national football team is the national football team of Nepal and is governed by the All Nepal Football Association (ANFA). A member of the Asian Football Confederation (AFC), the Nepalese football team play their home games at Dasarath Rangasala Stadium, Tripureswhor, Kathmandu.', '2017-12-24', 'Nepal-national-football-team.jpg', 'Esports_Registration_Form.docx', 'active', 0, 0),
(12, 12, 26, 0, 'KU IT MEET', 'point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.', '2017-12-24', 'KU-IT-MEET-2017.png', 'rejil.docx', 'active', 1, 0),
(13, 17, 26, 0, 'Subisu Can Info Tech', 'To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document ', '2017-12-24', 'CAN-COMMTECH-entrance-board.jpg', 'tiesheet.docx', 'active', 0, 0),
(14, 12, 26, 0, 'Life in village', 'To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document ', '2017-12-24', 'web-nepal-1-reuters.jpg', 'CARD.psd', 'active', 0, 0),
(15, 13, 26, 0, 'Publick Speaking Training', 'To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document ', '2017-12-24', 'ext.jpg', 'Esports_Registration_Form.docx', 'active', 0, 0),
(16, 15, 26, 0, 'Smart Future', 'look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.', '2017-12-24', 'https_%2F%2Fcdn.evbuc.com%2Fimages%2F33303773%2F129486940831%2F1%2Foriginal.jpg', 'CS.docx', 'active', 0, 0),
(17, 18, 26, 0, 'Nepal on top of world', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.', '2017-12-24', 'logo (1).png', 'Day-1 (1).docx', 'active', 0, 0),
(18, 20, 26, 0, 'Edufair in Nepal', 'Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also ', '2017-12-24', 'viber-image1.jpg', 'Workbook1.xlsx', 'active', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE IF NOT EXISTS `tbl_like` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_like`
--

INSERT INTO `tbl_like` (`id`, `file_id`, `user_id`) VALUES
(33, 26, 7),
(34, 24, 7),
(35, 31, 16),
(36, 25, 16),
(37, 37, 15),
(41, 24, 15),
(46, 32, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL,
  `news_title` varchar(250) NOT NULL,
  `news_description` varchar(10000) NOT NULL,
  `news_image` varchar(150) NOT NULL,
  `upload_date` date NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `news_title`, `news_description`, `news_image`, `upload_date`, `user_id`, `status`) VALUES
(22, 'Big B, Ranveer share Best Actor award', 'where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. ', '1111.jpg', '2017-12-18', '26', 'active'),
(23, 'Tbc EAsports 2015', 'document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work ', '11896254_830305223755991_7286766974969005505_n.jpg', '2017-12-18', '26', 'active'),
(24, 'Nepali jant, Petrol ma pani mix gardai', ' the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your on a table, click ', '12207713_882940031801522_717432013_n.jpg', '2017-12-18', '26', 'active'),
(25, 'Aaba naya machine nepal ma', ' the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your on a table, click ', 'images.jpg', '2017-12-18', '26', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL,
  `images` varchar(150) NOT NULL,
  `testimonial` varchar(2000) NOT NULL,
  `date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `author` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `images`, `testimonial`, `date`, `status`, `author`) VALUES
(3, 'sld2.jpg', 'Education is the most powerful weapon which you can use to change the world.', '2016-01-10', 'active', 'Nelson Mandela'),
(4, 'sld2.jpg', 'Education is the key to unlock the golden door of freedom.', '2016-01-10', 'active', 'George Washington Carver');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `images` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fname`, `lname`, `email`, `address`, `contact`, `username`, `password`, `status`, `images`) VALUES
(15, 'shyam', 'shyam', 'shyam@live.com', 'shyam', 898931031, 'shyam12', 'b567b34b4c44423824ae807f6c0976f2', 'inactive', 'Programmer HD Wallpaper by PCbots.png'),
(16, 'adsada', 'asadsasad', 'user@user.com', 'sadasda', 1232132132, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'active', 'maidan_futsal.jpg'),
(21, 'Suraj', 'Thapaliya', 'suraj.thapaliya@yahoo.com', 'kathmandu', 2147483647, 'suraj', '4dd49f4f84e4d6945e3bc6d14812004e', 'inactive', 'suraj.jpg'),
(22, 'Manish ', 'Nakarmi ', 'manish@live.com', 'thamel', 984257900, 'manish', '59c95189ac895fcc1c6e1c38d067e244', 'active', 'manish.jpg'),
(23, 'osin', 'limbu', 'osinlimbu@gmail.com', 'itahari', 923129310, 'limbu1', '630ab6e0559f57773939298e097713e0', 'active', 'osin.jpg'),
(24, 'soniya', 'bista', 'soniya@live.com', 'lalitpur', 2147483647, 'soniya', '3a0cca839c97d9f4a352c9e11c22e379', 'active', 'soniya.jpg'),
(28, 'Sachin', 'Chapaghai', 'Sachin@gmail.com', 'Lalitpur', 3213, 'sachin', '15285722f9def45c091725aee9c387cb', 'active', 'dx2jwg35eahqztgmfyid.jpg'),
(29, 'kushal', 'karki', 'kushal@gmail.com', 'bhaktapur', 23432453, 'kushal', '6ec44a1207a3d9506418c034679087b6', 'active', 'businessman-with-a-great-idea_1012-219.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
