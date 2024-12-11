<?php
include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Model/Cours.php';

class CoursC {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterCours(Cours $cours) {
        try {
            if (empty($cours->getTitre()) || empty($cours->getDescription()) || empty($cours->getDateCreation()) || empty($cours->getIDEnseignant())) {
                echo("Tous les champs doivent être remplis.");
            }

            $sql = "INSERT INTO cours (Titre, Description, Date_Creation, id_type) 
                    VALUES (:titre, :description, :date_creation, :id_type)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':titre', $cours->getTitre());
            $stmt->bindValue(':description', $cours->getDescription());
            $stmt->bindValue(':date_creation', $cours->getDateCreation());
            $stmt->bindValue(':id_type', $cours->getIDEnseignant());

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }
    
    
    

    public function afficherCours() {
        try {
            $sql = "SELECT * FROM cours";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return [];
        }
    }

    public function afficher_data($id) {
        try {
            $sql = "SELECT * FROM cours WHERE id_cours = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return null;
        }
    }

    public function modifierCours(Cours $cours) {
        try {
            if (empty($cours->getTitre()) || empty($cours->getDescription()) || empty($cours->getDateCreation()) || empty($cours->getIDEnseignant())) {
                echo("Tous les champs doivent être remplis.");
            }

            $sql = "UPDATE cours SET Titre = :titre, Description = :description, 
                    Date_Creation = :date_creation, id_type = :id_type 
                    WHERE id_cours = :id";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':titre', $cours->getTitre());
            $stmt->bindValue(':description', $cours->getDescription());
            $stmt->bindValue(':date_creation', $cours->getDateCreation());
            $stmt->bindValue(':id_type', $cours->getIDEnseignant());
            $stmt->bindValue(':id', $cours->getID());

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }

    public function supprimerCours($id) {
        try {
            $sql = "DELETE FROM cours WHERE id_cours = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
            return false;
        }
    }

    public function trierCours($critere, $ordre = 'ASC') {
        $colonnesValides = ['Titre', 'Date_Creation', 'id_type'];
        if (!in_array($critere, $colonnesValides)) {
            throw new Exception("Critère de tri non valide.");
        }

        $ordre = strtoupper($ordre) === 'DESC' ? 'DESC' : 'ASC';

        $sql = "SELECT * FROM cours ORDER BY $critere $ordre";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rechercherCours($motCle) {
        $sql = "SELECT * FROM cours WHERE Titre LIKE :motCle OR Description LIKE :motCle";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':motCle', '%' . $motCle . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function afficherCoursAvecPagination($page, $limit) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM cours ORDER BY Date_Creation DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function compterTotalCours()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) AS total FROM cours");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
?>
