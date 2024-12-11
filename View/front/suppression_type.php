<?php
include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/TypeC.php';

try {
    $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = (int)$_GET['id'];

        $typeC = new TypeC($pdo);

        if ($typeC->supprimerType($id)) {

            header('Location: crud_tableType.php?success=1');
            exit;
        } else {
            echo "Erreur lors de la suppression du type.";
        }
    } else {
        echo "ID invalide ou manquant.";
    }
} catch (PDOException $e) {
    echo "Erreur PDO : " . $e->getMessage();
}
?>
