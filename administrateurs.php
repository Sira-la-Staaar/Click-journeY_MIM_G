<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["connecte"])) { 
    header("Location: seConnecter.php"); 
    exit();
}

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION["role"] != "A") {
    echo "Accès refusé. Vous n'êtes pas administrateur.";
    exit();
}

// Charger les utilisateurs depuis le fichier JSON
$utilisateurs_json = file_get_contents("utilisateurs.json"); 
$utilisateurs = json_decode($utilisateurs_json, true); 

// Pagination : déterminer le nombre total d'utilisateurs
$total_utilisateurs = count($utilisateurs);
$utilisateurs_par_page = 5; // Nombre d'utilisateurs à afficher par page

// Calculer le nombre total de pages
$total_pages = ceil($total_utilisateurs / $utilisateurs_par_page);

// Déterminer sur quelle page l'utilisateur se trouve, si aucun paramètre page passé dans l'URL, on commence à la page 1
$page_actuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Sécuriser: si l'utilisateur tape un numéro de page invalide
if ($page_actuelle < 1) {
    $page_actuelle = 1;
} elseif ($page_actuelle > $total_pages) {
    $page_actuelle = $total_pages;
}

// Déterminer l'index de départ pour la boucle
$depart = ($page_actuelle - 1) * $utilisateurs_par_page;

// Afficher la liste des utilisateurs pour cette page
echo "<h1>Liste des utilisateurs (page $page_actuelle) :</h1>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Nom</th><th>Prénom</th><th>Pseudo</th><th>Email</th><th>Rôle</th></tr>";

// Afficher seulement les utilisateurs de la page actuelle
for ($i = $depart; $i < $depart + $utilisateurs_par_page && $i < $total_utilisateurs; $i++) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($utilisateurs[$i]["informations"][0]["nom"]) . "</td>"; //pour empêcher les failles XS (des failles de sécurité qui permettent à un pirate d'injecter du code JavaScript malveillant dans une page web.)
    echo "<td>" . htmlspecialchars($utilisateurs[$i]["informations"][0]["prenom"]) . "</td>";
    echo "<td>" . htmlspecialchars($utilisateurs[$i]["informations"][0]["pseudo"]) . "</td>";
    echo "<td>" . htmlspecialchars($utilisateurs[$i]["e-mail"]) . "</td>";
    echo "<td>" . htmlspecialchars($utilisateurs[$i]["role"]) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Afficher les liens de pagination
echo "<div style='margin-top:20px;'>";

for ($page = 1; $page <= $total_pages; $page++) {
    if ($page == $page_actuelle) {
        echo "<strong> $page </strong>"; // La page actuelle en gras
    } else {
        echo "<a href='administrateurs.php?page=$page'> $page </a>";
    }
}
echo "</div>";
?>
