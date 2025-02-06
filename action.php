<?php

require_once("Classe/Utilisateur.php");

if (isset($_POST['login'] , $_POST['password'])) {
    $login = $_POST['login'];
    $mdp = $_POST['password'];


    if($login == "admin" && $mdp == "admin"){
        session_start();
        $user = new Utilisateur($login, $mdp);
        $_SESSION["user"] = serialize($user);
        header('Location: admin.php');
        exit(0);

    }
    else{
        header('Location: form.php');
    }


}
