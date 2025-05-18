//<?php
session_start();

require_once 'vendor/autoload.php'; // Charger la bibliothèque Google API Client

// Configurer l'authentification Google
$client = new Google_Client();
$client->setClientId('VOTRE_CLIENT_ID'); // Remplacez par votre Client ID
$client->setClientSecret('VOTRE_CLIENT_SECRET'); // Remplacez par votre Client Secret
$client->setRedirectUri('http://votre_site/login_google.php'); // URL de redirection
$client->addScope('email'); // Demander l'accès à l'email de l'utilisateur

if (isset($_GET['code'])) {
    // Si le code de Google est présent dans l'URL, récupérer le token
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Obtenir les informations de l'utilisateur
    $google_service = new Google_Service_Oauth2($client);
    $google_account_info = $google_service->userinfo->get();

    // Stocker les informations dans la session
    $_SESSION['connecte'] = true;
    $_SESSION['username'] = $google_account_info->name;
    $_SESSION['email'] = $google_account_info->email;

    // Rediriger vers la page d'accueil après la connexion
    header("Location: accueil.php");
    exit();
} else {
    // Si le code n'est pas encore présent, rediriger l'utilisateur pour l'authentification
    $auth_url = $client->createAuthUrl();
    header('Location: ' . $auth_url);
    exit();
}
?>
