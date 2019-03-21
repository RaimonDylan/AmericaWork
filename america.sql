-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 mars 2019 à 01:44
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `america`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(25) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `passwd`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(4, 'admin', '$2y$10$e.sajQBrhWKUTmts1NIyMeLb6js1nOSlzwIkMB3jneLA2uckh/bAO', 'DJf6u76sLwu3CVpw', '$2y$10$ltxNketjQ7xG.XjwoDIqAOB5TxlUr6QQdzAFqkf6y8UMIKWDHX0Ji', '2018-12-21 15:17:46', 'super');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pc` int(5) UNSIGNED NOT NULL,
  `nbEmploye` int(10) UNSIGNED NOT NULL,
  `typeSector` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `gender`, `address`, `city`, `state`, `phone`, `email`, `date_of_birth`, `created_at`, `updated_at`) VALUES
(18, 'bhushan', 'Chhadva', 'male', 'Padmavati', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1991-06-18', NULL, NULL),
(19, 'Jayant', 'atre', 'male', 'Priyadarshini A102, adwa2', 'wad', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1998-05-18', NULL, NULL),
(21, 'bhushan', 'sutar', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-24', NULL, NULL),
(23, 'Paolo', ' Accorti', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '1992-02-04', NULL, NULL),
(24, 'Roland', ' Mendel', 'male', 'Priyadarshini A102, adwa2', 'mumbai', 'Maharashtra', '34343432', 'bhusahan2@gmail.com', '2016-11-30', NULL, NULL),
(25, 'John', 'doe', 'male', 'City, view', '', 'Maharashtra', '8875207658', 'john@abc.com', '2017-01-27', NULL, NULL),
(26, 'Maria', 'Anders', 'female', 'New york city', '', 'Maharashtra', '8856705387', 'chetanshenai9@gmail.com', '2017-01-28', NULL, NULL),
(27, 'Ana', ' Trujillo', 'female', 'Street view', '', 'Maharashtra', '9975658478', 'chetanshenai9@gmail.com', '1992-07-16', NULL, NULL),
(28, 'Thomas', 'Hardy', 'male', '120 Hanover Sq', '', 'Maharashtra', '885115323', 'abc@abc.com', '1985-06-24', NULL, NULL),
(29, 'Christina', 'Berglund', 'female', 'Berguvsvägen 8', '', 'Maharashtra', '9985125366', 'chetanshenai9@gmail.com', '1997-02-12', NULL, NULL),
(30, 'Ann', 'Devon', 'male', '35 King George', '', 'Maharashtra', '8865356988', 'abc@abc.com', '1988-02-09', NULL, NULL),
(31, 'Helen', 'Bennett', 'female', 'Garden House Crowther Way', '', 'Maharashtra', '75207654', 'chetanshenai9@gmail.com', '1983-06-15', NULL, NULL),
(32, 'Annette', 'Roulet', 'female', '1 rue Alsace-Lorraine', '', ' ', '3410005687', 'abc@abc.com', '1992-01-13', NULL, NULL),
(33, 'Yoshi', 'Tannamuri', 'male', '1900 Oak St.', '', 'Maharashtra', '8855647899', 'chetanshenai9@gmail.com', '1994-07-28', NULL, NULL),
(34, 'Carlos', 'González', 'male', 'Barquisimeto', '', 'Maharashtra', '9966447554', 'abc@abc.com', '1997-06-24', NULL, NULL),
(35, 'Fran', ' Wilson', 'male', 'Priyadarshini ', '', 'Maharashtra', '5844775565', 'fran@abc.com', '1997-01-27', NULL, NULL),
(36, 'Jean', ' Fresnière', 'female', '43 rue St. Laurent', '', 'Maharashtra', '9975586123', 'chetanshenai9@gmail.com', '2002-01-28', NULL, NULL),
(37, 'Jose', 'Pavarotti', 'male', '187 Suffolk Ln.', '', 'Maharashtra', '875213654', ' Pavarotti@gmail.com', '1997-02-04', NULL, NULL),
(38, 'Palle', 'Ibsen', 'female', 'Smagsløget 45', '', 'Maharashtra', '9975245588', 'Palle@gmail.com', '1991-06-17', NULL, '2018-01-14 17:11:42'),
(39, 'Paula', 'Parente', 'male', 'Rua do Mercado, 12', '', 'Maharashtra', '659984878', 'abc@gmail.com', '1996-02-06', NULL, NULL),
(40, 'Matti', ' Karttunen', 'female', 'Keskuskatu 45', '', 'Maharashtra', '845555125', 'abc@abc.com', '1984-06-19', NULL, NULL),
(47, 'Chetan ', 'Doe', 'male', 'afa', NULL, 'Maharashtra', '9934678658', 'chetanshenai9@gmail.com', '0000-00-00', '2018-11-17 18:26:16', '2019-03-17 00:02:46');

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) UNSIGNED NOT NULL,
  `nameCompany` varchar(50) NOT NULL,
  `dtDebut` date NOT NULL,
  `dtFin` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `job`
--

CREATE TABLE `job` (
  `id_job` int(11) UNSIGNED NOT NULL,
  `id_recruiter` int(10) UNSIGNED DEFAULT NULL,
  `id_student` int(10) UNSIGNED DEFAULT NULL,
  `typeContract` varchar(50) NOT NULL,
  `dtDebut` date NOT NULL,
  `dtFin` date NOT NULL,
  `experience` int(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recruiter`
