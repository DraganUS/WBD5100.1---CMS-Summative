-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2019 at 06:55 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
                      `ID_news` int(10) UNSIGNED NOT NULL,
                      `title` varchar(245) DEFAULT NULL,
                      `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      `data` varchar(1045) DEFAULT NULL,
                      `users_ID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID_news`, `title`, `date`, `data`, `users_ID`) VALUES
(4, 'The magic Shop1', '2019-04-08 17:19:08', 'Favourite Line: &#39;At that moment a curious crack sounded inside the statue, as if something had broken. The fact is that the leaden heart had snapped right in two. It certainly was a dreadfully hard frost.&#39;\r\n\r\nThis line is extremely effective and moving due to the dramatic irony of the narrator’s suggestion that it was merely the frost that had broken the prince’s heart.\r\n\r\nIn contrast, the reader is able to recognise that it is the prince’s sorrow, and love for the poor little swallow, that has caused the &#39;leaden heart&#39; to snap in two.', 46),
(5, 'The happy prince', '2019-04-08 17:19:53', 'Favourite Line: &#39;I felt him pull at something that clung to my coat-sleeve, and then I saw he held a little, wriggling red demon by the tail--the little creature bit and fought and tried to get at his hand--and in a moment he tossed it carelessly behind a counter... &#34;Astonishing what people will carry about with them unawares!&#34;&#39;\r\n\r\nThe symbolic implication of this line seems to sum up the overall purpose of the story.\r\n\r\nThe narrator, of course, believes the demon belongs to the magic shop, yet the shop owner claims that the narrator has been carrying the little devil around himself.\r\n\r\nThis therefore begs the question – is evil born of our own perceptions?', 46),
(6, 'Stories Abound\n', '2019-04-12 03:46:51', 'If you look around, short stories abound. They can be drawn from something as simple as a trip to the market or as monumental as the death of a family member. Love sparks stories, as does misfortune.', 44),
(10, NULL, '2019-04-15 16:51:53', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                       `ID` int(10) UNSIGNED NOT NULL,
                       `first_name` varchar(145) DEFAULT NULL,
                       `last_name` varchar(145) DEFAULT NULL,
                       `tel` varchar(50) DEFAULT NULL,
                       `email` varchar(545) DEFAULT NULL,
                       `gender` enum('male','female') DEFAULT NULL,
                       `pass` varchar(150) DEFAULT NULL,
                       `age` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first_name`, `last_name`, `tel`, `email`, `gender`, `pass`, `age`) VALUES
(44, 'Miluna', 'Milutic', '321313111', 'novi3@novi.com', 'male', '$2y$06$Yd5CIqpc2U5mHTzwGSxgjutPsZt9swWb6aL.rR972lr92fMgv9yoa', '18'),
(45, 'Pera', 'Peric', '22233222', 'assss@sss.sss', 'female', '$2y$06$jDnJ/2p4vY2FWuNCufOa5upBkPyutFeKSXgEtPAdY6g0wmBPZoD8a', '18'),
(46, 'Dragan', 'Usic', '642161044', 'usic.d.dragan@gmail.com', 'male', '$2y$06$E.MTMQD8VpmdcSvfuqr4I.SzajOGsoA3ZXjgwhuvHfm1SxDKnjvzS', '18'),
(47, 'marko', 'marko', '020012312', 'marko@gmail.com', 'male', '$2y$06$LznrKMQTCEynAJbS51H62OxnyqkZjVHpfK5RAV.xwz7eD5N2yvCBa', '18'),
(48, 'Aleksandra', 'Akic', '0643212113212', 'akic@gmail.com', 'male', '$2y$06$2kUfQCHMIduPfUekuVviFegKYmdQGNK.vx6CIg5jryX0aUVs2Wxda', '21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID_news`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID_news`),
  ADD KEY `fk_news_users_idx` (`users_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID_news` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
