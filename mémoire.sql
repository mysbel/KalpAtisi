-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 00:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mémoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL,
  `symptome` mediumtext NOT NULL,
  `diagnostic` mediumtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_patient` int(11) NOT NULL,
  `médecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id`, `symptome`, `diagnostic`, `date`, `id_patient`, `médecin`) VALUES
(29, 'k,dbjdl', 'kbcjhdnc', '2024-05-27 22:55:23', 671, 15);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `tension` varchar(10) NOT NULL,
  `diabete` varchar(10) NOT NULL,
  `allergie` varchar(50) NOT NULL,
  `antecedents` varchar(100) NOT NULL,
  `medicament` varchar(100) NOT NULL,
  `id_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `tension`, `diabete`, `allergie`, `antecedents`, `medicament`, `id_patient`) VALUES
(54, '10.2', 'non', 'Allergie Alimentaires', 'dbchdbcih', 'ihibobiducb', 671);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `tel` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `nom`, `prenom`, `email`, `password`, `type`, `tel`) VALUES
(1, 'Mayssa', '', 'mayssabellili44@gmail.com', '$2y$10$NpEhJkf7Y', 'admin', 673001355),
(3, 'Wiss', '', 'wissal@gmail.com', '$2y$10$OfynYsp/T', 'admin', 655854322),
(5, 'faouzi', '', 'faouzibel@gmzil.com', '$2y$10$GnWLc95yU', 'medecin', 673001355),
(6, 'Bellili', 'Chiraz', 'chirazbel@gmail.com', '$2y$10$59NU.m4rrx.goNfi8U37WOGTYO0b8fHIQsGsTofjjQKzObP01q05m', 'medecin', 696609841),
(7, 'Hamdache', 'Naouel', 'naouel12@gmail.com', '0969fb8f57c1ea19ba7fa774a988d0ae', 'medecin', 675896332),
(8, 'bel', 'faouzi', 'faouzi123@gmail.com', '$2y$10$S8dkFYmK7F7wQRQbCKURZOz4Vsjo7Qq7pXQ2YKVErgPjro.SSYMN2', 'infirmier', 254786),
(10, 'boucherit', 'wissal', 'wiss12@gmail.com', '$2y$10$YcppXqUwrTJU5wasZDfTpeE3.gm9dgVfbXop24/lCmj/lcuzh1ZIW', 'administrateur', 2578963),
(11, 'bel', 'mys', 'mayssa123@gmail.com', '$2y$10$1.dNJ.Ikt93rZzssDQVoc.6PKOMnGV4iD/Z5NIU80tvCYWnSNX18K', 'medecin', 673001355),
(12, 'Yousfi', 'Malika', 'malika12@gmail.com', '$2y$10$Ohp/UwdT5ac2WP8NHYdpcOy4yscwB2vj5jYu.TeYnLEUVXTEMurKy', 'medecin', 38581343),
(13, 'Gouttel', 'Nadira', 'nad20@gmail.com', '$2y$10$b0u.gHAUxEyXbvLNWoqIdOUpcGIoTEif4DW3pFxrWPS3kHC/noDwe', 'administrateur', 672461099),
(14, 'Gouttel', 'Lahcen', 'lahcen19@gmail.com', '$2y$10$rA3fPLVItp1f1/W09.2MhOpSVW92qN/qdfmjZdvw5LsmgpQZzHB7q', 'medecin', 521368945),
(15, 'Bellili', 'Manel', 'manelbel@gmail.com', '$2y$10$M4JK6cU4w.U06nS0JrK9S.Jsk8CFtVjMb7piA5UrBUPEic14xS2EG', 'medecin', 695120350),
(16, 'B', 'mama', 'mama@gmail.com', '$2y$10$BLO3R.WyKNDW6NGifHOPQe0ZseRYNISkasgOpxjmaxzNFmV8BkFUq', 'radiologue', 3279863),
(17, 'C', 'inf', 'inf@gmail.com', '$2y$10$sfyVpZU3xZNUtum7U2s/I.jW1bTywi6PDHiFul.5j5cmjwa/5r6My', 'infirmier', 487862248),
(18, 'Gouttel', 'Nadira', 'nadira23@gmail.com', '$2y$10$0LaJf5fhfR22YZPl2H9T8.qfd/KjM.MRm8zCHfL6evIX07jwvr3Yu', 'administrateur', 672461099),
(19, 'Ham', 'Naouel', 'nawel@gmail.com', '$2y$10$SWBMQtj7jP9YBnmJpuvEeOfQBcBDdCDRTksri4F/NOuUNQ6qXHxqm', 'laborantin', 798576835);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_recepteur` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `id_patient`, `id_recepteur`, `status`, `title`) VALUES
(56, 8, 671, 8, 1, ''),
(57, 15, 671, 15, 2, ''),
(58, 8, 825, 8, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `orientation`
--

CREATE TABLE `orientation` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rapport` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `patient` int(11) NOT NULL,
  `médecin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orientation`
--

INSERT INTO `orientation` (`id`, `type`, `rapport`, `date`, `patient`, `médecin`) VALUES
(41, 'Scanner', 'tete', '2024-05-27 22:57:39', 671, 15);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `naissance` date NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `salle` varchar(10) NOT NULL,
  `etat` enum('en attente','valider') NOT NULL DEFAULT 'en attente',
  `statut` enum('dans la salle','chez infirmier','chez le médecin','libérer','Orienté vers le radiologue','Orienté vers laboratoire') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `nom`, `prenom`, `naissance`, `sexe`, `adresse`, `tel`, `salle`, `etat`, `statut`) VALUES
(671, 'Bellili', 'Mayssa Lamiss', '2002-11-06', 'Femme', 'Sidi Achour', '0673001355', '2', 'valider', 'Orienté vers le radiologue'),
(825, 'Hamdache', 'Naouel', '2002-09-07', 'Femme', 'Ben mhidi ', '0798576835', '3', 'en attente', 'dans la salle');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `médecin` (`médecin`),
  ADD KEY `consulter` (`id_patient`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avoir` (`id_patient`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notif` (`id_patient`);

--
-- Index pour la table `orientation`
--
ALTER TABLE `orientation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_med_orient` (`médecin`),
  ADD KEY `prendre` (`patient`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `orientation`
--
ALTER TABLE `orientation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`médecin`) REFERENCES `inscription` (`id`),
  ADD CONSTRAINT `consulter` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `avoir` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notif` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE;

--
-- Contraintes pour la table `orientation`
--
ALTER TABLE `orientation`
  ADD CONSTRAINT `fk_med_orient` FOREIGN KEY (`médecin`) REFERENCES `inscription` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prendre` FOREIGN KEY (`patient`) REFERENCES `patient` (`id_patient`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
