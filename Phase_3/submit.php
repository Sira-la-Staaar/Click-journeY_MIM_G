<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $type = $_POST["type"] ?? 'non précisé';
    $note = $_POST["note"] ?? 'non noté';
    $commentaire = $_POST["commentaire"] ?? '';

    $feedback = [
        "type" => $type,
        "note" => $note,
        "commentaire" => $commentaire,
        "date" => date("Y-m-d H:i:s")
    ];

    $file = 'feedback.json';

    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
    } else {
        $data = [];
    }

    $data[] = $feedback;

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo "Merci, votre avis a été enregistré !";
} else {
    echo "Méthode non autorisée.";
}
?>
