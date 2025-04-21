<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'username' => 'admin_test',
        'role' => 'A'  // 'A' pour admin
    ];
}

if ($_SESSION['user']['role'] !== 'A') {
    header("Location: seConnecter.php");
    exit;
}
$utilisateurs = json_decode(file_get_contents('utilisateurs.json'), true);
$utilisateursParPage = 10;
$totalUtilisateurs = count($utilisateurs);
$nombreDePages = ceil($totalUtilisateurs / $utilisateursParPage);

$pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$debut = ($pageActuelle - 1) * $utilisateursParPage;

$utilisateursPage = array_slice($utilisateurs, $debut, $utilisateursParPage);
?>

<!DOCTYPE html>
<html>
  <head lang="fr">
    <title>Page Admin | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" type="image/png" href="minilogo.png"/>
    <meta name="author" content="Sira DIAKITE" />
 <meta name="description" content="page admin" />
  </head>
  <body id="admin">
    <!--<div class="container">
    <div class="div1"></div>
    <div class="div2">-->
      <div id="header">        
        <div id="navbar"> 
            <ul class="ulButton">
              <a href="Vols.html"><li class="liButton">Vols</li></a>
              <a href="Apropos.html"><li class="liButton">A propos de nous</li></a>
              <li class="liButton">Contacts</li>
            </ul>
            <a id="Logo" href="Accueil.html"><img class="disp" src="logo.png" alt="Rechercher"/></a>
          </div>
        </div>
        <!--</div>
        <div class="div3"></div>
        </div>-->
          <li><a href="inscription.html">S'inscrire</a>
          <a href="seConnecter.html">/Se connecter</a></li>
        <form method="GET" action="recherche.php" class="barre-recherche">
            <input type="text" name="q" placeholder="Rechercher un voyage..." required>
            <button type="submit"><img id="recherche" src="logo2.webp"/></button>
        </form>

    <h1>Liste des utilisateurs</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateursPage as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= isset($u['informations'][0]['nom']) ? htmlspecialchars($u['informations'][0]['nom']) : 'Nom non défini' ?></td>
                    <td><?= htmlspecialchars($u['e-mail']) ?></td>
                    <td>
                        <form method="post" action="scripts/modifier_utilisateur.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $u['id'] ?>">
                            <input type="submit" name="action" value="VIP">
                            <input type="submit" name="action" value="Bannir">
                        </form>
                        
                        <a class="admin" href="voyages_utilisateur.php?id=<?= $u['id'] ?>" style="text-decoration:none; color:blue;">Voir les voyages</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php if ($pageActuelle > 1): ?>
            <a href="?page=<?= $pageActuelle - 1 ?>">Précédent</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $nombreDePages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= $i == $pageActuelle ? 'style="font-weight: bold;"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($pageActuelle < $nombreDePages): ?>
            <a href="?page=<?= $pageActuelle + 1 ?>">Suivant</a>
        <?php endif; ?>
    </div>

    </table>
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
