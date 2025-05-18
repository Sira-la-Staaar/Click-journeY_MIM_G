<?php
require('getapikey.php');

// Déclaration des variables
$vendeur = "MIM_G";
$id_transaction = "A7g3B9kL2xW5rQeT";
$retour = "http://localhost:7180/retour_paiement.php?session=s";
$montant = number_format(150.00, 2, '.', '');


$api_key = getAPIKey($vendeur);

if (!preg_match("/^[0-9a-zA-Z]{15}$/", $api_key)) {
    die("API Key invalide");
}

$control = md5($api_key . "#" . $id_transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");

// Vérification des champs envoyés en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom_du_titulaire = $_POST['Nom_du_titulaire'] ?? ''; 
    $Numero_de_carte = $_POST['Numero_de_carte'] ?? '';  
    $Date_dexpiration = $_POST['Date_dexpiration'] ?? ''; 
    $Cryptogramme = $_POST['Cryptogramme'] ?? '';  

    if (empty($Nom_du_titulaire) || empty($Numero_de_carte) || empty($Date_dexpiration) || empty($Cryptogramme)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        echo "Transaction en cours...";
    }
}
?>
<DOCTYPE html>
        <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
            <input type="hidden" name="transaction" value="<?= $id_transaction ?>">
            <input type="hidden" name="montant" value="<?= $montant ?>">
            <input type="hidden" name="vendeur" value="<?= $vendeur ?>">
            <input type="hidden" name="retour" value="<?= $retour ?>">
            <input type="hidden" name="control" value="<?= $control ?>">
            <input type="submit" class="btn-details" value="Payer maintenant">
        </form>
    </div>
