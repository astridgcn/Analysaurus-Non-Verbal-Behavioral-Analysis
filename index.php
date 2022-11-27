<?php

// Entête
include("entete.inc.php");

// Informations de connexion à la BDD
require("connect.inc.php");

// Modèle
require("model.class.php");

// Contrôleur
require("control.class.php");

// - - -

try {
  // Accès à la base de données
  $c =new PDO("mysql:host=$host;dbname=$dbname",$login,$password);
  $c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $c->exec("SET CHARACTER SET utf8");
  // Nouvel objet de type Dino (classe Dino)
  $dino = new Dino($c);
  // Nouvel objet de type Appli (classe Appli)
  $appli = new Appli($c);
  // Contrôle de l'objet dino
  $appli->moteur($dino);
}
// Echec de connexion
catch (PDOException $erreur){
  echo "<p>Erreur :".$erreur->getMessage()."</p>\n";
}

// - - -

// Pied
include("pied.inc.php");

//Reset la BDD : ALTER TABLE indices AUTO_INCREMENT = 1

 ?>
