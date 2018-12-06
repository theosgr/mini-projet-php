<?php



class Utilisateur{

	private $login;
	private $pass;



	public function getLogin(){
		return $this->$login;
	}

	public function getPass(){
		return $this->$pass;
	}

}

?>