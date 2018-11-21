<?php


require_once 'controleur/ctrlAuthentification.php';

	class Routeur {

		private $ctrlAuthentification;

		public function __construct(){

			$this->ctrlAuthentification = new ControleurAuthentification();

		}

		public function routerRequete(){


		//Gestion connexion User

			if(isset($_GET['connexion'])){
				// Connexion user
				if($_GET['connexion'] == 1) {
					$this->ctrlAuthentification->connexionUser();
					return;
				}

				//charger page de connexion
				if ($_GET['connexion'] == "") {
	          		$this->ctrlAuthentification->connexion();
	          		return;
	        	}
	      
			}




		}


}


?>