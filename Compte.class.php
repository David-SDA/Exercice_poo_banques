<?php  
    class Compte{
        private string $_libellé;
        private int $_solde;
        private string $_deviseMonétaire;
        private Titulaire $_titulaire;

        public  function __construct(string $libellé, int $solde, string $deviseMonétaire, Titulaire $titulaire){
            $this->_libellé = $libellé;
            $this->_solde = $solde;
            $this->_deviseMonétaire = $deviseMonétaire;
            $this->_titulaire = $titulaire;
            $this->_titulaire->setComptesBancaires($this);
        }

        public function getLibellé() : string{
            return $this->_libellé;
        }
        public function setLibellé(string $libellé){
            $this->_libellé = $libellé;
        }

        public function getSolde() : string{
            return $this->_solde;
        }
        public function setSolde(int $solde){
            $this->_solde = $solde;
        }

        public function getDeviseMonétaire() : string{
            return $this->_deviseMonétaire;
        }
        public function setDeviseMonétaire(string $deviseMonétaire){
            $this->_deviseMonétaire = $deviseMonétaire;
        }

        public function getTitulaire() : Titulaire{
            return  $this->_titulaire;
        }
        public function setTitulaire(Titulaire $titulaire){
            $this->_titulaire = $titulaire;
        }

        public function créditer(int $somme){
            $this->_solde += $somme;
            /*
            echo "Vous avez créditer le compte " . $this->getLibellé() . " de " . $this->getTitulaire()->identité() . " de $somme " . $this->getDeviseMonétaire() . ", il contient maintenant : " . $this->getSolde() . " " . $this->getDeviseMonétaire() . "<br>";
            if($this->getSolde() < 0){
                echo "Attention ! Le solde de ce compte est négatif !<br>";
            }
            */
        }

        public function débiter(int $somme){
            $this->_solde -= $somme;
            /*
            echo "Vous avez débiter ce compte " . $this->_libellé . " de " . $this->_titulaire->identité() . " de $somme " . $this->getDeviseMonétaire() . ", il contient maintenant : " . $this->getSolde() . " " . $this->getDeviseMonétaire() . "<br>";
            if($this->getSolde() < 0){
                echo "Attention ! Le solde de ce compte est négatif !<br>";
            }
            */
        }

        public function virement(Compte $versCompte, int $somme){
            if($this->getSolde() < $somme){
                echo "Impossible, la somme du virement est supérieur au solde du compte \"" . $this->getLibellé() . "\" appartenant à " . $this->getTitulaire()->identité() . ".<br>";
            }
            else{
                $this->débiter($somme);
                $versCompte->créditer($somme);
                echo "Vous avez effectuer un virement de $somme depuis le compte \"" . $this->getLibellé() . "\" appartenant à " . $this->getTitulaire()->identité() . " vers le compte \"" . $versCompte->getLibellé() . "\" appartenant à " . $versCompte->getTitulaire()->identité() . ".<br>";
            }
            

        }

        public function __toString(){
            return "Voici les informations de ce compte bancaire : <br>
                        - Libellé : $this->_libellé<br>
                        - Solde : $this->_solde $this->_deviseMonétaire<br>
                        - Titulaire : " . $this->_titulaire->identité() . "<br>";
        }
    }
?>