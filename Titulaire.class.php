<?php
    class Titulaire{
        private string $_nom;
        private string $_prénom;
        private string $_dateNaissance;
        private string $_ville;
        private $_comptesBancaires = [];

        public function __construct(string $nom, string $prénom, string $dateNaissance, string $ville){
            $this->_nom = $nom;
            $this->_prénom = $prénom;
            $this->_dateNaissance = $dateNaissance;
            $this->_ville = $ville;
        }

        public function getNom() : string{
            return $this->_nom;
        }
        public function setNom(string $nom){
            $this->_nom = $nom;
        }
        
        public function getPrénom() : string{
            return $this->_prénom;
        }
        public function setPrénom(string $prénom){
            $this->_prénom = $prénom;
        }

        public function getDateNaissance() : string{
            return $this->_dateNaissance;
        }
        public function setDateNaissance(string $dateNaissance){
            $this->_dateNaissance = $dateNaissance;
        }

        public function getVille() : string{
            return $this->_ville;
        }
        public function setVille(string $ville){
            $this->_ville = $ville;
        }

        public function getComptesBancaire(){
            return $this->_comptesBancaires;
        }
        public function setComptesBancaires(Compte $comptesBancaires){
            array_push($this->_comptesBancaires, $comptesBancaires);
        }

        public function calculAge(){
            $aujourdhui=new DateTime();
            $date = new DateTime($this->_dateNaissance);
            $diff=$aujourdhui->diff($date);
            return $diff->format("%Y");
        }

        public function détailTitulaire(){
            $result = "Le titulaire " . $this . ", âgé de " . $this->calculAge() . " ans et vivant à " . $this->_ville . " possède " . count($this->_comptesBancaires) . " comptes :<br>";
            for($i=0; $i<count($this->_comptesBancaires); $i++){
                $j = $i+1;
                $result .= "- Compte n°$j : " . $this->_comptesBancaires[$i]->getLibellé() . "<br>";
            }
            return $result;
        }

        public function __toString(){
            return $this->_nom . " " . $this->_prénom;
        }
    }
?>