<?php
require_once 'Produit.php';
// Charger le fichier XML
$xml_file = 'commerce.xml';
$read = simplexml_load_file($xml_file) or die("Erreur : Impossible de charger le fichier XML.");

// Fonction pour écrire les données dans un fichier CSV
function ecrireCSV($nom_fichier, $produits) {
    $fichier = fopen($nom_fichier, "w"); // Ouvrir le fichier en écriture
    fputcsv($fichier, ["Nom", "Origine", "Prix Unitaire (€)"]); // Écrire l'entête

    foreach ($produits as $produit) {
        fputcsv($fichier, [
            $produit->nom,
            $produit->origine,
            number_format($produit->prix_unitaire, 2, ',', ' ') // Prix formaté
        ]);
    }

    fclose($fichier); // Fermer le fichier
}



// Initialiser les tableaux pour stocker les produits
$fruits = [];
$legumes = [];
$fleurs = [];

// Lire les fruits
foreach ($read->fruits->fruit as $fruit) {
    $fruits[] = new Produit((string) $fruit->nom, (string) $fruit->origine, (float) $fruit->prix_unitaire);
}

// Lire les légumes
foreach ($read->legumes->legume as $legume) {
    $legumes[] = new Produit((string) $legume->nom, (string) $legume->origine, (float) $legume->prix_unitaire);
}

// Lire les fleurs
foreach ($read->fleurs->fleur as $fleur) {
    $fleurs[] = new Produit((string) $fleur->nom, (string) $fleur->origine, (float) $fleur->prix_unitaire);
}

// Écrire les données dans leurs fichiers respectifs
ecrireCSV("fruits.csv", $fruits);
ecrireCSV("legumes.csv", $legumes);
ecrireCSV("fleurs.csv", $fleurs);

echo "Les fichiers CSV ont été générés avec succès !";

?>
