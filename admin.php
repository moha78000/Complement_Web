<?php
session_start();
require_once("Classe/Utilisateur.php");
if(isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
    echo "<h1> Bonjour {$user->login}  </h1>";
}
