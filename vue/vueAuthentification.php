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
			 <link rel="stylesheet" type="text/css" href="css/styles.css" />
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
				<link rel="stylesheet" type="text/css" href="css/styles.css" />
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
								if($villes->getVille($i,$j)) $ville = $villes->getVille($i,$j); // on récupère la ville dans une variable 
									if($x1 != -1 && $y1 != -1){ // x1 et y1 ne peuvent pas avoir de coordonnées négatives
										if($x1 == $i && $y1 == $j) {
											// on traite le cas ou la ville au coordonnées x1 = i et y1 = j est sélectionnée 
											echo '<td>';
											echo "<a class='city size center selected' href='index.php?x1=".$x1."&y1=".$y1."&x2=".$i."&y2=".$j."'>".$ville->getNombrePontsMax()."</a>";
											echo '</td>';
										}  else { // si x1 != i et y1 != j on affiche une ville normale
											echo '<td>';
											echo "<a class='city size center' href='index.php?x1=".$x1."&y1=".$y1."&x2=".$i."&y2=".$j."'>".$ville->getNombrePontsMax()."</a>";
											echo '</td>';
										}	
										// cas d'une ville non sélectionnée
									} elseif($x1 == -1 && $y1 == -1){
										echo '<td>';
										echo "<a class='city size center' href='index.php?x1=".$i."&y1=".$j."'>".$ville->getNombrePontsMax()."</a>";
										echo '</td>';
									}
									else { echo "<div class='size ".$villes->getVille($i,$j)."'></div>";}
								}
									// sinon on créé un espace blanc si la ville n'existe pas
								else {
										
									echo '<td>';
									echo "<a href='index.php' class='size'></a>";
									echo '</td>';
								}
							}
							
							echo "</tr>";


						}
						?>
					</table>
					<nav class="menu">
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
			</nav>
			
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
				<link rel="stylesheet" type="text/css" href="css/styles.css" />
			</head>
			<body>
				<p> Perdu ou gagnée + statistiques + classement en fonction des stats</p>
			</body>
			</html>


			<?php
		}






	}



	?>


