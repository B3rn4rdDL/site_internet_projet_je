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
            <h2>Recherche par marques :</h2>
            <section class="section_affichage_type">
                <form method="post" action="produit.php"> <!-- On crée un formulaire pour que l'utilisateur puisse sélectionner la marque qu'il recherche-->
                    <input type="radio" name="marque" id="HP" checked value="HP" /><label for="HP"> HP </label><br /> <!-- On présélectionne une valeur automatiquement -->
                    <input type="radio" name="marque" id="OMEN" value="OMEN" /><label for="OMEN"> OMEN </label><br />
                    <input type="radio" name="marque" id="SOG" value="SOG" /><label for="SOG"> SOG </label><br />
                    <input type="radio" name="marque" id="LOGITECH" value="LOGITECH" /> <label for="LOGITECH"> LOGITECH </label><br />
                    <input type="radio" name="marque" id="APPLE" value="APPLE" /><label for="APPLE"> APPLE </label>  <br />
                    <input type="radio" name="marque" id="LG" value="LG" /><label for="LG"> LG </label><br />
                    <input type="radio" name="marque" id="CORSAIR" value="CORSAIR" /><label for="CORSAIR"> CORSAIR </label><br />
                    <input type="radio" name="marque" id="MOBA" value="MOBA" /><label for="MOBA"> MOBA </label><br /><br />
                    <input type="submit" value="Rechercher" class="button_affichage_type" /> <!-- On crée un bouton pour lancer la recherche -->
                </form>
            </section>
        </body>
    <?php include("footer.php"); ?>
</html>

