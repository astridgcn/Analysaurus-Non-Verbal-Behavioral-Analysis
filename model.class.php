<?php
  // - - -

  // Classe d'exécution de requête
  require("exec.class.php");
  // - - -
  
  /* Classe de requêtes */
  class Req extends Requete {
  
    /* Fonction d'affichage et de traitement des informations connexion */
    public function connexion(){
      // Si la requête possède au moins un résultat
      if (!empty($this->data)) {
        // Pour chaque ligne de résultats (de la requête)
        foreach ($this->data as $dino){
          // Remplissage des informations de session
          $_SESSION["pseudo"] = $dino["pseudo"];
          $_SESSION["mdp"] = $dino["mdp"];
        }
        //Connexion réussie
        $_SESSION["connecte"] = "true";
      }
      // Si la requête est vide
      else {
        $_SESSION["connecte"] = "false";
      }
    }
  }
  /* Classe des objets Dino */
  class Dino{
    protected $pdo;
    protected $didi;
    protected $data;

    /* Constructeur */
    function __construct($param_pdo){
      $this->pdo = $param_pdo;
    }

    /* Fonction de comptage */
    public function Count($sujet, $personne, $vid, $visio, $haut_visage, $bas_visage, $clignements, $yeux, $tete, $buste, $bras, $mains, $jambes, $pieds, $self_adapt, $paspP1P2, $tempsP1P2, $pasP2Cible, $tempsP2Cible){
      // Requête d'insertion
      $res = $this->pdo->prepare("INSERT INTO indices (sujet, personne, vid, visio, haut_visage, bas_visage, clignements, yeux, tete, buste, bras, mains, jambes, pieds, self_adapt, pas_P1_P2, temps_P1_P2, pas_P2_cible, temps_P2_cible) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      // Exécution de la requête
      $res->execute([$sujet, $personne, $vid, $visio, $haut_visage, $bas_visage, $clignements, $yeux, $tete, $buste, $bras, $mains, $jambes, $pieds, $self_adapt, $paspP1P2, $tempsP1P2, $pasP2Cible, $tempsP2Cible]);
    }
    
    /* Fonction de connexion */
    public function Connect($pseudo, $mdp){
      // Requête de recherche de l'utilisateur
      $didi = new Req($this->pdo, "Connexion", 'SELECT pseudo, mdp FROM users WHERE pseudo LIKE "'.$pseudo.'" AND mdp LIKE "'.$mdp.'"');
      // Exécution de la requête
      $didi->executer();
      // Fonction affichage de connexion
      $didi->connexion();
    } 
  } 
 ?>
