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
		// On traite chaque cas de liens entre les villes pour savoir si la liaison est possible (même ordonées , même abscisses ect...)
		$verif = true;
		if($x1==$x2 && $y1 != $y2){ // On traite le cas où les villes ont la même coordonnées x
			for ($i = min($y1,$y2) + 1; $i < max($y1,$y2); $i++) if($this->villes[$x1][$i] instanceof Ville || strpos($this->villes[$x1][$i],"vertical")){ // boucle for pour créer la ligne de la plus petite coordonnée vers la plus grande entre les y ensuite on vérifie si pour chaque incrémentation de i si le case est une instance de ville ou si 
				$verif = false;
				echo "Impossible de créer le pont";
			}
			if($verif) for ($i = min($y1,$y2) + 1; $i < max($y1,$y2); $i++){
				if(!isset($this->villes[$x1][$i])) $this->villes[$x1][$i] = "simple-horizontal";
				else if($this->villes[$x1][$i] == "simple-horizontal") $this->villes[$x1][$i] = "double-horizontal";
				else $this->villes[$x1][$i] = null;

			}
                        $this->getVille($x1,$y1)->ajouterBridge($this->getVille($x2,$y2));
			$this->getVille($x2,$y2)->ajouterBridge($this->getVille($x1,$y1));
		}

		if($y1==$y2 && $x1 != $x2) {
			for ($i = min($x1,$x2) + 1; $i < max($x1,$x2); $i++) if($this->villes[$i][$y1] instanceof Ville || strpos($this->villes[$i][$y1],"horizontal")){
				$verif = false;
				echo "Impossible de créer le pont";
			}
			if($verif) for ($i = min($x1,$x2) + 1; $i < max($x1,$x2); $i++){
				if(!isset($this->villes[$i][$y1])) $this->villes[$i][$y1] = "simple-vertical";
				else if($this->villes[$i][$y1] == "simple-vertical") $this->villes[$i][$y1] = "double-vertical";
						 else $this->villes[$i][$y1] = null;

			}
			$this->getVille($x1,$y1)->ajouterBridge($this->getVille($x2,$y2));
			$this->getVille($x2,$y2)->ajouterBridge($this->getVille($x1,$y1));
		}

	}


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

?>

