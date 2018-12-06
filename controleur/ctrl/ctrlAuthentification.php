<?php

require_once PATH_VUE."/vueAuthentification.php";
require_once PATH_MODELE."/dao.php";


	class ControleurAuthentification {

	private $vue;
	private $modele;

	public function __construct() {
		$this->vue = new vueAuthentification();
		$this->modele = new dao();

	}
  //Affiche la page d'authentification
	public function pageConnexion() {
		$this->vue->genereVueConnexion();
	}


  //fonction permettant à un utilisateur de se connecter
 	public function connexionUser() {
      $_SESSION['user'] = $this->modele->connexion();
      if ($_SESSION['user'] != "ko") { // connexion réussie
        $_SESSION['id'] = $_POST['login'];
        $_SESSION['validite'] = "ok";    

        /*return true; = pour utiliser plusieurs vues au lieu d'utiliser des fonctions dans une seule vue. Dans le routeur après conditionnelle : if connxeionUser() renvoie true alors on appelle la méthode jeu() pour générer la vue du jeu sinon si elle renvoie false alors on renvoie la page de connexion*/
        //$this->vue->genereVueJeu(null,-1,-1); // Générer vue jeu si la connexion est réussie
      } else { // echec connexion
        $_SESSION['validite'] = "ko";
        //$this->vue->genereVueConnexion();
        
      }
      return $_SESSION['validite'];
    }

     /* Deconnexion d'un utilisateur. */
    public function deconnexionUser() {
      unset($_SESSION['user']);
      session_destroy();
      $this->vue->genereVueConnexion();
    }
  }






?>