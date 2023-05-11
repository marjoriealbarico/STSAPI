-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 11 mai 2023 à 17:19
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sts_todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `id_liste` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liste`
--

INSERT INTO `liste` (`id_liste`, `nom`, `description`) VALUES
(1, 'Liste Ecole', 'ma liste pour écoleeeeeeeeee'),
(2, 'Liste Perso', 'liste personnelle'),
(3, 'Liste3', 'hellooo');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `id_tache` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `niveau` smallint(6) NOT NULL,
  `ref_liste` int(11) NOT NULL,
  `ref_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id_tache`, `nom`, `description`, `niveau`, `ref_liste`, `ref_type`) VALUES
(1, 'nomTache1', 'descTache1', 1, 1, 1),
(2, 'nomtache2', 'desctache2', 2, 1, 2),
(10, 'Envoyer le projet', 'envoyer le projet final', 3, 1, 11),
(20, 'a', 'a', 1, 2, 25),
(21, 'b', 'b', 1, 2, 25),
(22, 'c', 'c', 2, 2, 25);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `couleur` varchar(7) NOT NULL,
  `ref_type_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `nom`, `couleur`, `ref_type_parent`) VALUES
(1, 'Python', 'Yellow', 11),
(2, 'Framework7', 'Red', NULL),
(11, 'Dev', 'Blue', NULL),
(25, 'Portfolio perso', 'Yellow', 11);

--
-- Déclencheurs `type`
--
DELIMITER $$
CREATE TRIGGER `trg_type_insert` BEFORE INSERT ON `type` FOR EACH ROW BEGIN
    IF NEW.ref_type_parent = 0 THEN
        SET NEW.ref_type_parent = NULL;
    END IF;
END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`id_liste`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `fk_tache_liste` (`ref_liste`),
  ADD KEY `fk_tache_type` (`ref_type`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`),
  ADD KEY `fk_type_parent_enfant` (`ref_type_parent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `id_liste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `fk_tache_liste` FOREIGN KEY (`ref_liste`) REFERENCES `liste` (`id_liste`),
  ADD CONSTRAINT `fk_tache_type` FOREIGN KEY (`ref_type`) REFERENCES `type` (`id_type`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `fk_type_parent_enfant` FOREIGN KEY (`ref_type_parent`) REFERENCES `type` (`id_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
