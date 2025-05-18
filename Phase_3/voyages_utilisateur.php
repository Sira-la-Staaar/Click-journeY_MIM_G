<?php
if (!isset($_GET['id'])) {
    echo "Utilisateur inconnu.";
    exit;
}

$idUtilisateur = $_GET['id'];
$voyages = json_decode(file_get_contents('voyages.json'), true);
$voyagesUtilisateur = [];

// Filtrer les voyages pour cet utilisateur
foreach ($voyages as $voyage) {
    $personnes = is_array($voyage['personnes']) ? $voyage['personnes'] : [$voyage['personnes']];
    if (in_array($idUtilisateur, $personnes)) {
        $voyagesUtilisateur[] = $voyage;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voyages de l'utilisateur</title>
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme" />

</head>
<script src="JS/theme.js" defer></script>
<body>
    <h1>Voyages de l'utilisateur <?= htmlspecialchars($idUtilisateur) ?></h1>
    <?php if (count($voyagesUtilisateur) > 0): ?>
        <?php foreach ($voyagesUtilisateur as $voyage): ?>
            <div style="border:1px solid #ccc; margin:10px; padding:10px;">
                <h2><?= htmlspecialchars($voyage['titre']) ?></h2>
                <p><strong>Début:</strong> <?= $voyage['date_debut'] ?> | <strong>Fin:</strong> <?= $voyage['date_fin'] ?></p>
                <p><strong>Nombre d'étapes:</strong> <?= $voyage['nb_etapes'] ?></p>
                <p><strong>Prix:</strong> <?= $voyage['prix'] ?> €</p>
                <p><strong>Statut:</strong> <?= ($voyage['statut'] === 'p') ? 'Payé' : 'Non payé' ?></p>
                <img src="<?= $voyage['img'] ?>" width="150px" />
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun voyage trouvé pour cet utilisateur.</p>
    <?php endif; ?>
</body>
</html>
