<?php
session_start();
if (empty($_SESSION['connecte'])) {
    header('Location: seConnecter.php');
    exit;
}
$userId        = $_SESSION['utilisateur']['id'];
$json          = 'Data/utilisateurs.json';
$utilisateurs  = json_decode(file_get_contents($json), true);
$utilisateur   = null;
foreach ($utilisateurs as $u) {
    if ($u['id'] === $userId) {
        $utilisateur = $u;
        break;
    }
}
if ($utilisateur === null) {
    exit;
}
$info = $utilisateur['informations'][0];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Profil | The West Agency</title>
  </head>
  <body class="Profil">
    <?php include 'header.php'; ?>
    <div class="seConnecter">
        <h1>Bienvenue, <?= htmlspecialchars($info['prenom'], ENT_QUOTES) ?></h1>
        <div class="avatar">
           <img id="uno" src="Images/<?= htmlspecialchars($utilisateur['img'], ENT_QUOTES) ?>"
           alt="Photo de <?= htmlspecialchars($info['prenom'], ENT_QUOTES) ?>">
        </div>
      <p><strong>Nom :</strong> <?= htmlspecialchars($info['nom'], ENT_QUOTES) ?></p>
      <p><strong>Pseudo :</strong> <?= htmlspecialchars($info['pseudo'], ENT_QUOTES) ?></p>
      <p><strong>E‑mail :</strong> <?= htmlspecialchars($utilisateur['e-mail'], ENT_QUOTES) ?></p>
      <p><strong>Civilité :</strong> <?= htmlspecialchars($info['civilité'], ENT_QUOTES) ?></p>
      <p><strong>Naissance :</strong> <?= htmlspecialchars($info['naissance'], ENT_QUOTES) ?></p>
      <p><strong>Adresse :</strong> <?= htmlspecialchars($info['adresse'], ENT_QUOTES) ?></p>
      <button id="edit-btn">Modifier mes infos</button>
      <a href="seDeconnecter.php"><button id="logout">Se déconnecter</button></a>
    </div>
    <script src="js/profil.js"></script>
    <?php include 'footer.php'; ?>
  </body>
</html>
