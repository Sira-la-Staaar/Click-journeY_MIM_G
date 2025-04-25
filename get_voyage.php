<?php 
$json = file_get_contents('voyages.json');
$voyages = json_decode($json, true); 

if ($voyages === null) {
    echo "Erreur de lecture JSON.";
    exit;
}
?>
