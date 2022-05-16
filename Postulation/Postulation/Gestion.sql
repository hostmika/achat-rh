DROP DATABASE gestion_rh;
CREATE DATABASE gestion_rh;
USE gestion_rh;

CREATE TABLE Annonce(
    idAnnonce INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Postulation(
    idPostulation INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idAnnonce INTEGER,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    telephone VARCHAR(20),
    email VARCHAR(50),
    cv VARCHAR(200),
    lettreDeMotivation VARCHAR(200)
);

ALTER TABLE Postulation ADD CONSTRAINT FK_TempSales_Postulation FOREIGN KEY (idAnnonce) REFERENCES Annonce (idAnnonce);

INSERT INTO Annonce VALUE (1);