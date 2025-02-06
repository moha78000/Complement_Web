<?php

echo "<h1> Produits </h1>";
echo "<style>

table , td ,tr {
border: 1px solid black;
border-collapse: collapse;
padding: 5px;
}
</style>";



$csv = "produits.csv";
$fp = fopen($csv, "r");
echo "<table>";
while ($res=fgetcsv($fp , 1024 , ", ")) {
    echo "<tr>";
    foreach ($res as $key=>$value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";


