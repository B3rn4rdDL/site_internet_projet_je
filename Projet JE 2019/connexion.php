<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

 	<?php include("header.php"); ?>

 	<body>
 		<h2>Connexion</h2>
        <section class="aff_connexion_inscription">
     		<form method="post"> <!-- On crée un formulaire pour permettre à l'utilisateur de remplir les infos pour se connecter-->
     				<br /><label for="pseudo">&nbspVotre pseudo :&nbsp</label><input type="text" name="pseudo" id="pseudo" placeholder="Ex: Dre4mer" required /><br /><br /> <!-- Tous les champs sont obligatoires grâce à required-->
     				<label for="pass">&nbspVotre mot de Passe :&nbsp</label><input type="password" name="pass" id="pass" required /><br /><br />
     				<input type="submit" value="Connexion" name="connexion" class="button_affichage_type"><br /><br /> <!-- On crée un bouton pour se connecter-->
     		</form>
     		<a href="inscription.php">Pas encore de compte ? Inscrivez-vous !</a> <!-- On fait un lien pour les utilisateurs qui souhaitent s'inscrire qui redirige vers la page d'inscription -->
     		<!-- <a href="mdpoublie.php">Mot de passe oublié ?</a> -->
        </section>

 		<?php
 			if(isset($_POST['connexion'])) // Si l'utilisateur à cliqué sur se connecter
 			{
    			try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
				catch(Exception $e){die('Erreur : '.$e->getMessage());}
				$req = $bdd->prepare('SELECT id, pass FROm membre WHERE pseudo = :pseudo'); // On récupère les données utilisateur
				$req -> execute(array('pseudo' => $_POST['pseudo']));
				$donnees = $req -> fetch();
				$isPasswordCorrect = password_verify($_POST['pass'], $donnees['pass']); // vérification du mot de passe de l'utilisateur souhaitant se connecter

				if (!$donnees) // Si l'utilisateur n'est pas trouvé dans la BDD, on affiche un message d'erreur
				{
    				echo 'Identifiant ou mot de passe incorrect, veuillez entrez des identifiants/mots de passe valides';
				}
				else //
				{
   					if ($isPasswordCorrect) // Si le mot de passe correspond bien au pseudo
   					{
        				session_start(); // On lance la session de l'utilisateur
        				$_SESSION['id'] = $donnees['id']; // On attribue à la session le pseudo et l'id de l'utilisateur
        				$_SESSION['pseudo'] = $_POST['pseudo'];
                        $_SESSION['panier_verrouillage'] = isset($_POST['paiement_effectue']); // On défini le verrouillage du panier selon le fait que l'utilisateur soit deja passer au paiement ou non (sur un autre onglet par exemple)
        				echo '<meta http-equiv="refresh" content="0;URL=accueil.php">'; // On redirige automatiquement l'utilisateur vers la page d'accueil
    				}
    				else  // Sinon on affiche un message d'erreur
    				{
       					echo 'Identifiant ou mot de passe incorrect, veuillez entrez des identifiants/mots de passe valides';
    				}
				}	
 			}
 		?>
 	</body>

    <?php include("footer.php"); ?>

    </html>