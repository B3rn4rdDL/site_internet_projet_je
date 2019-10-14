<?php session_start() ?>
<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

	<body>
		<div id="wrap">
			<div id="header"><?php include("header.php"); ?></div>
				<div id="main">
					<h2>Résultats de la recherche : </h2>
	    			<?php 
	    				function afficher($id_produit) // On crée une fonction qui permet d'afficher un produit en fonction de son id
	    				{
	    					try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
							catch(Exception $e){die('Erreur : '.$e->getMessage());}

							$req = $bdd->prepare('SELECT nom, prix, descriptif, lien_img, lien_fiche_produit FROM liste_produits WHERE id = :id'); // On crée une requête pour récupérer les données du produit en fonction de son id
							$req->execute(array('id' => $id_produit));
							while ($donnees = $req->fetch())
							{
								$image =  $donnees['lien_img']; // On récupère ainsi le lien de l'image, le nom, le descriptif, le prix et le lien vers la fiche du produit
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
	    				}

	    				if(isset($_POST['pc_bureautique']) || isset($_POST['pc_bureautique_footer'])) // Si l'utilisateur a cliqué sur un lien pour voir les pc bureautique
	    				{
	    					afficher('4'); // On affiche les produits de cette catégorie grâce à leurs id et la fonction afficher
	    					afficher('5');
	    					afficher('6');
	    				}
	    				if(isset($_POST['pc_gamer']) || isset($_POST['pc_gamers_footer'])) // Si l'utilisateur a cliqué sur un lien pour voir les pc gamers
	    				{
	    					afficher('1'); // On affiche les produits de cette catégorie grâce à leurs id et la fonction afficher
	    					afficher('2');
	    					afficher('3');
	    				}
	    				if(isset($_POST['peripheriques']) || isset($_POST['peripheriques_footer'])) // Si l'utilisateur a cliqué sur un lien pour voir les périphériques
	    				{
	    					afficher('10'); // On affiche les produits de cette catégorie grâce à leurs id et la fonction afficher
	    					afficher('11');
	    					afficher('12');
	    				}
			    		if(isset($_POST['gaming']) || isset($_POST['gaming_footer'])) // Si l'utilisateur a cliqué sur un lien pour voir le matériel gaming
			    		{
			    			afficher('7'); // On affiche les produits de cette catégorie grâce à leurs id et la fonction afficher
			    			afficher('8');
			    			afficher('9');
	    				}
	    				if(!isset($_POST['pc_bureautique']) && !isset($_POST['pc_gamer']) && !isset($_POST['peripheriques']) && !isset($_POST['gaming']) && !isset($_POST['pc_bureautique_footer']) && !isset($_POST['pc_gamers_footer']) && !isset($_POST['peripheriques_footer']) && !isset($_POST['gaming_footer'])) // Si l'utilisateur a cliqué sur rechercher alors que aucune catégorie n'était sélectionnée
	    				{
	    					echo '<div class = panier_vide>Vous n\' avez sélectionné aucun produit, <a href="boutique.php" class = "lien_co_panier">Cliquez ici</a> pour retourner à la sélection de recherche!</div>'; //On affiche un message d'erreur
	    				}
					?>
	    		</div>
	    	<div id="footer"><?php include("footer.php"); ?></div>
	    </div>
	</body>   
</html>