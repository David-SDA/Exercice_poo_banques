<?php
    class Titulaire{
        private string $_nom;
        private string $_prénom;
        private DateTime $_dateNaissance;
        private string $_ville;
        private array $_comptesBancaires = [];

        /* Méthode __construct de la classe */
        public function __construct(string $nom, string $prénom, string $dateNaissance, string $ville){
            $this->_nom = $nom;
            $this->_prénom = $prénom;
            $this->_dateNaissance = new DateTime($dateNaissance);
            $this->_ville = $ville;
        }

        /* Getter et Setter du nom */
        public function getNom() : string{
            return $this->_nom;
        }
        public function setNom(string $nom){
            $this->_nom = $nom;
        }
        
        /* Getter et Setter du prénom */
        public function getPrénom() : string{
            return $this->_prénom;
        }
        public function setPrénom(string $prénom){
            $this->_prénom = $prénom;
        }

        /* Getter et Setter de la date de naissance */
        public function getDateNaissance() : DateTime{
            return $this->_dateNaissance;
        }
        public function setDateNaissance(string $dateNaissance){
            $this->_dateNaissance = new DateTime($dateNaissance);
        }

        /* Getter et Setter de la ville */
        public function getVille() : string{
            return $this->_ville;
        }
        public function setVille(string $ville){
            $this->_ville = $ville;
        }

        /* Getter et Setter des comptes bancaires */
        public function getComptesBancaires(){
            return $this->_comptesBancaires;
        }
        public function setComptesBancaires(Compte $comptesBancaires){
            array_push($this->_comptesBancaires, $comptesBancaires);
        }

        /* Méthode qui calcul l'âge du titulaire */
        public function calculAge(){
            $aujourdhui=new DateTime();
            $diff=$aujourdhui->diff($this->_dateNaissance);
            return $diff->format("%Y");
        }

        /* Méthode qui retourne les détails du titulaire */
        public function détailTitulaire(){
            $result = "Le titulaire " . $this . ", âgé de " . $this->calculAge() . " ans et vivant à " . $this->_ville . " possède " . count($this->_comptesBancaires) . " comptes :<br>";
            for($i=0; $i<count($this->_comptesBancaires); $i++){
                $j = $i+1;
                $result .= "- Compte n°$j : " . $this->_comptesBancaires[$i]->getLibellé() . "<br>";
            }
            return $result;
        }

        /* Méthode __toString de la classe */
        public function __toString(){
            return $this->_nom . " " . $this->_prénom;
        }
    }
?>