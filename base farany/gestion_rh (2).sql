-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 03 mars 2022 à 12:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_rh`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `id_achat` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `id_departement` int(11) NOT NULL,
  `quantiter` int(11) NOT NULL,
  PRIMARY KEY (`id_achat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `poste` varchar(255) NOT NULL,
  `diplome` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `age_min` int(11) DEFAULT NULL,
  `age_max` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `sexe` int(11) DEFAULT NULL,
  `contrat` int(11) NOT NULL,
  `date_limite` date NOT NULL,
  PRIMARY KEY (`id_annonce`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `poste`, `diplome`, `experience`, `age_min`, `age_max`, `description`, `sexe`, `contrat`, `date_limite`) VALUES
(8, 'devellopeur java', 'bacc + 3 en develeopement application', '3 ans d\'experience', 15, 19, 'loresadsadsa kjdklsandjgfjkabfda', 1, 1, '2021-12-31'),
(9, 'devellopeur java', 'bacc + 3 en develeopement application', '3 ans d\'experience', 15, 19, 'loresadsadsa kjdklsandjgfjkabfda', 1, 1, '2021-12-31'),
(10, 'developpeur php', 'bacc+5', '5 ans', 15, 29, 'dksadhusfbhcjsbsbjfhsdjkha', 2, 1, '2021-12-23'),
(11, 'dev', 'bacc +3', '2 ans', 22, 42, 'balbalbalblablablalblaba', 1, 1, '2021-12-10'),
(12, 'directeur', 'bacc +3', '2 ans', 5, 3, 'dFDfqdfqdfqd', 1, 1, '2021-12-17');

-- --------------------------------------------------------

--
-- Structure de la table `approvisionement`
--

