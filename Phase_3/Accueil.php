<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    $est_connecte = isset($_SESSION['utilisateur']);
}
$voyages_json = file_get_contents('Data/voyages.json');
$voyages = json_decode($voyages_json, true);

if ($voyages === null) {
    echo "Erreur de lecture JSON.";
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head lang="fr">
    <title>Accueil | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <meta name=”description” content="page d'accueil" />
  </head>
  <body id="accueil">
    <?php include 'header.php'; ?>
    <div class="acc1">
      <video id="myVideo" src="Images/Movie1.webm" autoplay muted loop>
        Votre navigateur ne supporte pas la balise vidéo.
      </video>

      <a href="inscription.php">
        <div class="overlay"></div>
      </a>

      <div class="overlay1">
        <p>Laissez-vous tenter !</p>
      </div>
      <script>
        const video = document.getElementById('myVideo');
        // Désactive l'option Picture-in-Picture
        video.disablePictureInPicture = true;
      </script>
    </div>


    <div class="Accueil3">
      <div class="Accueil31">

    <div class="grid-pinterest">
      <?php

        shuffle($voyages);

        $voyages_limited = array_slice($voyages, 0, 6);
      ?>
      <?php foreach ($voyages_limited as $voyage): ?>
        <div class="pin">
          <img class="ACC" src="Images/<?= $voyage['img'] ?>" alt="<?= htmlspecialchars($voyage['titre']) ?>">
          <div class="pin-content">
            <h3><?= htmlspecialchars($voyage['titre']) ?></h3>
            <p>Du <?= $voyage['date_debut'] ?> au <?= $voyage['date_fin'] ?></p>
            <p><strong><?= $voyage['prix'] ?> €</strong></p>
            <a class="btn-details" href="recapitulatif.php?id=<?= $voyage['id'] ?>">Voir plus</a>
          </div>
        </div>
      <?php endforeach; ?>
      </div>

      </div>
      </div>
    <?php include 'footer.php'; ?>
 </body>
</html>
