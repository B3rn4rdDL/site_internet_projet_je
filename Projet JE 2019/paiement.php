<?php session_start() ?>
<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

	<?php include("header.php"); ?>

	<body>
		<?php
			$_SESSION['panier_verrouillage'] = true; // Si l'utilisateur est passé au paiement, on verrouille le panier
		?>

		<form method="post">
			<input type="submit" name="paiement_effectue" value="Paiement effectué"> <!-- On crée le formulaire pour indiquer que le paiement a été effectué ici, dans la réalité ce bouton sera à la fin du paiment une fois celui-ci validé-->
		</form>

		<?php
			if(isset($_POST['paiement_effectue'])) // Si le paiement est effectué
			{
				try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
				catch(Exception $e){die('Erreur : '.$e->getMessage());}

				$req = $bdd ->prepare('DELETE FROM panier WHERE id_membre = :id_membre'); // On vide le panier de l'utilisateur
				$req -> execute(array('id_membre' => $_SESSION['id']));
				$req -> closeCursor();

				$_SESSION['panier_verrouillage'] = false; // On déverrouille le panier
				echo '<meta http-equiv="refresh" content="0;URL=accueil.php">'; // On redirige l'utilisateur vers l'accueil
				unset($_POST['paiement_effectue']); // On vide la valeur de la variable qui vérifiait si le paiement était effectué
			}
		?>
	</body>
    <?php include("footer.php"); ?>  
</html>