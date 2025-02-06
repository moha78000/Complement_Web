<?php


class Produits {
    public $nom;

    public $origin;

    public $prix_HT;

    public $prix_TTC;

    public $tva_UE = 0.15;

    public $tva_hors_UE = 0.18;

    public function __construct($nom, $origin , $prix) {
        $this->nom = $nom;
        $this->origin = $origin;
        $this-> prix_HT = $prix;
    }


    public function information(){
        return("$this->nom , $this->origin , $this->prix_HT");
    }


    public function getprix_HT()
    {
        return $this->prix_HT;
    }/**
 * @param mixed prix
 */



    public function getOrigine(){
        return $this->origin;
    }

    public function calculTVA(){
        if ($this->origin == "UE"){
            ($this->prixTTC = $this->prix_HT * $this->tva_UE)*100;
        }

        else {
            ($this->prixTTC = $this->prix_HT * $this->tva_hors_UE)*100;

        }


    }






}