DROP TABLE IF EXISTS `approvisionement`;
CREATE TABLE IF NOT EXISTS `approvisionement` (
  `idapprovisionement` int(11) NOT NULL AUTO_INCREMENT,
  `idbesoin` int(11) DEFAULT NULL,
  `quantiter` int(11) DEFAULT NULL,
  PRIMARY KEY (`idapprovisionement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `besoin`
--

DROP TABLE IF EXISTS `besoin`;
CREATE TABLE IF NOT EXISTS `besoin` (
  `idbesoin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `idcategorie` int(4) NOT NULL,
  PRIMARY KEY (`idbesoin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `besoin_departement`
--

DROP TABLE IF EXISTS `besoin_departement`;
CREATE TABLE IF NOT EXISTS `besoin_departement` (
  `idbesoin_departement` int(11) NOT NULL AUTO_INCREMENT,
  `idDepartement` int(11) NOT NULL,
  `idbesoin` int(11) DEFAULT NULL,
  `quantiter` int(11) NOT NULL,
  `idProduits` int(11) NOT NULL,
  `valider` int(11) NOT NULL DEFAULT '0',
  `commander` int(11) NOT NULL DEFAULT '0',
  `boncommade` int(11) NOT NULL DEFAULT '0',
  `recue` int(11) DEFAULT '0',
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbesoin_departement`),
  KEY `idDepartement` (`idDepartement`),
  KEY `idbesoin` (`idbesoin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `besoin_departement`
--

INSERT INTO `besoin_departement` (`idbesoin_departement`, `idDepartement`, `idbesoin`, `quantiter`, `idProduits`, `valider`, `commander`, `boncommade`, `recue`, `idUtilisateur`) VALUES
(1, 2, NULL, 5, 2, 1, 1, 0, 1, 1),
(4, 1, NULL, 1, 1, 1, 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `validation` tinyint(4) NOT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cnaps`
--

DROP TABLE IF EXISTS `cnaps`;
CREATE TABLE IF NOT EXISTS `cnaps` (
  `idCnaps` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  PRIMARY KEY (`idCnaps`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE IF NOT EXISTS `conge` (
  `idConge` int(11) NOT NULL AUTO_INCREMENT,
  `motif` varchar(50) DEFAULT NULL,
  `nbJour` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `departement` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idDepartement`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `departement`) VALUES
(1, 'finance'),
(2, 'rh'),
(3, 'gestion'),
(4, 'approvisionement'),
(5, 'comptable');

-- --------------------------------------------------------

--
-- Structure de la table `embauche`
--

DROP TABLE IF EXISTS `embauche`;
CREATE TABLE IF NOT EXISTS `embauche` (
  `idEmploye` int(11) NOT NULL,
  `dateEmbauche` date NOT NULL,
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `empconge`
--

DROP TABLE IF EXISTS `empconge`;
CREATE TABLE IF NOT EXISTS `empconge` (
  `idEmploye` int(11) NOT NULL,
  `idConge` int(11) NOT NULL,
  `dateDeb` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  KEY `idEmploye` (`idEmploye`),
  KEY `idConge` (`idConge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `idProfilEmp` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `dateNaissance` date NOT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `sexe` int(11) NOT NULL,
  `nbPersCharge` int(11) DEFAULT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `renvoie` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idEmploye`),
  KEY `idProfilEmp` (`idProfilEmp`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `idProfilEmp`, `nom`, `prenom`, `dateNaissance`, `adresse`, `sexe`, `nbPersCharge`, `matricule`, `parent`, `renvoie`) VALUES
(1, 1, 'henry', 'gary', '1999-11-11', 'aeaze', 0, 1, '1234', 0, 0),
(2, 2, 'perry', 'platipus', '1999-01-06', 'aezezez', 0, 2, '1235', 5, 0),
(3, 3, 'kelly', 'r', '2002-07-03', 'aezezez', 1, 2, '1236', 1, 0),
(4, 3, 'jenny', 'zee', '2002-07-03', 'a8666ez', 1, 0, '1237', 3, 0),
(5, 3, 'test', 'dsdsd', '2002-07-03', 'a8666ez', 1, 0, '1238', 1, 0),
(6, 3, 'jerry', 'qsdsdqd', '2002-07-03', 'a8666ez', 1, 0, '1239', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `employeentreprise`
--

DROP TABLE IF EXISTS `employeentreprise`;
CREATE TABLE IF NOT EXISTS `employeentreprise` (
  `idEmployeEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `numeroCnaps` varchar(10) DEFAULT NULL,
  `heureTravail` varchar(5) DEFAULT NULL,
  `idEntrepriseDepartementPost` int(11) NOT NULL,
  PRIMARY KEY (`idEmployeEntreprise`),
  KEY `idEmploye` (`idEmploye`),
  KEY `idEntrepriseDepartementPost` (`idEntrepriseDepartementPost`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employeentreprise`
--

INSERT INTO `employeentreprise` (`idEmployeEntreprise`, `idEmploye`, `numeroCnaps`, `heureTravail`, `idEntrepriseDepartementPost`) VALUES
(1, 1, '1', '8', 1),
(2, 2, '1', '8', 2),
(3, 3, '1', '8', 3),
(4, 4, '1', '8', 3),
(5, 5, '1', '8', 2),
(6, 6, '1', '8', 4);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `entreprise`, `location`) VALUES
(1, 'joe', 'ddsdd');

-- --------------------------------------------------------

--
-- Structure de la table `entreprisedepartementpost`
--

DROP TABLE IF EXISTS `entreprisedepartementpost`;
CREATE TABLE IF NOT EXISTS `entreprisedepartementpost` (
  `idEntrepriseDepartementPost` int(11) NOT NULL AUTO_INCREMENT,
  `idEntreprise` int(11) NOT NULL,
  `idDepartement` int(11) DEFAULT NULL,
  `idPost` int(11) NOT NULL,
  PRIMARY KEY (`idEntrepriseDepartementPost`),
  KEY `idEntreprise` (`idEntreprise`),
  KEY `idDepartement` (`idDepartement`),
  KEY `idPost` (`idPost`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprisedepartementpost`
--

INSERT INTO `entreprisedepartementpost` (`idEntrepriseDepartementPost`, `idEntreprise`, `idDepartement`, `idPost`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 3),
(4, 1, 3, 2),
(5, 1, 4, 4),
(6, 1, 4, 5),
(7, 1, 5, 4),
(8, 1, 5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `etatca`
--

DROP TABLE IF EXISTS `etatca`;
CREATE TABLE IF NOT EXISTS `etatca` (
  `idEmploye` int(11) DEFAULT NULL,
  `nbJourR` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fournisseur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `nom_fournisseur`) VALUES
(1, 'rasseta'),
(2, 'jb');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `idGroupe` int(11) NOT NULL AUTO_INCREMENT,
  `classification` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `classification`) VALUES
(1, 'm1'),
(2, 'm2'),
(3, 'm3');

-- --------------------------------------------------------

--
-- Structure de la table `horairepresence`
--

DROP TABLE IF EXISTS `horairepresence`;
CREATE TABLE IF NOT EXISTS `horairepresence` (
  `idHorairePresence` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `dateHeurePresence` datetime DEFAULT NULL,
  PRIMARY KEY (`idHorairePresence`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `irsa`
--

DROP TABLE IF EXISTS `irsa`;
CREATE TABLE IF NOT EXISTS `irsa` (
  `idIrsa` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idIrsa`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ostie`
--

DROP TABLE IF EXISTS `ostie`;
CREATE TABLE IF NOT EXISTS `ostie` (
  `idOstie` int(11) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  PRIMARY KEY (`idOstie`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(20) DEFAULT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`idPost`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `post`, `idGroupe`) VALUES
(1, 'directeur', 1),
(2, 'assistant directeur', 2),
(3, 'ingenieur', 3),
(4, 'executant', 3),
(5, 'manager', 3);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(25) NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`) VALUES
(1, 'porte'),
(2, 'chaise'),
(3, 'table'),
(4, 'voiture 4x4'),
(5, 'stylo'),
(6, 'papier a4');

-- --------------------------------------------------------

--
-- Structure de la table `profilemp`
--

DROP TABLE IF EXISTS `profilemp`;
CREATE TABLE IF NOT EXISTS `profilemp` (
  `idProfilEmp` int(11) NOT NULL AUTO_INCREMENT,
  `diplome` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `heureDeb` time DEFAULT NULL,
  `heureFin` time DEFAULT NULL,
  PRIMARY KEY (`idProfilEmp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profilemp`
--

INSERT INTO `profilemp` (`idProfilEmp`, `diplome`, `experience`, `heureDeb`, `heureFin`) VALUES
(1, 'eeee', '­ddddd', '00:00:08', '00:00:17'),
(2, 'eedfdf', 'ddzezefdd', '00:00:08', '00:00:17'),
(3, 'sdgee', 'fdzf', '00:00:08', '00:00:17');

-- --------------------------------------------------------

--
-- Structure de la table `salaire`
--

DROP TABLE IF EXISTS `salaire`;
CREATE TABLE IF NOT EXISTS `salaire` (
  `idEmploye` int(11) NOT NULL,
  `montant` double NOT NULL,
  `dateDefinitionSalaire` date NOT NULL,
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `besoin_departement`
--
ALTER TABLE `besoin_departement`
  ADD CONSTRAINT `besoin_departement_ibfk_1` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`),
  ADD CONSTRAINT `besoin_departement_ibfk_2` FOREIGN KEY (`idbesoin`) REFERENCES `besoin` (`idbesoin`);

--
-- Contraintes pour la table `cnaps`
--
ALTER TABLE `cnaps`
  ADD CONSTRAINT `cnaps_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `embauche`
--
ALTER TABLE `embauche`
  ADD CONSTRAINT `embauche_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `empconge`
--
ALTER TABLE `empconge`
  ADD CONSTRAINT `empconge_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`),
  ADD CONSTRAINT `empconge_ibfk_2` FOREIGN KEY (`idConge`) REFERENCES `conge` (`idConge`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`idProfilEmp`) REFERENCES `profilemp` (`idProfilEmp`);

--
-- Contraintes pour la table `employeentreprise`
--
ALTER TABLE `employeentreprise`
  ADD CONSTRAINT `employeentreprise_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`),
  ADD CONSTRAINT `employeentreprise_ibfk_2` FOREIGN KEY (`idEntrepriseDepartementPost`) REFERENCES `entreprisedepartementpost` (`idEntrepriseDepartementPost`);

--
-- Contraintes pour la table `entreprisedepartementpost`
--
ALTER TABLE `entreprisedepartementpost`
  ADD CONSTRAINT `entreprisedepartementpost_ibfk_1` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`),
  ADD CONSTRAINT `entreprisedepartementpost_ibfk_2` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`),
  ADD CONSTRAINT `entreprisedepartementpost_ibfk_3` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`);

--
-- Contraintes pour la table `etatca`
--
ALTER TABLE `etatca`
  ADD CONSTRAINT `etatca_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `horairepresence`
--
ALTER TABLE `horairepresence`
  ADD CONSTRAINT `horairepresence_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `irsa`
--
ALTER TABLE `irsa`
  ADD CONSTRAINT `irsa_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `ostie`
--
ALTER TABLE `ostie`
  ADD CONSTRAINT `ostie_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);

--
-- Contraintes pour la table `salaire`
--
ALTER TABLE `salaire`
  ADD CONSTRAINT `salaire_ibfk_1` FOREIGN KEY (`idEmploye`) REFERENCES `employe` (`idEmploye`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
