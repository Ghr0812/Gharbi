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

$typeC = new TypeC($pdo);

if (isset($_POST['addType'])) {
    $type = isset($_POST['type']) ? trim($_POST['type']) : '';
    $url = isset($_POST['URL']) ? trim($_POST['URL']) : '';

    if (empty($type) || empty($url)) {
        echo "<p>Erreur: Tous les champs doivent être remplis.</p>";
    } else {
        try {
            $id = null;
            $nouveauType = new Type($id, $type, $url);
            $resultat = $typeC->ajouterType($nouveauType);

            if ($resultat) {
                echo "<p>Type ajouté avec succès.</p>";
            } else {
                echo "<p>Erreur lors de l'ajout du type.</p>";
            }
        } catch (Exception $e) {
            echo "<p>Erreur: " . $e->getMessage() . "</p>";
        }
    }
}


$TypeList = $typeC->afficherTypes();
?>
