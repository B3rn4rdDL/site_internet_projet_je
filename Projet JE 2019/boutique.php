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
        <h2>Recherche par type de produit :</h2>
        <section class="section_affichage_type">  <!-- On crée une section qui sera mise en forme dans la page CSS -->
            <form method="post" action="ensembles_produits.php"> <!-- On crée un formulaire qui permet de rechercher des produits par types d'articles-->
                <br /><input type="checkbox" name="pc_bureautique" id="pc_bureautique" /><label for="pc_bureautique">PC bureautique</label><br /> <!-- Les éléments correspondent à des cases à cocher-->
                <input type="checkbox" name="pc_gamer" id="pc_gamer" /><label for="pc_bureautique">PC gamers</label><br />
                <input type="checkbox" name="peripheriques" id="peripheriques" /><label for="pc_bureautique">Périphériques</label><br />
                <input type="checkbox" name="gaming" id="gaming" /><label for="pc_bureautique">Gaming</label><br /><br />   
                <input type="submit" name="rechercher" class="button_affichage_type" value="Rechercher"> <!-- On ajoute un bouton pour lancer la recherche-->
            </form>
        </section>
    </body>

    <?php include("footer.php"); ?>
    
</html>