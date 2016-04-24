-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 06:29 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anime`
--

-- --------------------------------------------------------

--
-- Table structure for table `anm_dl`
--

CREATE TABLE IF NOT EXISTS `anm_dl` (
`id` int(11) NOT NULL,
  `id_anime` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_filehost` int(11) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `anm_file_host`
--

CREATE TABLE IF NOT EXISTS `anm_file_host` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `anm_main`
--

CREATE TABLE IF NOT EXISTS `anm_main` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc_panjang` text,
  `desc_pendek` text,
  `genre` text,
  `slug` varchar(100) NOT NULL,
  `r_1080` int(1) NOT NULL DEFAULT '0',
  `r_720` int(1) NOT NULL DEFAULT '0',
  `r_480` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `anm_main`
--

INSERT INTO `anm_main` (`id`, `title`, `desc_panjang`, `desc_pendek`, `genre`, `slug`, `r_1080`, `r_720`, `r_480`) VALUES
(1, 'Guilty Crown', 'Japan, 2039. Ten years after the outbreak of the "Apocalypse Virus," an event solemnly regarded as "Lost Christmas," the once proud nation has fallen under the rule of the GHQ, an independent military force dedicated to restoring order. Funeral Parlor, a guerilla group led by the infamous Gai Tsutsugami, act as freedom fighters, offering the only resistance to GHQ''s cruel despotism. Inori Yuzuriha, a key member of Funeral Parlor, runs into the weak and unsociable Shuu Ouma during a crucial operation, which results in him obtaining the "Power of Kings"—an ability which allows the wielder to draw out the manifestations of an individual''s personality, or "voids." Now an unwilling participant in the struggle against GHQ, Shuu must learn to control his newfound power if he is to help take back Japan once and for all.Guilty Crown follows the action-packed story of a young high school student who is dragged into a war, possessing an ability that will help him uncover the secrets of the GHQ, Funeral Parlor, and Lost Christmas. However, he will soon learn that the truth comes at a far greater price than he could have ever imagined.', 'Japan, 2039. Ten years after the outbreak of the "Apocalypse Virus," an event solemnly regarded as "Lost Christmas," the once proud nation has fallen under the rule of the GHQ, an independent military force dedicated to restoring order.', '["1","2","6"]', 'gc', 0, 0, 0),
(2, 'Sword Art Online', 'In the year 2022, virtual reality has progressed by leaps and bounds, and a massive online role-playing game called Sword Art Online (SAO) is launched. With the aid of "NerveGear" technology, players can control their avatars within the game using nothing but their own thoughts.Kazuto Kirigaya, nicknamed "Kirito," is among the lucky few enthusiasts who get their hands on the first shipment of the game. He logs in to find himself, with ten-thousand others, in the scenic and elaborate world of Aincrad, one full of fantastic medieval weapons and gruesome monsters. However, in a cruel turn of events, the players soon realize they cannot log out; the game''s creator has trapped them in his new world until they complete all one hundred levels of the game.In order to escape Aincrad, Kirito will now have to interact and cooperate with his fellow players. Some are allies, while others are foes, like Asuna Yuuki, who commands the leading group attempting to escape from the ruthless game. To make matters worse, Sword Art Online is not all fun and games: if they die in Aincrad, they die in real life. Kirito must adapt to his new reality, fight for his survival, and hopefully break free from his virtual hell.', 'In the year 2022, virtual reality has progressed by leaps and bounds, and a massive online role-playing game called Sword Art Online (SAO) is launched. With the aid of "NerveGear" technology, players can control their avatars within the game using nothing but their own thoughts.', '', 'sao', 0, 0, 0),
(3, 'Sword Art Online II', 'One year after the SAO incident, Kirito is approached by Seijiro Kikuoka from Japan''s Ministry of Internal Affairs and Communications Department "VR Division" with a rather peculiar request.That was an investigation on the "Death Gun" incident that occurred in the gun and steel filled VRMMO called Gun Gale Online (GGO). "Players who are shot by a mysterious avatar with a jet black gun lose their lives even in the real world..." Failing to turn down Kikuoka''s bizarre request, Kirito logs in to GGO even though he is not completely convinced that the virtual world could physically affect the real world.Kirito wanders in an unfamiliar world in order to gain any clues about the "Death Gun." Then, a female sniper named Sinon who owns a gigantic "Hecate II" rifle extends Kirito a helping hand. With Sinon''s help, Kirito decides to enter the "Bullet of Bullets," a large tournament to choose the most powerful gunner within the realm of GGO, in hopes to become the target of the "Death Gun" and make direct contact with the mysterious avatar.', 'One year after the SAO incident, Kirito is approached by Seijiro Kikuoka from Japan''s Ministry of Internal Affairs and Communications Department "VR Division" with a rather peculiar request. That was an investigation on the "Death Gun" incident that occurred in the gun and steel filled VRMMO called Gun Gale Online (GGO).', '', 'sao-2', 0, 0, 0),
(4, 'Kuma Miko', 'The story follows Machi, a middle school student who serves as a shrine maiden at a Shinto shrine enshrining a bear in the recesses of a certain mountain in Japan''s northern Touhoku region. Machi''s guardian is a talking bear named Natsu, and one day Machi says to Natsu, "I want to go to a school in the city." The worrywart Natsu then gives Machi — who is ignorant in the ways of the world — a set of trials that she must pass in order to be able to survive in the city.\r\n', 'The story follows Machi, a middle school student who serves as a shrine maiden at a Shinto shrine enshrining a bear in the recesses of a certain mountain in Japan''s northern Touhoku region. Machi''s guardian is a talking bear named Natsu, and one day Machi says to Natsu, "I want to go to a school in the city.', '["1","2","3"]', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `anm_res`
--

CREATE TABLE IF NOT EXISTS `anm_res` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anm_dl`
--
ALTER TABLE `anm_dl`
 ADD PRIMARY KEY (`id`), ADD KEY `id_res` (`id_res`), ADD KEY `id_anime` (`id_anime`), ADD KEY `id_res_2` (`id_res`), ADD KEY `id_filehost` (`id_filehost`);

--
-- Indexes for table `anm_file_host`
--
ALTER TABLE `anm_file_host`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anm_main`
--
ALTER TABLE `anm_main`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anm_res`
--
ALTER TABLE `anm_res`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anm_dl`
--
ALTER TABLE `anm_dl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anm_file_host`
--
ALTER TABLE `anm_file_host`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anm_main`
--
ALTER TABLE `anm_main`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `anm_res`
--
ALTER TABLE `anm_res`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anm_dl`
--
ALTER TABLE `anm_dl`
ADD CONSTRAINT `dl_filehost` FOREIGN KEY (`id_filehost`) REFERENCES `anm_file_host` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `dl_main` FOREIGN KEY (`id_anime`) REFERENCES `anm_main` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `dl_res` FOREIGN KEY (`id_res`) REFERENCES `anm_res` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
