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

$coursC = new CoursC($pdo);

if (isset($_POST['addCours'])) {
    $titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $dateCreation = isset($_POST['date_creation']) ? trim($_POST['date_creation']) : '';
    $idType = isset($_POST['id_type']) ? trim($_POST['id_type']) : '';

    if (empty($titre) || empty($description) || empty($dateCreation) || empty($idType)) {
        echo "<p>Erreur: Tous les champs doivent être remplis.</p>";
    } else {
        try {
            $nouveauCours = new Cours($titre, $description, $dateCreation, $idType);
            $resultat = $coursC->ajouterCours($nouveauCours);

            if ($resultat) {
                echo "<p>Cours ajouté avec succès.</p>";
            } else {
                echo "<p>Erreur lors de l'ajout du cours.</p>";
            }
        } catch (Exception $e) {
            echo "<p>Erreur: " . $e->getMessage() . "</p>";
        }
    }
}

$coursList = $coursC->afficherCours();
?>
