<?php
session_start(); 

// Vérifie si l'utilisateur est connecté et a sélectionné un vol
if (!isset($_SESSION['selection'])) {
    header("Location: Vols.php"); 
    exit();
}
if (!isset($_SESSION['utilisateur'])) {
    header("Location: seConnecter.php");
    exit();
}

$selection = $_SESSION['selection'];
$prix_final = $selection['prix'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme"/>
    <title>Récapitulatif du voyage</title>
</head>
<script src="JS/theme.js" defer></script>
<body class="recapitulatif">

    <img src="logo4.png" alt="logo de The West Agency" style="float: right; margin: 20px; width: 400px;">
    <h1>Récapitulatif de votre voyage</h1>

    <p>Voici le récapitulatif de votre voyage personnalisé:</p>
    
    <div>
        <h2>Informations du voyage :</h2>
        <p><strong>Ville de départ :</strong> <?= isset($selection['ville_depart']) ? $selection['ville_depart'] : 'Non spécifiée'; ?></p>
        <p><strong>Ville d'arrivée :</strong> <?= isset($selection['ville_arrivee']) ? $selection['ville_arrivee'] : 'Non spécifiée'; ?></p>
        <p><strong>Nombre de voyageurs :</strong> <?= isset($selection['voyageurs']) ? $selection['voyageurs'] : 'Non spécifié'; ?></p>
        <p><strong>Prix final estimé :</strong> <?= $selection['prix']; ?> €</p>
    </div>

    <?php foreach ($selection as $index => $data): ?>
        <?php if (is_int($index) && is_array($data)): ?>
            <div>
                <h2>Étape <?= $index + 1 ?></h2>

                <?php if (!empty($data['hebergement'])): ?>
                    <p>Hébergement : <?= $data['hebergement'] ?></p>
                <?php endif; ?>

                <?php if (!empty($data['restauration'])): ?>
                    <p>Restauration : <?= $data['restauration'] ?></p>
                <?php endif; ?>

                <?php if (!empty($data['activites'])): ?>
                    <p>Activités : <?= implode(', ', $data['activites']) ?></p>
                <?php endif; ?>

                <?php if (!empty($data['transport'])): ?>
                    <p>Transport vers la prochaine étape : <?= $data['transport'] ?></p>
                <?php endif; ?>

                <?php if (!empty($data['nb_personnes_activite'])): ?>
                    <p>Nombre de personnes par activité : <?= $data['nb_personnes_activite'] ?></p>
                <?php endif; ?>
            </div> 
        <?php endif; ?>
    <?php endforeach; ?>

    <div>
        <a href="paiement.php">Finaliser le voyage</a>
    </div>

    <div>
        <a href="voyage.php">Retour à la sélection</a>
    </div>

    <div>
        <a href="vols.php">Modifier le voyage</a>
    </div>

</body>
</html>
