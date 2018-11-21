<?php

	require_once PATH_MODELE."/bean/Utilisateur.php";

	class Dao {
		private $connexion;


		//constructeur, connexion à la base de données pour pouvoir récupérer les différentes tables

		public function __construct(){
			try{
				$chaine = "mysql:host=".HOST.";dbname=".BD.";charset=UTF8";
       			$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';
        		$this->connexion = new PDO($chaine,LOGIN,PASSWORD,$pdo_options);
        		$this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				throw new PDOException("Erreur de connexion à la base");
			}
		}

		//Deconnexion de la base de données

   		 public function destroy(){
      		$this->connexion = NULL;
    	}

    	// Fonction permettant de savoir si l'utilisateur est inscrit dans la base de donnnées

    	public function estInscrit($pseudo) {
    		try {
        		$stmt = $this->connexion->prepare("select * from joueurs where pseudo = ?;");
        		$stmt->bindParam(1,$pseudo);
        		$stmt->execute();
        		$result=$stmt->fetch(PDO::FETCH_ASSOC);
        	if ($result["login"] != NUll) {
          		return true;
        	} else {
       		   return false;
        	}
      	} catch(PDOException $e) {
      		$this->destroy();
       		throw new PDOException("Erreur d'accès à la table Utilisateurs");
      }
    }

   		// Fonction qui vérifie le mot de passe entré lors de l'authentification

    	

    	public function verifyPassword($pseudo,$mdp){
    		try {
	        if ($this->estInscrit($pseudo)) {
	          $stmt = $this->connexion->prepare("select * from joueurs where pseudo = ?;");
	          $stmt->bindParam(1,$pseudo);
	          $stmt->execute();
	          $passUser = $stmt->fetch();
	          $passwordUser = $passUser["pass"];
	          if (crypt($mdp, $passwordUser) == $passwordUser) {
	            return true;
	          } else {
	            return false;
	          }
	        }
	      } catch(PDOException $e) {
	        $this->destroy();
	        throw new PDOException("Erreur d'accès à la table Utilisateurs");
	      }
    }

      // Méthode qui permet la connexion d'un utilisateur
    public function connexion() {
      try {
        if ($this->verifyPassword($_POST['login'],$_POST['pass'])) {
          $stmt = $this->connexion->prepare('select * from Utilisateurs where pseudo = ?;');
          $stmt->bindParam(1,$_POST['login']);
          $stmt->execute();
          }
           return "ko";
      } catch (PDOException $e) {
        $this->destroy();
        throw new PDOException("Erreur d'accès à la table Utilisateurs");
      }
    }

}