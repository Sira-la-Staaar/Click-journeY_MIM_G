<?php
// Démarrage de la session pour vérifier si l'utilisateur est connecté
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: seConnecter.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Charger les données depuis les fichiers JSON (étapes, options, etc.), et verifier si l'un des fichiers est vide ou les deux
$etapes = json_decode(file_get_contents('etapes.json'), true);
$options = json_decode(file_get_contents('options.json'), true);

if (!$etapes || !$options) {
    die("Erreur lors du chargement des données JSON.");
}

// Initialiser les variables des options sélectionnées
$selection = [];

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($etapes as $index => $etape) {
        $selection[$index] = [
            'hebergement' => $_POST["hebergement_$index"] ?? '',
            'restauration' => $_POST["restauration_$index"] ?? '',
            'activites' => $_POST["activites_$index"] ?? [],
            'transport' => $_POST["transport_$index"] ?? '',
            'nb_personnes_activite' => $_POST["nb_personnes_activite_$index"] ?? 1
        ];
    }

    // Rediriger vers la page de récapitulatif
    $_SESSION['selection'] = $selection; // Sauvegarder la sélection dans la session
    header("Location: recapitulatif.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme"/>
    <title>Vue détaillée du voyage</title>
</head>
<script src="JS/theme.js" defer></script>
<body class="voyage" style="background: url('https://media.istockphoto.com/id/1057333524/fr/photo/kasbah-ait-ben-haddou-dans-le-d%C3%A9sert-pr%C3%A8s-de-montagnes-de-latlas-maroc.jpg?s=612x612&w=0&k=20&c=Zcr5WKI1URXHrsYqBFdydkW0EywJdJXRqKyb4MBzqjc=') no-repeat center center fixed; background-size: cover;">
    <img src="logo4.png" alt="logo de The West Agency" style="float: right; margin: 20px; width: 400px;">
    <h1>Personnalisez votre voyage</h1>

    <form action="voyage.php" method="POST">

        <?php foreach ($etapes as $index => $etape): ?>
            <div class="etape">
                <h2>
    Étape <?= is_numeric($index) ? $index + 1 : htmlspecialchars($index) ?> :
    <?= isset($etape['nom']) ? htmlspecialchars($etape['nom']) : 'Nom non précisé' ?>
    </h2>

                <!-- Hébergement -->
                <label for="hebergement_<?= $index ?>">Choisissez votre type d'hébergement :</label>
                <select name="hebergement_<?= $index ?>" id="hebergement_<?= $index ?>">
                    <?php foreach ($options['hebergement'] as $option): ?>
                        <option value="<?= $option ?>" <?= ($selection[$index]['hebergement'] ?? '') == $option ? 'selected' : '' ?>><?= $option ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Restauration -->
                <label for="restauration_<?= $index ?>">Choisissez votre option de restauration :</label>
                <select name="restauration_<?= $index ?>" id="restauration_<?= $index ?>">
                    <?php foreach ($options['restauration'] as $option): ?>
                        <option value="<?= $option ?>" <?= ($selection[$index]['restauration'] ?? '') == $option ? 'selected' : '' ?>><?= $option ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Activités -->
                <label for="activites_<?= $index ?>">Choisissez vos activités :</label>
                <select name="activites_<?= $index ?>[]" id="activites_<?= $index ?>" multiple>
                    <?php foreach ($options['activites'] as $option): ?>
                        <option value="<?= $option ?>" <?= in_array($option, $selection[$index]['activites'] ?? []) ? 'selected' : '' ?>><?= $option ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Transport -->
                <label for="transport_<?= $index ?>">Mode de transport vers la prochaine étape :</label>
                <select name="transport_<?= $index ?>" id="transport_<?= $index ?>">
                    <?php foreach ($options['transport'] as $option): ?>
                        <option value="<?= $option ?>" <?= ($selection[$index]['transport'] ?? '') == $option ? 'selected' : '' ?>><?= $option ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Nombre de personnes par activité -->
                <label for="nb_personnes_activite_<?= $index ?>">Nombre de personnes par activité :</label>
                <input type="number" name="nb_personnes_activite_<?= $index ?>" id="nb_personnes_activite_<?= $index ?>" value="<?= $selection[$index]['nb_personnes_activite'] ?? 1 ?>" min="1">
            </div>
        <?php endforeach; ?>

        <div>
            <button type="submit">Soumettre et voir le récapitulatif</button>
        </div>
    </form>
</body>
</html>