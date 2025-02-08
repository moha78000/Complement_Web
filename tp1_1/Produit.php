<?php

class Produit {
    public $nom;
    public $origine;
    public $prix_unitaire;

    public function __construct($nom, $origine, $prix_unitaire) {
        $this->nom = $nom;
        $this->origine = $origine;
        $this->prix_unitaire = (float) $prix_unitaire; // Conversion en float
    }
}