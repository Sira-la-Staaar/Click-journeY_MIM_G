<!DOCTYPE html>
<html>
  <head lang="fr">
    <title>A propos de nous | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" type="image/png" href="minilogo.png"/>
    <meta name=”author” content=”Sira DIAKITE” />
 <meta name=”description” content=”page à propos” />
  </head>
  <body id="apropos">
    <!--<div class="container"><!DOCTYPE html>
<html>
  <head lang="fr">
    <title>A propos de nous | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" type="image/png" href="minilogo.png"/>
    <meta name=”author” content=”Sira DIAKITE” />
 <meta name=”description” content=”page à propos” />
  </head>
  <body id="apropos">
    <!--<div class="container">
    <div class="div1"></div>
    <div class="div2">-->
    <div id="header">        
        <div id="navbar"> 
            <ul class="ulButton">
              <a href="Vols.php"><li class="liButton">Vols</li></a>
              <a href="Apropos.php"><li class="liButton">A propos de nous</li></a>
              <a href="Apropos.php#avis-contact-wrapper"><li class="liButton">Contacts</li></a>
            </ul>
            <a id="Logo" href="Accueil.php"><img class="disp" src="logo.png" alt="Rechercher"/></a>
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
          <a href="<?= $lien_profil ?>" class="nom_profil1">
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

    <div class="debut"><h1 class="titre1">  A propos de nous</h1>
    <h2 class="titre2">Qui sommes nous?</h2>
    <p class="sira">En tant qu'étrangères vivants en France, Sira, Aida et Hajar ressentent une constante nostalgie pour leur patries, toutes situés en Afrique du nord-ouest. Les vacances d'été, elles préfèrent les passer avec leurs fammilles, au Mali, en Guinée et au maroc. Mais en éffectuant des recherches rapides, elles se rendent vite compte du fait que leurs pays n'étaient presque jamais représentées parmi les lieux proposés par les agences de voyage. Pourtant, le tourisme reste l'un des secteurs les plus rentables pour un pays et si leurs pays sont encore considérés en cours développement, le tourisme et l'argent qu'il raporte pourrait être un moteur de ce développement. </p>
    <h2 class="titre2">C'est quoi The West Agency?</h2>
    <p class="sira"><strong>The West Agency</strong> est née d'une initiative commune, un désir de faire connaitre au monde les plus beaux lieux de l'Afrique de l'Ouest. 40% des profits générés par ce site sont investits localement dans les pays de cette zone. C'est une agence de voyage indépendante fondée en 2018 à Paris. Nous sommes passionnés par la découverte, les cultures et l’aventure. Nous aidons chaque année plus de 10 000 voyageurs à réaliser leurs rêves, en toute sécurité.</p> 
    <img id="uno" src="img1.jpeg"/>
    <img id="dos" src="img6.jpg"/>
    </div>
    <div class="debut2"><br><br>Pourquoi choisir <strong>The West Agency</strong>?
    <div class="debut3"><br>Nos destinations <br><br> <div class="debut31"><br><br><div class="mari12"><a href=""><img class="mari" src="p2.jpg"/><br>Sûgû bâ, Bko, MLI</a></div><div class="mari12"><a href=""><img class="mari1" src="p1.jpg"/><br>Jardin majorelle, Kech, MAR</a></div><div class="mari12"><a href=""><img class="mari" src="p3.jpg"/><br>Banjul, GMB</a></div></div></div>
    </div>

