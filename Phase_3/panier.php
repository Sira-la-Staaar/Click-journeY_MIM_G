<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    $est_connecte = isset($_SESSION['utilisateur']);
}
$panier = $_SESSION['panier'] ?? [];

/*if (empty($panier)) {
    echo "<h1>Mon panier</h1><p>Votre panier est vide.</p>";
    exit;
}*/

$json = file_get_contents('Data/voyages.json');
$voyages = json_decode($json, true);
if (!$voyages) {
    die("Erreur de lecture du fichier JSON.");
}

function trouverVoyageParId($voyages, $id) {
    foreach ($voyages as $v) {
        if ((string)$v['id'] === (string)$id) {
            return $v;
        }
    }
    return null;
}

$total_global = 0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Panier | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png"/>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <meta name=”description” content="Ensemble de vos sélections" />
</head>
<body id="panier">
    <?php include 'header.php'; ?>

    <div class="encadre">
        <h1>Mon panier</h1>
        <ul>
            <?php foreach ($panier as $item){ ?>
            <?php
            $voyage = trouverVoyageParId($voyages, $item['id']);
            if (!$voyage) {
                continue;
            }
            $nb_personnes = count($item['personnes']);
            $prix_unitaire = $voyage['prix'];
            $total = $prix_unitaire * $nb_personnes;
            $total_global += $total;
            ?>
            <li>
                <h2><?= htmlspecialchars($voyage['titre']) ?></h2>
                <p>Prix unitaire : <?= $prix_unitaire ?> €</p>
                <p>Nombre de personnes : <?= $nb_personnes ?></p>
                <p>Total pour ce voyage : <?= $total ?> €</p>
                <h3>Personnes</h3>
                <ul>
                    <?php foreach ($item['personnes'] as $index => $personne): ?>
                    <li>
                        <p>Personne <?= $index + 1 ?></p>
                        <p>Nom : <?= htmlspecialchars($personne['nom']) ?></p>
                        <p>Prénom : <?= htmlspecialchars($personne['prenom']) ?></p>
                        <p>Passeport : <?= htmlspecialchars($personne['passport']) ?></p>
                        <p>Date de naissance : <?= htmlspecialchars($personne['naissance']) ?></p>
                        <p>Type : <?= htmlspecialchars($personne['type']) ?></p>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php } ?>
        </ul>
        <h2>Total général : <?= $total_global ?> €</h2>
        <form method="post" action="vider_panier.php">
            <button type="submit">Vider le panier</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>    
</body>
</html>
