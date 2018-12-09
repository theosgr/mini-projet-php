<?php
// cette classe ne doit pas être modifiée
require "Ville.php";

class Villes{

	private $villes;

	function __construct(){
// tableau représentatif d'un jeu qui servira à développer votre code

		$this->villes[0][0]=new Ville("0",3,0);
		$this->villes[0][6]=new Ville("1",2,0);
		$this->villes[3][0]=new Ville("2",6,0);
		$this->villes[3][5]=new Ville("3",2,0);
		$this->villes[5][1]=new Ville("4",1,0);
		$this->villes[5][6]=new Ville("5",2,0);
		$this->villes[6][0]=new Ville("6",2,0);

	}


// sélecteur qui retourne la ville en position $i et $j 
// précondition: la ville en position $i et $j existe

	function getVille($i,$j){
		return $this->villes[$i][$j];
	}


// modifieur qui value le nombre de ponts de la ville en position $i et $j;
// précondition: la ville en position $i et $j existe

	function setVille($i,$j,$nombrePonts){
		$this->villes[$i][$j]->setNombrePonts($nombrePonts);
	}


// permet de tester si la ville en position $i et $j existe 
// postcondition: vrai si la ville existe, faux sinon

	function existe($i,$j){
		return isset($this->villes[$i][$j]);
	}

//rajout d'éventuelles méthodes

	function ajouterBridge($x1,$y1,$x2,$y2){ // ajouter le bridge entre deux villes coordonnées x1 y1 et x2 y2 
<<<<<<< HEAD
		// On traite chaque cas de liens entre les villes pour savoir si la liaison est possible (même ordonées , même abscisses ect...)

=======
>>>>>>> master

	}

<<<<<<< HEAD
	function estTermine(){ // fonction pour savoir si le jeu est terminé ou pas
		for ($i=0; $i < 7; $i++) {
			for ($j=0; $j < 7; $j++) {
				if($this->villes[$i][$j] instanceof Ville){
					if($this->villes[$i][$j]->getNombrePontsMax() != $this->villes[$i][$j]->getNombrePonts()) {
						return false;
				}
			}
		}
		
	}
	return true;
}
=======
	}
>>>>>>> master

	function estTermine(){ // fonction pour savoir si le jeu est terminé ou pas
		for ($i=0; $i < 7; $i++) {
			for ($j=0; $j < 7; $j++) {
				if($this->villes[$i][$j] instanceof Ville){
					if($this->villes[$i][$j]->getNombrePontsMax() != $this->villes[$i][$j]->getNombrePonts()) {
						return false;
				}
			}
		}
		
	}
	return true;
}
}