<div id="avis-contact-wrapper">
  <div class="avis-section">
      <h2 class="titre2">Avis de nos voyageurs</h2>
      <div id="avis-container">
          <?php
          $json = file_get_contents('avis.json');
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
    <form method="post" action="scripts/contact.php">
        <label for="nom">Nom :</label>
        <input class="champ-texte" type="text" id="nom" name="nom" required>

        <br><label for="email">Email :</label><input class="champ-texte" type="email" id="email" name="email" required>

        <br><label for="message">Message :</label>
        <textarea name="message" id="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>


    <footer class="footer2">
      <div class="pied1"><br><img class="pied11" src="logo5.png" alt="logo de The West Agency"/><br><br> * Selon les conditions tarifaires propres à chaque produit et précisées ci-après : <br><br>
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

    <div class="div1"></div>
    <div class="div2">-->
    <div id="header">        
        <div id="navbar"> 
            <ul class="ulButton">
              <a href="Vols.php"><li class="liButton">Vols</li></a>
              <a href="Apropos.php"><li class="liButton">A propos de nous</li></a>
              <a href="Apropos.php#avis-contact-wrapper"><li class="liButton">Contacts</li></a>
            </ul>
            <a id="Logo" href="Accueil.php"><img class="disp" src="logo.png" alt="Rechercher"/></a>
          </div>
        </div>
        <!--</div>
        <div class="div3"></div>
        </div>-->
          <li><a href="inscription.php">S'inscrire</a>
          <a href="seConnecter.php">/Se connecter</a></li>

    <form method="GET" action="recherche.php" class="barre-recherche">
      <input type="text" name="q" placeholder="Rechercher un voyage..." required>
    </form>

    <div class="debut"><h1 class="titre1">  A propos de nous</h1>
    <h2 class="titre2">Qui sommes nous?</h2>
    <p class="sira">En tant qu'étrangères vivants en France, Sira, Aida et Hajar ressentent une constante nostalgie pour leur patries, toutes situés en Afrique du nord-ouest. Les vacances d'été, elles préfèrent les passer avec leurs fammilles, au Mali, en Guinée et au maroc. Mais en éffectuant des recherches rapides, elles se rendent vite compte du fait que leurs pays n'étaient presque jamais représentées parmi les lieux proposés par les agences de voyage. Pourtant, le tourisme reste l'un des secteurs les plus rentables pour un pays et si leurs pays sont encore considérés en cours développement, le tourisme et l'argent qu'il raporte pourrait être un moteur de ce développement. </p>
    <h2 class="titre2">C'est quoi The West Agency?</h2>
    <p class="sira"><strong>The West Agency</strong> est née d'une initiative commune, un désir de faire connaitre au monde les plus beaux lieux de l'Afrique de l'Ouest. 40% des profits générés par ce site sont investits localement dans les pays de cette zone. C'est une agence de voyage indépendante fondée en 2018 à Paris. Nous sommes passionnés par la découverte, les cultures et l’aventure. Nous aidons chaque année plus de 10 000 voyageurs à réaliser leurs rêves, en toute sécurité.</p> 
    <img id="uno" src="img1.jpeg"/>
    <img id="dos" src="img6.jpg"/>
    </div>
    <div class="debut2"><br><br>Pourquoi choisir <strong>The West Agency</strong>?
    <div class="debut3"><br>Nos destinations <br><br> <div class="debut31"><br><br><div class="mari12"><a href=""><img class="mari" src="p2.jpg"/><br>Sûgû bâ, Bko, MLI</a></div><div class="mari12"><a href=""><img class="mari1" src="p1.jpg"/><br>Jardin majorelle, Kech, MAR</a></div><div class="mari12"><a href=""><img class="mari" src="p3.jpg"/><br>Banjul, GMB</a></div></div></div>
    </div>

<div id="avis-contact-wrapper">
  <div class="avis-section">
      <h2 class="titre2">Avis de nos voyageurs</h2>
      <div id="avis-container">
          <?php
          $json = file_get_contents('avis.json');
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
    <form method="post" action="scripts/contact.php">
        <label for="nom">Nom :</label>
        <input class="champ-texte" type="text" id="nom" name="nom" required>

        <br><label for="email">Email :</label><input class="champ-texte" type="email" id="email" name="email" required>

        <br><label for="message">Message :</label>
        <textarea name="message" id="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>


    <footer class="footer2">
      <div class="pied1"><br><img class="pied11" src="logo5.png" alt="logo de The West Agency"/><br><br> * Selon les conditions tarifaires propres à chaque produit et précisées ci-après : <br><br>
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
