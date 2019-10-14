<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

    <?php include("header.php"); ?>

    	<body>
            <h2>Inscription</h2>
            <section class="aff_connexion_inscription"> <!-- On crée un formulaire pour que l'utilisateur puisse s'inscrire en rentrant ses données-->
        		<form method="post">
        			<label for="nom">Nom :&nbsp</label><input type="text" name="nom" id="nom" required /><br /> <!-- Tous les champs sont obligatoires -->
        			<label for="prenom">Prénom :&nbsp</label><input type="text" name="prenom" id="prenom" required /><br />
        			<label for="adresse">Adresse :&nbsp</label><input type="text" name="adresse" id="adresse" required /><br />
        			<label for="code_postal">Code Postal :&nbsp</label><input type="text" name="code_postal" id="code_postal" required /><br />
        			<label for="mail">Adresse mail :&nbsp</label><input type="email" name="mail" id="mail" required /><br />
        			<label for="pseudo">Pseudonyme :&nbsp</label><input type="text" name="pseudo" id="pseudo" required /><br />
        			<label for="pass">Mot de Passe :&nbsp</label><input type="password" name="pass" id="pass" required /><br />
        			<label for="confirmpass">Confirmer mot de passe :&nbsp</label><input type="password" name="confirmpass" id="confirmpass" required /><br /><br />
        			<input type="submit" value="Inscription" name="inscription" class="button_inscription" /><br /><br /> <!-- On crée un bouton pour valider l'inscriprion-->
        		</form>
            </section>

    		<?php
        		if(isset($_POST['inscription'])) // Si l'utilisateur a cliqué sur le bouton inscriprion
        		{

        			try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
    				catch(Exception $e){die('Erreur : '.$e->getMessage());}
    				$req = $bdd -> prepare ('SELECT pseudo FROM membre WHERE pseudo = :pseudo'); // On vérifie si le pseudo est bien disponible
    				$req->execute(array('pseudo' => $_POST['pseudo']));

    				if ($donnees = $req -> fetch()) // Si le pseudo existe déjà dans la BDD on affiche un message d'erreur
    				{
    					echo 'Le pseudo '.$_POST['pseudo'].' est déjà utilisé, veuillez en choisir un autre';
    					$req->closeCursor();
    				} 
    				else // Sinon on vérifie que les mots de passes soient identiques
    				{
    					if($_POST['pass'] != $_POST['confirmpass']) // Si les deux ne le sont pas on affiche un message d'erreur
    					{
    						echo 'Les deux mots de passes ne sont pas identiques, veuillez recommencer la saisie !';
    					}
    					else // Sinon on peut passer à la vérification du format du mail
    					{	
    						if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == false) // On vérifie que l'adresse mail est le bon format, on met pour cela un filtre qui vérifiera le bon format de l'e-mail pour nous

    						{
    							echo 'Mail non valide, merci de rentrer un mail valide';
    						}
    						else //Si tout est bon, on inscrit la personne dans notre BDD
    						{
    							$pass = isset($_POST['pass']) ? $_POST['pass'] : NULL;
        						$pass_hache = password_hash($pass, PASSWORD_DEFAULT); // On protège le mot de passe en le cryptant
        						// On ajoute le nouvel utilisateur à la BDD
        						$req = $bdd -> prepare('INSERT INTO membre(pseudo, pass, mail, nom, prenom, adresse, code_postal, date_inscription) VALUES(:pseudo, :pass, :mail, :nom, :prenom, :adresse, :code_postal, CURDATE())');
        						$req -> execute(array('pseudo' => $_POST['pseudo'],'pass' => $pass_hache,'mail' => $_POST['mail'],'nom' => $_POST['nom'],'prenom' => $_POST['prenom'],'adresse' => $_POST['adresse'],'code_postal' => $_POST['code_postal']));
        						$req->closeCursor();
    						}
    					}
    				}
        		}
        	?>
    	</body>
    <?php include("footer.php"); ?>
</html>