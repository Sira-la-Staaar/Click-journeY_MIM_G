<?php
session_start();
require('getapikey.php');

$vendeur = "MIM_G";
//Numéro de transaction généré aléatoirement
$id_transaction = "A7g3B9kL2xW5rQeT";
$retour = "http://localhost:7180/retour_paiement.php?session=s";

// Récupération du prix depuis la page recapitulatif.php
if (isset($_SESSION['prix'])) {
    $prix_final = $_SESSION['prix'];
} else {
    $prix_final = "Prix non défini.";
}
// Prix avec deux chiffres après la virgule
$montant = number_format((float)$prix_final, 2, '.', '');

// Récupération et vérification de la clé API
$api_key = getAPIKey($vendeur);

if (!preg_match("/^[0-9a-zA-Z]{15}$/", $api_key)) {
    die("API Key invalide");
}

$control = md5($api_key . "#" . $id_transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");

//  ?? ''; -> ca exsiste et c'est non null
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom_du_titulaire = $_POST['Nom_du_titulaire'] ?? ''; 
    $Numero_de_carte = $_POST['Numero_de_carte'] ?? '';  
    $Date_dexpiration = $_POST['Date_dexpiration'] ?? ''; 
    $Cryptogramme = $_POST['Cryptogramme'] ?? '';  
// verification de la présence des champs
    if (empty($Nom_du_titulaire) || empty($Numero_de_carte) || empty($Date_dexpiration) || empty($Cryptogramme)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        echo "Transaction en cours...";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement</title>
    <link rel="stylesheet" href="CSS/theme-clair.css" id="theme"/>
    <script src="JS/theme.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
</head>
<body>
    <h1>Récapitulatif du paiement</h1>
    <p>Montant à payer : <?= htmlspecialchars($prix_final) ?> €</p>

    <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
        <input type="hidden" name="transaction" value="<?= $id_transaction ?>">
        <input type="hidden" name="montant" value="<?= $montant ?>">
        <input type="hidden" name="vendeur" value="<?= $vendeur ?>">
        <input type="hidden" name="retour" value="<?= $retour ?>">
        <input type="hidden" name="control" value="<?= $control ?>">
        <input type="submit" class="btn-details" value="Payer maintenant">
    </form>
</body>
</html>
