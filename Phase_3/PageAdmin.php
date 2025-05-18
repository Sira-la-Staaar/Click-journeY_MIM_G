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
$utilisateursPage = array_slice($utilisateurs, $debut, $utilisateursParPage);?>

<!DOCTYPE html>
<html>
  <head lang="fr">
    <title>Page Admin | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <meta name="description" content="page admin" />
  </head>
  <script src="JS/theme.js" defer></script>
  <script src="JS/admin.js" defer></script>

  <body id="admin">
    <!--<div class="container">
    <div class="div1"></div>
    <div class="div2">-->
    <?php include 'header.php'; ?>

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
            <?php foreach ($utilisateursPage as $u){?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= isset($u['informations'][0]['nom']) ? htmlspecialchars($u['informations'][0]['nom']) : 'Nom non défini' ?></td>
                    <td><?= htmlspecialchars($u['e-mail']) ?></td>
                    <td>
                        <form method="post" action="modifier_utilisateurs.php">
                            <input type="hidden" name="id" value="<?= $u['id'] ?>">
                            <?php if ($u['role'] !== 'A') { ?>
                                <input type="submit" class="btn-admin" data-id="<?= $u['id'] ?>" name="action" value="Mettre Admin">
                            <?php } ?>    
                                <input type="submit" class="btn-admin" name="action" value="Bannir">    
                        </form>
                        
                        <a class="admin" href="voyages_utilisateur.php?id=<?= $u['id'] ?>">Voir les voyages</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="seDeconnecter.php"><button class="btn-details" id="logout">Se déconnecter</button><a>
    <a href="profil.php"><button class="btn-details">Profil</button><a>

    <div class="pagination">
        <?php if ($pageActuelle > 1): ?>
            <a href="?page=<?= $pageActuelle - 1 ?>">Précédent</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $nombreDePages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= $i == $pageActuelle ? : '' ?>><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($pageActuelle < $nombreDePages): ?>
            <a href="?page=<?= $pageActuelle + 1 ?>">Suivant</a>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
