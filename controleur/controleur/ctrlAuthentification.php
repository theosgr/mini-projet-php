<?php

require_once PATH_VUE."/vueAuthentification.php";
require_once PATH_MODELE."/dao/dao.php";


	class ControleurAuthentification {

	private $vue;
	private $modele;

	public function __construct() {
		$this->vue = new vueAuthentification();
		$this->modele = new dao();

	}

	public function connexion() {
		$this->vue->genereVueConnexion();
	}
 	public function connexionUser() {
      $_SESSION['user'] = $this->modele->connexion();
      if ($_SESSION['user'] != "ko") { // connexion réussie
        $_SESSION['id'] = $_POST['login'];
        $_SESSION['validite'] = "ok";
        $this->vue->genereVueJeu(); // Générer vue jeu si la connexion est réussie
      } else { // echec connexion
        $_SESSION['validite'] = "ko";
        $_SESSION['message'] = "Nom d'utilisateur ou mot de passe incorrect";
        $this->connexion();
      }
    }

    /* Deconnexion d'un utilisateur. */
    public function deconnexionUser() {
      unset($_SESSION['user']);
      session_destroy();
      $this->vue->genereVueConnexion();
    }
}





?>