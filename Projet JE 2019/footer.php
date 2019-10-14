<footer> <!-- On crée un footer -->
        <div id="boutique_footer"> <!-- On y crée 3 catégories : boutique, assistance et réseaux sociaux-->
            <h3>Boutique</h3>
            <div>
                <form method="post" action="ensembles_produits.php"> <!-- On crée des formulaires qui ramène vers les pages souhaitées lorsque l'utilisateur clique dessus-->
                    <input type="submit" name="pc_bureautique_footer" class="form_footer" value="PC Bureautique">
                </form>
            </div>
            <div>
                <form method="post" action="ensembles_produits.php">
                    <input type="submit" name="pc_gamers_footer" class="form_footer" value="PC Gamers">
                </form>
            </div>
            <div>
                <form method="post" action="ensembles_produits.php">
                    <input type="submit" name="peripheriques_footer" class="form_footer" value="Périphériques">
                </form>
            </div>
            <div>
                <form method="post" action="ensembles_produits.php">
                    <input type="submit" name="gaming_footer" class="form_footer" value="Gaming">
                </form>
            </div>
        </div>
        <div id="assistance_footer">
            <h3>Assistance</h3>
            <div>
                <a href="assistance.php" class="liens_footer"> <!-- Ou alors sous forme de liens -->
                    <div>&nbsp&nbspContactez-nous</div>
                </a>
            </div>
        </div>
        <div id="reseaux_sociaux_php">
            <h3>Réseaux Sociaux</h3>
            <div>
                <a href="https://www.facebook.com/"  class="liens_footer" target=_blank>
                    <div>&nbsp&nbspFacebook</div>
                </a>
            </div>
        </div> 
    </footer>