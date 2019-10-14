<?php 

function ajouterArticle($nom_produit,$quantite,$prix,$id, $verrouillage) //Fonction pour ajouter un article au panier
{
  if ($verrouillage == false)// On vérifie que le panier ne soit pas verrouillé
  { 
   	try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
    catch(Exception $e){die('Erreur : '.$e->getMessage());}

    $req = $bdd -> prepare ('SELECT nom_produit FROM panier WHERE nom_produit = :nom_produit AND id_membre = :id_membre'); // On crée une requête qui cherche le produit demandé dans la BDD
    $req->execute(array('nom_produit' => $nom_produit, 'id_membre' => $id));
    if($donnees = $req -> fetch()) // On vérifie si le produit exite, si il existe on ajoute juste +1 à la quantité
    {
      	$req = $bdd -> prepare('UPDATE panier SET quantite = :quantite + quantite WHERE nom_produit = :nom_produit AND id_membre = :id_membre');
      	$req -> execute(array('quantite' => $quantite, 'nom_produit' => $nom_produit, 'id_membre' => $id)); 
      	$req->closeCursor();
    }
    else // Sinon on ajoute le nouvel article à notre BDD dans la table panier
    {
      	$req = $bdd -> prepare('INSERT INTO panier(nom_produit, quantite, prix, id_membre) VALUES(:nom_produit, :quantite, :prix, :id_membre)');
      	$req -> execute(array('nom_produit' => $nom_produit, 'quantite' => $quantite, 'prix' => $prix, 'id_membre' => $id));
      	$req -> closeCursor();
    }
  } else // Si le panier est verrouillé on affiche un message d'erreur
  echo '<div class="panier_vide"> Vous ne pouvez pas modifier votre panier (raison possible : paiement en cour). Contactez votre administrateur système si le problème persiste. </div>';
}

function supprimerArticle($nom_produit) // Fonction pour supprimer un article du panier
{
	try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
  	catch(Exception $e){die('Erreur : '.$e->getMessage());}
	$req = $bdd -> prepare('DELETE FROM panier WHERE nom_produit = :nom_produit'); // On upprime la ligne de panier ou le nom du produit correspond à celui que l'on veut supprimer
  	$req -> execute(array('nom_produit' => $nom_produit));
  	$req -> closeCursor();
}

function modifierQuantiteArticle($nom_produit,$quantite) // Fonction pour modifier la quantité d'un article à acheter
{
 	try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
  	catch(Exception $e){die('Erreur : '.$e->getMessage());}
  	$req = $bdd -> prepare('UPDATE panier SET quantite -= :quantite WHERE nom_produit = :nom_produit'); //On modifie la quantité de l'article dans la BDD
  	$req -> execute(array('quantite' => $quantite, 'nom_produit' => $nom_produit)); 
 	$req->closeCursor();
}

function MontantGlobal() // Fonction pour calculer le montant total du panier 
{
  	try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
  	catch(Exception $e){die('Erreur : '.$e->getMessage());}
  	$req = $bdd -> query('SELECT SUM(quantite) AS prix_total FROM panier'); // On crée une requête qui calcule le montant total des produits du panier
  	$req->closeCursor();
  	return $req['prix_total']; // On renvoie le prix total
}
?>