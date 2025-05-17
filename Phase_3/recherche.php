<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    $est_connecte = isset($_SESSION['utilisateur']);
}
// Fonction pour retirer les accents
function remove_accents($string) {
    return preg_replace('/[^A-Za-z0-9 ]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $string));
}

$voyages = json_decode(file_get_contents("Data/voyages.json"), true);
$query = isset($_GET['q']) ? $_GET['q'] : '';
$resultats = [];

// Normaliser la requête utilisateur
$search = remove_accents(strtolower($query));

foreach ($voyages as $voyage) {
    // Normaliser les mots-clés du voyage
    $keywords = remove_accents(strtolower(implode(' ', $voyage['mots_cles'])));
    
    // Recherche sans accent et insensible à la casse
    if (stripos($keywords, $search) !== false) {
        $resultats[] = $voyage;
    }
}

?>

<!DOCTYPE html>
<html>
  <head lang="fr">
    <title>Accueil | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css">
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

      <a href="<?php 
        if (isset($_SESSION['utilisateur'])) {
          echo '#';  // 
        } else {
          echo 'inscription.php';
        }
        ?>">
        <div class="overlay"></div>
      </a>
      <div class="overlay1">
        <p>Laissez-vous tenter !</p>
      </div>
      <script src="JS/Myvideo.js" type="text/javascript"></script>
    </div>
    <h1>Résultats de la recherche pour "<?php echo htmlspecialchars($query); ?>"</h1>

    <?php if (count($resultats) > 0): ?>
      <div class="Accueil3">
        <div class="Accueil31">
            <div class="grid-pinterest">
                <?php foreach ($resultats as $voyage): ?>
                    <div class="pin">
                        <img class="ACC" src="Images/<?= $voyage['img'] ?>" alt="<?= htmlspecialchars($voyage['titre']) ?>">
                        <div class="pin-content">
                            <h3><?= htmlspecialchars($voyage['titre']) ?></h3>
                            <p>Du <?= $voyage['date_debut'] ?> au <?= $voyage['date_fin'] ?></p>
                            <p><strong><?= $voyage['prix'] ?> €</strong></p>
                            <a class="btn-details" href="details.php?id=<?= $voyage['id'] ?>">Voir plus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php else: ?>
        <p>Aucun voyage trouvé pour cette recherche.</p>
    <?php endif; ?>
    <?php include 'footer.php'; ?>
  </body>
</html>
