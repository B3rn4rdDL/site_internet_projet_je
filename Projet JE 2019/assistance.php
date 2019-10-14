<?php session_start() ?> <!-- On démarre la session-->
<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

    

	<body>
		<div id="wrap">
			<div id="header"></div><?php include("header.php"); ?></div>
				<div id="main">
					<h2>Assistance</h2>
					<h3>Nous contacter</h3>

					<form method="post" enctype="multipart/form-data"> <!-- On crée un formulaire qui permette d'envoyer un message avec des pièes jointes-->
						<label for="email_contact">Votre e-mail : </label><br /><input type="mail" name="email_contact" required><br /><br /> <!-- required pour dire que chaque champ est obligatoire -->
						<label for="objet">Objet : </label><br /><input type="text" name="objet" required><br /><br />
						<label for="message">Votre message : </label><br /><textarea name="message" rows="10" cols="50"></textarea><br /><br />
						<label for="fichier">Pièces jointes : </label><input type="file" name="fichier" /><br /><br />
						<input type="submit" name="envoyer_message" value="Envoyer mon message">
					</form>
					<?php
						if (isset($_POST['envoyer_message'])) // Si le bouton envoyer à été cliqué, alors on affiche une confirmation d'envoi
						{
							echo 'Votre message a bien été envoyé !';
							// ini_set( 'display_errors', 1 );
				   //  		error_reporting( E_ALL );
							// $fichier = $_POST['fichier'];
							// $destinataire = 'b.delambertye@free.fr';
							// $sujet = $_POST['objet']; // On créer un boundary unique
							// $boundary = md5(uniqid(rand(), true));// On met les entêtes
							// $entetes = 'Content-Type: multipart/mixed;'."n".' boundary="'.$boundary.'"'.'From :"'.$_POST['email_contact'].'"';
							// $body = 'This is a multi-part message in MIME format.'."n";
							// $body .= '--'.$boundary."n"; // ici, c'est la première partie, notre texte HTML (ou pas !)
							// // Là, on met l'entête
							// $body .= 'Content-Type: text/html; charset="UTF-8"'."n";// On peut aussi mettres les autres (voir à la fin)
							// $body .= "n";// On remet un deuxième retour à la ligne pour dire que les entêtes sont finie, on peut afficher notre texte !
							// $body .= $_POST['message'];// Le texte est finie, on va faire un saut à la ligne
							// $body .= "n";// Et on commence notre deuxième partie qui va contenir le PDF
							// $body .= '--'.$boundary."n";// On lui dit (dans le Content-type) que c'est un fichier PDF
							// $body .= 'Content-Type: application/zip; name="'.$fichier.'"'."n";
							// $body .= 'Content-Transfer-Encoding: base64'."n";
							// $body .= 'Content-Disposition: attachment; filename="'.$fichier.'"'."n";// Les entêtes sont finies, on met un deuxième retour à la ligne
							// $body .= "n";
							// $source = file_get_contents($fichier);
							// $source = base64_encode ($source);
							// $source = chunk_split($source);
							// $body .= $source;// On ferme la dernière partie :
							// $body .= "n".'--'.$boundary.'--';// On envoi le mail :
							// mail($destinataire, $sujet, $body, $entetes);
							// echo 'mail envoyé';
						}
					?>
				</div>
			<div id="footer"><?php include("footer.php"); ?></div>
		</div>
	</body>  
</html>

