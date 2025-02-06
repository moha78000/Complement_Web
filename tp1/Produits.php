<?php


class Produits {
    public $nom;

    public $origin;

    public $prix;

    public $tva_UE = 0.15;

    public $tva_hors_UE = 0.18;

    public function __construct($nom, $origin , $prix) {
        $this->nom = $nom;
        $this->origin = $origin;
        $this-> prix = $prix;
    }


    public function information(){
        return("$this->nom , $this->origin , $this->prix");
    }


    public function getprix_HT()
    {
        return $this->prix;
    }/**
 * @param mixed prix
 */



    public function getOrigine(){
        return $this->origin;
    }

    public function prixHT






}