<?php
if (!class_exists('Cours')) {
    class Cours {
        private $ID;
        private $Titre;
        private $Description;
        private $Date_Creation;
        private $ID_Type;

        public function __construct($titre, $description, $date_creation, $id_type) {
            $this->Titre = $titre;
            $this->Description = $description;
            $this->Date_Creation = $date_creation;
            $this->ID_Type = $id_type;
        }

        public function getTitre() {
            return $this->Titre;
        }

        public function getDescription() {
            return $this->Description;
        }

        public function getDateCreation() {
            return $this->Date_Creation;
        }

        public function getIDEnseignant() {
            return $this->ID_Type;
        }

        public function setID($id) {
            $this->ID = $id;
        }

        public function getID() {
            return $this->ID;
        }
    }
}
?>
