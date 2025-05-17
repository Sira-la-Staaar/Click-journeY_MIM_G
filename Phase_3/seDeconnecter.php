<?php
session_start(); //on doit acceder à la fonction pour pouvoir la supprimer
if (isset($_SESSION['panier_actif']) && !empty($_SESSION['panier_actif'])) {
    // on chiffre pour que personne ne voie le contenu
    $data      = json_encode($_SESSION['panier_actif']);
    $cleSecrete = 'votre‑cle‑secrete‑32car';      // 32 octets minimum
    $iv        = random_bytes(16);
    $cipher    = openssl_encrypt($data, 'aes-256-cbc', $cleSecrete, 0, $iv);

    // payload IV + cipher encodé en base64
    $payload = base64_encode($iv . $cipher);

    // valable 7 jours
    setcookie('panierSauvegarde', $payload, [
        'expires'  => time() + 604800,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}
session_unset(); // Vide toutes les variables de session(role, usurname...), mais la session existe toujours
session_destroy(); // Détruit la session
header("Location: seConnecter.php"); //redirige l'utilisateur vers la page de connexion
exit(); //arreter l'execution du script
?>
