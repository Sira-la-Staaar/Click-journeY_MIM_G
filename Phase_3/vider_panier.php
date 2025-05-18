<?php
session_start();
unset($_SESSION['panier_actif']);
header('Location: panier.php');
exit;?>