<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: seConnecter.php");
    exit;
}

if ($_SESSION['utilisateur']['role'] !== 'A') {
  header("Location: accueil.php");
  exit;
}

$utilisateurs = json_decode(file_get_contents('Data/utilisateurs.json'), true);
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
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <meta name="description" content="page admin" />
  </head>
  <body id="admin">
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
            <a id="Logo" href="Accueil.php"><img class="disp" src="Images/logo.png" alt="Rechercher"/></a>
          </div>
    </div>
        <!--</div>
        <div class="div3"></div>
        </div>-->
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

    <h1 id="admin">Liste des utilisateurs</h1>

    <table>
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
                            <input type="submit" name="action" value="Mettre Admin">
                            <input type="submit" name="action" value="Bannir">
                        </form>
                        
                        <a class="admin" href="voyages_utilisateur.php?id=<?= $u['id'] ?>" style="text-decoration:none; color:blue;">Voir les voyages</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="seDeconnecter.php"><button id="logout">Se déconnecter</button><a>
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
    <?php include 'footer.php'; ?>
  </body>
</html>

