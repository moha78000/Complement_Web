<?php

require_once "Produits.php";

echo "<h1> Produits </h1>";
echo "<style>
* { font-family: sans-serif; }
table, td, tr { border: 1px solid black; border-collapse: collapse; padding: 5px; }
</style>";

$file = "produits.csv";
$file_output = "resultats_tva.csv";

// Ouvrir les fichiers en lecture et écriture
$fp = fopen($file, "r");
$output = fopen($file_output, "w");

// Écrire les en-têtes dans le fichier CSV
fputcsv($output, ["Nom", "Origine", "Prix HT", "TVA sur 100 unités", "Prix TTC total (100 unités)"]);

echo "<table>";

// Lire ligne par ligne
while ($res = fgetcsv($fp, 1024, ",")) {
    // Ignorer l'en-tête du fichier CSV
    if ($res[0] == "Nom") continue;

    // Création de l'objet Produit
    $produit = new Produits($res[0], $res[1], $res[2]);

    // Calcul TVA sur 100 unités
    $tva_items = $produit->getTVA() * 100;
    $prix_ttc_total = $produit->prix_TTC * 100;

    // Affichage HTML
    echo "<tr>
            <td>{$produit->nom}</td>
            <td>{$produit->origin}</td>
            <td>" . number_format($produit->prix_HT, 2, ',', ' ') . " €</td>
            <td>" . number_format($tva_items, 2, ',', ' ') . " €</td>
            <td>" . number_format($prix_ttc_total, 2, ',', ' ') . " €</td>
          </tr>";

    // Écriture dans le fichier CSV
    fputcsv($output, [
        $produit->nom,
        $produit->origin,
        number_format($produit->prix_HT, 2, ',', ' ') . " €",
        number_format($tva_items, 2, ',', ' ') . " €",
        number_format($prix_ttc_total, 2, ',', ' ') . " €"
    ]);
}

echo "</table>";

// Fermer les fichiers
fclose($fp);
fclose($output);

?>
