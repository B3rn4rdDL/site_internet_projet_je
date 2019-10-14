<?php session_start() ?> <!-- On démarre la session-->
<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />  <!--  Inclusion de la feuille de style-->
        <title>Gamer's Way</title>
    </head>

     <body>
        <div id="wrap">
            <div id="header"><?php include("header.php"); ?></div>  <!-- On inclut le header -->
                <div id="main">
                    <section id="ventes_flash_accueil">  <!-- Les sections représentent les différents articles sur la page d'accueil-->
                        <h2>Ventes Flash</h2>
                        <a href="pcg2.php">
                            <img src="images_produits/accueil/vente_flash.jpg" alt="image vente flash"/>  <!-- En cliquant sur les images : redirection vers les pages des articles en qs avec liens ou formulaires-->
                        </a>
                    </section>
                    <div id="pc_portables">
                        <section id="pc_bureautique">
                            <h2>Nos PC bureautique</h2>
                            <form method="post" action="ensembles_produits.php">
                                <input type="submit" name="pc_bureautique_footer" class="pc_bureautique_accueil" value="" />
                            </form>
                        </section>
                        <section id="pc_gamer">
                            <h2>Nos PC gamers</h2>
                            <form method="post" action="ensembles_produits.php">
                                <input type="submit" name="pc_gamers_footer" class="pc_gamers_accueil" value="" />
                            </form>
                        </section>
                    </div>
                    <section id="nouveaute">
                        <h2>Nouveauté</h2>
                        <a href="pcg3.php">
                            <img src="images_produits/accueil/nouveaute.jpg" alt="image nouveaute" />
                        </a>
                    </section>
                    <div id="ecrans_souris">
                        <section id="ecrans">
                            <h2>Nos écrans</h2>
                            <a href="ecran.php">
                                <img src="images_produits/accueil/ecran.jpg" alt="image ecran" />
                            </a>
                        </section>
                        <section id="souris_gaming">
                            <h2>Nos souris gaming</h2>
                            <a href="souris.php"> 
                                <img src="images_produits/accueil/souris.jpg" alt="image souris gaming" />
                            </a> 
                        </section>
                    </div>
               </div>
            <div id="footer"><?php include("footer.php"); ?></div>  <!-- On inclut le footer -->
        </div>
    </body>
</html>