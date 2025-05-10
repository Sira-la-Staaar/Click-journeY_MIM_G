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
    <p>Voici le récapitulatif de votre voyage personnalisé:</p>
    
    <div>
            <h2>Informations du voyage :</h2>
            <p><strong>Ville de départ :</strong> <?php echo isset($selection['ville_depart']) ? $selection['ville_depart'] : 'Non spécifiée'; ?></p>
            <p><strong>Ville d'arrivée :</strong> <?php echo isset($selection['ville_arrivee']) ? $selection['ville_arrivee'] : 'Non spécifiée'; ?></p>
            <p><strong>Date d'arrivée :</strong> <?php echo isset($selection['date_arrivee']) ? $selection['date_arrivee'] : 'Non spécifiée'; ?></p>
            <p><strong>Durée du voyage :</strong> <?php echo isset($selection['duree_voyage']) ? $selection['duree_voyage'] : 'Non spécifiée'; ?></p>
            <p><strong>Prix total :</strong> <?php echo isset($selection['prix_total']) ? $selection['prix_total'] : 'Non spécifié'; ?></p>
            <p><strong>Nombre de personnes :</strong> <?php echo isset($selection['nb_personnes']) ? $selection['nb_personnes'] : 'Non spécifié'; ?></p>
        </div>

    <?php foreach ($selection as $index => $data): ?>
        <div>
            <h2>Étape <?php echo $index + 1; ?></h2>
            <p><strong>Hébergement :</strong> <?= $data['hebergement'] ?></p>
            <p><strong>Restauration :</strong> <?= $data['restauration'] ?></p>
            <p><strong>Activités :</strong> <?= implode(', ', $data['activites']) ?></p>
            <p><strong>Transport vers la prochaine étape :</strong> <?= $data['transport'] ?></p>
            <p><strong>Nombre de personnes par activité :</strong> <?= $data['nb_personnes_activite'] ?></p>
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
