<?php

$xml_file = 'commerce.xml';

$xml = simplexml_load_file($xml_file);

// boucle à  travers chaque noeud
echo "<table>";

foreach ($xml->children() as $categorie => $elements) {
    foreach ($elements->children() as $produit) {
        echo "<tr>";
        echo "<td>" . ucfirst($categorie) . "</td>"; // Met la catégorie en majuscule (Fruits, Légumes, Fleurs)
        echo "<td>" . htmlspecialchars((string)$produit->nom) . "</td>";
        echo "<td>" . htmlspecialchars((string)$produit->origine) . "</td>";
        echo "<td>" . number_format((float)$produit->prix_unitaire, 2, ',', ' ') . " €</td>";
        echo "</tr>";
    }
}

echo "</table>";
?>
