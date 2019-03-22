-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 22 mars 2019 à 08:39
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

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id_company`, `name`, `addr`, `city`, `pc`, `nbEmploye`, `typeSector`) VALUES
(1, 'Orange', 'shdifhsdihfis', 'Toulon', 83000, 2, 'telecom');

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

--
-- Déchargement des données de la table `job`
--

INSERT INTO `job` (`id_job`, `id_recruiter`, `id_student`, `typeContract`, `dtDebut`, `dtFin`, `experience`) VALUES
(1, 2, NULL, 'CDI', '2019-03-10', '2019-03-23', 2),
(10, NULL, 2, 'sdgf', '2019-03-16', '2019-03-31', 2);

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
  `id_skill` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`id_skill`, `nom`) VALUES
(1, 'sdfsdfsdfsd');

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
(2, 5, 'http://raimon.fr/', 'sdfsdfsdfsdf', 'http://raimon.fr/', 'http://raimon.fr/', 'sdfsdfsdf');

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
  `id_school` int(11) UNSIGNED NOT NULL,
  `id_student` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `student_skill`
--

CREATE TABLE `student_skill` (
  `id_student` int(11) UNSIGNED NOT NULL,
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
  ADD PRIMARY KEY (`id_skill`,`id_job`),
  ADD KEY `fk_job_skilljob` (`id_job`);

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
  ADD PRIMARY KEY (`id_student`,`id_job`),
  ADD KEY `fk_job_studentjob` (`id_job`);

--
-- Index pour la table `student_school`
--
ALTER TABLE `student_school`
  ADD PRIMARY KEY (`id_school`,`id_student`),
  ADD KEY `fk_student_studentschool` (`id_student`);

--
-- Index pour la table `student_skill`
--
ALTER TABLE `student_skill`
  ADD PRIMARY KEY (`id_student`,`id_skill`),
  ADD KEY `fk_skill_studentskill` (`id_skill`);

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
  MODIFY `id_company` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_skill` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Contraintes pour la table `skill_job`
--
ALTER TABLE `skill_job`
  ADD CONSTRAINT `fk_job_skilljob` FOREIGN KEY (`id_job`) REFERENCES `job` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_skill_skilljob` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `student_job`
--
ALTER TABLE `student_job`
  ADD CONSTRAINT `fk_job_studentjob` FOREIGN KEY (`id_job`) REFERENCES `job` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_studentjob` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `student_school`
--
ALTER TABLE `student_school`
  ADD CONSTRAINT `fk_school_studentschool` FOREIGN KEY (`id_school`) REFERENCES `school` (`id_school`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_studentschool` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `student_skill`
--
ALTER TABLE `student_skill`
  ADD CONSTRAINT `fk_skill_studentskill` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_studentskill` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
