<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    $est_connecte = isset($_SESSION['utilisateur']);
}
$panier = $_SESSION['panier_actif'] ?? [];
/*if (empty($panier)) {
    echo "<h1>Mon panier</h1><p>Votre panier est vide.</p>";
    exit;
}*/

$json = file_get_contents('Data/voyages.json');
$voyages = json_decode($json, true);
if (!$voyages) {
    die("Erreur de lecture du fichier JSON.");
}

function trouverVoyageParId($voyages, $id){
    foreach ($voyages as $v) { 
        if ((string)$v['id'] === (string)$id) {
            return $v;
        }
    }
    return null;
}

$total_global = 0;
$selection = $_SESSION['selection'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Panier | The West Agency</title>
    <link type="text/css" rel="stylesheet" href="CSS/theme-clair.css" id="theme">
    <link rel="shortcut icon" type="image/png" href="Images/minilogo.png" />
    <meta charset="UTF-8" name="author" content="Sira DIAKITE" />
    <meta name=”description” content="Ensemble de vos sélections" />
</head>
<script src="JS/theme.js" defer></script>
<body id="panier">
    <?php include 'header.php'; ?>
    <div class="encadre">
        <h1>Mon panier</h1>
        <ul>
            <?php foreach ($panier as $item){ ?>
            <?php
                $voyage = trouverVoyageParId($voyages, $item['id']);
                if (!$voyage) continue;

                $nb_personnes  = count($item['personnes']);
                $prix_unitaire = $voyage['prix'];
                $total         = $prix_unitaire * $nb_personnes;
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
                        <p>Passeport : <?= isset($personne['passport']) ? htmlspecialchars($personne['passport']) : 'Non renseigné' ?></p>
                        <p>Date de naissance : <?= htmlspecialchars($personne['naissance']) ?></p>
                        <p>Type : <?= htmlspecialchars($personne['type']) ?></p>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php } ?>
        </ul>

        <?php if ($selection) { ?>
        <div class="recapitulatif-voyage">
            <h2>Récapitulatif de votre voyage personnalisé :</h2>
            <p><strong>Ville de départ :</strong> <?= htmlspecialchars($selection['ville_depart'] ?? 'Non spécifiée') ?></p>
            <p><strong>Ville d'arrivée :</strong> <?= htmlspecialchars($selection['ville_arrivee'] ?? 'Non spécifiée') ?></p>
            <p><strong>Nombre de voyageurs :</strong> <?= htmlspecialchars($selection['voyageurs'] ?? 'Non spécifié') ?></p>
            <p><strong>Prix final estimé :</strong> <?= htmlspecialchars($selection['prix'] ?? 'N/A') ?> €</p>

            <?php foreach ($selection as $idx => $etape){ ?>
                <?php if (is_int($idx) && is_array($etape)){ ?>
                <div>
                    <h3>Étape <?= $idx + 1 ?></h3>
                    <?php if (!empty($etape['hebergement'])){ ?>
                        <p>Hébergement : <?= htmlspecialchars($etape['hebergement']) ?></p>
                    <?php } ?>
                    <?php if (!empty($etape['restauration'])){ ?>
                        <p>Restauration : <?= htmlspecialchars($etape['restauration']) ?></p>
                    <?php } ?>
                    <?php if (!empty($etape['activites'])){ ?>
                        <p>Activités : <?= htmlspecialchars(implode(', ', $etape['activites'])) ?></p>
                    <?php } ?>
                    <?php if (!empty($etape['transport'])){ ?>
                        <p>Transport vers la prochaine étape : <?= htmlspecialchars($etape['transport']) ?></p>
                    <?php } ?>
                    <?php if (!empty($etape['nb_personnes_activite'])){ ?>
                        <p>Nombre de personnes par activité : <?= htmlspecialchars($etape['nb_personnes_activite']) ?></p>
                    <?php } ?>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
        <?php } 
        if ($selection && isset($selection['prix'])) {
            $total_global += floatval($selection['prix']);
        }
        $_SESSION['prix']=$total_global?>

        <h2>Total général : <?= $total_global ?> €</h2>

        <form method="post" action="vider_panier.php">
            <button class="btn-details" type="submit">Vider le panier</button>
        </form>
        <a href="Accueil.php"><button class="btn-details">Continuer mes achats</button></a>
        <a href="paiement.php"><button class="btn-details">Payer</button></a>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
