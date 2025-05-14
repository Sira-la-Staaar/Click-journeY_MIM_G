<?php
// Vérifie que toutes les données du formulaire sont bien présentes dans l'URL (GET)
if (
    !isset($_GET['ville_depart']) || !isset($_GET['ville_arrivee']) ||
    !isset($_GET['formule']) || !isset($_GET['type-voyage']) ||
    !isset($_GET['month']) || !isset($_GET['week']) ||
    !isset($_GET['time2']) || !isset($_GET['voyageurs'])
) {
    // Si des champs sont manquants, on redirige vers vols.html
    header("Location: vols.html");
    exit();
}

// Récupération et sécurisation des données
$ville_depart = htmlspecialchars($_GET['ville_depart']);
$ville_arrivee = htmlspecialchars($_GET['ville_arrivee']);
$formule = htmlspecialchars($_GET['formule']);
$type_voyage = htmlspecialchars($_GET['type-voyage']);
$mois = htmlspecialchars($_GET['month']);
$semaine = htmlspecialchars($_GET['week']);
$date = htmlspecialchars($_GET['time2']);
$voyageurs = (int) $_GET['voyageurs'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Récapitulatif du voyage</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class="recapitulatif">

    <img src="logo4.png" alt="logo de The West Agency" style="float: right; margin: 20px; width: 400px;">
    
    <h1>Récapitulatif de votre voyage</h1>

    <ul>
        <li><strong>Ville de départ :</strong> <?= $ville_depart ?></li>
        <li><strong>Ville d’arrivée :</strong> <?= $ville_arrivee ?></li>
        <li><strong>Formule choisie :</strong> <?= $formule ?></li>
        <li><strong>Type de voyage :</strong> <?= $type_voyage ?></li>
        <li><strong>Mois :</strong> <?= $mois ?></li>
        <li><strong>Semaine :</strong> <?= $semaine ?></li>
        <li><strong>Date et heure :</strong> <?= $date ?></li>
        <li><strong>Nombre de voyageurs :</strong> <?= $voyageurs ?></li>
        <li><strong>Bagages autorisés :</strong> <?= $voyageurs * 2 ?> bagages de 23 kg</li>
    </ul>

</body>
</html>
