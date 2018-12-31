-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-12-31 09:21:51
-- 服务器版本： 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_site`
--

-- --------------------------------------------------------

--
-- 表的结构 `advertisement`
--

CREATE TABLE `advertisement` (
  `src` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `advertisement`
--

INSERT INTO `advertisement` (`src`, `id`, `label`) VALUES
('img/ad1.jpg', 1, 1),
('img/ad2.png', 2, 2),
('img/ad3.png', 3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `title` text NOT NULL,
  `abstract` text NOT NULL,
  `content` text NOT NULL,
  `id` int(11) NOT NULL,
  `label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`title`, `abstract`, `content`, `id`, `label`) VALUES
('马化腾', '马化腾，1971年10月29日生于原广东省海南岛东方市八所港（今海南省东方市），祖籍广东省汕头市。腾讯公司主要创办人之一。现任腾讯公司董事会主席兼首席执行官；全国青联副主席；全国人大代表。', '', 1, 1),
('张志东', '张志东，广东东莞人，腾讯创办人之一，腾讯高级副总裁兼科技总裁，于1993年取得深圳大学理学学士学位，并于1996年取得华南理工大学计算机应用及系统架构硕士学位，在电信及互联网行业拥有多年经验，1998年创立腾讯。', '', 2, 2),
('许晨晔', '许晨晔，男，1996年取得南京大学计算机应用硕士学位。腾讯公司首席信息官。许先生是主要创办人之一，自1999年起受雇于本集团，全面负责网站财产和社区、客户关系及公共关系的策略规划和发展工作。出任现职前，许先生曾在深圳数据通信局任职，累积丰富软件系统设计、网络管理和市场推广及销售管理经验。', '', 3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `course_id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `comment_id` int(20) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`course_id`, `teacher_id`, `comment_id`, `teacher_name`, `username`, `text`, `date`) VALUES
(7, 1, 1, '刘德华', 'baskerstudent', '强推强推强推~讲课讲得很好~又风趣幽默~上课当堂敲代码~能让你学到解题的思路~实验不算难~但有限时完成~', '2018-12-12'),
(7, 1, 0, '刘德华', 'pengwei', '刘德华好帅啊', '2018-12-30'),
(7, 1, 3, '刘德华', '詹姆斯', '放羊式教学，讲课有趣，通俗易懂，缺点只是实验课上指导会比较少，基本上交给师兄，个人认为这个无法怪他，总体还是挺喜欢的', '2018-10-01'),
(7, 2, 2, '周星驰', 'pengwei', '大学第一节课就爱上周星驰！！！很有趣，有时上课会讲很多故事而且并不会让我觉得在浪费时间！！！不用ppt 上课认真听做笔记下课翻翻书so easy～总之超级喜欢他！！从来不点名！！去上课的都是真爱！！', '2018-11-11');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `info` text NOT NULL,
  `thumbnail` text NOT NULL,
  `cover` text NOT NULL,
  `src` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`id`, `coursename`, `intro`, `info`, `thumbnail`, `cover`, `src`) VALUES
(1, '走进性科学', '《走进性科学》是大学生科学文化素质教育课程，以性生物学、性心理学、性社会学和性教育学等研究性科学发展规律的学科为理论基础，从人类性的生物属性、心理属性和社会属性等三个角度，联系学生生活实际，对大学生进行系统的性教育过程。', '《走进性科学》是大学生科学文化素质教育课程，以性生物学、性心理学、性社会学和性教育学等研究性科学发展规律的学科为理论基础，从人类性的生物属性、心理属性和社会属性等三个角度，联系学生生活实际，对大学生进行系统的性教育过程。通过系统教育，让学生走进性科学，揭开性的神秘面纱，使学生初步掌握性的基本知识，消除性愚昧和性无知，预防性传播疾病，促进性生理和性心理正常发育，促进健康人格的形成；指导人们树立健康的性观念和性形象，规范人们的性行为，建立和谐的人际关系，并为恋爱、择偶、婚姻家庭生活作好准备，促进人格全面发展，提升社会文明进步。', 'img/走进性科学.jpg', '', 'https://www.icourse163.org/course/FJNU-1001774009'),
(2, '音乐与健康', '音乐是人们日常生活中必不可少的心灵良药，而健康又是人们永恒的追求，那么这两者之间有什么关联之处呢？如何利用音乐来有效帮助人们的健康？本课程以人为本讲解了当下人们十分关注的健康问题。', '音乐是人们日常生活中必不可少的心灵良药，而健康又是人们永恒的追求，那么这两者之间有什么关联之处呢？如何利用音乐来有效帮助人们的健康？本课程以人为本讲解了当下人们十分关注的健康问题。并从音乐与健康之关联、音乐治疗学（一门新兴的边缘学科）、音乐的处方单、音乐与健脑、中国古代的音乐养生思想等8个章节来讲述音乐与健康之间千丝万缕的联系。目的是让大家了解如何通过音乐来作用于人体并起到疗养身心的作用。牢记：音乐是高尚机智的娱乐，这种娱乐，使人的精神帮助了人体，成为肉体的医疗者。', 'img/音乐与健康.jpg', '', 'http://www.icourse163.org/course/NBU-1002336007'),
(3, '数据结构', '“数据结构”是计算机科学与技术专业、软件工程专业甚至于其它电气信息类专业的重要专业基础课程。它所讨论的知识内容和提倡的技术方法，无论对进一步学习计算机领域的其它课程，还是对从事大型信息工程的开发，都是重要而必备的基础。', '数据结构”是计算机科学与技术专业、软件工程专业甚至于其它电气信息类专业的重要专业基础课程。它所讨论的知识内容和提倡的技术方法，无论对进一步学习计算机领域的其它课程，还是对从事大型信息工程的开发，都是重要而必备的基础。\r\n\r\n    程序设计解决问题往往有多种方法，且不同方法之间的效率可能相差甚远。程序的时间和空间效率，不仅跟数据的组织方式有关，也跟处理流程的巧妙程度有关。本课程将介绍并探讨有关数据组织、算法设计、时间和空间效率的概念和通用分析方法，帮助学员学会数据的组织方法和一些典型算法的实现，能够针对问题的应用背景分析，选择合适的数据结构，从而培养高级程序设计技能。', 'img/数据结构.jpg', '', 'https://www.icourse163.org/course/zju-93001'),
(4, '离散数学', '离散数学是计算机学科的经典核心基础课程。课程内容主要包括集合论，数理逻辑，关系理论，图论相关内容，为进一步学习计算机科学的基本理论和方法以及之后的专业课打下良好的基础。', '离散数学是计算机学科的经典核心基础课程。课程内容主要包括集合论，数理逻辑，关系理论，图论相关内容，为进一步学习计算机科学的基本理论和方法以及之后的专业课打下良好的基础。通过这门课程的学习，将会培养学生的抽象思维能力，逻辑推理能力，缜密概括能力以及分析和解决实际问题的能力。\r\n\r\n离散数学的学习，为其后续课程（如数据结构、操作系统、计算机网络、编译理论、数字逻辑理论、数据库系统、算法分析、系统结构、人工智能等）的学习打下坚实的理论基础。\r\n\r\n\r\n这门课程的理论性较强，知识点比较多，但均“有迹可循，有法可依”，因而完成这门课程的学习并非很难。我们通过对课程内容的合理安排（“营养均衡”），每一讲的精心调配（“正餐”），课后习题的专业配套（“甜点”），为在线学习用户提供了学习离散数学课程的一种新形式。', 'img/离散数学.png', '', 'http://www.icourse163.org/course/UESTC-1002268006'),
(5, '数据库系统', '《数据库系统》不仅是计算机、软件工程等专业的核心课程，而且也是非计算机专业学生必修的信息技术课程。当前互联网+与大数据，一切都建立在数据库之上，以数据说话，首先需要聚集数据、需要分析和管理数据。', '本系列课程旨在使学生充分掌握数据库系统的基本概念和基本原理，熟练掌握数据库系统语言、数据库抽象与建模方法和数据库应用程序设计方法，培养学生在信息管理和信息系统方面的抽象、设计、开发、应用和管理能力。同时，数据存储、数据库查询实现、查询优化、事务处理等技术，这些内容也是计算学科学生在专业方面必须掌握的操纵数据库的能力，本课程也将为你详细讲授。\r\n\r\n本课程将分为四个部分进行介绍：\r\n\r\n一、基本知识与关系模型；\r\n\r\n二、数据库语言及其应用；\r\n\r\n三、数据建模与数据库设计；\r\n\r\n四、数据库管理系统实现技术。', 'img/数据库系统.png', '', 'https://www.icourse163.org/course/hit-1001516002'),
(6, 'Web网站开发', '本课程是针对Web网站开发岗位设置的是一门实践性和综合性较强的课程，是结合《网页美工》、《网站前端技术》以及《网站后台技术》知识，手把手教学生从网站规划，网页效果图设计，网站前台设计以及基于数据库技术的网站后台设计，从而构建一个完整的企业网站。', '本课程是针对Web网站开发岗位设置的是一门实践性和综合性较强的课程，是结合《网页美工》、《网站前端技术》以及《网站后台技术》知识，手把手教学生从网站规划，网页效果图设计，网站前台设计以及基于数据库技术的网站后台设计，从而构建一个完整的企业网站。该课程详细介绍了熟练使用PHOTOSHOP工具对网页效果图中的图标、控件、按钮、LOGO、 Banner、文字、网页导航、网页版式等内容的设计方法、基于WEB2.0的网页前端设计技术，包括HTML5标签设计网页元素、使用CSS3技术美化网页，盒子模型，结合HTML5+DIV+CSS3技术完成网页布局设计，响应式WEB页开发，使用JAVASCRIPT实现网站交互特效，以及使用PHP技术进行网站开发，PHP基本语法、PHP操作mysql数据库、新闻发布系统开发，最后还用具体实例展示企业网站建设综合案例的实施过程。', 'img/Web网站开发.png', '', 'http://www.icourse163.org/course/WHJZY-1003194005'),
(7, '程序设计基础', '本课程是一门计算机专业的基础课。课程以C/C++语言为工具，通过编写程序解决问题，培养学生的计算思维，掌握程序设计的基本概念、基本算法思路与基本设计方法，为学习后续课程打下扎实的基础。', '随着信息产业的迅速发展，软件人才的需求量越来越大。程序设计是软件人才必备的基础知识和技能。 程序设计基础是一门理论与实践密切相关、以培养学生程序设计能力为目标的课程。如何消除学生学习程序设计的畏难情绪，使学生顺利进入程序设计的大门，逐步掌握程序设计思想和方法，提高实践动手能力，是本课程教学的难点。 程序设计既是科学，又是艺术。学习程序设计是一件非常辛苦的事情，要有非常强的耐心和实践精神，需要花费大量的时间，不可能一蹴而就，必须从某个起点开始循序渐进地学习。', 'img/程序设计基础.jpg', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `courseteacher`
--

CREATE TABLE `courseteacher` (
  `course_id` int(20) NOT NULL,
  `teacher_id` int(20) NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `courseteacher`
--

INSERT INTO `courseteacher` (`course_id`, `teacher_id`, `teacher_name`) VALUES
(7, 1, '刘德华'),
(7, 2, '周星驰');

-- --------------------------------------------------------

--
-- 表的结构 `eresource`
--

CREATE TABLE `eresource` (
  `course_id` int(20) NOT NULL,
  `resource_id` int(20) NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `updatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `eresource`
--

INSERT INTO `eresource` (`course_id`, `resource_id`, `resource_name`, `href`, `updatedate`) VALUES
(1, 11, '走进性科学.pdf', '', '2018-12-29'),
(2, 21, '音乐与健康.pdf', '', '2018-12-29'),
(3, 31, '数据结构.pdf', '', '2018-12-29'),
(4, 41, '离散数学.pdf', '', '2018-12-29'),
(5, 51, '数据库系统.pdf', '', '2018-12-29'),
(6, 61, 'Web网站开发.pdf', '', '2018-12-29'),
(7, 71, '程序设计基础.pdf', '', '2018-12-29');

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE `login` (
  `email` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`email`, `username`, `password`) VALUES
('123@123.com', 'baskerstudent', '43b90920409618f188bfc6923f16b9fa'),
('123@123.com', 'pengwei', '43b90920409618f188bfc6923f16b9fa'),
('123@123.com', 'xianwenwei', '43b90920409618f188bfc6923f16b9fa'),
('123@123.com', '詹姆斯', '43b90920409618f188bfc6923f16b9fa');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(20) NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`) VALUES
(1, '刘德华'),
(2, '周星驰');

-- --------------------------------------------------------

--
-- 表的结构 `textbook`
--

CREATE TABLE `textbook` (
  `course_id` int(20) NOT NULL,
  `book_id` int(20) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `update_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `textbook`
--

INSERT INTO `textbook` (`course_id`, `book_id`, `bookname`, `update_time`) VALUES
(7, 71, '程序设计基础1', '2018-12-29'),
(7, 72, '程序设计基础2', '2018-12-29'),
(7, 73, '程序设计基础3', '2018-12-29'),
(6, 61, 'Web网站开发1', '2018-12-29'),
(6, 62, 'Web网站开发2', '2018-12-29'),
(5, 51, '数据库系统1', '2018-12-29'),
(4, 41, '离散数学1', '2018-12-29'),
(3, 31, '数据结构1', '2018-12-29'),
(2, 21, '音乐与健康1', '2018-12-29'),
(1, 11, '走进性科学1', '2018-12-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`course_id`,`teacher_id`,`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD PRIMARY KEY (`course_id`,`teacher_id`);

--
-- Indexes for table `eresource`
--
ALTER TABLE `eresource`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
