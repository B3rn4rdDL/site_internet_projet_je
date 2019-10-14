<header> <!-- On crée un header -->
    <a href="accueil.php">
        <img src="logo.png" alt="logo du site" title="Retour à l'accueil" class="logo_site" /> <!-- On affiche le logo du site sous forme de lien qui ramène à l'accueil-->
    </a>
    <div class="menu_nav"> <!-- On crée un menu de navigation qui a les différents onglets du site-->
        <div class=boutique>
            <a href="boutique.php"><h1>Boutique</h1></a>
        </div>    
        <div class=ventes_flash>
            <a href="ventes_flash.php"><h1>Ventes Flash</h1></a>
        </div>
        <div class=marques>
            <a href="marques.php"><h1>Marques</h1></a>
        </div>
        <div class="icone_panier">
            <a href="panier.php"><img src="panier.png" alt="panier" title="Panier" class="icones_nav" /></a> <!-- On affiche l'icone du panier sous forme de lien qui amène au panier -->
        </div>
    </div>


    <?php
        if (isset($_SESSION['pseudo'])) // SI un utilisateur est connecté
        {
            echo '<div class="icone_connexion"><a href="compte.php"><img src="connexion.png" alt="accéder à mon compte" title="Mon compte" class="icones_nav" /></a></div>'; // On affiche le logo de connexion avec comme message au survol acceder a mon compte
            echo '<div class="bonjour">Bonjour '.$_SESSION['pseudo'].' ! </div>'; // On affiche un message de bonne journee a droite du logo
        }
        else // sinon on affiche juste le logo avec comme message au survol connexion/inscription
        {
            echo '<div class="icone_connexion"><a href="connexion.php"><img src="connexion.png" alt="bouton de connexion" title="Connexion/Inscription" class="icones_nav" /></a></div>';
        }
    ?>
</header>