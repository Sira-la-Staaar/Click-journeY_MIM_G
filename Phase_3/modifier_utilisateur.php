<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location:PageAdmin.php');
    exit;
}

$id     = $_POST['id']     ?? null;
$action = $_POST['action'] ?? '';

if (!$id || !in_array($action, ['Mettre Admin', 'Bannir'], true)) {
    header('Location: PageAdmin.php');
    exit;
}

$path = 'Data/utilisateurs.json';
$data = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

foreach ($data as $key => &$u) {
    if (isset($u['id']) && $u['id'] == $id) {
        if ($action === 'Mettre Admin') {
            $u['role'] = 'A';
        } else {                    // Bannir
            unset($data[$key]);
        }
        break;
    }
}
unset($u);

file_put_contents($path, json_encode(array_values($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header('Location: PageAdmin.php');
exit;
?>
