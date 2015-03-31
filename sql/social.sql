-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Värd: localhost:8889
-- Tid vid skapande: 31 mars 2015 kl 11:16
-- Serverversion: 5.5.38
-- PHP-version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `social`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `conversations`
--

CREATE TABLE `conversations` (
`id_conversation` int(10) NOT NULL,
  `username_sender` varchar(100) NOT NULL,
  `username_receiver` varchar(100) NOT NULL,
  `body_message` text NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `conversations`
--

INSERT INTO `conversations` (`id_conversation`, `username_sender`, `username_receiver`, `body_message`, `date_message`) VALUES
(1, 'daca', 'mack', 'hej', '2015-03-18 12:18:16'),
(2, 'eliastjej', 'mack', 'hej', '2015-03-18 15:10:33'),
(3, 'mack', 'daca', 'aiodjsa', '2015-03-19 09:19:05'),
(4, 'mack', 'eliastjej', 'jjajaja', '2015-03-19 12:28:44'),
(5, 'mack', 'daca', '1233', '2015-03-19 12:29:34'),
(6, 'mack', 'eliastjej', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a turpis eu nulla aliquet eleifend ac sit amet massa. Nullam imperdiet, elit non gravida lacinia, mi sem varius dui, id porta massa enim sed justo. Nunc eu commodo magna, non mattis augue. Phasellus suscipit orci libero, non tristique ante euismod et. Integer vestibulum, quam non dapibus efficitur, ligula mi blandit eros, eget malesuada erat dolor ac libero. Nunc ac tortor dapibus, porta nisi a, blandit orci. Nam a elit velit. Nulla pharetra blandit dictum. Aliquam vehicula nunc ac enim dictum, nec lobortis metus posuere. Ut purus neque, congue vitae nisl in, efficitur luctus justo. Suspendisse vel tortor ut velit pharetra rhoncus et sit amet turpis.\r\n\r\nSuspendisse pellentesque libero sed blandit tristique. Sed id pellentesque nibh, vel egestas lorem. Donec quis mattis magna, sit amet egestas nunc. Cras vel ex ante. Fusce suscipit eros leo, sed tincidunt purus tempor non. Nunc ornare velit quis vestibulum mollis. Etiam convallis nunc id risus sollicitudin convallis. Sed a leo eu nibh pellentesque volutpat sit amet pharetra metus.\r\n', '2015-03-19 14:38:09'),
(7, 'daca', 'eliastjej', 'hej', '2015-03-19 15:24:39'),
(9, 'daca', 'ASD', 'Hej', '2015-03-20 09:03:23'),
(10, 'daca', 'Robin from brobook', 'Tja Robin from brobook', '2015-03-20 14:34:09');

-- --------------------------------------------------------

--
-- Tabellstruktur `friends`
--

CREATE TABLE `friends` (
`id_invitation` int(11) NOT NULL,
  `username_sender` varchar(100) NOT NULL,
  `username_receiver` varchar(100) NOT NULL,
  `date_invitation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_confirm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `friends`
--

INSERT INTO `friends` (`id_invitation`, `username_sender`, `username_receiver`, `date_invitation`, `date_confirm`, `active`) VALUES
(78, 'eliastjej', 'mack', '2015-03-19 13:38:50', '0000-00-00 00:00:00', 0),
(81, 'test', 'eliastjej', '2015-03-19 14:00:16', '0000-00-00 00:00:00', 0),
(82, 'daca', 'test', '2015-03-19 14:00:53', '0000-00-00 00:00:00', 0),
(83, 'daca', 'eliastjej', '2015-03-19 14:04:33', '2015-03-19 15:05:55', 1),
(84, 'daca', 'mack', '2015-03-19 14:04:35', '0000-00-00 00:00:00', 0),
(85, 'mack', 'test', '2015-03-19 14:15:05', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `status`
--

CREATE TABLE `status` (
`status_id` int(10) unsigned NOT NULL,
  `status_user_id` int(10) NOT NULL,
  `status_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_username` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `status`
--

INSERT INTO `status` (`status_id`, `status_user_id`, `status_content`, `created_at`, `status_username`) VALUES
(14, 1, 'ejjeje', '2015-03-18 14:33:37', ''),
(15, 11, 'jag Ã¤r en bra flicka', '2015-03-18 14:45:17', ''),
(16, 11, 'jjkjk', '2015-03-18 14:53:54', 'eliastjej'),
(17, 1, 'hej', '2015-03-18 15:03:28', 'daca'),
(18, 1, 'hej', '2015-03-18 15:08:09', 'daca'),
(19, 1, 'test ny', '2015-03-18 15:16:39', 'daca'),
(20, 1, 'asdas', '2015-03-19 09:24:16', 'daca');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
`id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `situation` varchar(18) NOT NULL,
  `about` text NOT NULL,
  `avatar` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `sex`, `situation`, `about`, `avatar`) VALUES
(1, 'daca', '1234', 'danielcansu@gmail.com', 'Man', 'Single', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eleifend arcu sed dolor vehicula, et faucibus ex ullamcorper. Curabitur vel sapien quis augue blandit dapibus. Morbi sit amet auctor tortor.', 'http://sharedseeker.com/file/profile_image/default_profile.jpg'),
(3, 'test', '1234', 'test@test.com', 'Man', 'Single', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eleifend arcu sed dolor vehicula, et faucibus ex ullamcorper. Curabitur vel sapien quis augue blandit dapibus. Morbi sit amet auctor tortor. ', 'http://sharedseeker.com/file/profile_image/default_profile.jpg'),
(11, 'eliastjej', '1234', 'elias@tjej.se', 'Woman', 'Divorced', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eleifend arcu sed dolor vehicula, et faucibus ex ullamcorper. Curabitur vel sapien quis augue blandit dapibus. Morbi sit amet auctor tortor. ', 'http://sharedseeker.com/file/profile_image/default_profile.jpg'),
(12, 'mack', '1234', 'mack@test.com', 'Man', 'Single', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eleifend arcu sed dolor vehicula, et faucibus ex ullamcorper. Curabitur vel sapien quis augue blandit dapibus. Morbi sit amet auctor tortor. ', 'http://sharedseeker.com/file/profile_image/default_profile.jpg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `conversations`
--
ALTER TABLE `conversations`
 ADD PRIMARY KEY (`id_conversation`);

--
-- Index för tabell `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`id_invitation`), ADD KEY `username_receiver` (`username_receiver`), ADD KEY `username_sender` (`username_sender`);

--
-- Index för tabell `status`
--
ALTER TABLE `status`
 ADD UNIQUE KEY `status_id` (`status_id`), ADD KEY `status_user_id` (`status_user_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `conversations`
--
ALTER TABLE `conversations`
MODIFY `id_conversation` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT för tabell `friends`
--
ALTER TABLE `friends`
MODIFY `id_invitation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT för tabell `status`
--
ALTER TABLE `status`
MODIFY `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `friends`
--
ALTER TABLE `friends`
ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`username_receiver`) REFERENCES `users` (`username`),
ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`username_sender`) REFERENCES `users` (`username`);

--
-- Restriktioner för tabell `status`
--
ALTER TABLE `status`
ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`status_user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
