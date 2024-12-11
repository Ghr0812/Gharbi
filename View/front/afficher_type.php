<?php
include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/TypeC.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = (int)$_GET['id'];

        $typeC = new TypeC($pdo);

        $type = $typeC->afficherType($id);

        if (!$type) {
            $error_message = "Type introuvable.";
        }
    } else {
        $error_message = "ID invalide ou manquant.";
    }
} catch (PDOException $e) {
    $error_message = "Erreur PDO : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Type</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background: #f9f9f9;
        }
        .form-container input[readonly] {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }
        .form-container .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }
        .form-container .btn:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="form-container">
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?= htmlspecialchars($error_message) ?></p>
    <?php else: ?>
        <h2>Détails du Type</h2>
        <form>
            <label for="type">Type :</label>
            <input type="text" id="type" name="type" 
                   value="<?= htmlspecialchars($type['type'] ?? 'Donnée manquante') ?>" readonly>

            <label for="url">URL :</label>
            <input type="text" id="url" name="url" 
                   value="<?= htmlspecialchars($type['url'] ?? 'Donnée manquante') ?>" readonly>

            <a href="index.php" class="btn">Retour à la liste</a>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
