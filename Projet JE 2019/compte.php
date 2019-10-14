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
        <h2>Mon compte</h2>
        <?php
                try{$bdd = new PDO('mysql:host=localhost;dbname=gamersway;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));} // On ouvre la BDD
                catch(Exception $e){die('Erreur : '.$e->getMessage());}

                $req = $bdd->prepare('SELECT nom, prenom, adresse, code_postal, pseudo FROM membre WHERE id = :id'); // On lance une requête pour récupérer les infos de l'utilisateur connecté 
                $req -> execute(array('id' => $_SESSION['id']));
                $donnees = $req -> fetch(); // On ajoute les données dans un tableau
                $req->closeCursor(); // On ferme la requête
        ?>
        <section class="section_affichage_type">
            <form method="post"> <!--On crée un formulaire pour permettre à l'utilisateur de modifier ses données personnelles -->
                <label for="nom">Nom : </label><input type="txt" name="nom" value="<?php echo $donnees['nom']; ?>" /><br /> <!-- Le formulaire est prérempli avec les données actuelles de l'utilisateur récupérées avec la requête SQL -->
                <label for="prenom">Prénom : </label><input type="txt" name="prenom" value="<?php echo $donnees['prenom']; ?>"/><br />
                <label for="adresse">Adresse : </label><input type="txt" name="adresse" value="<?php echo $donnees['adresse']; ?>"/><br />
                <label for="code_postal">Code Postal : </label><input type="txt" name="code_postal" value="<?php echo $donnees['code_postal']; ?>"/><br />
                <label for="pseudo">Pseudo : </label><input type="txt" name="pseudo" value="<?php echo $donnees['pseudo']; ?>"/><br /><br />

                <input type="submit" value="Valider mes infos perso" name="valider" class="button_affichage_type"><br /><br /> <!-- On crée un bouton pour valider les modifications -->
            </form>
        </section>

        <?php
            if(isset($_POST['valider'])) // Si l'utilisateur valide
            {
                $req = $bdd -> prepare ('SELECT pseudo FROM membre WHERE pseudo = :pseudo'); // On vérifie si le pseudo est bien disponible
                $req->execute(array('pseudo' => $_POST['pseudo']));

                if ($_POST['pseudo'] == $_SESSION['pseudo']) // Si le pseudo ne change pas
                {
                    $req = $bdd -> prepare('UPDATE membre SET pseudo = :pseudo, nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal WHERE id = :id'); // On lance une requête pour mettre à jour la BDD
                    $req -> execute(array('pseudo' => $_POST['pseudo'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'adresse' => $_POST['adresse'], 'code_postal' => $_POST['code_postal'], 'id' => $_SESSION['id'])); 
                    $_SESSION['pseudo'] = $donnees['pseudo'];
                    $req->closeCursor();
                    echo '<meta http-equiv="refresh" content="0;URL=compte.php">'; // On recharge la page
                }
                else if ($donnees = $req -> fetch()) // Si le pseudo existe déjà dans la BDD on affiche un message d'erreur
                {
                    echo 'Le pseudo '.$_POST['pseudo'].' est déjà utilisé, veuillez en choisir un autre';
                    $req->closeCursor();
                } 
                else
                {
                    $req = $bdd -> prepare('UPDATE membre SET pseudo = :pseudo, nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal WHERE id = :id'); // On lance une requête pour mettre à jour la BDD
                    $req -> execute(array('pseudo' => $_POST['pseudo'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'adresse' => $_POST['adresse'], 'code_postal' => $_POST['code_postal'], 'id' => $_SESSION['id'])); 
                    $_SESSION['pseudo'] = $donnees['pseudo'];
                    $req->closeCursor();
                    echo '<meta http-equiv="refresh" content="0;URL=accueil.php">'; // On recharge la page
                }
            }
        ?>
        <form method="post" action="deconnexion.php" class="section_affichage_type">
            <input type="submit" value="Cliquez ici pour vous déconnecter" name="valider_deco" class="button_affichage_type"> <!-- On crée un bouton de déconnexion -->
        </form>
    </body>
    <?php include("footer.php"); ?>
</html>
