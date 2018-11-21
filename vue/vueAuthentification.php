<?php

class vueAuthentification {


	/* Vue d'accueil du site. */
	public function genereVueConnexion(){
		?>
		<!DOCTYPE html>
		<html lang="fr">
		<head>
			<title>Accueil</title>
		</head>
		<body>

			<h1> Bienvenue dans Bridges, veuillez-vous identifier pour continuer </h1>

			<form action="index.php?connexion=1" method="post" onsubmit="return verifAuthentification(this)">
				<div class="auth">
					<input type="text" name="login" placeholder="Login"/><br/>
					<input type="text" name="pass" placeholder="Mot de passe"/><br/>

					<input type="submit" name="validation" value="Valider"/>
				</div>
			</form>

		</body>
		</html>




		<?php
}

}

?>


