<?php
include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Model/Cours.php';
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/CoursC.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $coursC = new CoursC($pdo);
    $cours = $coursC->afficher_data($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_creation = $_POST['date_creation'];
    $id_type = $_POST['id_type'];

    $cours = new Cours($titre, $description, $date_creation, $id_type);
    $cours->setID($id);

    if ($coursC->modifierCours($cours)) {
        echo "Le cours a été mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du cours.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Cours</title>
    <link rel="stylesheet" href="style.css">
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
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        .form-container input, 
        .form-container textarea, 
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            font-size: 16px;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Modifier le Cours</h2>
        <form method="POST">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($cours['Titre']) ?>">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" ><?= htmlspecialchars($cours['Description']) ?></textarea>
            
            <label for="date_creation">Date de création:</label>
            <input type="date" id="date_creation" name="date_creation" value="<?= htmlspecialchars($cours['Date_Creation']) ?>" >
            
            <label for="id_type">Type:</label>
            <select name="id_type" id="id_type" >
                <option value="1" <?= $cours['id_type'] == 1 ? 'selected' : '' ?>>Vidéo</option>
                <option value="2" <?= $cours['id_type'] == 2 ? 'selected' : '' ?>>Document</option>
            </select>

            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>