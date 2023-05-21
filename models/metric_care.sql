SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS 'my_metric_care' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE 'metric_care';

CREATE TABLE  `entreprises` (
  `EntrepriseId` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `NombreDeSalarie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`EntrepriseId`);
ALTER TABLE `entreprises`
  MODIFY IF NOT EXISTS`EntrepriseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


INSERT INTO `entreprises` (`EntrepriseId`, `Nom`, `NombreDeSalarie`) VALUES
(1, 'RATP', 2000),
(2, 'SNCF', 1500),
(3, 'Noctilien', 1500),
(4, 'Optile	', 500);

CREATE TABLE IF NOT EXISTS `metro` (
  `MetroId` int(11) NOT NULL,
  `TypeDeTrain` varchar(255) DEFAULT NULL,
  `NumeroLigne` int(11) DEFAULT NULL,
  `EntrepriseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `metro`
  ADD PRIMARY KEY (`MetroId`),
  ADD KEY `EntrepriseId` (`EntrepriseId`);

ALTER TABLE `metro`
  MODIFY `MetroId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `metro`
  ADD CONSTRAINT `metro_ibfk_1` FOREIGN KEY (`EntrepriseId`) REFERENCES `entreprises` (`EntrepriseId`) ON DELETE CASCADE;

INSERT INTO `metro` (`MetroId`, `TypeDeTrain`, `NumeroLigne`, `EntrepriseId`) VALUES
(1, 'Alstom2007', 1, 1),
(2, 'Alstom2009', 1, 2),
(3, 'Alstom2000', 1, 3),
(4, 'Alstom2001', 1, 4),
(5, 'Alstom2001', 2, 4),
(6, 'Alstom2001', 3, 4),
(7, 'Alstom2001', 3, 1),
(8, 'Alstom2001', 4, 2);

CREATE TABLE IF NOT EXISTS `personnes` (
  `PersonneId` int(11) NOT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `AdressMail` varchar(255) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `Poids` double DEFAULT NULL,
  `Taille` int(11) DEFAULT NULL,
  `Fonction` varchar(255) DEFAULT NULL,
  `MetroId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `personnes`
  ADD PRIMARY KEY (`PersonneId`),
  ADD KEY `MetroId` (`MetroId`);

ALTER TABLE `personnes`
  MODIFY `PersonneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `personnes`
  ADD CONSTRAINT `personnes_ibfk_1` FOREIGN KEY (`MetroId`) REFERENCES `metro` (`MetroId`) ON DELETE CASCADE;

INSERT INTO `personnes` (`PersonneId`, `Prenom`, `Nom`, `AdressMail`, `DateDeNaissance`, `Poids`, `Taille`, `Fonction`, `MetroId`) VALUES
(1, 'Virginie', 'Baudin', 'vbaudin@ratp.fr', '1959-11-21', 63, 160, 'conducteur', 1),
(2, 'Chloe', 'Gagnier', 'cgagnier@noctilien.fr', '1994-08-03', 53, 161, 'conducteur', 3),
(3, 'Ange', 'Courtemanche', 'acourtemanche@sncf.fr', '1969-01-22', 80, 175, 'conducteur', 2),
(4, 'Simon', 'Traverse', 'straverse@yahoo.com', NULL, NULL, NULL, NULL, NULL),
(5, 'Valentyna', 'Pronina', 'valentyna.pronina@eleve.isep.fr', NULL, NULL, NULL, NULL, NULL),
(6, 'Ihor', 'Pronin', 'k_sqats@ukr.net', NULL, NULL, NULL, NULL, NULL),
(7, 'Inter', 'Ert', 'yui@google.com', NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `capteurs` (
  `CapteurId` int(11) NOT NULL,
  `CapteurNom` varchar(255) DEFAULT NULL,
  `Valeur` double DEFAULT NULL,
  `Temp` date DEFAULT NULL,
  `Lieu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`CapteurId`);

ALTER TABLE `capteurs`
  MODIFY `CapteurId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT INTO `capteurs` (`CapteurId`, `CapteurNom`, `Valeur`, `Temp`, `Lieu`) VALUES
(1, 'CO2', 44.3, '2023-03-12', 'R8J7+MH Paris');

CREATE TABLE IF NOT EXISTS `boitiers` (
  `BoitierId` int(11) NOT NULL,
  `CapteurId` int(11) DEFAULT NULL,
  `PersonneId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `boitiers`
  ADD PRIMARY KEY (`BoitierId`),
  ADD KEY `CapteurId` (`CapteurId`),
  ADD KEY `PersonneId` (`PersonneId`);

ALTER TABLE `boitiers`
  ADD CONSTRAINT `boitiers_ibfk_1` FOREIGN KEY (`CapteurId`) REFERENCES `capteurs` (`CapteurId`) ON DELETE CASCADE,
  ADD CONSTRAINT `boitiers_ibfk_2` FOREIGN KEY (`PersonneId`) REFERENCES `personnes` (`PersonneId`) ON DELETE CASCADE;

ALTER TABLE `boitiers`
  MODIFY `BoitierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;  

INSERT INTO `boitiers` (`BoitierId`, `CapteurId`, `PersonneId`) VALUES
(1, 1, 1);

CREATE TABLE IF NOT EXISTS `logins` (
  `LoginId` int(11) NOT NULL,
  `MotDePas` varchar(255) DEFAULT NULL,
  `PersonneId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `logins`
  ADD PRIMARY KEY (`LoginId`),
  ADD KEY `PersonneId` (`PersonneId`);

ALTER TABLE `logins`
  MODIFY `LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`PersonneId`) REFERENCES `personnes` (`PersonneId`) ON DELETE CASCADE;

INSERT INTO `logins` (`LoginId`, `MotDePas`, `PersonneId`) VALUES
(1, '!icgWdyuwvmcJbcj1', 1),
(2, 'hhwb1hcwjhcjkn!', 2),
(3, 'jsbnwdhj67?', 3),
(4, 'jdnwbfbwefkjjkefw', 4),
(5, 'qwerty', 5),
(6, '12345', 6),
(7, 'asdfg', 7);

CREATE TABLE IF NOT EXISTS `tickets` (
  `TicketId` int(11) NOT NULL,
  `PersonneId` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Temp` date DEFAULT NULL,
  `Statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketId`),
  ADD KEY `PersonneId` (`PersonneId`);

ALTER TABLE `tickets`
  MODIFY `TicketId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`PersonneId`) REFERENCES `personnes` (`PersonneId`) ON DELETE CASCADE;
    
INSERT INTO `tickets` (`TicketId`, `PersonneId`, `Description`, `Temp`, `Statut`) VALUES
(1, 1, ' Le capteur ne fonctionne pas', '2022-12-31', 'OK');

CREATE TABLE IF NOT EXISTS `demandes` (
  `DemandeId` int(11) NOT NULL,
  `PersonneId` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Temp` date DEFAULT NULL,
  `Statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `demandes`
  ADD PRIMARY KEY (`DemandeId`),
  ADD KEY `PersonneId` (`PersonneId`);

ALTER TABLE `demandes`
  MODIFY `DemandeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `demandes`
  ADD CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`PersonneId`) REFERENCES `personnes` (`PersonneId`) ON DELETE CASCADE;

INSERT INTO `demandes` (`DemandeId`, `PersonneId`, `Description`, `Temp`, `Statut`) VALUES
(1, 2, ' La durée de vie de la batterie', '2022-10-01', 'OK');


CREATE TABLE IF NOT EXISTS `authentificationprimaire` (
  `AuthentificationId` int(11) NOT NULL,
  `PersonneId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `authentificationprimaire`
  ADD PRIMARY KEY (`AuthentificationId`),
  ADD KEY `PersonneId` (`PersonneId`);

ALTER TABLE `authentificationprimaire`
  ADD CONSTRAINT `authentificationprimaire_ibfk_1` FOREIGN KEY (`PersonneId`) REFERENCES `personnes` (`PersonneId`);  


INSERT INTO `authentificationprimaire` (`AuthentificationId`, `PersonneId`) VALUES
(221209, NULL),
(314806, NULL),
(874805, 1),
(390551, 2),
(572381, 3),
(573832, 4),
authentificationprimaire(402313, 5),
(479338, 6),
(383969, 7);
SET FOREIGN_KEY_CHECKS=1;