-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 déc. 2018 à 08:13
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
-- Base de données :  `tricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
('d19f86fa-2bea-418f-a3d0-160b0eed3a6c', 'Flips'),
('b885523a-2bce-42df-a554-a27493681771', 'Grabs'),
('b0c468bd-ac7a-41a7-9a4a-8b0336c14e56', 'Old School'),
('99d43c8a-35df-43db-8132-9a75af6cd75d', 'One Foot Tricks'),
('388c0401-2b59-45eb-b2df-7cd0099f60a1', 'Rotation'),
('4ba24898-9a5d-4b4d-bca8-8aa3d275dcff', 'Rotation désaxées'),
('f8ce7494-7570-466c-9d5d-5378338696c8', 'Slides');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `trick_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `author_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CB281BE2E` (`trick_id`),
  KEY `IDX_9474526CF675F31B` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `trick_id`, `message`, `created_at`, `author_id`) VALUES
('1bf1d369-72f0-4c6e-8a02-b77394fd3e1a', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:17:54', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('5e28cfa2-fe3c-49b4-b251-7278ba6f248e', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:17:05', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('74c5e412-dcbb-4b11-b148-6a08f80028f9', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:17:46', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('77c6c61b-91af-4dab-ac54-26dd0def7415', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:17:25', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('a27f17ad-c0a7-4536-a0d0-744f9121a7e0', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-03 11:54:09', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('a48965ac-4013-4ade-8105-b4ab57c1faab', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:17:35', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('ae303fae-2375-419e-af74-604b1a16c205', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:17:13', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789'),
('f47cea34-efdf-4d3e-b2e3-01e3a8179108', '0c1c882b-67b4-47ca-8012-1e39631dfe33', 'test', '2018-12-02 09:16:56', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `trick_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045FB281BE2E` (`trick_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `trick_id`, `url`) VALUES
('020394a7-2835-486b-91ee-ad7dad7a2147', NULL, 'a09935b1a0bb158588e33c698e3ca8cc.jpeg'),
('13136d77-f914-4771-86c7-9ad184493cbe', NULL, '4072f6873427e9265b30142aa725e590.jpeg'),
('200d0952-9658-4150-afa6-21db44acd2f3', 'a96979a9-e1e2-453d-b99b-9f02584ed9e6', '9ca3e35723c0759ea190d806fdcc50ed.jpeg'),
('4af979b5-77af-4052-b372-a07133019ff4', NULL, '7d6803133079720508d1ec7a785f5027.jpeg'),
('4b1342fd-fa13-46e7-afab-8e7dca7507c0', NULL, '902f24357320aed0eddfb796d079d75a.jpeg'),
('5e9f8319-dc1b-45cb-b0f1-a6b3abfcbb96', NULL, '29789b23a269fbf14f6e52f6200fcf46.jpeg'),
('60f0eaa2-1973-45bf-980d-a3164b03f92c', NULL, 'a9c0c4a6ede6bf899eaee5b066c879fa.jpeg'),
('75b737ba-61ad-4525-a1d5-42f35086f3a8', '472b690b-28c5-46dc-bb2e-b708acad97cd', '33adb9158ea0527c1eb4ad0566c3738b.jpeg'),
('813559bc-3e62-4058-b8b0-643559869ecc', NULL, 'e08e73395807497827ba547f46700150.jpeg'),
('83606e55-6591-4b14-89eb-76ab8882ece3', NULL, '7f5a74d75701839af1263cf33e3069a3.jpeg'),
('a1eeafe5-15fe-4453-a50f-3347d0a1a213', NULL, 'e32c6c51735553487bc09464fd68c706.jpeg'),
('a50da85a-b2c6-4863-bec6-b3e3f6485620', 'a96979a9-e1e2-453d-b99b-9f02584ed9e6', '5d946b8ef6d948ea2d94914f1da7405d.jpeg'),
('ac045275-9b3f-453c-bfb2-000309a3e42b', NULL, '84ea2d74258989b89476701c2baa7e13.jpeg'),
('b6388e17-cbb7-47ea-ad92-f233dc977eeb', NULL, 'd86c5caddc39e011f866c9e4995e4fe6.jpeg'),
('bc29279e-283c-48a1-9e5d-01f50e3432c3', NULL, 'ffecd2f34676fe1d3ea931567fee929c.jpeg'),
('c2df3a2f-4c93-46f0-92e6-431717cb280d', NULL, '4f6002d4cb1ebb3ec0e47dcc592d231b.jpeg'),
('ca4b8006-8a06-45c1-be07-fa988ed99e5d', NULL, '9c8b06c60fff921553bdff076f1fd74a.jpeg'),
('cd5eebdc-e9f8-4b36-8d88-9847fe0786d6', NULL, '9b1cb6cf8ebb560e44f52c4872929cba.jpeg'),
('cf8667fb-e2a0-415a-95e9-20bb521148f1', 'a96979a9-e1e2-453d-b99b-9f02584ed9e6', '45a458cce216572ded15c9d3929206e1.jpeg'),
('d4021671-dec6-4cb7-929b-ab5028913282', NULL, '8363ad2e24c858fe244cc1275c4bb89d.jpeg'),
('dd060b4f-7925-4dbf-8d79-18d469a4a463', NULL, 'e1316a8f900e19e41291b97cbe2655fd.jpeg'),
('ddde44cb-6af6-4755-8094-6393d5f445b4', NULL, 'fe108960898b553ef9e2e23ad6467788.jpeg'),
('dfc0b6fa-a6ef-45b8-b8e9-0b85751735fc', '472b690b-28c5-46dc-bb2e-b708acad97cd', '433efbdc65ad88a89d57ad17a1fb5fde.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181021170525'),
('20181022111459'),
('20181022114727'),
('20181024154123'),
('20181025095607'),
('20181026150521'),
('20181026170857'),
('20181026171327'),
('20181026171601'),
('20181027150623'),
('20181027150852'),
('20181027152421'),
('20181027152733'),
('20181027154412'),
('20181027154534'),
('20181027173246'),
('20181027173355'),
('20181028175112'),
('20181029125902'),
('20181029130010'),
('20181029141841'),
('20181030202725'),
('20181031182310'),
('20181101111819'),
('20181105132740'),
('20181106114651'),
('20181106115325'),
('20181107234102'),
('20181108165233'),
('20181108183707'),
('20181108184517'),
('20181108190443'),
('20181108191137'),
('20181108192358'),
('20181108192629'),
('20181110132512'),
('20181110135550'),
('20181110140917'),
('20181110154253'),
('20181110155519'),
('20181110160422'),
('20181110160521'),
('20181110164901'),
('20181110165140'),
('20181111093640'),
('20181111103300'),
('20181111103350'),
('20181111112730'),
('20181111114716'),
('20181111204354'),
('20181112191245'),
('20181112192329'),
('20181112200215'),
('20181113102741'),
('20181114114252'),
('20181114115212'),
('20181114140317'),
('20181114142450'),
('20181115112248'),
('20181115114246'),
('20181115114503'),
('20181115122700'),
('20181115124132'),
('20181115124338'),
('20181115124702'),
('20181115125105'),
('20181115125927'),
('20181115195959'),
('20181115200300'),
('20181116073433'),
('20181116074226'),
('20181116081943'),
('20181116082329'),
('20181116082634'),
('20181116082800'),
('20181116203750'),
('20181117140953'),
('20181117153040'),
('20181118102718'),
('20181118103558'),
('20181118192219'),
('20181119182548'),
('20181121130031'),
('20181121135240'),
('20181121135541'),
('20181121143459'),
('20181121143720'),
('20181121182823'),
('20181201072832'),
('20181201072923'),
('20181201163010'),
('20181201163229');

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

DROP TABLE IF EXISTS `trick`;
CREATE TABLE IF NOT EXISTS `trick` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `category_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `author_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `defaultImage_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `UNIQ_D8F0A91E989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_D8F0A91E421EF703` (`defaultImage_id`),
  KEY `IDX_D8F0A91E12469DE2` (`category_id`),
  KEY `IDX_D8F0A91EF675F31B` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trick`
--

INSERT INTO `trick` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`, `author_id`, `slug`, `defaultImage_id`) VALUES
('07043b09-577b-4f27-beb9-992033788502', 'b0c468bd-ac7a-41a7-9a4a-8b0336c14e56', 'Method Air', 'Cette figure – qui consiste à attraper sa planche d\'une main et le tourner perpendiculairement au sol – est un classique \"old school\".', '2018-12-03 16:12:22', '2018-12-04 09:18:21', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'method-air', '60f0eaa2-1973-45bf-980d-a3164b03f92c'),
('0c1c882b-67b4-47ca-8012-1e39631dfe33', 'd19f86fa-2bea-418f-a3d0-160b0eed3a6c', 'Backside', 'En langage snowboard, un cork est une rotation horizontale plus ou moins désaxée, selon un mouvement d\'épaules effectué juste au moment du saut.', '2018-12-02 09:16:38', '2018-12-04 10:11:09', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'backside', '813559bc-3e62-4058-b8b0-643559869ecc'),
('37df43c2-a57e-4721-984c-17fe15550ca5', 'b885523a-2bce-42df-a554-a27493681771', 'Mute Japan', 'Grabez en mute et tirez votre planche la spatule vers le ciel (grab difficile à réaliser en rotation).', '2018-12-04 10:35:23', NULL, '7f7bfa58-ea9f-4f45-a1b1-d8913e0f5b37', 'mute-japan', 'a1eeafe5-15fe-4453-a50f-3347d0a1a213'),
('472b690b-28c5-46dc-bb2e-b708acad97cd', 'b885523a-2bce-42df-a554-a27493681771', 'Nose Grab', 'Un Nosegrab est un trick de skateboard qui consiste à saisir la planche avec une main au niveau du nose (avant de la planche) le tout en l\'air en faisant un ollie ... C\'est sûrement un des grabs le plus facile.', '2018-12-03 16:31:59', '2018-12-04 09:11:32', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'nose-grab', 'ca4b8006-8a06-45c1-be07-fa988ed99e5d'),
('534a7440-bab7-4aa2-a1c1-1f34c82af07a', '4ba24898-9a5d-4b4d-bca8-8aa3d275dcff', 'Backside Rodeo 1080', 'À l\'instar du cork, le rodeo est une rotation désaxée, qui se reconnaît par son aspect vrillé. Un des plus beaux de l\'histoire est sans aucun doute le Double Backside Rodeo 1080 effectué pour la première fois en compétition par le jeune prodige Travis Rice, lors du Icer Air 2007. La pirouette est tellement culte qu\'elle a fini dans un jeu vidéo où Travis Rice est l\'un des personnages.', '2018-12-04 10:17:51', '2018-12-04 10:18:38', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'backside-rodeo-1080', '83606e55-6591-4b14-89eb-76ab8882ece3'),
('725456e5-b12b-4de1-9e2e-1b4d7c0032c6', '388c0401-2b59-45eb-b2df-7cd0099f60a1', 'Double Mc Twist 1260', 'Le Mc Twist est un flip (rotation verticale) agrémenté d\'une vrille. Un saut très périlleux réservé aux professionnels. Le champion précoce Shaun White s\'est illustré par un Double Mc Twist 1260 lors de sa session de Half-Pipe aux Jeux Olympiques de Vancouver en 2010. Nul doute que c\'est cette figure qui lui a valu de remporter la médaille d\'or.', '2018-12-04 11:14:51', NULL, '7f7bfa58-ea9f-4f45-a1b1-d8913e0f5b37', 'double-mc-twist-1260', 'ac045275-9b3f-453c-bfb2-000309a3e42b'),
('76cc6d6e-5671-4274-bc1c-96ffeff67629', '388c0401-2b59-45eb-b2df-7cd0099f60a1', 'Switch back 540', 'Rotation arrière à 3 tours complet.', '2018-12-04 11:09:05', NULL, '7f7bfa58-ea9f-4f45-a1b1-d8913e0f5b37', 'switch-back-540', 'cd5eebdc-e9f8-4b36-8d88-9847fe0786d6'),
('7ec5a7d7-a081-4440-b8c1-de98549e165a', '388c0401-2b59-45eb-b2df-7cd0099f60a1', 'Backside Triple Cork', 'En langage snowboard, un cork est une rotation horizontale plus ou moins désaxée, selon un mouvement d\'épaules effectué juste au moment du saut. Le tout premier Triple Cork a été plaqué par Mark McMorris en 2011, lequel a récidivé lors des Winter X Games 2012... avant de se faire voler la vedette par Torstein Horgmo, lors de ce même championnat. Le Norvégien réalisa son propre Backside Triple Cork 1440 et obtint la note parfaite de 50/50.', '2018-12-04 10:22:28', NULL, 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'backside-triple-cork', 'b6388e17-cbb7-47ea-ad92-f233dc977eeb'),
('a96979a9-e1e2-453d-b99b-9f02584ed9e6', 'd19f86fa-2bea-418f-a3d0-160b0eed3a6c', 'Flip 900', 'Le snowboarder effectue une rotation de 900 degrès pendant le saut.', '2018-12-03 10:45:50', '2018-12-04 09:44:05', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'flip-900', '5e9f8319-dc1b-45cb-b0f1-a6b3abfcbb96'),
('d639c7e6-5472-4ab2-bdcb-2442844c7725', 'd19f86fa-2bea-418f-a3d0-160b0eed3a6c', 'Backflip One Foot', 'Comme on peut le deviner, les \"one foot\" sont des figures réalisées avec un pied décroché de la fixation. Pendant le saut, le snowboarder doit tendre la jambe du côté dudit pied. L\'esthète Scotty Vine – une sorte de Danny MacAskill du snowboard – en a réalisé un bel exemple avec son Double Backflip One Foot.', '2018-12-04 10:27:29', NULL, 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'backflip-one-foot', 'ddde44cb-6af6-4755-8094-6393d5f445b4'),
('ede928cf-b6c8-4066-83b8-e33164ad3cfb', 'f8ce7494-7570-466c-9d5d-5378338696c8', 'Gutterball', 'Le Gutterball est un slide avant à un pied (le pied avant est attaché et le pied arrière est dégagé) avec une pince de ceinture de sécurité arrière, ressemblant à la position du corps après avoir lâché une boule de bowling dans un allié. Cette astuce a été inventée et nommée par Jeremy Cameron, qui lui a valu une première place au concours \"FAME WAR\" de Morrow Snowboards en 2009.', '2018-12-03 10:43:08', '2018-12-04 10:06:56', 'f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'gutterball', '13136d77-f914-4771-86c7-9ad184493cbe');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `roles` tinytext COLLATE utf8mb4_unicode_ci COMMENT '(DC2Type:array)',
  `reset_password_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `token`, `created_at`, `roles`, `reset_password_token`, `profilImage`) VALUES
('7f7bfa58-ea9f-4f45-a1b1-d8913e0f5b37', 'user', '$2y$13$CF48iVjvD6zztGSKjX.V7eH9BkpZLYKK6t7by0MbzgmAg9MmhkRcC', 'user@email.com', NULL, '2018-12-01 10:07:10', 'a:1:{i:0;s:9:\"ROLE_USER\";}', NULL, '20efcd2a4b63ea3f147652a7b42dee9e.png'),
('f21dcaec-ed9d-4aa5-9c43-c64a09d65789', 'admin', '$2y$13$tBWLivjpwtGtghlzvzsRK.IsowWydhWzWK6rwoA/QqpntxynkTSBO', 'yohanndevlocal@gmail.com', NULL, '2018-10-20 11:39:31', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trick_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CC7DA2CB281BE2E` (`trick_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `url`, `trick_id`) VALUES
('2965f384-f3fa-44ab-883e-b7abea1e5704', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YAABnJfKJ5w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0c1c882b-67b4-47ca-8012-1e39631dfe33'),
('31008155-d23c-4740-b00c-a9a754db62e3', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vquZvxGMJT0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '534a7440-bab7-4aa2-a1c1-1f34c82af07a'),
('6b1500ca-7efa-4e70-8783-11e9e38f336e', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wDoHk1Y6c-w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '76cc6d6e-5671-4274-bc1c-96ffeff67629'),
('8780e9e0-c88c-46fe-9703-47262dffac57', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/URFnYGzu9lU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '7ec5a7d7-a081-4440-b8c1-de98549e165a'),
('a656e6c6-8280-4c0d-8918-e6f8a54cb2dd', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/8ifvMImDkew\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'a96979a9-e1e2-453d-b99b-9f02584ed9e6'),
('b0807880-cc8e-46cb-b11f-35b5032c3d36', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4vUt-4_UGsQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '37df43c2-a57e-4721-984c-17fe15550ca5'),
('b77b566a-01c5-4ffd-8677-f8ebf4283d83', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/M-W7Pmo-YMY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '472b690b-28c5-46dc-bb2e-b708acad97cd'),
('bc6eeb61-c3fb-40a6-bff9-32a298347457', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/evMsZSr6hGM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'ede928cf-b6c8-4066-83b8-e33164ad3cfb'),
('e64c9bff-0a7d-493f-a088-a51bcab0e5e8', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XATkSnCFsRU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '725456e5-b12b-4de1-9e2e-1b4d7c0032c6'),
('f65577ad-3626-4d2b-8735-43a7a7c127be', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2Ul5P-KucE8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '07043b09-577b-4f27-beb9-992033788502');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045FB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `trick`
--
ALTER TABLE `trick`
  ADD CONSTRAINT `FK_D8F0A91E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_D8F0A91E421EF703` FOREIGN KEY (`defaultImage_id`) REFERENCES `image` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D8F0A91EF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
