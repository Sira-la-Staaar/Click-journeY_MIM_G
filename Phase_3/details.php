<?php
session_start();

//if (!isset($_SESSION['utilisateur'])) {
    //header('Location: inscription.php');
    //exit;
//}
// Traitement du formulaire d'ajout au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_panier'])) {
    if (!isset($_SESSION['utilisateur'])) {
        header('Location: inscription.php');
        exit;
    }

    $id_ajout  = $_POST['ajouter_panier'];
    $personnes = $_POST['personnes'] ?? [];

    if (count($personnes) < 1 || count($personnes) > 10) {
        die("Le nombre de personnes doit être entre 1 et 10.");
    }

    foreach ($personnes as &$p) {
        $p['nom']       = trim($p['nom']);
        $p['prenom']    = trim($p['prenom']);
        $p['passport']  = trim($p['passport']);
        $p['naissance'] = trim($p['naissance']);
        $p['type']      = trim($p['type']);

        if (!preg_match('/^[A-Za-z0-9]{9}$/', $p['passport'])) {
            die("Le numéro de passeport doit contenir exactement 9 caractères alphanumériques.");
        }
    }
    unset($p);

    if (!isset($_SESSION['panier_actif'])) {
        $_SESSION['panier_actif'] = [];
    }

    $_SESSION['panier_actif'][] = [
        'id'        => $id_ajout,
        'personnes' => $personnes
    ];

    $reservation = [
        'user'      => $_SESSION['utilisateur']['email'] ?? 'guest',
        'voyage_id' => $id_ajout,
        'personnes' => $personnes,
        'date'      => date('c'),
    ];

    $file = 'Data/reservations.json';
    $reservations = file_exists($file) ? (json_decode(file_get_contents($file), true) ?: []) : [];
    $reservations[] = $reservation;
    file_put_contents($file, json_encode($reservations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header("Location: panier.php");
    exit;
}
$utilisateur = $_SESSION['utilisateur'];
// Chargement des données
$json = file_get_contents('Data/voyages.json');
$voyages = json_decode($json, true);
if (!$voyages) {
    die("Erreur de lecture du fichier JSON.");
}

// Récupération du voyage à afficher (via GET)
$voyage_id = $_GET['id'] ?? null;
$voyage = null;
foreach ($voyages as $v) {
    if ((string)$v['id'] === (string)$voyage_id) {
        $voyage = $v;
        break;
    }
}

if (!$voyage) {
    die("Voyage non trouvé.");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css">
    <title>Détails du voyage | The West Agency</title>
    <link rel="shortcut icon" href="Images/minilogo.png" type="image/png"/>
</head>
<body id="admin" data-user='<?= json_encode($utilisateur ?? null, JSON_HEX_APOS | JSON_HEX_QUOT) ?>'>
    <h1><?= htmlspecialchars($voyage['titre']) ?></h1>
    <p><strong>Du :</strong> <?= $voyage['date_debut'] ?> <strong>au</strong> <?= $voyage['date_fin'] ?></p>
    <p><strong>Prix :</strong> <?= $voyage['prix'] ?> €</p>

    <?php if (!empty($voyage['img'])){?>
        <img id="profil" src="Images/<?= $voyage['img'] ?>" alt="<?= htmlspecialchars($voyage['titre']) ?>">
    <?php } ?>

    <form method="post">
        <input type="hidden" name="ajouter_panier" value="<?= htmlspecialchars($voyage['id']) ?>">

        <label for="nb_personnes">Nombre de personnes :</label>
        <input type="number" name="nb_personnes" id="nb_personnes" min="1" max="10" value="1" onchange="afficherChamps()" required><br>

        <div id="types_personnes"></div>

        <button class="btn-details" type="submit">Ajouter au panier</button>
    </form>

    <h2>Étapes</h2>
    <ul>
        <?php 
        $numero = 1;
        foreach ($voyage['etapes'] as $etape) { ?>
            <li>
                Étape <?= $numero ?><br>
                <strong>Compagnie :</strong> <?= htmlspecialchars($etape['compagnie'] ?? '') ?><br>
                <strong>Moyen :</strong> <?= htmlspecialchars($etape['moyen'] ?? '') ?><br>
                <strong>Départ :</strong> <?= $etape['date_a'] . ' à ' . $etape['h_a'] . ' depuis ' . $etape['pos_a'] ?><br>
                <strong>Arrivée :</strong> <?= $etape['date_b'] . ' à ' . $etape['h_b'] . ' à ' . $etape['pos_b'] ?><br>
                <strong>Durée :</strong> <?= htmlspecialchars($etape['tmps'] ?? '') ?>
            </li>
            <?php 
            $numero++;
        } ?>
    </ul>
    <script type="module" src="JS/details.js"></script>


</body>
</html>
