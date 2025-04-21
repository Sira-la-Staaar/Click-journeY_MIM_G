<?php
$voyages = json_decode("voyages.json",true);
$query = isset($_GET['q']) ? $_GET['q'] : '';
$resultats = [];

foreach ($voyages as $voyage) {
    if (stripos($voyage['mots_cles'], $query) !== false) {
        $resultats[] = $voyage;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
</head>
<body>

<h1>Résultats de la recherche pour "<?php echo htmlspecialchars($query); ?>"</h1>

<?php if (count($resultats) > 0): ?>
    <ul>
        <?php foreach ($resultats as $voyage): ?>
            <li>
                <h2><?php echo htmlspecialchars($voyage['titre']); ?></h2>
                <p>Du <?php echo $voyage['date_debut']; ?> au <?php echo $voyage['date_fin']; ?></p>
                <p>Prix : <?php echo $voyage['prix']; ?> EUR</p>
                <img src="images/<?php echo $voyage['img']; ?>" alt="<?php echo htmlspecialchars($voyage['titre']); ?>" width="200">
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun voyage trouvé pour cette recherche.</p>
<?php endif; ?>

</body>
</html>
