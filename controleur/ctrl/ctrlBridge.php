<?php

require_once PATH_VUE."/vueAuthentification.php";
require_once PATH_MODELE."/Villes.php";


	class ControleurBridge {

	private $vue;
	private $modele;
  	private $bridge;

	public function __construct() {
		$this->vue = new vueAuthentification();
		$this->bridge = new Villes();
    	$_SESSION["jeu"] = $this->bridge;
	}


  public function jeu(){  //a implémenter
   	$this->vue->genereVueJeu($this->bridge, -1, -1);
  }

  public function accueil(){
  	// a implementer
  }

}




?>