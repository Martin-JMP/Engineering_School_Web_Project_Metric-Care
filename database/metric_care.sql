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
(8, 'Adrian', 'Chalamet', 'ad@metric.care', NULL, NULL, NULL, NULL, NULL),
(9, 'Jana', 'Romain', 'gest1@metric.care', NULL, NULL, NULL, NULL, NULL),
(10, 'Luka', 'Wolf', 'gest2@metric.care', NULL, NULL, NULL, NULL, NULL),
(11, 'Max', 'Fern', 'gest3@metric.care', NULL, NULL, NULL, NULL, NULL),
(12, 'Anastasiia', 'Nuxe', 'gest4@metric.care', NULL, NULL, NULL, NULL, NULL),
(13, 'Valentyna', 'Pronina', 'valentyna.pronina@ukr.net', NULL, NULL, NULL, NULL, NULL),
(14, 'Tom', 'Ho', 'htom@oui.fr', NULL, NULL, NULL, NULL, NULL),
(15, 'Luc', 'Wain', 'lwain@exp.fr', NULL, NULL, NULL, NULL, NULL),
(16, 'Tom', 'Ho', 'htom@oui.fr', NULL, NULL, NULL, NULL, NULL),
(17, 'Jana', 'Pon', 'jpon@inc.com', NULL, NULL, NULL, NULL, NULL),
(18, 'Rom', 'Romain', 'rromain@idk.com', NULL, NULL, NULL, NULL, NULL),
(23, 'Tai', 'Lyn', 'tlyn@hoc.de', NULL, NULL, NULL, NULL, NULL),
(24, 'Luis', 'Roux', 'lrox@un.eu', NULL, NULL, NULL, NULL, NULL),
(25, 'Huan', 'Lopes', 'hlopes@ukr.net', NULL, NULL, NULL, NULL, NULL),
(26, 'Ioan', 'Paul', 'pioan@email.com', NULL, NULL, NULL, NULL, NULL),
(30, 'Jana', 'Poit', 'jpoit@uk.com', NULL, NULL, NULL, NULL, NULL),
(31, 'Uan', 'Chin', 'uchin@ui.you', NULL, NULL, NULL, NULL, NULL),
(32, 'Veronica', 'Lain', 'vlain@inh.com', NULL, NULL, NULL, NULL, NULL);

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
(1, '61888ca691ebc5b5449b51be0f2e8357', 1),
(2, '0497f67ebec08b3472cf878d26897c1a', 2),
(3, '0817fd40d62beb7718d452bbe44432c2', 3),
(4, 'd612c71c713b0dd0e8a46482403ef96a', 4),
(5, '897c8fde25c5cc5270cda61425eed3c8', 5),
(8, '6445c6fdb1d130059a5e274a3b25b470', 8),
(9, 'c34e21ab92c17e816c7b57adc582dda7', 9),
(10, 'e5be867b450d01ca935e742efe4a3757', 10),
(11, 'ed0b086f30f09ad3e0c81e7a8b9ef265', 11),
(12, 'e5d89ac43f1f411f7a6653b2a30d0949a', 12),
(13, 'e10adc3949ba59abbe56e057f20f883e', 13),
(14, '1ca1d6cd5b5e98d1eca0f117ba21ebf5', 14),
(15, '2fdda202e6817c1edef63f8981df9ae8', 15),
(16, 'be73550616936a637426b4d66a5fa99f', 17),
(17, 'b97c19f6058f62f0dad69f8ee741e0bc', 18),
(18, 'd8578edf8458ce06fbc5bb76a58c5ca4', 23),
(19, 'dd529904c242f0ffdf07ecff058513d0', 24),
(20, 'd8578edf8458ce06fbc5bb76a58c5ca4', 25),
(21, '6979c66655648273a3a2c8ab8b474ff7', 26),
(22, 'e10adc3949ba59abbe56e057f20f883e', 30),
(23, 'd8578edf8458ce06fbc5bb76a58c5ca4', 31),
(24, '6979c66655648273a3a2c8ab8b474ff7', 32);

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
(120003, NULL),
(120004, NULL),
(120006, NULL),
(120007, NULL),
(314806, NULL),
(874805, 1),
(390551, 2),
(572381, 3),
(573832, 4),
(402313, 5),
(111111, 8),
(222220, 9),
(222221, 10),
(222222, 11),
(222223, 12),
(123456, 13),
(700000, 14),
(700001, 15),
(700002, 17),
(700003, 18),
(700005, 23),
(700004, 24),
(221209, 25),
(120000, 26),
(120005, 30),
(120001, 31),
(120002, 32);

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