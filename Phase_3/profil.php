<?php
session_start();
// Assure la connexion de l'utilisateur
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
//Arret du script
if ($utilisateur === null) {
    exit;
}
$info = $utilisateur['informations'][0];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    
    <meta charset="UTF-8"> <!-- Nous permet de lire correctement le script -->
    <link rel="stylesheet" href="CSS/theme-clair.css" id="theme">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <title>Profil | The West Agency</title>
  </head>
  <script src="JS/theme.js" defer></script>
  <body class="Profil">
    <?php include 'header.php'; ?>
    <div class="seConnecter">
      <div class="avatar">
           <img id="profil" src="Images/<?= htmlspecialchars($utilisateur['img'], ENT_QUOTES) ?>"
           alt="Photo de <?= htmlspecialchars($info['prenom'], ENT_QUOTES) ?>">
      </div>
      <div class="encadre2">

      <h1>Bienvenue, <?= htmlspecialchars($info['prenom'], ENT_QUOTES) ?></h1>
      <!--Informations de l'utilisateur-->
      <p class="aida4"><strong>Nom :</strong> <?= htmlspecialchars($info['nom'], ENT_QUOTES) ?></p>
      <br><br>
      <p class="aida4"><strong>Pseudo :</strong> <?= htmlspecialchars($info['pseudo'], ENT_QUOTES) ?></p>
      <br><br>
      <p class="aida4"><strong>E‑mail :</strong> <?= htmlspecialchars($utilisateur['e-mail'], ENT_QUOTES) ?></p>
      <br><br>
      <p class="aida4"><strong>Civilité :</strong> <?= htmlspecialchars($info['civilité'], ENT_QUOTES) ?></p>
      <br><br>
      <p class="aida4"><strong>Naissance :</strong> <?= htmlspecialchars($info['naissance'], ENT_QUOTES) ?></p>
      <br><br>
      <p class="aida4"><strong>Adresse :</strong> <?= htmlspecialchars($info['adresse'], ENT_QUOTES) ?></p>
      <br><br>
      <a href="edit_profil.php"><button class="btn-details">Modifier</button></a>
      <a href="seDeconnecter.php"><button class="btn-details">Se déconnecter</button></a>
      <select id="switchTheme" class="btn">
        <option value="clair">Thème clair</option>
        <option value="sombre">Thème sombre</option>
        <option value="contraste">Contraste élevé</option>
        <option value="large">Grand texte</option>
      </select>

    </div>
    <script src="JS/theme.js" defer></script>
    <!--<script src="JS/profil.js"></script>-->
    <?php include 'footer.php'; ?>
  </body>
</html>
