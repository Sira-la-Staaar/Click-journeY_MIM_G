
<!DOCTYPE html>

<html lang="fr">
<head>
  <link type="text/css" rel="stylesheet" href="stylesheet.css">
  <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>

  <title>S'inscrire</title>
</head>

<body class="Inscription">
    <form action="Accueil.php" method="POST">
        <img src="Images/logo4.png" alt="logo de The West Agency" class="logo">
         <div class="encadre">
        <h1 class="aida1">-------------S'inscrire-------------</h1>
        <h2 class="aida3">Bienvenue sur notre site de voyage !</h2>
        <h2 class="aida3">Pour débuter votre aventure parmi nous,indiquez vos renseignements personels!</h2>
        </div>
<div class="input-box">
  <div class="encadre1">
    <h2 class="aida2">Civilité</h2>
   <select name="Civilite" required class="select-style">
  <option value="">-- Sélectionnez --</option>
  <option value="M.">Monsieur</option>
  <option value="Mme">Madame</option>
  <option value="Autre">Autre</option>
</select>

  <div class="input-box">
    <h2 class="aida2">Nom</h2>
    <input type="text" class="input-box" placeholder="Votre nom ici">

  <div class="input-box">
    <h2 class="aida2">Prénom</h2>
    <input type="text" class="input-box" placeholder="Votre prénom ici">
</div>
</div>



<div class="input-box">
    <h2 class="aida2">Pays de résidence</h2>
    <select name="pays_residence">

      <option value="">-- Sélectionnez --</option>
      <option value="Guinée">Guinée</option>
      <option value="Maroc">Maroc</option>
      <option value="Mali">Mali</option>
      <option value="Sénégal">Sénégal</option>
      <option value="Cote d'Ivoire">Côte d'Ivoire</option>
      <option value="Gambie">Gambie</option>
      <option value="Burkina Faso">Burkina Faso</option>
      <option value="Togo">Togo</option>
      <option value="Bénin">Bénin</option>
      <option value="Guinée Bissau">Guinée Bissau</option>
      <option value="Liberia">Liberia</option>
      <option value="Nigeria">Nigeria</option>
      <option value="Sierra Leone">Sierra Leone</option>
      <option value="Ghana">Ghana</option>
      <option value="Niger">Niger</option>
      <option value="Mauritanie">Mauritanie</option>
      <option value="Cap-Vert">Cap-Vert</option>
      <option value="France">France</option>
    </select>
  </div>
  
  <div class="input-box">
    <h2 class="aida2">Date de naissance</h2>
    <input type="date" name="date_naissance" min="1930-01-01" max="2007-12-31"/>
  </div>
  <div class="input box">
    <h2 class="aida2">Adresse e-mail</h2>
    <input type="email" class="input-box" placeholder="Votre adresse e-mail ici">
  </div>
  
  <div class="input box">
    <h2 class="aida2">Mot de passe</h2>
    <input type="password" class="input-box" placeholder="Mot de passe"required minlength="8">
  </div>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $champs = ['civilite', 'nom', 'prenom', 'pays_residence', 'date_naissance', 'email', 'mot_de_passe'];
    if ($formulaire_complet) {
        echo "Formulaire complet, envoi en cours...";
        
        foreach ($champs_obligatoires as $champ) {
          if (empty($_POST[$champ])) {
              echo "Erreur : Le formulaire est incomplet.";
              $formulaire_complet = false;
              break; 
          }     
          }      
    }
  }  
?>

  <div class="input box" style="margin-top: 20px;">
  <button type="submit" class="button">
   S'inscrire
   </div>
</button>
  </div>
     <?php include 'footer.php'; ?>
</body>
</html>
