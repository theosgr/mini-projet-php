<?php



class Utilisateur{

	private $pseudo;
	private $motDePasse;



	public function getPseudo(){
		return $this->$pseudo;
	}

	public function getMdp(){
		return $this->$motDePasse;
	}

}

?>