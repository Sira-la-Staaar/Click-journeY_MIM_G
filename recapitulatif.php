<?php

session_start();

// Vérification si les données du voyage sont présentes
if (!isset($_SESSION['selection'])) {
    header("Location: voyage.php"); 
    exit();
}

$selection = $_SESSION['selection'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <title>Récapitulatif du voyage</title>
</head>
<body>

    <h1>Récapitulatif de votre voyage</h1>

    <?php foreach ($selection as $index => $data): ?>
        <div class="etape">
            <h2>Étape <?= $index + 1 ?></h2>
            <p><strong>Hébergement :</strong> <?= $data['hebergement'] ?></p>
            <p><strong>Restauration :</strong> <?= $data['restauration'] ?></p>
            <p><strong>Activités :</strong> <?= implode(', ', $data['activites']) ?></p>
            <p><strong>Transport vers la prochaine étape :</strong> <?= $data['transport'] ?></p>
            <p><strong>Nombre de personnes par activité :</strong> <?= $data['nb_personnes_activite'] ?></p>
        </div>
    <?php endforeach; ?>

    <div>
        <a href="page_finale.php">Finaliser le voyage</a>
    </div>

</body>
</html>
