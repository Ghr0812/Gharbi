<?php
include 'D:/wamp64/www/Crud Tache_Cours/config.php';
include 'D:/wamp64/www/Crud Tache_Cours/Model/Cours.php';
include 'D:/wamp64/www/Crud Tache_Cours/Controlleur/CoursC.php';

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

    if ($coursC->supprimerCours($id)) {
        echo "Le cours a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du cours.";
    }
}

exit();

?>
