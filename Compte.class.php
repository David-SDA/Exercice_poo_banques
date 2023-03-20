<?php  
    class Compte{
        private string $_libellé;
        private float $_solde;
        private string $_deviseMonétaire;
        private Titulaire $_titulaire;

        /* Fonction __construct de la classe */
        public  function __construct(string $libellé, float $solde, string $deviseMonétaire, Titulaire $titulaire){
            $this->_libellé = $libellé;
            $this->_solde = $solde;
            $this->_deviseMonétaire = $deviseMonétaire;
            $this->_titulaire = $titulaire;
            $this->_titulaire->setComptesBancaires($this);
        }
        
        /* Getter et Setter du libellé */
        public function getLibellé() : string{
            return $this->_libellé;
        }
        public function setLibellé(string $libellé){
            $this->_libellé = $libellé;
        }

        /* Getter et Setter du solde */
        public function getSolde() : string{
            return $this->_solde;
        }
        public function setSolde(int $solde){
            $this->_solde = $solde;
        }

        /* Getter et Setter de la devise monétaire */
        public function getDeviseMonétaire() : string{
            return $this->_deviseMonétaire;
        }
        public function setDeviseMonétaire(string $deviseMonétaire){
            $this->_deviseMonétaire = $deviseMonétaire;
        }

        /* Getter et Setter du titulaire */
        public function getTitulaire() : Titulaire{
            return  $this->_titulaire;
        }
        public function setTitulaire(Titulaire $titulaire){
            $this->_titulaire = $titulaire;
        }

        /* Méthode qui sert à créditer un compte */
        public function créditer(float $somme){
            $this->_solde += $somme;
            /*
            echo "Vous avez créditer le compte " . $this->getLibellé() . " de " . $this . " de $somme " . $this->getDeviseMonétaire() . ", il contient maintenant : " . $this->getSolde() . " " . $this->getDeviseMonétaire() . "<br>";
            if($this->getSolde() < 0){
                echo "Attention ! Le solde de ce compte est négatif !<br>";
            }
            */
        }

        /* Méthode qui sert à débiter un compte */
        public function débiter(float $somme){
            $this->_solde -= $somme;
            /*
            echo "Vous avez débiter ce compte " . $this->_libellé . " de " . $this . " de $somme " . $this->getDeviseMonétaire() . ", il contient maintenant : " . $this->getSolde() . " " . $this->getDeviseMonétaire() . "<br>";
            if($this->getSolde() < 0){
                echo "Attention ! Le solde de ce compte est négatif !<br>";
            }
            */
        }

        /* Méthode qui sert à faire un virement de ce compte vers un autre */
        public function virement(Compte $versCompte, float $somme){
            if($this->getSolde() < $somme){
                echo "Impossible, la somme du virement est supérieur au solde du compte \"" . $this->getLibellé() . "\" appartenant à " . $this->getTitulaire() . ".<br>";
            }
            else{
                $this->débiter($somme);
                $versCompte->créditer($somme);
                echo "Vous avez effectuer un virement de $somme depuis le compte \"" . $this->getLibellé() . "\" appartenant à " . $this->getTitulaire() . " vers le compte \"" . $versCompte->getLibellé() . "\" appartenant à " . $versCompte->getTitulaire() . ".<br>";
            }
        }

        /* Méthode qui sert à retourner les détails du compte */
        public function détailCompte(){
            return "Voici les informations de ce compte bancaire : <br>
                        - Libellé : $this->_libellé<br>
                        - Solde : $this->_solde $this->_deviseMonétaire<br>
                        - Titulaire : " . $this->getTitulaire() . "<br>";
        }

        /* Méthode __toString de la classe */
        public function __toString(){
            return $this->_libellé;
        }
    }
?>