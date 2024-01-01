<?php

//include the connection file
include('connection.php');

//create an instance of Connection class
$connection = new Connection();

//call the createDatabase methods to create database "chap4Db"
$connection->createDatabase('project');
$query7 = "
CREATE TABLE paiement (
idp INT(6) UNSIGNED  AUTO_INCREMENT PRIMARY KEY ,
idclient INT(6) UNSIGNED NOT NULL,
date_p DATE NOT NULL,
id_resv INT(6) UNSIGNED NOT NULL,
montant float NOT NULL,
FOREIGN KEY (idclient) REFERENCES clients(id),
FOREIGN KEY (id_resv) REFERENCES  reservation(id)
)
";

$query6 = "
CREATE TABLE stock (
id_stock INT(6) UNSIGNED  AUTO_INCREMENT PRIMARY KEY ,
brand VARCHAR(30) NOT NULL,
nbrofcars INT(6)  NOT NULL
)
";
$query4 = "
CREATE TABLE reservation (
id INT(6) UNSIGNED  AUTO_INCREMENT PRIMARY KEY ,
idclient INT(6) UNSIGNED NOT NULL,
idvoiture INT(6) UNSIGNED NOT NULL,
date_res DATE NOT NULL,
duree INT(6) UNSIGNED NOT NULL,
FOREIGN KEY (idclient) REFERENCES clients(id),
FOREIGN KEY (idvoiture) REFERENCES voiture(id)
)
";

$query3 = "
CREATE TABLE voiture (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
model VARCHAR(30) NOT NULL,
idcouleur INT(6) UNSIGNED NOT NULL,
etat VARCHAR(30) NOT NULL,

FOREIGN KEY (idcouleur) REFERENCES couleurs(id)
)
";
$query2 = "
CREATE TABLE employe (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(80),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
idCity INT(6) UNSIGNED NOT NULL,
salaire INT(10),
FOREIGN KEY (idCity) REFERENCES cities(id)
)
";
$query1 = "
CREATE TABLE couleurs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    namec VARCHAR(30) NOT NULL
    )
";
$query0 = "
CREATE TABLE cities (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
    )
";
$query = "
CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) UNIQUE,
password VARCHAR(80),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
idCity INT(6) UNSIGNED NOT NULL,
FOREIGN KEY (idCity) REFERENCES cities(id)
)
";

//call the selectDatabase method to select the chap4Db
$connection->selectDatabase('project');

//call the createTable method to create table with the $query
$connection->createTable($query7);
$connection->createTable($query6);
$connection->createTable($query4);
$connection->createTable($query3);
$connection->createTable($query2);
$connection->createTable($query1);
$connection->createTable($query0);
$connection->createTable($query);


?>
