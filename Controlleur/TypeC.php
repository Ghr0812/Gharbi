<?php

include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Model/Type.php';

class TypeC
{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterType(Type $type) {
        try {
            if (empty($type->getType()) || empty($type->getURL())) {
                echo("Tous les champs doivent être remplis.");
            }

            $sql = "INSERT INTO type (Type, URL) VALUES (:type, :url)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':type', $type->getType());
            $stmt->bindValue(':url', $type->getURL());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }

    public function afficherTypes() {
        try {
            $sql = "SELECT * FROM type";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return [];
        }
    }

    public function afficherType($ID) {
        try {
            $sql = "SELECT * FROM type WHERE id_type = :ID";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':ID', $ID);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return null;
        }
    }

    public function modifierType(Type $type) {
        try {
            if (empty($type->getType()) || empty($type->getURL())) {
                echo("Tous les champs doivent être remplis.");
            }

            $sql = "UPDATE type SET Type = :type, URL = :url WHERE id_type = :ID";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':type', $type->getType());
            $stmt->bindValue(':url', $type->getURL());
            $stmt->bindValue(':ID', $type->getID());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }

    public function supprimerType($ID) {
        try {
            $sql = "DELETE FROM type WHERE id_type = :ID";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':ID', $ID);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        }
    }

    public function trierTypes($critere, $ordre = 'ASC') {
        $colonnesValides = ['id_type', 'type', 'url'];
        if (!in_array($critere, $colonnesValides)) {
            throw new Exception("Critère de tri non valide.");
        }
    
        $ordre = strtoupper($ordre) === 'DESC' ? 'DESC' : 'ASC';
    
        $sql = "SELECT * FROM type ORDER BY $critere $ordre";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function rechercherTypes($motCle) {
        $sql = "SELECT * FROM type WHERE type LIKE :motCle OR url LIKE :motCle";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':motCle', '%' . $motCle . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function afficherTypesAvecPagination($page, $limit) {
        $offset = ($page - 1) * $limit;
        $stmt = $this->pdo->prepare("SELECT * FROM type ORDER BY type ASC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function compterTotalTypes() {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM type");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
}
?>