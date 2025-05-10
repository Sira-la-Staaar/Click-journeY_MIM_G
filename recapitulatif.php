//ajouter css pour cette page
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

    <?php if (!empty($error_message)): ?>
    <div>
        <p><?php echo $error_message; ?></p>
    </div>
<?php else: ?>
    <p>Votre récapitulatif est complet et prêt à être finalisé.</p>

    <?php foreach ($selection as $index => $data): ?>
        <div>
            <h2>Étape <?php echo $index + 1; ?></h2>
            <p><strong>Hébergement :</strong> <?php echo isset($data['hebergement']) ? $data['hebergement'] : 'Non spécifié'; ?></p> 
            <p><strong>Restauration :</strong> <?php echo isset($data['restauration']) ? $data['restauration'] : 'Non spécifiée'; ?></p>
            <p><strong>Activités :</strong> <?php echo isset($data['activites']) && !empty($data['activites']) ? implode(', ', $data['activites']) : 'Aucune activité spécifiée'; ?></p>
            <p><strong>Transport vers la prochaine étape :</strong> <?php echo isset($data['transport']) ? $data['transport'] : 'Non spécifié'; ?></p>
            <p><strong>Nombre de personnes par activité :</strong> <?php echo isset($data['nb_personnes_activite']) ? $data['nb_personnes_activite'] : 'Non spécifié'; ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div>
    <a href="paiement.php">Finaliser le voyage</a>
</div>

<div>
    <a href="voyage.php">Retour à la sélection</a>
</div>

</body>
</html>
