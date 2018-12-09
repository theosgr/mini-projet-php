<?php

require_once PATH_MODELE."/Villes.php";

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

		<!DOCTYPE html>
		<html lang="fr">

			<head>
				<title>Bridges</title>
			</head>
			<body>

				<h1 action="vueAuthentification.php"><?php if (isset($_POST['login'])) echo 'Bienvenue dans le jeu ' . htmlspecialchars($_POST['login']);?></h1> <!-- message de bienvenue dans le jeu-->
				<!-- boucle pour afficher le tableau et vérifications-->
				<table>
					<?php
					for($i=0; $i < 7 ;$i++){ //boucles pour la matrice
						echo "<tr>";
						for($j = 0; $j < 7; $j++) {
							if($villes->existe($i,$j)){ // on regarde si la ville existe aux différents index
								if($villes->getVille($i,$j)) { // Si la ville est récupérable
									$ville = $villes->getVille($i,$j); // on récupère la ville dans une variable 
									if($x1 >= 0 && $y1 >= 0){
										if($x1 == $i && $y1 == $j) echo '<a class='center city' href='index.php?



									//affichage du tableau

											echo '<td>';
										echo $ville->getNombrePontsMax(); // on affiche le nombre de ponts max de la ville
										echo '</td>';
								}
							}
						}
						else {
							echo '<td> + </td>';
						}
					}
					echo "</tr>";
				}
				?>
			</table>
				<div="buttons">
				<form action="index.php" method="post"> 
					
					<input type="submit" name="disconnect" value="Déconnexion">
				</form>
				<br/>
				<form action="index.php" method="post"> 
					<input type="submit" name="restart" value="Recommencer la partie">
				</form>
				<br/>
				<form action="index.php" method="post"> 
					<input type="submit" name="stats" value="Voir les statistiques">
				</form>
				<br/>

			</div="buttons">
		</body>
		</html>


		<?php

	}

	public function debutLigne(){
		echo "<tr>";
	}
	public function finLigne(){
		echo "</tr";
	}


	public function genereResultats(){

		?>
		<!DOCTYPE html>
		<html lang="fr">
		<head>
			<title>Résultats et statistiques</title>
		</head>
		<body>
			<p> Perdu ou gagnée + statistiques + classement en fonction des stats</p>
		</body>
		</html>


		<?php
	}





=======
>>>>>>> master

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


