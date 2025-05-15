<?php

session_start();

// Vérification si les données du voyage sont présentes
//if (!isset($_SESSION['selection'])) {
//    header("Location: voyage.php"); 
//    exit();
//}

$selection = $_SESSION['selection'];
$error_message = "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Récapitulatif du voyage</title>
</head>
    <body class="recapitulatif">

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
        
    <?php endif; ?>
    </body>
</html>
