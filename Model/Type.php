<?php
if (!class_exists('Type')) {
    class Type
    {
        private $ID;
        private $Type;
        private $URL;

        public function __construct($ID, $Type, $URL)
        {
            $this->ID = $ID;
            $this->Type = $Type;
            $this->URL = $URL;
        }

        public function getID()
        {
            return $this->ID;
        }

        public function getType()
        {
            return $this->Type;
        }

        public function getURL()
        {
            return $this->URL;
        }

        public function setID($ID)
        {
            $this->ID = $ID;
        }

        public function setType($Type)
        {
            $this->Type = $Type;
        }

        public function setURL($URL)
        {
            $this->URL = $URL;
        }
    }
}
?>