<?php
session_start();

// Rediriger vers accueil si l'utilisateur est déjà connecté
if (isset($_SESSION["connecte"])) {
    header("Location: accueil.php");
    exit();
}

// Charger les utilisateurs depuis le fichier JSON
$utilisateurs_json = file_get_contents("utilisateurs.json"); // Lire tout le contenu du fichier utilisateurs.json et le mettre dans la variable: $utilisateurs_json 
$utilisateurs = json_decode($utilisateurs_json, true); // Convertir le texte en tableau pour le manipuler; le "true" c'est pour que le PHP transforme le JSON en tableaux associatifs.

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Vérifie si le formulaire a été envoyé.
    $email = $_POST["username"]; //Récupère la valeur que l'utilisateur a tapée dans le champ e-mail.
    $motdepasse = $_POST["password"]; //Donc name="username" pour que le PHP récupère cette valeur dans $_POST["username"].

    $connexion_reussie = false; // Initialise une variable pour savoir si la connexion a réussi ou pas.

    // Parcourir tous les utilisateurs
    foreach ($utilisateurs as $utilisateur) { //C’est une boucle qui parcourt tous les utilisateurs du tableau $utilisateurs.
        if ($utilisateur["e-mail"] == $email && $utilisateur["mdp"] == $motdepasse) { //si les informations taper correspendent à celle du tableau, donc connexion réussite(on a touvé le bon utilisateur)!
            $_SESSION["connecte"] = true; // utilisateur connecter
            $_SESSION["username"] = $utilisateur["informations"][0]["pseudo"]; // Stocker le pseudo dans la session pour l'afficher plus tard dans les pages.
            $_SESSION["role"] = $utilisateur["role"]; // Stocker le rôle (Admin ou Normal)
            $connexion_reussie = true; //connexion réussite
            header("Location: accueil.php"); //Dès que la connexion réussit, on redirige l’utilisateur vers la page d’accueil
            exit(); //Arrête immédiatement l’exécution du script, Parce qu'une fois qu'on redirige, on ne veut pas continuer à exécuter du PHP inutilement. Ça évite aussi des erreurs.
        }
    }

    // Si aucune correspondance trouvée
    if (!$connexion_reussie) {
        echo "E-mail ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Se Connecter</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class="seConnecter" style="background: url('https://www.bladi.net/img/logo/maroc-endroits-a-visiter.jpg') no-repeat center center fixed; background-size: cover;">
    
    <form action="seConnecter.php" method="POST">
        <h1>Se connecter à TheWestAgency :</h1>
        <ul>
            <li id="Google">
                <a href="seConnecter_google.php">Se connecter avec Google</a>
            </li>
        </ul>

        <strong>OU</strong>

        <ul> 
            <li>Adresse e-mail :</li> 
            <input type="email" name="username" required>
            <li>Mot de passe :</li>
            <input type="password" name="password" required>
        </ul>

        <button type="submit">Se connecter</button><br>

        <a href="#">Mot de passe oublié ?</a><br>
        <a href="#">Pas de compte ? Crée un compte</a>
    </form>

    <footer class="footer2">
        <div class="pied1"><br><img class="pied11" src="logo5.png" alt="logo de The West Agency"/><br><br> * Selon les conditions tarifaires propres à chaque produit et précisées ci-après : <br><br>
          - Vols : Tarifs TTC par personne et « à partir de », valables à certaines dates, sous réserve de disponibilité et de confirmation de la compagnie aérienne<br><br>
          - Séjours : Tarifs TTC, hors taxes de séjour, par personne sur base d'une chambre double. Prix « à partir de » valables à certaines dates et sous réserve de disponibilités et de confirmation. Ces tarifs n'incluent pas les suppléments ou options susceptibles de s'appliquer à certaines réservations ou destinations.<br><br>
          - Week-ends : Tarifs TTC hors taxes de séjours, indiqués par personne « à partir de », valables à certaines dates et sous réserve de disponibilité et de confirmation. Ces tarifs n'incluent pas les suppléments ou options susceptibles de s'appliquer à certaines réservations ou destinations.<br><br>
          - Locations : Tarifs TTC par logement et par semaine (sauf mention contraire), « à partir de », valables à certaines dates, sous réserve de disponibilité et de confirmation.<br><br>
          - Hôtels : Tarifs TTC par nuit et par chambre « à partir de », valables à certaines dates, sur la base d'une chambre double, hors taxes de séjour, ajustables en fonction du taux de change, sous réserve de disponibilité et de confirmation.<br><br>
          - Voiture : Tarifs TTC « à partir de », par jour et pour un petit véhicule, hors suppléments, valables à certaines dates et sous réserve de disponibilité et de confirmation.<br><br>
          - Croisières : Tarifs TTC par personne « à partir de », hors taxes de séjours, valables à certaines dates et sous réserve de disponibilité.<br><br><br>
          
          © 2024-2025 TheWestAgency. Tous droits réservés - société soumise au droit français, inscrite au registre du commerce de Paris, Cergy 95000, dont le siège social est à l’avenue du Parc, immatriculée au Registre des opérateurs de voyages et de séjours auprès d’Atout France sis 79/81 rue de Clichy 75009 Paris, sous le numéro IM099170015, agréée IATA. 
          Si vous avez soumis une réclamation auprès de notre Service Client, mais que notre réponse ne vous satisfait pas : vous pouvez contacter la Médiation Tourisme et Voyage sur leur site www.mtv.travel ou par voie postale MTV Médiation Tourisme Voyage BP 80 303 75 823 Paris cedex 17. Vous pouvez nous contacter au sujet de votre remboursement dès maintenant via notre Centre d'aide ou contactez nos agents ici.
           <br> <br>
          Laissez-nous votre avis ! <br> <br><a href="https://feedback.emplifi.io/?lID=2&rn=131521&vm=1&pID=5&hs1=102214&hs2=102226&uni=1&siteID=1&am=true&referrer=Link&sdfc=355b766d-131521-c733c77b-141a-42d7-be9f-2e52b426622b&source=102226"><button class="pied1"><strong>Laisser un commentaire</strong></button></a></div>
    </footer>
		
</body>
</html>
