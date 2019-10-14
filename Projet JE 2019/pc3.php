<?php session_start() ?>
<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

    <?php include("header.php"); ?>
    <?php include("fonctions_panier.php"); ?> <!-- On inclut la feuille php qui possède toutes les fonctions du panier dont ajouter au panier -->

    <body>
        <form method="post" class="form_produit">  <!--  On crée un formulaire pour savoir le nombr ed'articles à ajouter au panier-->
            <label for="quantite">Quantité </label><input type="text" name="quantite" id="quantite" value="1" size="5"/> <!-- L'utilisateur doit saisir un nombre (non vérifié)-->
            <input type="submit" name="ajout_panier" value="Ajouter au panier" /><!-- On ajoute un bouton pour ajouter le nombre d'articles voulu au panier-->
        </form>

        <?php
            try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
            catch(Exception $e){die('Erreur : '.$e->getMessage());}

            $req = $bdd->query('SELECT nom, prix, descriptif, lien_img FROM liste_produits WHERE id="6"'); // Requête pour récupérer les données du produit dont l'id est égal à 6
            if($donnees = $req->fetch())
            {
                $nom = $donnees['nom']; // On récupère le nom du produit, son prix, le descriptif et le lien vers l'image
                $prix = $donnees['prix'];
                $descriptif = $donnees['descriptif'];
                $image = $donnees['lien_img'];
            }
            echo '<table class="table_produit">
                    <tr>
                        <td class="img_produit"><img src="'.$image.'" class="img_produit"/></td>
                        <td class="nom_produit">'.$nom.'</td>

                    </tr>
                    <tr>
                        <td class="descriptif_produit" colspan="2">'.$descriptif.'</td>
                    </tr>
                    <tr>    
                        <td class="prix_produit" colspan="2">'.$prix.'</td>
                    </tr>         
                </table>'; // On affiche toutes ces données sous forme de tableau
        
            $req->closeCursor();

        if(isset($_POST['ajout_panier']) && isset($_SESSION['id'])) //Si l'utilisateur a cliqué sur ajout panier et est connecté
        {
            ajouterArticle($nom,$_POST['quantite'],$prix,$_SESSION['id'], $_SESSION['panier_verrouillage']); //On ajoute l'article au panier utilisateur
        } 
        else if(isset($_POST['ajout_panier']) && isset($_SESSION['id']) == false) // Sinon on invite l'utilisateur à se connecter
        {
            echo '<div class = panier_vide><a href="connexion.php" class = "lien_co_panier">Connectez-vous</a> pour ajouter des produits à votre panier !</div>';
        }
        ?>
    </body>

    <?php include("footer.php"); ?>
    
</html>