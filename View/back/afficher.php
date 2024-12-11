<?php
include 'D:/wamp64/www/Crud Tache_Cours/Controlleur/CoursC.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
    exit;
}

$coursC = new CoursC($pdo);
$idCours = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($idCours > 0) {
    $courseDetails = $coursC->afficher_data($idCours);

    if ($courseDetails) {
        echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du cours</title>
    <link rel="stylesheet" href="assets/css/styles.css">
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
        .form-container input, 
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            background: #f9f9f9;
        }
        .form-container textarea {
            resize: none;
            height: 80px;
        }
        .form-container input[readonly],
        .form-container textarea[readonly] {
            background-color: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Détails du cours</h2>
    <form>
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="' . htmlspecialchars($courseDetails['Titre']) . '" readonly>
        <label for="description">Description:</label>
        <textarea id="description" name="description" readonly>' . htmlspecialchars($courseDetails['Description']) . '</textarea>
        <label for="date_creation">Date de création:</label>
        <input type="text" id="date_creation" name="date_creation" value="' . htmlspecialchars($courseDetails['Date_Creation']) . '" readonly>
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" value="' . ($courseDetails['id_type'] == 1 ? 'Vidéo' : 'Document') . '" readonly>
    </form>
</div>
</body>
</html>';
    } else {
        echo '<p>Aucun cours trouvé pour l\'ID spécifié.</p>';
    }
} else {
    echo '<p>ID de cours invalide.</p>';
}
?>