--

CREATE TABLE `recruiter` (
  `id_recruiter` int(11) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recruiter`
--

INSERT INTO `recruiter` (`id_recruiter`, `id_user`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `recruiter_company`
--

CREATE TABLE `recruiter_company` (
  `id_recruiter` int(11) UNSIGNED NOT NULL,
  `id_company` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `school`
--

CREATE TABLE `school` (
  `id_school` int(11) UNSIGNED NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

CREATE TABLE `skill` (
  `id_skill` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `skill_job`
--

CREATE TABLE `skill_job` (
  `id_skill` int(10) UNSIGNED NOT NULL,
  `id_job` int(10) UNSIGNED NOT NULL,
  `type` enum('Obligatoire','Optionnel','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `siteweb` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `hobbies` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id_student`, `id_user`, `siteweb`, `description`, `twitter`, `facebook`, `hobbies`) VALUES
(1, 2, 'http://raimon.fr/', 'dsfsdfsdsfsdfsdfsdf', 'http://raimon.fr/', 'http://raimon.fr/', 'dssdfsdfsdfsfsdfs');

-- --------------------------------------------------------

--
-- Structure de la table `student_job`
--

CREATE TABLE `student_job` (
  `id_student` int(11) UNSIGNED NOT NULL,
  `id_job` int(11) UNSIGNED NOT NULL,
  `dt_apply` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `student_school`
--

CREATE TABLE `student_school` (
  `id_school` int(10) UNSIGNED NOT NULL,
  `id_student` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `student_skill`
--

CREATE TABLE `student_skill` (
  `id_student` int(10) UNSIGNED NOT NULL,
  `id_skill` int(10) UNSIGNED NOT NULL,
  `percentage` int(3) UNSIGNED NOT NULL,
  `nbExpe` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pc` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `l_name`, `f_name`, `phone`, `email`, `address`, `city`, `pc`, `created_at`) VALUES
(2, 'student1', '$2y$10$giARdqLG9coJrEtCqODAWu.7SYbyK..65Yqyfuh9q.t60UX3W1agi', 'jul', 'yeslife', '0606060606', 'yes@gmail.com', 'iuhfdsiuhfsiuh', 'iufhdh', '0', '2019-03-17 14:01:03'),
(3, 'recruiter2', '$2y$10$giARdqLG9coJrEtCqODAWu.7SYbyK..65Yqyfuh9q.t60UX3W1agi', 'ola', 'quetal', '0606060606', 'yes@gmail.com', 'iuhfdsiuhfsiuh', 'iufhdh', '0', '2019-03-17 14:01:03'),
(5, 'utilisateur', '$2y$10$w5NmxI.sYA7ZHSAx2cUKg.a0cHJmbg9oVvw/TDGUWBIzw429AEokK', 'nom', 'prenom', '0606060606', 'test@test.fr', 'iufhshfihsiughifh', 'osifhg', '00000', '2019-03-17 15:21:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `fk_job_recruiter` (`id_recruiter`),
  ADD KEY `fk_job_student` (`id_student`);

--
-- Index pour la table `recruiter`
--
ALTER TABLE `recruiter`
  ADD PRIMARY KEY (`id_recruiter`),
  ADD KEY `fk_recruiter_user` (`id_user`);

--
-- Index pour la table `recruiter_company`
--
ALTER TABLE `recruiter_company`
  ADD PRIMARY KEY (`id_recruiter`,`id_company`),
  ADD KEY `fk_company_workin` (`id_company`);

--
-- Index pour la table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id_school`);

--
-- Index pour la table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Index pour la table `skill_job`
--
ALTER TABLE `skill_job`
  ADD PRIMARY KEY (`id_skill`,`id_job`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `fk_student_user` (`id_user`);

--
-- Index pour la table `student_job`
--
ALTER TABLE `student_job`
  ADD PRIMARY KEY (`id_student`,`id_job`);

--
-- Index pour la table `student_school`
--
ALTER TABLE `student_school`
  ADD PRIMARY KEY (`id_school`,`id_student`);

--
-- Index pour la table `student_skill`
--
ALTER TABLE `student_skill`
  ADD PRIMARY KEY (`id_student`,`id_skill`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recruiter`
--
ALTER TABLE `recruiter`
  MODIFY `id_recruiter` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `school`
--
ALTER TABLE `school`
  MODIFY `id_school` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_recruiter` FOREIGN KEY (`id_recruiter`) REFERENCES `recruiter` (`id_recruiter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_job_student` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recruiter`
--
ALTER TABLE `recruiter`
  ADD CONSTRAINT `fk_recruiter_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recruiter_company`
--
ALTER TABLE `recruiter_company`
  ADD CONSTRAINT `fk_company_workin` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recruiter_workin` FOREIGN KEY (`id_recruiter`) REFERENCES `recruiter` (`id_recruiter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
