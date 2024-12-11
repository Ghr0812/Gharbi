<?php

include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Model/Type.php';
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/TypeC.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
    exit;
}

$type = null;
$id = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $typeC = new TypeC($pdo);

    $type = $typeC->afficherType($id);

    if (!$type) {
        echo "Aucun type trouvé pour cet ID.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type_name = $_POST['type'];
    $url = $_POST['url'];

    $updatedType = new Type($id, $type_name, $url);

    if ($typeC->modifierType($updatedType)) {
        echo "Le type a été mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du type.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Type</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-container">
    <h2>Modifier un Type</h2>
    <form method="POST">
        <label for="id_type">Type:</label>
        <select name="type" id="id_type">
            <option value="1" <?= isset($type) && $type['id_type'] == 1 ? 'selected' : '' ?>>Vidéo</option>
            <option value="2" <?= isset($type) && $type['id_type'] == 2 ? 'selected' : '' ?>>Document</option>
        </select>

        <label for="url">URL:</label>
        <input type="text" id="url" name="url" value="<?= isset($type['URL']) ? htmlspecialchars($type['URL'], ENT_QUOTES, 'UTF-8') : '' ?>">

        <button type="submit">Modifier</button>
    </form>
</div>
</body>
</html>

