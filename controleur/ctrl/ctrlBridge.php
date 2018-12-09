<?php

require_once PATH_VUE."/vueAuthentification.php";
require_once PATH_MODELE."/Villes.php";


<<<<<<< HEAD
class ControleurBridge {

	private $vue;
	private $modele;
 private $bridge;

 public function __construct() {
  $this->vue = new vueAuthentification();
  $this->bridge = new Villes();
  $_SESSION["jeu"] = $this->bridge;
}

public function jeuBridge(){
 if(!isset($_SESSION["jeu"])){ //créer une nouvelle session de jeu
  $_SESSION["jeu"] = $this->bridge;
}
if(isset($_POST['restart'])){ // récupère restart pour réinitialiser
  $this->bridge = new Villes(); // créer un nouveau bridge
  $_SESSION["jeu"] = $this->bridge; // variable de session pour créer une autre session de jeu
  $this->vue->genereVueJeu($this->bridge, -1, -1); // 
} else {
  $this->bridge = $_SESSION["jeu"];
    if(isset($_GET["x1"]) && isset($_GET["y1"]) && isset($_GET["x2"]) && isset($_GET["y2"])){ // on vérifie si les variables dans la vue existent
      $this->bridge->ajouterBridge($_GET["x1"],$_GET["y1"],$_GET["x2"],$_GET["y2"]); // si c'est le cas on ajoute un pont entre les 2 points
      $this->vue->genereVueJeu($this->bridge, -1, -1); // on regenere la vue pour afficher le pont
    } else if(isset($_GET["x1"]) && isset($_GET["y1"])){ // on vérifie si x1 et y1 existent
     $this->vue->genereVueJeu($this->bridge, $_GET["x1"], $_GET["y1"]);
   }
   else{
    $this->vue->genereVueJeu($this->bridge, -1, -1);
  } 


    if($this->bridge->estTermine()){  // Si la partie est terminée, on affiche "Gagné"
    echo "Vous avez gagné !";
  }
}
}
}
?>


=======
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
   	$this->vue->genereVueJeu($this->bridge, 0,0);
  }

  public function jeuBridge(){
  	// a implementer

    if($this->bridge->estTermine()){  // Si la partie est terminée, on affiche "Gagné"
      echo "Vous avez gagné !";
    }
  }
}




?>
>>>>>>> master
