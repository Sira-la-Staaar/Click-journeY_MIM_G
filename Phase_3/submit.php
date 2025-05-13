<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $type = $_POST["type"] ?? 'non précisé';
    $note = $_POST["note"] ?? 'non noté';
    $commentaire = $_POST["commentaire"] ?? '';

    $entry = "Type: $type\nNote: $note\nCommentaire: $commentaire\n---\n";

    file_put_contents("feedback.txt", $entry, FILE_APPEND);

    echo "Merci pour votre retour !";
} else {
    echo "Méthode non autorisée.";
}
?>
