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
    				<h2>Mon Panier</h2>
    				<?php

						if(isset($_SESSION['id'])) // Si un utilisateur est connecté
						{
							try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
							catch(Exception $e){die('Erreur : '.$e->getMessage());} //On ouvre la bdd

							$req = $bdd->prepare('SELECT nom_produit, prix, quantite FROM panier WHERE id_membre = :id'); // On importe les produits du panier de l'utilisateur connecté
							$req->execute(array('id' => $_SESSION['id']));
							while ($donnees = $req->fetch())
							{
								$nom_produit =  $donnees['nom_produit'];
								$prix = $donnees['prix'];
								$quantite = $donnees['quantite'];
			
								echo '<table class="table_panier"> 
									<tr class="libelle_tab_produit">
										<th>Produit</th>
										<th>Prix à l\'unité</th>
										<th>Quantité</th>
									</tr>
           					 		<tr>
            					    	<td class="nom_panier">'.$nom_produit.'</td>
            				 		   	<td class="prix_panier">'.$prix.'</td>
            					    	<td class="quantite_panier">'.$quantite.'</td>
            				   		</tr>         
       							</table>'.'<br />'; //On affiche les produits du panier sous forme de tableau
							}
							$req->closeCursor();

							echo '<form method="post" action="paiement.php"> 
									<input type="submit" name"paiement" value="Passer au paiement" class="button_affichage_type"/>
								</form>'; // On crée un bouton pour passer au paiement qui redirige vers la page de paiement

						} else //Sinon on indique à l'utilisateur qu'il doit se connecter pour avoir un panier
							echo '<div class = panier_vide>Votre panier est vide, <a href="connexion.php" class = "lien_co_panier">Connectez-vous</a> pour ajouter des produits à votre panier !</div>';
					?>
				</div>
			<div id="footer"><?php include("footer.php"); ?></div>
		</div>
    </body>
</html>