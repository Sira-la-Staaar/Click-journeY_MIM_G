<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom_du_titulaire = $_POST['Nom_du_titulaire']; 
    $Numero_de_carte = $_POST['Numero_de_carte'];  
    $Date_dexpiration = $_POST['Date_dexpiration']; 
    $Cryptogramme= $_POST['Cryptogramme'];  

   
    if (empty($Nom_du_titulaire) || empty($Numero_de_carte) || empty($Date_dexpiration) || empty($Cryptogramme)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        echo "Transaction en cours...";
    }
}
require('getapikey.php');

$vendeur = "MIM_G";
$api_key = getAPIKey($vendeur);

if (preg_match("/^[0-9a-zA-Z]{15}$/", $api_key)) {
    echo "API Key valide";
} else {
    echo "API Key invalide";
}


$id_transaction = "A7g3B9kL2xW5rQeT";
$montant = number_format($montant, 2, ',', '');
$vendeur = "MIM_G";
$retour = "http://localhost:7180/retour_paiement.php?session=s";
$control = md5($api_key . "#" . $id_transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");





//is_numeric($montant);
//if (is_numeric($montant)) {
  //  echo "Le montant est valide.";
//} //else {
  //  echo "Le montant n'est pas valide.";
//}

?>


<!DOCTYPE html>

<html lang="fr">
<head>
   <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <link rel="stylesheet" href="stylesheet.css">
  <title>Page de paiement</title>
</head>
<body class="paiement">
  <img src ="Images/logo3.png" alt="logo de The West Agency" class="logo"/>

  <div class="encadre">
    <h1 class="aida1">------------Paiement-------------</h1>
      <div class="encadre1">
  <h2>Détails du paiement :</h2>
  <p><strong>Montant :</strong> <?= $montant ?> €</p>
  <p><strong>Vendeur :</strong> <?= $vendeur ?></p>
  <p><strong>ID de transaction :</strong> <?= $id_transaction ?></p>
  <br>
</div>
    <h2 class="aida2">Merci de remplir les cases ci-dessous pour proceder au paiement!</h2>
    </div>
    <div class="encadre1">
    <h2 class="aida3">Nom du titulaire de la carte</h2>
    <br><br>
    <input type="text" class="input-box" placeholder="Nom du titulaire de la carte" required maxlength="30" pattern="[A-Za-z\s]{1,30}"/>
    <br><br>
        <h2 class=aida3>Numéro de carte bancaire</h2>
        <br><br>
    <input type="text" class="input-box" placeholder="Numéro de carte bancaire" required 16 maxlength="16" pattern="[0-9]{16}"/>
    <br><br>
    <h2 class="aida3">Date d'expiration</h2>
    <br><br>
    <input type="text" class="input-box" placeholder="MM/AA" required maxlength="5" pattern="(0[1-9]|1[0-2])/[0-9]{2}"/>
    <br><br>
    <h2 class="aida3">Cryptogramme</h2>
    <br><br>
    <input type="text" class="input-box" placeholder="Cryptogramme" required maxlength="3" pattern="[0-9]{3}"/> 
    <br><br>
</div>
</div>   
<form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
    <input type="hidden" name="transaction" value="<?= "A7g3B9kL2xW5rQeT" ?>">
    <input type="hidden" name="montant" value="<?= 150.00 ?>">
    <input type="hidden" name="vendeur" value="<?= "MIM_G" ?>">
    <input type="hidden" name="retour" value="<?= "http://localhost:7180/retour_paiement.php?session=s" ?>">
    <input type="hidden" name="control" value="<?= $control ?>">
    <input type="submit" class="btn-details" value="Payer maintenant">
</form>


</div>
    <?php include 'footer.php'; ?>
  </body>
</form>
</html>

