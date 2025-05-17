<?php session_start();
if (!isset($_SESSION['utilisateur'])) {
    $est_connecte = isset($_SESSION['utilisateur']);
}
?>
<!DOCTYPE html>
<html>
  <head lang="fr">
    <title>A propos de nous | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <meta name=”description” content="page d'informations" />
  </head>
  <body id="accueil">
    <?php include 'header.php'; ?>

    <div class="debut"><h1 class="titre1">  A propos de nous</h1>
    <h2 class="titre2">Qui sommes nous?</h2>
    <p class="sira">En tant qu'étrangères vivants en France, Sira, Aida et Hajar ressentent une constante nostalgie pour leur patries, toutes situés en Afrique du nord-ouest. Les vacances d'été, elles préfèrent les passer avec leurs fammilles, au Mali, en Guinée et au maroc. Mais en éffectuant des recherches rapides, elles se rendent vite compte du fait que leurs pays n'étaient presque jamais représentées parmi les lieux proposés par les agences de voyage. Pourtant, le tourisme reste l'un des secteurs les plus rentables pour un pays et si leurs pays sont encore considérés en cours développement, le tourisme et l'argent qu'il raporte pourrait être un moteur de ce développement. </p>
    <h2 class="titre2">C'est quoi The West Agency?</h2>
    <p class="sira"><strong>The West Agency</strong> est née d'une initiative commune, un désir de faire connaitre au monde les plus beaux lieux de l'Afrique de l'Ouest. 40% des profits générés par ce site sont investits localement dans les pays de cette zone. C'est une agence de voyage indépendante fondée en 2018 à Paris. Nous sommes passionnés par la découverte, les cultures et l’aventure. Nous aidons chaque année plus de 10 000 voyageurs à réaliser leurs rêves, en toute sécurité.</p> 
    <img id="uno" src="Images/img1.jpeg"/>
    <img id="dos" src="Images/img6.jpg"/>
    </div>
    <div class="debut2"><br><br>Pourquoi choisir <strong>The West Agency</strong>?
    <div class="debut3"><br>Nos destinations phares <br><br> <div class="debut31"><br><br><div class="mari12"><a href="http://projet2.local/Phase_3/recherche.php?q=mali"><img class="mari" src="Images/p2.jpg"/><br>Sûgû bâ, Bko, MLI</a></div><div class="mari12"><a href="http://projet2.local/Phase_3/recherche.php?q=maroc"><img class="mari1" src="Images/p1.jpg"/><br>Jardin majorelle, Kech, MAR</a></div><div class="mari12"><a href="http://projet2.local/Phase_3/recherche.php?q=gambie"><img class="mari" src="Images/p3.jpg"/><br>Banjul, GMB</a></div></div></div>
    </div>

<div id="avis-contact-wrapper">
  <div class="avis-section">
      <h2 class="titre2">Avis de nos voyageurs</h2>
      <div id="avis-container">
          <?php
          $json = file_get_contents('Data/avis.json');
          $avis = json_decode($json, true);

          if ($avis) {
              foreach ($avis as $a) {
                  echo '<div class="avis">';
                  echo '<p><strong>' . htmlspecialchars($a["pseudo"]) . '</strong> - ⭐ ' . htmlspecialchars($a["note"]) . '/5</p>';
                  echo '<p>' . htmlspecialchars($a["commentaire"]) . '</p>';
                  echo '</div>';
              }
          } else {
              echo '<p>Aucun avis à afficher pour le moment.</p>';
          }
          ?>
      </div>
  </div>

  <div class="section-formulaire-contact">
    <h2 class="titre-contact">Contactez-nous</h2>
    <form method="post" action="Messages.php">
        <label for="nom">Nom :</label>
        <input class="champ-texte" type="text" id="nom" name="nom" required>

        <br><label for="email">Email :</label><input class="champ-texte" type="email" id="email" name="email" required>

        <br><label for="message">Message :</label>
        <textarea name="message" id="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>
  <?php include 'footer.php'; ?>

  </body>
</html>
