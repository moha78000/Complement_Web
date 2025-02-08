<?php

// Fichier JSON à lire
$JSON_file = 'data.json';

// Lire et décoder le fichier JSON en tableau associatif
$read = json_decode(file_get_contents($JSON_file), true); // true pour tableau associatif

// Vérifier que les catégories existent
if (isset($read['fruits'])) {
    // Créer le fichier CSV pour les fruits
    $fruit_file = fopen('fruits.csv', 'w');
    fputcsv($fruit_file, ["Nom", "Origine", "Prix Unitaire"]);

    foreach ($read['fruits'] as $fruit) {
        // Écrire les informations sur chaque fruit dans le fichier CSV
        fputcsv($fruit_file, [
            $fruit['nom'],
            $fruit['origine'],
            $fruit['prix_unitaire'] . "€"
        ]);
    }

    fclose($fruit_file);
    echo "Les fruits ont été enregistrés dans fruits.csv.<br>";
}

if (isset($read['legumes'])) {
    // Créer le fichier CSV pour les légumes
    $legume_file = fopen('legumes.csv', 'w');
    fputcsv($legume_file, ["Nom", "Origine", "Prix Unitaire"]);

    foreach ($read['legumes'] as $legume) {
        // Écrire les informations sur chaque légume dans le fichier CSV
        fputcsv($legume_file, [
            $legume['nom'],
            $legume['origine'],
            $legume['prix_unitaire'] . "€"
        ]);
    }

    fclose($legume_file);
    echo "Les légumes ont été enregistrés dans legumes.csv.<br>";
}

if (isset($read['fleurs'])) {
    // Créer le fichier CSV pour les fleurs
    $fleur_file = fopen('fleurs.csv', 'w');
    fputcsv($fleur_file, ["Nom", "Origine", "Prix Unitaire"]);

    foreach ($read['fleurs'] as $fleur) {
        // Écrire les informations sur chaque fleur dans le fichier CSV
        fputcsv($fleur_file, [
            $fleur['nom'],
            $fleur['origine'],
            $fleur['prix_unitaire'] . "€"
        ]);
    }

    fclose($fleur_file);
    echo "Les fleurs ont été enregistrées dans fleurs.csv.<br>";
}

?>
