<?php


session_start(); //pour mémoriser si l'utilisateur est connecté
//vérifie si l'utilisateur est déjà connecté!
if (isset($_SESSION["connecte"])) {
    header("Location: accueil.php");// si l'utilisateur est déjà connecté on le renvoit à la page d'acceuil, et on arrete l'éxécution!
    exit();
}




session_start();

// Vérifie si l'utilisateur est déjà connecté

if (isset($_SESSION["connecte"])) {
    header("Location: accueil.php");
    exit();
}

// Informations de connexion!

$login_valide = "admin";
$mdp_valide = "1234";

// Vérifie si le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] == $login_valide && $_POST["password"] == $mdp_valide) {
        // L'utilisateur est connecté, on crée la session
        $_SESSION["connecte"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("Location: accueil.php");
        exit();
    } else {
        echo "Login ou mot de passe incorrect.";
    }
}

?>

