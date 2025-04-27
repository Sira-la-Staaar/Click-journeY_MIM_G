<?php
session_start();

// Rediriger vers accueil si l'utilisateur est déjà connecté
if (isset($_SESSION["connecte"])) {
    header("Location: accueil.php");
    exit();
}

// Charger les utilisateurs depuis le fichier JSON
$utilisateurs_json = file_get_contents("utilisateurs.json"); // Lire tout le contenu du fichier utilisateurs.json et le mettre dans la variable: $utilisateurs_json 
$utilisateurs = json_decode($utilisateurs_json, true); // Convertir le texte en tableau pour le manipuler; le "true" c'est pour que le PHP transforme le JSON en tableaux associatifs.

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Vérifie si le formulaire a été envoyé.
    $email = $_POST["username"]; //Récupère la valeur que l'utilisateur a tapée dans le champ e-mail.
    $motdepasse = $_POST["password"]; //Donc name="username" pour que le PHP récupère cette valeur dans $_POST["username"].

    $connexion_reussie = false; // Initialise une variable pour savoir si la connexion a réussi ou pas.

    // Parcourir tous les utilisateurs
    foreach ($utilisateurs as $utilisateur) { //C’est une boucle qui parcourt tous les utilisateurs du tableau $utilisateurs.
        if ($utilisateur["e-mail"] == $email && $utilisateur["mdp"] == $motdepasse) { //si les informations taper correspendent à celle du tableau, donc connexion réussite(on a touvé le bon utilisateur)!
            $_SESSION["connecte"] = true; // utilisateur connecter
            $_SESSION["username"] = $utilisateur["informations"][0]["pseudo"]; // Stocker le pseudo dans la session pour l'afficher plus tard dans les pages.
            $_SESSION["role"] = $utilisateur["role"]; // Stocker le rôle (Admin ou Normal)
            $connexion_reussie = true; //connexion réussite
            header("Location: accueil.php"); //Dès que la connexion réussit, on redirige l’utilisateur vers la page d’accueil
            exit(); //Arrête immédiatement l’exécution du script, Parce qu'une fois qu'on redirige, on ne veut pas continuer à exécuter du PHP inutilement. Ça évite aussi des erreurs.
        }
    }

    // Si aucune correspondance trouvée
    if (!$connexion_reussie) {
        echo "E-mail ou mot de passe incorrect.";
    }
}
?>
