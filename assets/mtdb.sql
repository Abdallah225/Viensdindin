-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 juil. 2019 à 18:41
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mtdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`actor_id`, `name`) VALUES
(1, 'Abdallah');

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('04155retkh9j4ohqt5e1evfieqac1gkd', '::1', 1564502294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343530323133323b),
('1ck93aibs5k0jpm6hfdrmk7si1paupkd', '::1', 1564485585, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438353336383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('1er5kmpvte9boaci62qkafjp6e2r5e0t', '::1', 1564500376, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343530303336393b),
('1qg5qlc5p6fosm2dl0r8j53rn8ogtlle', '::1', 1564481856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438313630393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('1u5473b40ar57r31rfr072gld95btcla', '::1', 1564483968, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438333638323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('26h28ms43horkor2vg1jee782odhjiqi', '::1', 1564504253, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343530343033323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2234223b6c6f67696e5f747970657c733a313a2230223b),
('295fodqski1fkjc610krfj55toj51aag', '::1', 1564499790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393739303b),
('3tvgbp6ss39veff3uan1mrlvo5kistep', '::1', 1564491392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439313339313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('44m7q9lvuuo8gk7pgi54senap7itfc56', '::1', 1564483322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438333332313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('4adgqm759ipf31dfudaqeklkft5hot03', '::1', 1564493082, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439333038313b),
('4e42r9b207b1qdaotuhjmbhg0265cvhc', '::1', 1564481917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438313931363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('4v1p05iu2u1de8bk4k60e8jv92i6au4m', '::1', 1564484582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438343430333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('6no0k5hlripnn4i61frdh63m3v9v0dn4', '::1', 1564492177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439313837373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('6q9diefkk2qf3iq38fk7vdom1k8bkjih', '::1', 1564486688, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438363533343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('7jl7b93vcate300v4lsmtjb2dlfic0dd', '::1', 1564491265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439303939313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('7vfr2fj5itpq61hfpf6oj75iekln9vp6', '::1', 1564494093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439333831363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('8g8h4si72qesukn2ed5l0n8cs8b610f6', '::1', 1564487864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438373732333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('96fn8f5ptsu87ennqcovvadro26gdens', '::1', 1564492467, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439323138313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('99na68j8mue9qjb8droqrta4croor5gf', '::1', 1564484248, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438333939313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('b57tj3uc9sgko9qhpt77etkm539ec1fd', '::1', 1564497036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439363831323b),
('bang92hpdv2th5ctdnlt87nobmql8mdf', '::1', 1564501391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343530313132343b),
('bf7fqg036a4t64ot2q8rt6l9dpa5poom', '::1', 1564487180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438373138303b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('bo4jom05cljq0l7b3vjld62pmb6g5p4g', '::1', 1564493315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439333038313b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('c4a29cgjal07hps5ahmt9hn1vmf5k7lu', '::1', 1564494695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439343639353b),
('d61lhmcf916cps7rvitld33nv1bmb4b5', '::1', 1564499416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393431353b),
('d8jbjl2j0fg7j4h62glqh4vd6qu15qj0', '::1', 1564488608, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438383630383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('davdmfvdj7kpu9n00v8d0j0k1cs60j8o', '::1', 1564495132, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439353038353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('e5hthafhlmbpa5dha2ho8so78e5frt3m', '::1', 1564498447, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439383235383b),
('fl3ovsa0putfm84k4482h9g9qrejoruu', '::1', 1564493081, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439333038313b),
('gktgvrpbc72lnfq8d5096a4lqg4g8ghg', '::1', 1564499615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393431363b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2236223b6c6f67696e5f747970657c733a313a2230223b),
('gmqrgs3si2c5vrfjdnateirp3aedun49', '::1', 1564496451, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439363434393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('gohk1oml8top6ji6v06k3r8jrgb1qpcu', '::1', 1564492772, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439323438373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('i05009tql4k99hscppg01vnrt7au35oj', '::1', 1564484946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438343934353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('i06ba1d5o83vn3ugbgfst4f8hcm0q4hr', '::1', 1564490914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439303637323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('i0em4qv6082cs1kin9g3k57ql0ea363e', '::1', 1564499288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393238383b),
('i326kjmdc7u3b84ivkeb0sngeskq55f9', '::1', 1564499884, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393739303b),
('i8k1kum7p8a2hguv5ass4d3tabcctf1n', '::1', 1564501658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343530313634303b),
('jlriec4j63uq43g1es26eve2k9ja10p2', '::1', 1564488484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438383232353b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('jn9pv2m21cf0tef1tv1d6bu8t32mipd8', '::1', 1564498971, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439383731343b),
('jq2hn7d6ffiq0ileoim7ne8sssd5s3kv', '::1', 1564486499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438363230343b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('k4gu2hlcnoha1smurcmvmmp70b411trm', '::1', 1564494970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439343639353b),
('kpim76lf64t9ufu6mhqshdttj8qt06ch', '::1', 1564499790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393739303b),
('lffjn8pudm56r2c3ook5k63v038fi78u', '::1', 1564496812, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439363831313b),
('ml1jbqbui3u3201qg01oq6iee06nvb26', '::1', 1564490540, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439303237383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('n7j21h5j5dbv13rorntp5q4e9ahb6t0p', '::1', 1564485791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438353731393b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('n9apth00p1nbros4m8fllmeqg3v4aopk', '::1', 1564489201, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438393031373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('na99h2loahaa5o4ec925ca7dhidu8tnb', '::1', 1564499288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393238383b),
('q5bclia1vnak3h8babesniasj494hbgf', '::1', 1564499416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439393431353b),
('r7olnck1om5ld6vm0mr4naeihii76udd', '::1', 1564493756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439333439323b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('rjnv1t27gr3kbnl7brg3bbb33npuqpt5', '::1', 1564494696, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439343639353b),
('rlvhmp43seqa24d5t1d7phk5qo6bg22l', '::1', 1564483284, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438333030373b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('sdmt97nenepf1h7qe22gs0ekfnovs3n3', '::1', 1564502566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343530323436383b),
('sdn25hkj4kphjqe8mbfum2olbe5qq8bq', '::1', 1564482966, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438323637333b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('sfe892kaci9qk5vpjqj6ju8sd6alai0d', '::1', 1564488810, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343438383630383b757365725f6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6c6f67696e5f747970657c733a313a2231223b),
('sjpqgd9utvbgtp4lfg9rabgjl12nrc78', '::1', 1564496812, 0x5f5f63695f6c6173745f726567656e65726174657c693a313536343439363831313b);

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `episode_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` longtext COLLATE utf8_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(1, 'Qu\'est ce que Viensdinin ?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, quas facere veniam iste sint maxime ad esse harum inventore perspiciatis! Officia quidem sint qui maiores aperiam ipsam nesciunt ex voluptatem?'),
(2, ' QUELS SONT LES FORFAITS?', 'There are 4 package \r\n<ol>\r\n<li>Base: 1 écran utilisateur pour 1000 Fcfa par mois</li>\r\n<li>Standard : 2 écran utilisateur pour 1000 Fcfa par mois</li>\r\n<li>Premium: 4 écran utilisateur pour 1000 Fcfa par mois</li>\r\n</ol>'),
(3, 'COMBIEN DE DISPOSITIFS PUIS-JE UTILISER?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, quas facere veniam iste sint maxime ad esse harum inventore perspiciatis! Officia quidem sint qui maiores aperiam ipsam nesciunt ex voluptatem?');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`) VALUES
(1, 'Action'),
(2, 'jeu'),
(3, 'animé');

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`) VALUES
(1, 'date', ''),
(2, 'package', ''),
(3, 'service_period', ''),
(4, 'payment_method', ''),
(5, 'total', ''),
(6, 'cancel_your_membership', ''),
(7, 'Click_Finish_Cancellation_below_to_cancel_your_membership', ''),
(8, 'Cancellation_will_be_effective_immedietly_after_your_confirmation', ''),
(9, 'Restart_your_membership_anytime. Your_viewing_preferences_will_be_saved_always', ''),
(10, 'cancel_plan', ''),
(11, 'Finish_Cancellation', ''),
(12, 'Edit_Profile', ''),
(13, 'Change_Email', ''),
(14, 'Current_Email', ''),
(15, 'New_Email', ''),
(16, 'Current_Password', ''),
(17, 'Frequently_asked_question', ''),
(18, 'Faq', ''),
(19, 'Refund_Policy', ''),
(20, 'Forgot_Email/_Password', ''),
(21, 'Enter_your_email_address. We_will_send_you_a_temporary_password.', ''),
(22, 'Email', ''),
(23, 'Email_me', ''),
(24, 'Movie', ''),
(25, 'Tv_Serial', ''),
(26, 'Admin', ''),
(27, 'Account', ''),
(28, 'Sign_out', ''),
(29, 'PLAY', ''),
(30, 'See_what_is_next.', ''),
(31, 'WATCH_ANYWHERE.', ''),
(32, 'CANCEL_ANYTIME.', ''),
(33, 'JOIN_TODAY', ''),
(34, 'Cancel_subscription_anytime', ''),
(35, 'Watch_from_anywhere', ''),
(36, 'Pricing_packages', ''),
(37, 'If_you_decide_Videoflix_is_not_for_you, no_problem.', ''),
(38, 'No_commitment. Cancel_online_anytime.', ''),
(39, 'Watch_TV_shows_and_movies_anytime, anywhere. From_any_device.', ''),
(40, 'Watch_on_your_tv', ''),
(41, 'Watch_on_your_phone, tablet', ''),
(42, 'Watch_on_your_pc', ''),
(43, 'Choose_one_plan_and_watch_everything.', ''),
(44, 'Monthly_price', ''),
(45, 'Screens_you_can_watch_on_at_the_same_time', ''),
(46, 'Watch_on_your_laptop, TV, phone_and_tablet', ''),
(47, 'HD_available', ''),
(48, 'Unlimited_movies_and_TV_shows', ''),
(49, 'Cancel_anytime', ''),
(50, 'DONE', ''),
(51, 'movies', ''),
(52, 'Change_Password', ''),
(53, 'New_Password', ''),
(54, 'Save', ''),
(55, 'Add_to_My_list', ''),
(56, 'Added_to_My_list', ''),
(57, 'Genre', ''),
(58, 'Year', ''),
(59, 'About', ''),
(60, 'Cast', ''),
(61, 'More', ''),
(62, 'Episode', ''),
(63, 'Search_result_for', ''),
(64, 'Tv_series', ''),
(65, 'Password', ''),
(66, 'Forget_password', ''),
(67, 'Sign_up', ''),
(68, 'Sign_up_to_start_your_membership', ''),
(69, 'Create_your_account', ''),
(70, 'Email_Address', ''),
(71, 'Register', ''),
(72, 'Who_is_watching', ''),
(73, 'MEMBERSHIP_AND_BILLING', ''),
(74, 'Cancel_Membership', ''),
(75, 'PLAN_DETAILS', ''),
(76, 'Effective_upto', ''),
(77, 'Go_Back', ''),
(78, 'Cancel', ''),
(79, 'Billing_history', ''),
(80, 'MY_PROFILE', ''),
(81, 'Manage_profiles', ''),
(82, 'language_list', ''),
(83, 'add_phrase', ''),
(84, 'add_language', ''),
(85, 'language', ''),
(86, 'option', ''),
(87, 'edit_phrase', ''),
(88, 'delete_language', ''),
(89, 'phrase', ''),
(90, 'value_required', ''),
(91, 'MY_LIST', ''),
(92, 'update_phrase', ''),
(93, 'settings_updated', ''),
(94, 'video_playlist', ''),
(95, 'sign_in', ''),
(96, 'Privacy_Policy', ''),
(97, 'email', '');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_short` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_long` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL,
  `featured` int(11) NOT NULL,
  `kids_restriction` int(11) NOT NULL DEFAULT '0',
  `url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `trailer_url` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `description_short`, `description_long`, `year`, `rating`, `genre_id`, `actors`, `featured`, `kids_restriction`, `url`, `trailer_url`) VALUES
(1, 'instant de vie', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti perspiciatis quae nulla optio maiores, harum reprehenderit labore aperiam architecto deleniti earum dicta fugiat id voluptates quam. Veniam, nihil. Cumque, fugiat!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti perspiciatis quae nulla optio maiores, harum reprehenderit labore aperiam architecto deleniti earum dicta fugiat id voluptates quam. Veniam, nihil. Cumque, fugiat!', 2019, 1, 1, '[]', 0, 0, 'https://player.vimeo.com/video/334024572', 'https://player.vimeo.com/video/334024572'),
(2, 'instant de va', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?', 2019, 2, 1, '[]', 0, 0, 'https://www.youtube.com/embed/D6-g6JgiUIs', 'https://www.youtube.com/embed/D6-g6JgiUIs'),
(3, 'instant de v', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 2019, 3, 1, '[]', 1, 0, 'https://www.youtube.com/watch?v=6DMj76yU25o', 'https://www.youtube.com/watch?v=6DMj76yU25o'),
(4, 'instant de vie', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 2019, 4, 1, '[]', 0, 0, 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4', 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4'),
(5, 'instant de va', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 2019, 0, 1, '[]', 0, 0, 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4', 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4'),
(6, 'instant de vie', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 2019, 0, 1, '[]', 0, 0, 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4', 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4'),
(7, 'instant de vie', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 2019, 5, 1, '[]', 0, 0, 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4', 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4'),
(8, 'instant de vieHH', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident optio omnis mollitia deserunt magnam vitae ea rem neque natus, quasi quaerat possimus doloribus laborum porro similique vero consequuntur corrupti praesentium?\r\n\r\n', 2019, 4, 1, '[]', 0, 0, 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4', 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4'),
(9, 'instant de vie', 'Vhttp://localhost/Test2Netflix/neoflex/index.php?admin/dashboard', 'http://localhost/Test2Netflix/neoflex/index.php?admin/dashboardhttp://localhost/Test2Netflix/neoflex/index.php?admin/dashboardhttp://localhost/Test2Netflix/neoflex/index.php?admin/dashboard', 2019, 6, 2, '[]', 0, 0, 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4', 'http://localhost/Test2Netflix/neoflex/video/Flutter%20-%20%20MVP%20Architecture.mp4');

-- --------------------------------------------------------

--
-- Structure de la table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `screens` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 active, 0 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `plan`
--

INSERT INTO `plan` (`plan_id`, `name`, `screens`, `price`, `status`) VALUES
(1, 'basic', '1', '1000', 0),
(2, 'standard', '2', '1200', 0),
(3, 'premium', '4', '1300', 0);

-- --------------------------------------------------------

--
-- Structure de la table `season`
--

CREATE TABLE `season` (
  `season_id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `season`
--

INSERT INTO `season` (`season_id`, `series_id`, `name`) VALUES
(1, 1, 'Season 1');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `series_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `trailer_url` longtext COLLATE utf8_unicode_ci,
  `description_short` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description_long` longtext COLLATE utf8_unicode_ci NOT NULL,
  `genre_id` int(11) NOT NULL,
  `actors` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'comma separated actor_id',
  `year` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `kids_restriction` int(11) NOT NULL,
  `episodes` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`series_id`, `title`, `trailer_url`, `description_short`, `description_long`, `genre_id`, `actors`, `year`, `rating`, `featured`, `kids_restriction`, `episodes`) VALUES
(1, 'instant de vie', '', 'nds;jhj', 'kljlskj', 1, '[]', 2019, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'site_name', 'viensdindins'),
(2, 'site_email', 'instant2vieStudio@gmail.com'),
(3, 'paypal_merchant_email', ''),
(4, 'invoice_address', ''),
(5, 'language', ''),
(6, 'purchase_code', ''),
(7, 'privacy_policy', ''),
(8, 'refund_policy', ''),
(9, 'stripe_publishable_key', ''),
(10, 'stripe_secret_key', ''),
(11, 'trial_period', 'off'),
(12, 'trial_period_days', ''),
(13, 'theme', 'flixer');

-- --------------------------------------------------------

--
-- Structure de la table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_amount` int(11) NOT NULL,
  `paid_amount` float NOT NULL,
  `timestamp_from` int(11) NOT NULL,
  `timestamp_to` int(11) NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_timestamp` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 active, 0 cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 admin, 0 customer',
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fulname` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user1` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 1',
  `user2` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 2',
  `user3` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 3',
  `user4` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user 4',
  `user1_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user2_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user3_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user4_session` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user1_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user2_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user3_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user4_movielist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user1_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user2_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user3_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user4_serieslist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 banned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `type`, `name`, `fulname`, `number`, `email`, `password`, `user1`, `user2`, `user3`, `user4`, `user1_session`, `user2_session`, `user3_session`, `user4_session`, `user1_movielist`, `user2_movielist`, `user3_movielist`, `user4_movielist`, `user1_serieslist`, `user2_serieslist`, `user3_serieslist`, `user4_serieslist`, `plan_id`, `status`) VALUES
(1, 1, 'Abdallah', '', '', 'diarrassoubaabdoulaye73@gmail.com', 'fcf6e548d45aa63ba9a3a2328eddf020d7679a87', 'user 3', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(2, 0, '', '', '', 'diarrassoubaabaye73@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user 1', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(3, 0, '', '', '', 'diarrassoubaabdoulae73@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user 1', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(4, 0, 'Abdallah', '', '', 'viensdindin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user 1', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(5, 0, '', '', '', 'diarrassoubaaboulaye73@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user 1', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(6, 0, '', '', '', '79545320', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user 1', 'user 2', 'user 3', 'user 4', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Index pour la table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`episode_id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Index pour la table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Index pour la table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`season_id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`series_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Index pour la table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `episode`
--
ALTER TABLE `episode`
  MODIFY `episode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `season`
--
ALTER TABLE `season`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `series_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
