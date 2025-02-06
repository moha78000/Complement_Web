<?php

echo "<h1> Produits </h1>";
echo "<style>

* {
font-family: sans-serif;
}


table , td ,tr {
border: 1px solid black;
border-collapse: collapse;
padding: 5px;
}
</style>";



$file = "produits.csv";
$fp = fopen($file , "r");
echo "<table>";
while ($res=fgetcsv($fp , 1024 , ",")) {
    echo "<tr>";
    foreach ($res as $val ) {
        echo "<td>.$val</td>";
    }
    echo "</tr>";
}
echo "</table>";

$produit = new Produits(res[0] , res[1] , res[2] );


