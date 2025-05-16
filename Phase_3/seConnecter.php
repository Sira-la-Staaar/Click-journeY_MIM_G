<?php
session_start();
// Rediriger vers accueil si l'utilisateur est déjà connecté
if (isset($_SESSION["connecte"])) {
    header("Location: accueil.php");
    exit();
}

// Charger les utilisateurs depuis le fichier JSON
$utilisateurs_json = file_get_contents("Data/utilisateurs.json"); // Lire tout le contenu du fichier utilisateurs.json et le mettre dans la variable: $utilisateurs_json 
$utilisateurs = json_decode($utilisateurs_json, true); // Convertir le texte en tableau pour le manipuler; le "true" c'est pour que le PHP transforme le JSON en tableaux associatifs.

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Vérifie si le formulaire a été envoyé.
    $email = $_POST["username"]; //Récupère la valeur que l'utilisateur a tapée dans le champ e-mail.
    $motdepasse = $_POST["password"]; //Donc name="username" pour que le PHP récupère cette valeur dans $_POST["username"].

    $connexion_reussie = false; // Initialise une variable pour savoir si la connexion a réussi ou pas.

    // Parcourir tous les utilisateurs
    foreach ($utilisateurs as $utilisateur) { //C’est une boucle qui parcourt tous les utilisateurs du tableau $utilisateurs.
        if ($utilisateur["e-mail"] == $email && $utilisateur["mdp"] == $motdepasse) { //si les informations taper correspendent à celle du tableau, donc connexion réussite(on a touvé le bon utilisateur)!
            $_SESSION["connecte"] = true;
            $_SESSION["utilisateur"] = [
                "nom" => $utilisateur["informations"][0]["nom"],    
                "prenom" => $utilisateur["informations"][0]["prenom"],
                "pseudo" => $utilisateur["informations"][0]["pseudo"],
                "role" => $utilisateur["role"],
                "img" => $utilisateur["img"],
                "id" => $utilisateur["id"]
                ];
            $connexion_reussie = true; //connexion réussite
            header("Location: Accueil.php"); //Dès que la connexion réussit, on redirige l’utilisateur vers la page d’accueil
            exit(); //Arrête immédiatement l’exécution du script, Parce qu'une fois qu'on redirige, on ne veut pas continuer à exécuter du PHP inutilement. Ça évite aussi des erreurs.
        }
    }

    // Si aucune correspondance trouvée
    if (!$connexion_reussie) {
        echo "E-mail ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Se Connecter</title>
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class="seConnecter">
    <img src="Images/logo4.png" alt="logo de The West Agency" class="logo">
    <form action="seConnecter.php" method="POST">
        <div class="encadre">
        <h1 class="aida1">Se connecter à TheWestAgency</h1>
        </div>
        <ul>
            <div class="encadre1">
            <h2 class="aida2">Se connecter avec :</h2>
            <li id="Google">
                <div class="input-box">
                <div class="aida3">
                <a href="seConnecter_google.php">Se connecter avec Google</a>
                </div>
</div>
            </li>
        </ul>

        <strong class="strong">OU</strong>

        <ul> 
          <div class="encadre1">
  <div>
    <li class="aida2">Adresse e-mail :</li>
    <br>
    <input type="email" name="username" required class="input-box">
  </div>

  <br><br>

  <div>
    <li class="aida2">Mot de passe :</li>
    <br>
    <input type="password" name="password" required class="input-box">
  </div>
    <br><br>
   
  <div class="aida3">
        <a href="#">Mot de passe oublié ?</a><br>
        <a href="#">Pas de compte ? Crée un compte</a>
</div>
		  
        <button type="submit">Se connecter</button><br>
</div>

    </form>

   <?php include 'footer.php'; ?>
		
</body>
</html>
