<?php
session_start(); //on doit acceder à la fonction pour pouvoir la supprimer
session_unset(); // Vide toutes les variables de session(role, usurname...), mais la session existe toujours
session_destroy(); // Détruit la session
header("Location: login.php"); //redirige l'utilisateur vers la page de connexion
exit(); //arreter l'execution du script
?>
