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
  
} else {
    echo "Veuillez soumettre le formulaire.";
}
?>
