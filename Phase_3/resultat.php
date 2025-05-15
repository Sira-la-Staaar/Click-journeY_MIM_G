<?php
// Tableau des villes existantes, comme ça l'utilisateur ne choisira pas une ville inexistante!
$villes = [ 
    "Marrakech", "Casablanca", "Rabat", "Conakry", "Kankan", "Bamako", "Mopti", "Kayes",
    "Paris-Orly", "Paris-CDG", "Paris", "Dakar", "Ziguinchor", "Thiès", "Saint-Louis",
    "Monrovia", "Buchanan", "Bissau", "Bafata", "Freetown", "Bo", "Cotonou", "Parakou",
    "Lomé", "Niamtougou", "Accra", "Kumasi", "Lagos", "Abuja", "Abidjan", "Yamoussoukro",
    "Ouagadougou", "Bobo-Dioulasso", "Banjul", "Farafenni", "Praia", "Mindelo",
    "Niamey", "Agadez", "Nouakchott", "Nouadhibou"
];

// On récupère toutes les valeurs envoyées par le formulaire vols.php grâce à $_GET
$ville_depart = $_GET['ville_depart'] ?? '';
$ville_arrivee = $_GET['ville_arrivee'] ?? '';
$formule = $_GET['formule'] ?? '';
$type_voyage = $_GET['type-voyage'] ?? '';
$mois = $_GET['month'] ?? '';
$semaine = $_GET['week'] ?? '';
$date_heure = $_GET['time2'] ?? '';

// Vérification des entrées
if ($ville_depart == $ville_arrivee) {
    echo "<h2>Erreur : La ville de départ et la ville d'arrivée ne peuvent pas être les mêmes.</h2>";
    exit;
}

if (!in_array($ville_depart, $villes) || !in_array($ville_arrivee, $villes)) {
    echo "<h2>Erreur : Ville non reconnue.</h2>";
    exit;
}

// Génération d’un prix aléatoire selon la formule
switch ($formule) {
    case "economique":
        $prix = rand(60, 150);
        break;
    case "affaire":
        $prix = rand(160, 300);
        break;
    case "premiere":
        $prix = rand(310, 500);
        break;
    default:
        $prix = rand(100, 200);
}

// Si c'est aller-retour, on double le prix
if ($type_voyage == "aller-retour") {
    $prix *= 2;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat | The West Agency</title>
</head>
<body>
    <h1>Récapitulatif de votre réservation</h1>
    <p><strong>Départ :</strong> <?php echo htmlspecialchars($ville_depart); ?></p>
    <p><strong>Arrivée :</strong> <?php echo htmlspecialchars($ville_arrivee); ?></p>
    <p><strong>Formule choisie :</strong> <?php echo htmlspecialchars($formule); ?></p>
    <p><strong>Type de voyage :</strong> <?php echo htmlspecialchars($type_voyage); ?></p>
    <p><strong>Mois :</strong> <?php echo htmlspecialchars($mois); ?></p>
    <p><strong>Semaine :</strong> <?php echo htmlspecialchars($semaine); ?></p>
    <p><strong>Date et heure de départ :</strong> <?php echo htmlspecialchars($date_heure); ?></p>
    <h2>Prix total estimé : <?php echo $prix; ?> €</h2>
</body>
</html>
