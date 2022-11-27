<?php

Class Appli {
  /* Fonction moteur */
  public function moteur($dino){
    // Si suivant contient une directive
    if (isset($_GET["suivant"])){
      $action=$_GET["suivant"];
    }
    // Sinon
    else{
      $action ="";
    }
    switch($action){

      /* Comptage */
      case "comptage":
        if (!empty($_POST["tempsP1P2"]) AND !empty($_POST["tempsP2Cible"]) AND !empty($_POST["vid"]) AND !empty($_POST["visio"]) AND !empty($_POST["sujet"])) {
          // Insertion
          if (!empty($_SESSION["pseudo"])) {
            $dino->Count($_POST["sujet"], $_SESSION["pseudo"], $_POST["vid"], $_POST["visio"], $_POST["h_haut_visage"],$_POST["h_bas_visage"], $_POST["h_clignements"], $_POST["h_yeux"],$_POST["h_tete"],$_POST["h_buste"],$_POST["h_bras"],$_POST["h_mains"],$_POST["h_jambes"], $_POST["h_pieds"], $_POST["h_self_adapt"], $_POST["h_pasP1P2"], $_POST["tempsP1P2"], $_POST["h_pasP2Cible"], $_POST["tempsP2Cible"]);
            include("merci.html");
          }
              else {
                $dino->Count($_POST["sujet"], $_POST["personne"], $_POST["vid"], $_POST["visio"], $_POST["h_haut_visage"],$_POST["h_bas_visage"], $_POST["h_clignements"], $_POST["h_yeux"],$_POST["h_tete"],$_POST["h_buste"],$_POST["h_bras"],$_POST["h_mains"],$_POST["h_jambes"], $_POST["h_pieds"], $_POST["h_self_adapt"], $_POST["h_pasP1P2"], $_POST["tempsP1P2"], $_POST["h_pasP2Cible"], $_POST["tempsP2Cible"]);
                include("merci.html");
              }
        }
        else {
          include("erreur.html");
        }
      break;
      
      
      /* Profil */
      case "profil":
      // Connexion (si pas connecté.e)
        if (!isset($_SESSION["pseudo"])){
          // Formulaire de connexion
          include("connexion.html");
         }
      break;
      
      /* Connexion */
      case "connexion":
        // Si champs bien remplis
        if (!empty($_POST["pseudo"]) AND !empty($_POST["mdp"])) {
         // Requête de connexion
         $dino->Connect($_POST["pseudo"], $_POST["mdp"]);
         // Redirection vers l'accueil
         if ($_SESSION["connecte"] == "true"){
            echo '<script src="home.js"> </script>';
         }
         else {
          // Formulaire de connexion
          include("connexion.html");
          // Erreur champs manquants
          include("connexion.erreur.html");
         } 
                 
        }
        else {
          // Formulaire de connexion
          include("connexion.html");
          // Erreur champs manquants
          include("connexion.erreur.html");
        }
      break;
      
      /* Déconnexion */
      case "deconnexion" :
        // Remise à 0 des champs de session
        $_SESSION=array();
        // Redirection vers l'accueil
        echo '<script src="home.js"> </script>';
      break;

      /* Par défaut */
      default:
        // Boutons
        include("boutons.html");
      break;
    }
  }
}
?>
