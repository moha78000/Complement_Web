<?php
class Produits {
    public $nom;
    public $origin;
    public $prix_HT;
    public $prix_TTC;
    public $tva_UE = 1.15;
    public $tva_hors_UE = 1.18;

    public function __construct($nom, $origin, $prix_HT) {
        $this->nom = $nom;
        $this->origin = $origin;
        $this->prix_HT = (float) $prix_HT;
        $this->calculTVA();
    }

    public function calculTVA() {
        if ($this->origin == "UE") {
            $this->prix_TTC = $this->prix_HT * $this->tva_UE;
        } else {
            $this->prix_TTC = $this->prix_HT * $this->tva_hors_UE;
        }
    }

    public function getTVA() {
        return $this->prix_TTC - $this->prix_HT;
    }
}
?>
