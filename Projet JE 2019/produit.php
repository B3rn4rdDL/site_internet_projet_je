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
		<h2>Résultats de la recherche : </h2>
		<?php 
			try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
			catch(Exception $e){die('Erreur : '.$e->getMessage());}
			$req = $bdd->prepare('SELECT nom, prix, descriptif, lien_img, lien_fiche_produit FROM liste_produits WHERE marque = :marque_pc'); // On recherche dans la BDD tous les produits correspondant à la marque demandée par l'utilisateur
			$req->execute(array('marque_pc' => $_POST['marque']));
			while ($donnees = $req->fetch())
			{
				$image =  $donnees['lien_img'];
				$nom = $donnees['nom'];
				$descriptif = $donnees['descriptif'];
				$prix = $donnees['prix'];
				$lien_fiche_produit = $donnees['lien_fiche_produit'];
				
				echo '<table class="table_produit">
					<tr class="libelle_tab_produit">
						<th>Image du produit</th>
						<th>Nom</th>
						<th>Descriptif</th>
						<th>Prix</th>
						<th>Fiche produit</th>
					</tr>
	            	<tr>
	                	<td class="img_produit"><img src="'.$image.'" class="img_produit"/></td>
	                	<td class="nom_produit">'.$nom.'</td>
	                	<td class="descriptif_produit">'.$descriptif.'</td>
	                	<td class="prix_produit">'.$prix.'</td>
	                	<td class="lien_fiche_produit">'.$lien_fiche_produit.'</td> 
	                </tr>         
	       		</table>'.'<br />'; // On affiche le tout sous forme de tableau
			}
			$req->closeCursor();
		?>
	</body>
    <?php include("footer.php"); ?>
</html>