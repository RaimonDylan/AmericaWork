-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 15 Mars 2019 à 14:43
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_admin` int(10) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$giARdqLG9coJrEtCqODAWu.7SYbyK..65Yqyfuh9q.t60UX3W1agi');

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
-- Contenu de la table `recruiter`
--

INSERT INTO `recruiter` (`id_recruiter`, `id_user`) VALUES
(1, 1);

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
  `password` char(60) NOT NULL,
  `dt_ins` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `surname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` int(10) UNSIGNED NOT NULL,
  `mail` varchar(50) NOT NULL,
  `addr` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pc` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `dt_ins`, `surname`, `name`, `tel`, `mail`, `addr`, `city`, `pc`) VALUES
(1, 'utilisateur', '$2y$10$giARdqLG9coJrEtCqODAWu.7SYbyK..65Yqyfuh9q.t60UX3W1agi', '2019-03-15 13:31:38', 'iuhdi', 'iuhih', 606060606, 'yes@gmail.com', 'iuhfdsiuhfsiuh', 'iufhdh', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_recruiter` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_student` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
