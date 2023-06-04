SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS metriccare DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE mymetriccare;

CREATE TABLE IF NOT EXISTS  entreprises (
  EntrepriseId int(11) AUTO_INCREMENT NOT NULL  PRIMARY KEY,
  Nom varchar(255) DEFAULT NULL,
  NombreDeSalarie int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO entreprises (EntrepriseId, Nom, NombreDeSalarie) VALUES
(1, 'RATP', 2000),
(2, 'SNCF', 1500),
(3, 'Noctilien', 1500),
(4, 'Optile	', 500);

CREATE TABLE IF NOT EXISTS `metro` (
  `MetroId` int(11) NOT NULL PRIMARY KEY,
  `TypeDeTrain` varchar(255) DEFAULT NULL,
  `NumeroLigne` int(11) DEFAULT NULL,
  `EntrepriseId` int(11) NOT NULL,
  FOREIGN KEY (EntrepriseId) REFERENCES Entreprises(EntrepriseId) 
    ON DELETE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



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
  `PersonneId` int(11) AUTO_INCREMENT NOT NULL  PRIMARY KEY ,
  `Prenom` varchar(255) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `AdressMail` varchar(255) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `Poids` double DEFAULT NULL,
  `Taille` int(11) DEFAULT NULL,
  `Fonction` varchar(255) DEFAULT NULL,
  `MetroId` int(11) DEFAULT NULL, 
  FOREIGN KEY (MetroId) REFERENCES Metro(MetroId) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `personnes` (`PersonneId`, `Prenom`, `Nom`, `AdressMail`, `DateDeNaissance`, `Poids`, `Taille`, `Fonction`, `MetroId`) VALUES
(1, 'Virginie', 'Baudin', 'vbaudin@ratp.fr', '1959-11-21', 63, 160, 'conducteur', 1),
(2, 'Chloe', 'Gagnier', 'cgagnier@noctilien.fr', '1994-08-03', 53, 161, 'conducteur', 3),
(3, 'Ange', 'Courtemanche', 'acourtemanche@sncf.fr', '1969-01-22', 80, 175, 'conducteur', 2),
(4, 'Simon', 'Traverse', 'straverse@yahoo.com', NULL, NULL, NULL, NULL, NULL),
(5, 'Valentyna', 'Pronina', 'valentyna.pronina@eleve.isep.fr', NULL, NULL, NULL, NULL, NULL),
(6, 'Ihor', 'Pronin', 'k_sqats@ukr.net', NULL, NULL, NULL, NULL, NULL),
(7, 'Inter', 'Ert', 'yui@google.com', NULL, NULL, NULL, NULL, NULL),
(8, 'Adrian', 'Chalamet', 'ad@metric.care', NULL, NULL, NULL, NULL, NULL),
(9, 'Jana', 'Romain', 'gest1@metric.care', NULL, NULL, NULL, NULL, NULL),
(10, 'Luka', 'Wolf', 'gest2@metric.care', NULL, NULL, NULL, NULL, NULL),
(11, 'Max', 'Fern', 'gest3@metric.care', NULL, NULL, NULL, NULL, NULL),
(12, 'Anastasiia', 'Nuxe', 'gest4@metric.care', NULL, NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `capteurs` (
  `CapteurId` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `CapteurNom` varchar(255) DEFAULT NULL,
  `Valeur` double DEFAULT NULL,
  `Temp` date DEFAULT NULL,
  `Lieu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `capteurs` (`CapteurId`, `CapteurNom`, `Valeur`, `Temp`, `Lieu`) VALUES
(1, 'CO2', 44.3, '2023-03-12', 'R8J7+MH Paris');

CREATE TABLE IF NOT EXISTS `boitiers` (
  `BoitierId` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `CapteurId` int(11) DEFAULT NULL,
  FOREIGN KEY (CapteurId) REFERENCES Capteurs(CapteurId) 
    ON DELETE CASCADE, 
  `PersonneId` int(11) NOT NULL, 
  FOREIGN KEY (PersonneId) REFERENCES Personnes(PersonneId) 
   ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `boitiers` (`BoitierId`, `CapteurId`, `PersonneId`) VALUES
(1, 1, 1);

CREATE TABLE IF NOT EXISTS `logins` (
  `LoginId` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `MotDePas` varchar(255) DEFAULT NULL,
  `PersonneId` int(11) NOT NULL, 
  FOREIGN KEY (PersonneId) REFERENCES Personnes(PersonneId) 
    ON DELETE CASCADE 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `logins` (`LoginId`, `MotDePas`, `PersonneId`) VALUES
(1, '!icgWdyuwvmcJbcj1', 1),
(2, 'hhwb1hcwjhcjkn!', 2),
(3, 'jsbnwdhj67?', 3),
(4, 'jdnwbfbwefkjjkefw', 4),
(5, 'qwerty', 5),
(6, '12345', 6),
(7, 'asdfg', 7),
(8, 'hr*!AqLn2', 8),
(9, 'gest80non!', 9),
(10, 'gest81non!', 10),
(11, 'gest82non!', 11),
(12, 'gest83non', 12);

CREATE TABLE IF NOT EXISTS photos (
  id INT AUTO_INCREMENT NOT NULL  PRIMARY KEY,
  photoName VARCHAR(255),
  image BLOB,
  `PersonneId` int(11) NOT NULL, 
  FOREIGN KEY (PersonneId) REFERENCES Personnes(PersonneId) 
    ON DELETE CASCADE 
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `tickets` (
  `TicketId` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `PersonneId` int(11) NOT NULL,
  FOREIGN KEY (PersonneId) REFERENCES Personnes(PersonneId) 
    ON DELETE CASCADE,
  `Description` varchar(255) DEFAULT NULL,
  `Temp` date DEFAULT NULL,
  `Statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    
INSERT INTO `tickets` (`TicketId`, `PersonneId`, `Description`, `Temp`, `Statut`) VALUES
(1, 1, ' Le capteur ne fonctionne pas', '2022-12-31', 'OK');

CREATE TABLE IF NOT EXISTS `demandes` (
  `DemandeId` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `PersonneId` int(11) NOT NULL,
  FOREIGN KEY (PersonneId) REFERENCES Personnes(PersonneId) 
    ON DELETE CASCADE,
  `Description` varchar(255) DEFAULT NULL,
  `Temp` date DEFAULT NULL,
  `Statut` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `demandes` (`DemandeId`, `PersonneId`, `Description`, `Temp`, `Statut`) VALUES
(1, 2, ' La durée de vie de la batterie', '2022-10-01', 'OK');


CREATE TABLE IF NOT EXISTS `authentificationprimaire` (
  `AuthentificationId` int(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `PersonneId` int(11) DEFAULT NULL, FOREIGN KEY (PersonneId) REFERENCES Personnes(PersonneId) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `authentificationprimaire` (`AuthentificationId`, `PersonneId`) VALUES
(221209, NULL),
(314806, NULL),
(111111, 8),
(222220, 9),
(222221, 10),
(222222, 11),
(222223, 12),
(874805, 1),
(390551, 2),
(572381, 3),
(573832, 4),
(402313, 5),
(479338, 6),
(383969, 7);

CREATE USER 'vapr@metric.care'@'localhost' IDENTIFIED BY 'vapr333!';
CREATE USER 'abmo@metric.care'@'localhost' IDENTIFIED BY 'abmo111?';
CREATE USER 'majo@metric.care'@'localhost' IDENTIFIED BY 'majo444/';
CREATE USER 'pisi@metric.care'@'localhost' IDENTIFIED BY 'pisi555.';
CREATE USER 'alsi@metric.care'@'localhost' IDENTIFIED BY 'alsi222*';
CREATE USER 'gupa@metric.care'@'localhost' IDENTIFIED BY 'gupa777-';


GRANT ALL PRIVILEGES ON *.* TO 'vapr@metric.care'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'abmo@metric.care'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'majo@metric.care'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'pisi@metric.care'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'alsi@metric.care'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'gupa@metric.care'@'localhost';

SET FOREIGN_KEY_CHECKS=1;