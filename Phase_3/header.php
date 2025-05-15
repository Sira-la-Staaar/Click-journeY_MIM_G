    <div id="header">        
        <div id="navbar"> 
            <ul class="ulButton">
              <a href="Vols.php"><li class="liButton">Nos offres</li></a>
              <a href="Apropos.php"><li class="liButton">A propos de nous</li></a>
              <a href="Apropos.php#avis-contact-wrapper"><li class="liButton">Contacts</li></a>
            </ul>
            <a id="Logo" href="Accueil.php"><img class="disp" src="Images/logo.png" alt="Rechercher"/></a>
          </div>
    </div>
    <div class="section_connect">
      <?php
        if (isset($_SESSION["connecte"]) && $_SESSION["connecte"] === true):
          $lien_profil = ($_SESSION['utilisateur']['role'] === 'A') ? 'PageAdmin.php' : 'profil.php';
          ?>
          <a href="<?= $lien_profil ?>">
            <img class="section_connect" src="Images/<?= $_SESSION['utilisateur']['img'] ?>" 
            alt="<?= htmlspecialchars($_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom']) ?>">
          </a>
          <a href="<?= $lien_profil ?>" class="nom_profil">
            <?= $_SESSION['utilisateur']['prenom'] . ' ' . $_SESSION['utilisateur']['nom']; ?>
          </a>
        <?php else: ?>
          <li>
            <a href="inscription.php">S'inscrire</a>
            <a href="seConnecter.php">/Se connecter</a>
          </li>
        <?php endif; ?>
    </div>

    <form method="GET" action="recherche.php" class="barre-recherche">
      <input type="text" name="q" placeholder="Rechercher un voyage..." required>
    </form>
