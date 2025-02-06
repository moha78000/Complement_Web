<?php

require_once("Classe\Utilisateur.php");
$user = new Utilisateur("prof", "prof");

echo "<p>$user->login</p>";

echo "<p>$user->mdp</p>";

echo "<p>".$user->information();


echo "<p>".$user->getLogin();

$user->setLogin("prof2");


echo "<p>$user->login</p>";