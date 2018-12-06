<?php

class vueAuthentification {


	/* Vue d'accueil du site. */
	public function genereVueConnexion(){
		?>
		<!DOCTYPE html>
		<html lang="fr">
		<head>
			<title>Authentification</title>
			<link rel="stylesheet" href="styles.css" />
		</head>
		<body>

			<h1> Bienvenue dans Bridges, veuillez-vous identifier pour continuer </h1>

			<form action="index.php?connexion=1" method="post">
				<div class ="auth">
					<input type="text" name="login" placeholder="Login"/><br/>
					<input type="password" name="pass" placeholder="Mot de passe"/><br/>

					<input type="submit" name="validation" value="Valider"/>
				</div>
			</form>

		</body>
		</html>




		<?php
	}
		// Vue du jeu 


		public function genereVueJeu($villes,$x1,$y1){ //$villes,$x,$y
			?>

		<!DOCTYPE html>
		<html lang="fr">
			<head>
				<title>Bridges</title>
			</head>
			<body>

				<h1 action="vueAuthentification.php"><?php if (isset($_POST['login'])) echo 'Bienvenue dans le jeu ' . htmlspecialchars($_POST['login']);?></h1>

				<?php for($i=0; $i < 7;$i++){
						for($j = 0; $j < 7; $j++) {
							if($villes->existe($i,$j)){
								if($villes->getVille($i,$j) instanceof Ville) {
									$villes->getVille($i,$j)->getNombrePontsMax();
									
								}
							}
						}
				}// POUR AFFICHER UNE VILLE IL FAUT AFFICHER LE NOMBRE DE PONTS MAX
				?>
				<form action="index.php" method="post"> 
					<div="buttons">
						<input type="submit" name="disconnect" value="Déconnexion">
						<input type="submit" name="restart" value="Recommencer la partie">
						<input type="submit" name="stats" value="Voir les statistiques">
					</div="buttons">
				</form>
			</body>
		</html>


		<?php

	}

	public function genereResultats(){

		?>
		<!DOCTYPE html>
		<html lang="fr">
			<head>
				<title>Résultats et statistiques</title>
			</head>
			<body>
				<p> Perdu ou gagnée </p>
			</body>
		</html>


		<?php
	}





		
}



?>


