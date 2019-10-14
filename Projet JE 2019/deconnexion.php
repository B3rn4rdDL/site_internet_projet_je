<!DOCTYPE html>                            <!-- -->
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_accueil.css" />
        <title>Gamer's Way</title>
    </head>

    <?php include("header.php"); ?>
    <body>
        <?php
            session_start();
            $_SESSION = array();
            session_destroy(); // On supprime les variables de session et de la session
            setcookie('login', '');  // On supprime les cookies de connexion automatique si il y en a
            setcookie('pass_hache', '');
            echo '<meta http-equiv="refresh" content="0;URL=accueil.php">'; //On redirige l'utilisateur qui vient de se déconnecter vers l'accueil
        ?>
    </body>
    <?php include("footer.php"); ?>
</html>