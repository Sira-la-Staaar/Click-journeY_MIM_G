<?php
session_start();
// Tableau des villes existantes, comme ça l'utilisateur ne choisira pas une ville inexistante!
$villes = [ 
    "Marrakech", "Casablanca", "Rabat", "Conakry", "Kankan", "Bamako", "Mopti", "Kayes",
    "Paris-Orly", "Paris-CDG", "Paris", "Dakar", "Ziguinchor", "Thiès", "Saint-Louis",
    "Monrovia", "Buchanan", "Bissau", "Bafata", "Freetown", "Bo", "Cotonou", "Parakou",
    "Lomé", "Niamtougou", "Accra", "Kumasi", "Lagos", "Abuja", "Abidjan", "Yamoussoukro",
    "Ouagadougou", "Bobo-Dioulasso", "Banjul", "Farafenni", "Praia", "Mindelo",
    "Niamey", "Agadez", "Nouakchott", "Nouadhibou"
];

// On récupère toutes les valeurs envoyées par le formulaire vols.php grâce à $_GET, si la valeur n’est pas envoyée, mettre une chaîne vide pour éviter une erreur
$ville_depart = $_GET['ville_depart'] ?? '';
$ville_arrivee = $_GET['ville_arrivee'] ?? '';
$formule = $_GET['formule'] ?? '';
$type_voyage = $_GET['type-voyage'] ?? '';
$date_heure = $_GET['time2'] ?? '';

// Vérification des entrées, Si la ville de départ = la ville d’arrivée donc erreur!
if ($ville_depart == $ville_arrivee) {
    echo "<h2>Erreur : La ville de départ et la ville d'arrivée ne peuvent pas être les mêmes.</h2>";
    exit;
}

//si la ville de départ ou la ville d’arrivée n’est pas dans le tableau $villes donc erreur
if (!in_array($ville_depart, $villes) || !in_array($ville_arrivee, $villes)) {
    echo "<h2>Erreur : Ville non reconnue.</h2>";
    exit;
}

// Génération d’un prix aléatoire selon la formule (de switch) choisit par l'utilisateur
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
    default: //si jamais il y a une erreur donc prix entre 100€ et 200€
        $prix = rand(100, 200);
}

// Si c'est aller-retour = prix * 2
if ($type_voyage == "aller-retour") {
    $prix *= 2;
}

    // stocker tout dans la session pour l’utiliser dans recapitulatif.php
$_SESSION['selection'] = [
    "ville_depart" => $ville_depart,
    "ville_arrivee" => $ville_arrivee,
    "formule" => $formule,
    "type_voyage" => $type_voyage,
    "date_heure" => $date_heure,
    "prix" => $prix
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat | The West Agency</title>
</head>
<script src="js/theme.js" defer></script>
<body>
    <h1>Récapitulatif de votre réservation</h1>
    <!-- afficher toutes les informations récupérées: -->
    <!-- htmlspecialchars() protège des erreurs si l’utilisateur a mis des caractères spéciaux, Elle transforme les caractères spéciaux HTML (comme < devient &lt, >, &, ", etc.) en leur forme sécurisée.-->
    <p>Départ :<?php echo htmlspecialchars($ville_depart); ?></p>
    <p>Arrivée :<?php echo htmlspecialchars($ville_arrivee); ?></p>
    <p>Formule choisie :<?php echo htmlspecialchars($formule); ?></p>
    <p>Type de voyage :<?php echo htmlspecialchars($type_voyage); ?></p>
    <p>Date et heure de départ :<?php echo htmlspecialchars($date_heure); ?></p>
    <h2>Prix total estimé : <?php echo $prix; ?> €</h2> <!--mettre en valeur le prix car c une information importante = c ce que l'utilisateur veut savoir!-->
        
        <form action="recapitulatif.php" method="POST">
            <button type="submit">Confirmer ce voyage</button>
        </form>
</body>
</html>
