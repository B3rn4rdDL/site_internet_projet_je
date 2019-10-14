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
    	<h2>Promotions</h2>
        <img src="images_produits/accueil/vente_flash.jpg" alt="image vente flash"/> <!-- on affiche une image de la promotion -->
        <div class = j_en_profite> 
        	<a href="pcg2.php" class = "lien_co_panier">J'en profite ! </a> <!-- On crée un lien qui redirige l'utilisateur vers la fiche du produit -->
        </div>
    </body>
    <?php include("footer.php"); ?>
</html>