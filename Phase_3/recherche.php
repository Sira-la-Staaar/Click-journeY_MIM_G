<?php
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
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta name="author" content="Sira DIAKITE" />
    <meta name=”description” content="page d'accueil" />
  </head>
  <body id="accueil">
    <!--<div class="container">
    <div class="div1"></div>
    <div class="div2">-->
    <div id="header">        
    <div id="navbar"> 
				<ul class="ulButton">
          <a href="Vols.php"><li class="liButton">Vols</li></a>
          <a href="Apropos.php"><li class="liButton"><?php echo "A propos de nous \n"; ?></li></a>
          <a href="Apropos.php#avis-contact-wrapper"><li class="liButton">Contacts</li></a>
          </ul>
        <a id="Logo" href="Accueil.php"><img class="disp" src="Images/logo.png"/></a>
			</div>
		</div>
    
    <div class="section_connect">
      <?php
        session_start();
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
        <button type="submit">
            <img id="recherche" src="Images/logo2.webp" alt="Rechercher">
        </button>
      </form>


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
</div>

  <script>
    const video = document.getElementById('myVideo');
    // Désactive l'option Picture-in-Picture
    video.disablePictureInPicture = true;
  </script>
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
                            <a class="btn-details" href="detail_voyage.php?id=<?= $voyage['id'] ?>">Voir plus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Aucun voyage trouvé pour cette recherche.</p>
<?php endif; ?>

    
    
    <footer class="footer2">
        <div class="pied1"><br><img class="pied11" src="Images/logo5.png" alt="logo de The West Agency"/><br><br> * Selon les conditions tarifaires propres à chaque produit et précisées ci-après : <br><br>
          - Vols : Tarifs TTC par personne et « à partir de », valables à certaines dates, sous réserve de disponibilité et de confirmation de la compagnie aérienne<br><br>
          - Séjours : Tarifs TTC, hors taxes de séjour, par personne sur base d'une chambre double. Prix « à partir de » valables à certaines dates et sous réserve de disponibilités et de confirmation. Ces tarifs n'incluent pas les suppléments ou options susceptibles de s'appliquer à certaines réservations ou destinations.<br><br>
          - Week-ends : Tarifs TTC hors taxes de séjours, indiqués par personne « à partir de », valables à certaines dates et sous réserve de disponibilité et de confirmation. Ces tarifs n'incluent pas les suppléments ou options susceptibles de s'appliquer à certaines réservations ou destinations.<br><br>
          - Locations : Tarifs TTC par logement et par semaine (sauf mention contraire), « à partir de », valables à certaines dates, sous réserve de disponibilité et de confirmation.<br><br>
          - Hôtels : Tarifs TTC par nuit et par chambre « à partir de », valables à certaines dates, sur la base d'une chambre double, hors taxes de séjour, ajustables en fonction du taux de change, sous réserve de disponibilité et de confirmation.<br><br>
          - Voiture : Tarifs TTC « à partir de », par jour et pour un petit véhicule, hors suppléments, valables à certaines dates et sous réserve de disponibilité et de confirmation.<br><br>
          - Croisières : Tarifs TTC par personne « à partir de », hors taxes de séjours, valables à certaines dates et sous réserve de disponibilité.<br><br><br>
          
          © 2024-2025 TheWestAgency. Tous droits réservés - société soumise au droit français, inscrite au registre du commerce de Paris, Cergy 95000, dont le siège social est à l’avenue du Parc, immatriculée au Registre des opérateurs de voyages et de séjours auprès d’Atout France sis 79/81 rue de Clichy 75009 Paris, sous le numéro IM099170015, agréée IATA. 
          Si vous avez soumis une réclamation auprès de notre Service Client, mais que notre réponse ne vous satisfait pas : vous pouvez contacter la Médiation Tourisme et Voyage sur leur site www.mtv.travel ou par voie postale MTV Médiation Tourisme Voyage BP 80 303 75 823 Paris cedex 17. Vous pouvez nous contacter au sujet de votre remboursement dès maintenant via notre Centre d'aide ou contactez nos agents ici.
           <br> <br>
          Laissez-nous votre avis ! <br> <br><a href="https://feedback.emplifi.io/?lID=2&rn=131521&vm=1&pID=5&hs1=102214&hs2=102226&uni=1&siteID=1&am=true&referrer=Link&sdfc=355b766d-131521-c733c77b-141a-42d7-be9f-2e52b426622b&source=102226"><button class="pied1"><strong>Laisser un commentaire</strong></button></a></div>
    </footer>
    
   
  </body>
</html>
