create DATABASE IF NOT EXISTS   ITThink6;
USE  ITThink6 ;
CREATE TABLE utilisateurs(
id_utilisateur INT AUTO_INCREMENT PRIMARY KEY ,
nom_utilisateur VARCHAR(100),
mot_de_passe VARCHAR(100),
email VARCHAR(100)
);
CREATE TABLE Categories(
id_categorie INT AUTO_INCREMENT PRIMARY KEY ,
nom_categorie VARCHAR(100)
);
CREATE TABLE Sous_Categories(
id_sous_categorie INT AUTO_INCREMENT PRIMARY KEY ,
nom_sous_categorie VARCHAR(100),
id_categorie  INT ,
FOREIGN KEY (id_categorie) REFERENCES Categories(id_categorie)
);
CREATE TABLE Projets(
id_projet INT AUTO_INCREMENT PRIMARY KEY ,
titre_projet VARCHAR(100),
description_projet TEXT,
id_categorie INT ,
FOREIGN KEY (id_categorie) REFERENCES Categories(id_categorie),
id_sous_categorie INT ,
FOREIGN KEY(id_sous_categorie) REFERENCES Sous_Categories(id_sous_categorie) ,
id_utilisateur INT ,
FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
);
CREATE TABLE Freelances(
id_freelance INT AUTO_INCREMENT PRIMARY KEY,
nom_freelance VARCHAR(100),
competences VARCHAR(100),
id_utilisateur INT ,
FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
);
CREATE TABLE Offres(
id_offre INT AUTO_INCREMENT PRIMARY KEY,
montant INT ,
delai INT ,
id_freelance INT ,
FOREIGN KEY (id_freelance) REFERENCES Freelances(id_freelance),
id_projet INT ,
FOREIGN KEY (id_projet) REFERENCES Projets(id_projet)
);
CREATE TABLE Temoignages(
id_temoignage INT AUTO_INCREMENT PRIMARY KEY,
commentaire TEXT,
id_utilisateur INT,
FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur)
);
ALTER TABLE Projets ADD date_creation DATE ;
INSERT INTO utilisateurs(nom_utilisateur,mot_de_passe,email) VALUES ("amal","xxxx","vv");
INSERT INTO Freelances(nom_freelance,competences,id_utilisateur) VALUES ("ikram","x",1);
INSERT INTO Categories(nom_categorie) VALUES ("wita");
INSERT INTO Projets(titre_projet,description_projet,id_categorie) VALUES ("y","uuuuuu",1);
INSERT INTO Offres(montant,delai,id_freelance,id_projet) VALUES (2000,17,1,1);
UPDATE Projets  SET titre_projet='project33' , description_projet='ikram' WHERE id_projet=1;
DELETE FROM Temoignages WHERE id_temoignage=1;
SELECT Projets.id_projet,Projets.titre_projet,Projets.description_projet,Categories.nom_categorie
FROM Projets INNER JOIN  Categories ON Projets.id_categorie = categories.id_categorie
WHERE Categories.nom_categorie = "wita";

