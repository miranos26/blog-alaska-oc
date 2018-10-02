-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 02 oct. 2018 à 12:55
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Chapitres');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) DEFAULT NULL,
  `content` text,
  `date_comment` datetime DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) DEFAULT NULL,
  `reported` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `pseudo`, `content`, `date_comment`, `post_id`, `reported`) VALUES
(26, 'Pierre', 'Salut à tous ! ', '2018-09-15 10:56:33', 1, NULL),
(27, 'Jeanne', 'Salut Pierre', '2018-09-15 10:58:13', 1, NULL),
(73, 'Clair', 'Génial !', '2018-09-20 10:40:19', 3, 1),
(29, 'Sophie', 'J\'ai adoré ce passage', '2018-09-15 11:01:46', 1, NULL),
(30, 'Eric', 'Super chapitre ! Vivement le prochain.', '2018-09-15 15:02:20', 1, 1),
(31, 'Elodie', 'Merci pour ce merveilleux roman Jean, j\'ai vraiment hâte de découvrir la suite.', '2018-09-15 15:26:25', 1, 1),
(32, 'Martine', 'Super chapitre ! Vivement le prochain.', '2018-09-15 15:27:39', 1, 1),
(70, 'Simon', 'Je suis d&#039;accord', '2018-09-17 17:48:08', 1, 1),
(81, 'Eric', 'Une décision difficile en effet...', '2018-09-25 15:31:26', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` int(49) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(49) DEFAULT NULL,
  `email` varchar(49) DEFAULT NULL,
  `message` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `date`) VALUES
(10, 'Alain Dupont', 'Alain.Dupont@lagazette.com', 'Bonjour Jean, je travaille pour La Gazette Magazine et j&#039;aimerais, si vous êtes d&#039;accord vous interviewé. Seriez-vous disponible semaine 52 svp ? Cordialement, Alain Dupont.', '2018-10-01 16:39:58');

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(49) NOT NULL,
  `email` varchar(49) NOT NULL,
  `suscribe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`, `suscribe_date`) VALUES
(3, 'Dubois', 'marc.dubois@yahoo.fr', '2018-09-21 15:01:37'),
(4, 'Duprès', 'dupres.hyves@gmail.com', '2018-09-21 15:01:58'),
(7, 'Josianne Doe', 'jojo@yahoo.fr', '2018-10-01 16:58:53'),
(8, 'Pierre Ducroc', 'ducroc@sfr.fr', '2018-10-01 17:01:17'),
(9, '&amp;lt;bold&amp;gt; Coucou &amp;lt;/bold&amp;gt;', 'fsfsq@fssqf.com', '2018-10-01 17:01:41'),
(10, 'fsqdfsqdfsqfd', 'fqsfqsd@fsdfsqd', '2018-10-02 05:52:41'),
(11, 'fsfsqffsqdf', 'fsdqf@sdfsqdf', '2018-10-02 05:54:06');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `category_id`, `featured_image`) VALUES
(1, 'Des envies de voyages...', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus, ante egestas mollis vulputate, odio enim rhoncus ex, volutpat ultrices libero elit et lectus. Aliquam eget neque eros. Nam ipsum nulla, pretium vel mauris vitae, rhoncus egestas ipsum. Duis tincidunt quam id porta congue. Praesent sit amet elit erat. Phasellus vel dapibus ex, in laoreet risus. In et turpis vitae velit consequat condimentum nec tempor diam. Quisque tristique mattis elementum. Sed eu lobortis turpis. Mauris id pulvinar nisi.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Sed vel euismod quam, ut feugiat lacus. Vestibulum neque ante, aliquet id vulputate quis, rutrum a eros. Duis id diam lectus. Etiam eget risus semper, congue metus eu, cursus tellus. In hac habitasse platea dictumst. In imperdiet vehicula luctus. Maecenas eget ultricies turpis, id venenatis quam. Curabitur dapibus lacus quis mi luctus eleifend. In ac vestibulum nisl, ut fringilla nulla. Aenean ac maximus tellus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In mauris urna, varius vel augue eu, ultricies viverra massa. Fusce tincidunt urna iaculis leo sagittis, nec ornare justo elementum. Suspendisse ullamcorper sapien mi, in volutpat urna condimentum vel. Vivamus accumsan ultricies venenatis. Etiam nec felis lectus. Nullam vestibulum sodales nibh eu dictum. Duis bibendum sollicitudin efficitur.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">&nbsp;</p>', '2018-08-30 22:00:00', 1, 'img/postsImages/5baa2d22558bc.jpg'),
(2, 'Rencontre inattendue', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet justo lorem. Nam consectetur aliquet massa, id luctus diam vulputate suscipit. In hac habitasse platea dictumst. Vestibulum vitae feugiat neque. Mauris volutpat purus nibh, quis tincidunt nunc tincidunt sit amet. Vivamus ex ex, pulvinar ac massa ac, luctus dapibus nunc. Duis cursus enim non pharetra pharetra. Mauris et porta felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Aliquam dignissim, eros nec elementum sodales, odio nunc mollis nisl, semper tempor enim augue eu lorem. Pellentesque dapibus nibh a iaculis blandit. Duis sodales tincidunt eleifend. Mauris sodales vitae velit ac tristique. Donec ac ex a sapien vehicula tristique sit amet aliquet tellus. Phasellus ac arcu ligula. Fusce lectus erat, condimentum vitae leo vestibulum, faucibus mattis diam. Morbi eget faucibus ex. Pellentesque efficitur pellentesque dolor vitae vestibulum. Sed egestas porttitor bibendum. Sed porta mauris id nulla scelerisque vestibulum. Aliquam eget euismod lectus. Nam ornare mi libero, nec posuere erat rhoncus quis. Vestibulum arcu tellus, vestibulum vel dignissim nec, rutrum quis dolor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Nullam tellus lacus, interdum ut molestie vel, semper ut justo. Curabitur faucibus odio id justo finibus, iaculis pulvinar arcu sodales. Suspendisse quis lectus enim. Nunc pharetra nibh ac neque lacinia cursus. Praesent ut arcu iaculis, tristique quam et, rhoncus turpis. Ut auctor urna justo, sit amet gravida libero vulputate a. In placerat laoreet velit. Nunc lobortis risus vel <em>magna</em> pulvinar mollis. Quisque non sem id massa convallis sagittis sed ac neque. Aliquam leo risus, porta quis tellus nec, varius porttitor purus. Suspendisse in justo ac massa molestie dapibus. Maecenas leo ligula, laoreet at turpis vel, <strong>varius mattis</strong> leo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Duis felis mauris, aliquam eu libero posuere, feugiat ultricies mauris. Vivamus placerat, tortor at tincidunt ullamcorper, mauris magna vulputate velit, eget dapibus tortor velit ut turpis. Fusce finibus magna non mattis lacinia. Vestibulum euismod scelerisque urna a viverra. Fusce tristique auctor mauris nec lacinia. Vivamus non aliquam massa, sit amet mattis ante. Vestibulum mollis consequat velit sit amet condimentum. Fusce et elit vitae sem facilisis faucibus id eget metus. Suspendisse quis pretium odio. Suspendisse tempor <strong>pharetra elementum</strong>. Aliquam tempus sem a venenatis vestibulum. Quisque eu congue erat, sed convallis ante. Praesent dapibus ac arcu eget aliquam.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Sed gravida pretium enim a finibus. Pellentesque lacus felis, maximus non augue et, accumsan malesuada lorem. Phasellus tempor, mi ut fringilla eleifend, urna ante cursus magna, eget faucibus magna sapien ac turpis. Duis euismod mollis odio at efficitur. Vivamus blandit fringilla orci at malesuada. Suspendisse eget auctor lacus. Ut rutrum est sed sem posuere, vitae ultricies augue iaculis. Sed placerat dictum dui vitae porta. Mauris justo ligula, bibendum vel ipsum quis, posuere porttitor nunc. Integer pretium eros leo, at sodales odio vestibulum ornare.</p>', '2018-09-20 17:35:42', 1, 'img/postsImages/5baa2d1cb889d.jpg'),
(3, 'Juneau', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique purus mi, sed luctus nunc bibendum sit amet. Cras convallis neque nibh, id sollicitudin orci euismod imperdiet. Etiam maximus dui non ex dapibus, et ultricies augue ullamcorper. Quisque mollis varius mauris eu imperdiet. Proin lobortis in sem ac dictum. Pellentesque et posuere lacus. Integer vulputate ex vel sapien consequat tincidunt. Duis eget finibus turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Fusce sagittis accumsan semper. Sed a ullamcorper sapien, sit amet tristique augue. Nunc sit amet dui vitae ex finibus congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra in turpis cursus porta. Phasellus eget libero non sapien rutrum aliquet sit amet nec augue. Sed lorem ante, eleifend et efficitur a, finibus in lectus. Duis tincidunt massa eget ex molestie varius. Maecenas quis neque at sapien imperdiet feugiat. Ut in ornare elit. Aliquam erat volutpat. Proin porttitor dui ut dui consectetur, vel vestibulum quam laoreet. Sed sollicitudin pellentesque cursus. Fusce mollis mollis finibus. Fusce finibus eget nunc vitae sodales. Nulla a tempor tortor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Nulla tincidunt orci eros, sit amet vulputate diam finibus eu. Duis vulputate vestibulum purus, vel placerat quam pellentesque eget. Aenean odio ex, mollis non diam eu, tristique facilisis metus. Morbi non quam eu lectus faucibus varius. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec fermentum urna vitae eros faucibus finibus. Donec et ligula congue, semper nunc vel, tristique ex. Aliquam in est a sapien tempor lobortis. Quisque condimentum sagittis nunc quis tempor. Maecenas arcu mauris, cursus eget magna sed, mattis porta dui. Donec eu risus id massa scelerisque dignissim ac quis purus. Donec posuere ante quis ipsum gravida, sed volutpat est dictum. Integer at orci eget velit iaculis sodales vel finibus risus. Aliquam id auctor metus. Proin sed turpis commodo, aliquet metus vitae, cursus ante. Quisque porta porta dignissim.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis elit nisl, feugiat a semper vel, pretium ornare ligula. Aenean mattis rutrum placerat. Ut aliquet nibh non lacus molestie, vitae lacinia sapien viverra. Nam ac feugiat nibh. Quisque aliquam risus eu suscipit tristique. Duis dictum, tortor quis elementum fringilla, sem mauris congue ante, ac gravida risus ante eget ante. Nulla facilisi. Proin a justo magna. Duis libero purus, bibendum et faucibus pulvinar, dapibus vitae metus. Nunc eu lacinia nunc, ac gravida neque. Duis ut purus sem. Maecenas nec rutrum erat. Donec accumsan nibh volutpat, posuere felis eget, tempor massa. Vestibulum imperdiet ultrices purus, in tincidunt lectus mattis eu. Mauris quis fringilla lacus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Nulla aliquam sapien ac dolor congue tincidunt. Fusce sit amet dolor malesuada magna vestibulum commodo at ac odio. Vestibulum non sollicitudin sapien. Duis gravida nisi vitae libero euismod volutpat. Sed interdum nibh id orci ullamcorper auctor. Mauris id diam tincidunt, semper ex vel, venenatis quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a erat in augue tincidunt commodo et a neque. Nullam pharetra libero ac ultrices dictum. In pharetra nisi libero, ut sagittis magna laoreet sit amet. Suspendisse auctor bibendum erat in placerat.</p>', '2018-09-20 17:42:46', 1, 'img/postsImages/5baa2d163ac37.jpg'),
(4, 'Seul face à la nature', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ultrices leo vitae augue egestas, eu convallis ex aliquam. Curabitur scelerisque iaculis hendrerit. Vestibulum quis hendrerit est. Nam nibh risus, posuere quis accumsan id, rutrum in eros. Pellentesque vitae pretium velit. Praesent porta lectus turpis, sollicitudin eleifend risus dignissim sit amet. Nunc bibendum lacinia mauris ut tempor. Integer sodales eros sit amet mollis lobortis. Nam sed libero eget nunc convallis elementum sagittis quis diam. Aenean a molestie eros, vel vulputate nisl. Nam pharetra sem tincidunt mollis volutpat. Pellentesque pharetra ligula at risus condimentum, non interdum justo laoreet. Cras ultrices fringilla varius. Donec ornare quam metus, at feugiat elit vulputate sed.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum sodales consectetur. Suspendisse condimentum nisl nec purus euismod, nec commodo purus pretium. Nulla mattis dictum dolor ut vulputate. Etiam in elit tempus, interdum augue non, congue diam. Vestibulum justo ipsum, iaculis non rhoncus in, molestie vel ipsum. Praesent dictum magna auctor diam condimentum, ac sodales sem volutpat. Nunc consequat dolor tortor, sit amet aliquet erat consectetur ut. Suspendisse id gravida nunc. Donec libero arcu, bibendum quis mollis sed, porta eget est. In eget arcu sit amet lectus eleifend mattis id ut risus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut vitae gravida eros. Praesent ac scelerisque massa. Suspendisse finibus sagittis nunc eget convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec vulputate felis eget diam condimentum porttitor. Donec dignissim lacus orci, nec ultrices elit tincidunt vel. Etiam tempus non dolor id pharetra. Quisque velit arcu, ornare et faucibus id, semper non elit.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Nulla orci diam, convallis vel gravida eget, pharetra viverra tellus. Vestibulum vehicula bibendum lacus. Vestibulum dapibus neque sit amet nisl sagittis facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum semper, turpis sit amet volutpat porta, diam enim rhoncus dolor, in fringilla urna neque sed nulla. Ut a elit a eros mollis sollicitudin vel et sapien. Suspendisse potenti. Duis sed dolor posuere, varius est in, accumsan arcu. Praesent bibendum velit id lobortis ultrices.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Curabitur laoreet tempor risus, eu commodo tellus sodales eget. Nunc non facilisis lectus. Phasellus euismod ultricies eros, eget molestie nulla mattis nec. Aenean porta, risus efficitur dictum imperdiet, tellus tortor venenatis lacus, quis imperdiet justo diam eget nisl. Curabitur tincidunt sem orci, quis sodales tellus tincidunt quis. Donec ac leo neque. Aenean consectetur mattis orci ac pharetra. Maecenas eget semper nunc. Nunc iaculis justo et dui ultrices, quis malesuada lectus ullamcorper.</p>', '2018-09-20 17:50:03', 1, 'img/postsImages/5baa2d0c8102e.jpg'),
(5, 'Magique', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum elit, fermentum sed semper ut, lacinia ut tortor. Mauris bibendum tincidunt quam, ac vulputate nisl porta eu. Vivamus sollicitudin tellus eget orci vestibulum, sed elementum elit ullamcorper. Etiam in eros sagittis, accumsan leo sed, blandit leo. Donec eu semper quam, et imperdiet sem. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris ultricies magna lacus, vel laoreet purus imperdiet nec. Sed elementum elementum sem, quis rutrum quam placerat in. Donec ac risus euismod, facilisis ligula non, pretium magna. Fusce ut erat fringilla, vulputate sem nec, varius ex. Morbi sed dolor ac nunc convallis varius nec ut nunc. Donec sit amet nisl a mi consequat cursus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Donec at sem mollis, vehicula erat ut, vehicula turpis. Sed sed massa vitae orci blandit facilisis. Ut vitae lectus porta, porttitor mi eu, congue mi. In sem lectus, facilisis id pretium in, mattis tincidunt enim. Nullam laoreet odio eget risus vehicula pretium. Etiam in sem eget purus aliquam rhoncus. Aenean velit neque, pellentesque non rhoncus sit amet, facilisis vitae odio. Nullam quis felis et odio dictum blandit. Quisque sagittis eros eu justo euismod, vitae molestie massa faucibus. Phasellus id fringilla odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In feugiat laoreet sem vel eleifend. Sed malesuada erat massa, a dignissim turpis consequat sit amet. Donec quis dolor eu lacus rhoncus volutpat vel eu turpis. Etiam commodo aliquam fermentum. Curabitur ullamcorper non odio eget molestie. Donec consectetur, felis in molestie lobortis, odio ligula consectetur massa, sed euismod nisi diam et nunc. Curabitur id vulputate urna, non lacinia tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam hendrerit sapien in nisi ullamcorper, sed ornare justo viverra. Ut porttitor dignissim ante, non euismod nisi mattis id. Nunc eget tristique quam. Aenean auctor velit nec sodales porttitor. Maecenas quis eleifend risus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Vestibulum congue condimentum massa, vitae malesuada justo. Ut finibus nunc sed rutrum condimentum. Sed magna nisi, ultricies ut magna vitae, tempus laoreet eros. Phasellus est libero, porttitor id molestie ac, semper in justo. Nulla rhoncus ligula vitae ante convallis tempor. Vestibulum sem tortor, commodo pellentesque lorem vel, vulputate tincidunt arcu. Morbi at eros ullamcorper ex viverra auctor ut id eros. Curabitur maximus nisl iaculis pellentesque ornare. Aliquam id elit vitae metus ullamcorper varius at dapibus enim. Etiam iaculis porttitor eros vel venenatis. Morbi aliquet neque in lorem eleifend, ut pharetra urna eleifend. Curabitur at lectus pretium, iaculis mauris et, ornare quam.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Sed efficitur ut orci non condimentum. Ut sed euismod turpis. Maecenas leo lectus, tempor nec lacus et, consequat cursus massa. Suspendisse eget purus eget ipsum venenatis vehicula. Maecenas in dolor in velit volutpat efficitur. Proin a mauris elementum, facilisis sem eget, tempor nibh. In nunc velit, efficitur non dui vitae, dapibus efficitur sem. Donec dui ex, porta maximus erat nec, lobortis maximus purus. Etiam id purus dolor. Pellentesque eget libero non mauris euismod efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat nunc non iaculis imperdiet. Mauris efficitur velit est, eu viverra risus laoreet pulvinar.</p>', '2018-09-20 17:55:33', 1, 'img/postsImages/5baa2d0378aa4.jpg'),
(6, 'Une décision difficile', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat, massa ac convallis finibus, erat massa auctor ex, non porta odio velit eget ipsum. Nam molestie nunc ac placerat cursus. Ut gravida magna velit, sit amet scelerisque augue pharetra fermentum. Nullam laoreet dui leo, nec eleifend ipsum bibendum nec. Curabitur lobortis feugiat laoreet. Donec pharetra ut urna ultrices dictum. Duis ex leo, scelerisque vitae elit at, fringilla mattis nisl. Quisque at orci eu arcu dapibus blandit et in mauris. Nunc cursus erat quis pulvinar tempus. Aliquam erat volutpat. Nullam quam est, tempus quis orci quis, fringilla facilisis risus. Ut hendrerit diam a nisi cursus, eu cursus purus blandit.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Donec tincidunt viverra lorem. In eu mollis massa. Nulla vel lacus quis turpis condimentum finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque vitae faucibus quam. Integer magna magna, faucibus vitae lectus lobortis, ultrices ultrices ipsum. Mauris in condimentum est. Pellentesque eu metus venenatis, commodo mi et, tincidunt felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce ac est feugiat nisl efficitur euismod. Praesent malesuada eget lacus vel luctus. Sed dapibus nulla enim, id fringilla urna faucibus in.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pretium, mi dignissim hendrerit fringilla, augue massa rutrum nisl, ut pulvinar ligula dui vitae lacus. Duis tincidunt interdum dolor quis finibus. Suspendisse efficitur tellus quis ipsum mattis cursus. Curabitur in aliquam massa. Praesent congue urna in dolor scelerisque consequat. Pellentesque rutrum dui sit amet massa porta ullamcorper. Etiam cursus consequat ornare. In mattis est sit amet eleifend aliquet. Sed ut lacinia diam, sed mattis ipsum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Nulla vitae ligula hendrerit, tristique eros sed, auctor urna. Phasellus et egestas ante. Mauris ornare bibendum efficitur. Proin bibendum sem vitae velit dignissim, id vehicula urna rutrum. Cras ante ante, placerat non mattis in, interdum vitae libero. Etiam tristique, eros id euismod malesuada, orci mauris ornare lacus, vitae convallis ligula lacus eu nunc. Sed vitae enim magna.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam posuere lacus eget accumsan placerat. Duis et ipsum tristique, imperdiet velit vitae, ornare sapien. Ut cursus elit quis semper imperdiet. Mauris scelerisque enim sed ex gravida, id tempus risus commodo. Vivamus vitae nisi vitae risus bibendum congue sed eget tortor. Aliquam erat volutpat. Etiam quis erat ac urna faucibus pharetra vitae eget nulla. Aliquam erat volutpat. Morbi nec scelerisque augue. Morbi bibendum gravida libero eget auctor. Vestibulum diam arcu, malesuada et mattis eu, ultrices ut tortor. Ut finibus nibh lorem, ut pulvinar nulla interdum et. Edit Test.</p>', '2018-10-02 10:49:36', 1, 'img/postsImages/5bb34d40e6cb2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(19) DEFAULT NULL,
  `nb_connexion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `user_email`, `password`, `role`, `nb_connexion`) VALUES
(1, 'Forteroche', NULL, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
