<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: Accueil.php');
    exit;
}
$dataFile = 'Data/utilisateurs.json';
$users = json_decode(file_get_contents($dataFile), true);

$userId = $_SESSION['utilisateur']['id'];
$userIndex = null;
foreach ($users as $i => $u) {
    if ($u['id'] === $userId) {
        $userIndex = $i;
        break;
    }
}

if ($userIndex === null) {
    echo "Utilisateur introuvable.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $users[$userIndex]['e-mail'] = $_POST['email'];
    $users[$userIndex]['mdp']    = $_POST['password'];
    $info = &$users[$userIndex]['informations'][0];
    $info['nom']      = $_POST['nom'];
    $info['prenom']   = $_POST['prenom'];
    $info['pseudo']   = $_POST['pseudo'];
    $info['civilité'] = $_POST['civilite'];
    $info['naissance']= $_POST['naissance'];
    $info['adresse']  = $_POST['adresse'];

  if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array(strtolower($ext), $allowed)) {
        $filename = $userId . '.' . $ext;
        $ancienne = 'Images/' . $users[$userIndex]['img'];
        if (file_exists($ancienne) && $ancienne !== 'Images/' . $filename) {
            unlink($ancienne);
        }
        move_uploaded_file($_FILES['photo']['tmp_name'], 'Images/' . $filename);
        $users[$userIndex]['img'] = $filename;
    }
  }


    file_put_contents($dataFile, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    $message = "Vos informations ont été mises à jour.";
}


$user = $users[$userIndex];
$info = $user['informations'][0];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme">
    <title>Profil | The West Agency</title>
  </head>
  <script src="JS/theme.js" defer></script>
  <body class="Profil">
      <?php include 'header.php'; ?>
      <form method="post" action="edit_profil.php" enctype="multipart/form-data">       
       <div class="seConnecter">
        <h1>Modification</h1>
        <?php if (!empty($user['img'])): ?>
            <img id="profil" src="Images/<?= htmlspecialchars($user['img']) ?>" alt="Photo de profil"><br>
        <?php endif; ?>

        <label>Photo de profil<br>
            <input type="file" name="photo">
        </label><br><br>

        <label>Adresse e‑mail<br>
          <input type="email" name="email" value="<?= htmlspecialchars($user['e-mail']) ?>">
        </label><br><br>

        <label>Mot de passe<br>
            <input type="text" name="password" value="<?= htmlspecialchars($user['mdp']) ?>">
        </label><br><br>

        <label>Nom<br>
            <input type="text" name="nom" value="<?= htmlspecialchars($info['nom']) ?>">
        </label><br><br>

        <label>Prénom<br>
          <input type="text" name="prenom" value="<?= htmlspecialchars($info['prenom']) ?>">
        </label><br><br>

        <label>Pseudo<br>
          <input type="text" name="pseudo" value="<?= htmlspecialchars($info['pseudo']) ?>">
        </label><br><br>

        <label>Civilité<br>
          <select name="civilite">
            <option value="F" <?= $info['civilité']==='F'?'selected':'' ?>>F</option>
            <option value="H" <?= $info['civilité']==='H'?'selected':'' ?>>H</option>
          </select>
        </label><br><br>

        <label>Date de naissance<br>
          <input type="date" name="naissance" value="<?php
          $d = DateTime::createFromFormat('d/m/Y', $info['naissance']);
          echo $d ? $d->format('Y-m-d') : '';?>">
        </label><br><br>

        <label>Adresse<br>
            <input type="text" name="adresse" value="<?= htmlspecialchars($info['adresse']) ?>">
        </label><br><br>
        <button class="btn-details" type="submit">Enregistrer</button>
        <a href="seDeconnecter.php"><button class="btn-details" id="logout">Se déconnecter</button><a>
       </div>     
      </form>
    <?php include 'footer.php'; ?>
  </body>
</html>
