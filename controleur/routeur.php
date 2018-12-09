<?php


require_once 'ctrl/ctrlAuthentification.php';
require_once 'ctrl/ctrlBridge.php';


class Routeur {

	private $ctrlAuthentification;
	private $ctrlBridge;

	public function __construct(){

		$this->ctrlAuthentification = new ControleurAuthentification();
		$this->ctrlBridge = new ControleurBridge();
	}

	public function routerRequete(){


		//Gestion connexion User



		if(isset($_GET['connexion'])){
				// Connexion user
			if($_GET['connexion'] == 1 && $this->ctrlAuthentification->connexionUser() == "ok") {
				$this->ctrlBridge->jeuBridge();
				return;
			}

				//charger page de connexion
			if ($_GET['connexion'] == "") {
				$this->ctrlAuthentification->pageConnexion();
				return;
			}
			
		}

				   // DECONNEXION UTILISATEUR
		if (isset($_GET['disconnect'])) {
			$this->ctrlAuthentification->deconnexionUser();
			return;
		}
			//DEFAULT
		$this->ctrlAuthentification->pageConnexion();
		return;
	}


}


?>