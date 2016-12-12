-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 03:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestdata`
--

CREATE TABLE IF NOT EXISTS `contestdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamname` varchar(150) NOT NULL DEFAULT '0',
  `level1start` varchar(100) NOT NULL DEFAULT '0',
  `level1end` varchar(100) NOT NULL DEFAULT '0',
  `level1score` varchar(100) NOT NULL DEFAULT '0',
  `level1right` varchar(100) NOT NULL DEFAULT '0',
  `level1wrong` varchar(100) NOT NULL DEFAULT '0',
  `level1unans` varchar(100) NOT NULL DEFAULT '0',
  `level2start` varchar(100) NOT NULL DEFAULT '0',
  `level2end` varchar(100) NOT NULL DEFAULT '0',
  `level2score` varchar(100) NOT NULL DEFAULT '0',
  `level2right` varchar(100) NOT NULL DEFAULT '0',
  `level2wrong` varchar(100) NOT NULL DEFAULT '0',
  `level2unans` varchar(100) NOT NULL DEFAULT '0',
  `level3start` varchar(100) NOT NULL DEFAULT '0',
  `level3end` varchar(100) NOT NULL DEFAULT '0',
  `level3score` varchar(100) NOT NULL DEFAULT '0',
  `level4start` varchar(100) NOT NULL DEFAULT '0',
  `level4end` varchar(100) NOT NULL DEFAULT '0',
  `level4level` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `level4score` varchar(100) NOT NULL DEFAULT '0',
  `level4cheated` tinyint(1) NOT NULL,
  `invited` enum('0','1') NOT NULL DEFAULT '0',
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `individual`
--

CREATE TABLE IF NOT EXISTS `individual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamid` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `student` varchar(100) NOT NULL,
  `category` enum('web','software','graphic') NOT NULL DEFAULT 'software',
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct` enum('1','2','3','4') NOT NULL,
  `level` enum('1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct`, `level`) VALUES
(1, 'What does ENIAC stand for?', 'Electronic Numeric Integrator And Computer', 'Electronic Numerical Integration And Computer', 'Electronically Numerical Integrator And Computer', 'Electronic Numerical Integrator And Computer', '3', '1'),
(2, 'Which of these ports were not replaced by the USB Port?', 'Parallel Port', 'RJ45 Port', 'Serial Port', 'PS/2 Port', '2', '1'),
(3, 'Which of the following comes under System Software?', 'Utility Software', 'Operating System', 'All of the above', 'None of the above', '3', '1'),
(5, 'Which generations were ICs, Vacuum tubes, Transistors and Microchips mainly used in respectively? ', 'Second Generation, First Generation, Third Generation, Fourth Generation', 'First Generation, Third Generation, Second Generation, Fourth Generation', 'Third Generation, Second Generation, First Generation, Fourth Generation', 'None of the above', '4', '1'),
(6, 'Convert the 1477 to binary, octal and hexadecimal respectively: ', '10111000100, 2715, 5C4', '10111000101, 2705, 5C5', '10111000110, 2715, 4C5', '10110001100, 2705, 5C5', '2', '1'),
(7, 'Who invented the Pascal programming language?', 'Niklaus Wirth', 'Gottfried Wilhelm', 'Blaise Pascal', 'Dennis Ritchie', '3', '1'),
(8, 'Which of the following topologies is a combination of two other topologies?', 'Ring Topology', 'Bus Topology', 'Mesh Topology', 'Tree Topology', '4', '1'),
(9, 'Which of the following is equal to 1 kB?', '8192 B', '256 words', '1024 b', '2048 nibbles', '4', '1'),
(11, 'What is the correct statement about ATMs?', 'ATMs always have real time operating systems', 'ATMs does not allow customers to perform financial transactions.', 'ATMs only serve as cash dispensers.', 'ATMs are only used in bank- related functions. ', '1', '2'),
(12, 'What is the form of fraud used by the suspect in this context?', 'Card cloning', 'Card skimming', 'Lebanese loop', 'None of the above', '4', '2'),
(13, 'Authentications of ATMs are usually done using,', 'A PIN of 6 or more numerics', 'A password of 6 or more alphanumerics', 'A PIN of 4 numerics', 'A password of 4 alphanumerics', '3', '2'),
(14, 'Atomicity is important to an ATM system because,', 'Transactions need to be done quickly', 'Transactions need to be done slowly', 'Transactions should need to be completed without human intervention', 'Transactions should not occure partially', '4', '2'),
(15, 'To prevent incidents like the one described in the context adequately,', 'The suspect should be remanded', 'The suspect should be mildly advised', 'ATMs should be banned in Sri Lanka', 'ATM users should be notified about their latest features', '4', '2'),
(16, 'Which of the following is considered both an input and output device?', 'Modem', 'Keyboard', 'Printer', 'None of the above', '1', '1'),
(17, 'Which of the following attributes can be used in both th and tr elements', 'colspan', 'rowspan', 'All of the above', 'None of the above', '4', '1'),
(18, 'What type of test is a CAPTCHA?', 'Visual Turing Test', 'Reverse Turing Test', 'Turing Test', 'None of the above', '2', '1'),
(19, 'Which of the following are different ways of using the web?', 'Email', 'FTP', 'All of the above', 'None of the above', '4', '1'),
(20, 'What forms of E-Government Service does Business Registrations, Tourist                                      Aid, the Legal System and Information on Loan Facilities for Workers come under respectively?', 'G2B, G2C, G2G, G2E', 'G2B, G2C, G2E, G2G', 'G2B, G2E, G2C, G2G', 'G2B, G2G, G2C, G2E', '4', '1'),
(21, 'During which Generation of Computers were IBM PC, IBM 701, IBM 7030, IBM 360 invented respectively?', '4th Generation, 2nd Generation, 3rd Generation, 1st Generation', '4th Generation, 1st Generation, 2nd Generation, 3rd Generation', '4th Generation, 3rd Generation, 1st Generation, 2nd Generation', '4th Generation, 2nd Generation, 1st Generation, 3rd Generation ', '2', '1'),
(22, 'Which of the following are true?\nA : ASCII was designed by the American National Standard Institute\nB : Certain models of the PlayStation 3 store the time and date in BCD\nC : The IBM 360 uses EBCDIC\nD : Unicode is currently the most commonly used coding system', 'A, C & D', 'B, C & D', 'A & D', 'All of the above', '4', '1'),
(23, 'Which of the following are true?\nA : FAT32 is more compatible with various operating systems than NTFS\nB : The maximum final name length in NTFS is unlimited\nC : exFAT has a 4GB size limit per file just like FAT32\na.	Only A\nb.	Only B\nc.	A & B\nd.	B & C\n', 'Only A', 'Only B', 'A & B', 'B & C', '1', '1'),
(24, 'Which of the following are examples for Simplex, Half-Duplex and Full Duplex Communication respectively?', 'Printing a document, Browsing the internet, Telephone conversation', 'Listening to the radio, Using a walkie-talkie, Telephone conversations', 'All of the above', 'None of the above', '3', '1'),
(25, 'Which of the following statements regarding programming languages are true?', 'Symbolic names for commands first appeared in Third Generation Languages', 'The programming language “C++” is a Fourth Generation Language', '“Programs will work on one machine and not on the other”. This statement can be applied to Second Generation Languages', 'None of the above', '3', '1'),
(26, 'Which of the following is not true regarding programming language translation?', 'Compilers convert source code programs into object code programs that can be executed. If there are errors in the source code though, the compiled object code program will not run.', 'Eliminating bugs from a program is called debugging. Debugging is easier in the ‘VB’ language rather than the ‘C’ language.', 'Programs written in a first generation language can be instantly understood by the computer. Programming translation became necessary from second generation languages onwards.', 'Programs written in a first generation language execute much faster than programs written in any other language', '1', '1'),
(27, 'Which of the following statements regarding internet standard protocols is not true?', 'Post Office Protocol is now obsolete due to Internet Message Access Protocol. The main reason for this is that it can be implemented easily.', 'Post Office Protocol connects to the server only for the time required to download new messages. Internet Message Access Protocol constantly stays connected though and can download messages as soon as they arrive.', 'Post Office Protocol receives the entire message while Internet Message Access Protocol can retrieve any individual part of the message.', 'None of the above', '1', '1'),
(28, 'Which of the following statements regarding programming languages is true?', 'It is best if a programming language has only one paradigm since having more than one increases the complexity of the language while lowering the usefulness of it.', 'The way a programmer thinks is directly related to the type of programming paradigm they use.', 'All of the above', 'None of the above', '2', '1'),
(29, 'Which of the following is not a simplification of:\n(B. ((A . (B + C)) + ((A.B) . (A.C)))) + C\n', '(A+C) . (B+C)', 'AB + ABC + C', 'A + B + C', 'AB + C', '3', '1'),
(30, '“B1, B2, B3 and B4 are four consecutive blocks of memory. B1, B2 and B3 are allocated, and then the space in B2 is freed. Now B2 and B4 can be allocated separately, but a process that requires two blocks cannot be allocated since B2 and B4 are not consecutive.” What does this paragraph describe?', 'Internal Fragmentation', 'External Fragmentation', 'Data Fragmentation', 'None of the above', '2', '1'),
(31, 'Which of the following statements is false?\r\n', 'A MODEM, unlike a router, is required for an internet connection.', 'Routers, unlike MODEMs, have security measures', 'MODEMs and routers are independent of each other', 'MODEMs and routers transmit data using packets', '3', '1'),
(32, 'Consider the following pseudocode\nStart\n	c=0\n	t=0\n	m=0\n	for i = 1 to 6\n		c = c + 1\n		t = t + c\n		m = t mod 2\n		display m\n	next i\nEnd\nIf the outputs are put together as a binary number (taking the first output as the MSB and last output as the LSB), what is the binary number obtained?\n', '100111', '101011', '111001', '110011', '4', '1'),
(33, '&lt;html&gt;<br>\n  &lt;head&gt;<br>\n  &lt;meta  charset=&ldquo;UTF-8&rdquo;&gt;<br>\n  &lt;title&gt;  ICT Quiz &lt;/title&gt;<br>\n  &lt;/head&gt;<br>\n  &lt;body&gt;<br>\n  &lt;h1&gt;  &lt;marquee&gt; ICT Quiz Questions &lt;/marquee&gt; &lt;/h1&gt;<br>\n  &lt;img src=&ldquo;test.jpg&rdquo; align=&ldquo;middle&rdquo;&gt;<br>\n  &lt;p&gt; This is the ICT Quiz Questions Website!  &lt;/p&gt;<br>\n  &lt;p&gt; All the answers &lt;br&gt; are here! &lt;/p&gt;<br>\n&lt;/body&gt;<br>\n&lt;/html&gt; \n\nWhat is true regarding the above coding in HTML5?', 'The ‘meta’ tag has not been closed properly', 'The image will not be in the middle', 'There is a blank line in-between “All the answer” and “are here!”', 'The marquee tag does not work on a heading ', '2', '1'),
(34, 'Which of the following is a property that was first introduced in CSS 3?', 'text-decoration', 'max-width', 'outline', 'columns', '4', '1'),
(35, 'Which of the following statements regarding the boot up process of a computer is true?', 'If an error is encountered during the POST, an error code is displayed', 'MBR is generally located in the final sector of the computer’s hard disk', 'A different OS may sometimes require a different boot loader', 'CMOS RAM is volatile', '3', '1'),
(36, 'Which of the following statements regarding the BIOS is not true?', 'In a computer, the BIOS is only used during the boot up process', 'A lack of power while flashing the BIOS may render the system unbootable', 'BIOS is succeeded by UEFI', 'None of the above', '1', '1'),
(37, 'Which of the following statements regarding processes and threads is not true?', 'A process can have multiple threads', 'Threads (like processes) are independent of each other', 'Processes require more resources than threads', 'Unlike processes, threads do not need to interact with the OS when switching', '2', '1'),
(38, 'Which of the following definitions are accurate?\nA – Multithreading OS: Multiple programs are run simultaneously on a computer with only one processor\nB – Real Time OS: Multiple people at different terminals use one system in real time or simultaneously\n', 'Only A', 'Only B', 'All of the above', 'None of the above ', '4', '1'),
(39, 'Which of the following Boolean Laws can be used to solve A+(A)not.B in the least amount of steps?', 'Idempotent Law', 'Common Identity Law', 'Distributive Law', 'Absorption Law', '2', '1'),
(40, 'Which of the following names at least one of the inventors of each of the main technologies in the first, second and third generation of computers respectively?', 'John Ambrose Fleming, William Shockley, Robert Noyce', 'John Ambrose Fleming, Jack Kilby, John Bardeen', 'John Ambrose Fleming, Walter House Brattain, Stanley Mazor', 'None of the above', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamname` varchar(50) NOT NULL,
  `teampassword` varchar(100) NOT NULL,
  `schoolname` text NOT NULL,
  `schooladdress` text NOT NULL,
  `tic` varchar(100) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `contactmail` varchar(100) NOT NULL,
  `mem1` varchar(100) NOT NULL,
  `mem1email` varchar(100) NOT NULL,
  `mem1contact` varchar(100) NOT NULL,
  `mem2` varchar(100) NOT NULL,
  `mem2email` varchar(100) NOT NULL,
  `mem2contact` varchar(100) NOT NULL,
  `mem3` varchar(100) NOT NULL,
  `mem3email` varchar(100) NOT NULL,
  `mem3contact` varchar(100) NOT NULL,
  `mem4` varchar(100) NOT NULL,
  `mem4email` varchar(100) NOT NULL,
  `mem4contact` varchar(100) NOT NULL,
  `key` varchar(100) NOT NULL,
  `invited` enum('0','1') NOT NULL DEFAULT '0',
  `submittedselection` enum('0','1') NOT NULL DEFAULT '0',
  `ipaddress` varchar(100) NOT NULL,
  `proxyaddress` varchar(100) NOT NULL,
  `computername` text NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
