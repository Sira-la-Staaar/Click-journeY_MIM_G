<?php 
$json = file_get_contents(__DIR__ . '/../data/voyages.json');
$voyages = json_decode($json, true); 

if ($voyages === null) {
    echo "Erreur de lecture JSON.";
    exit;
}
?>
