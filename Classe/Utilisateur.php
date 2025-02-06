<?php


class Utilisateur {
    public $login;

    public $mdp;

    public $timestamp;

    public function __construct($login, $mdp) {
        $this->login = $login;
        $this->mdp = md5($mdp);
        $this-> timestamp = time();
    }
    public  function __destruct(){
        echo "<p> Suppression de $this->login</p>";
    }

    public function miseEnformeTimestamp(){
        setLocale(LC_TIME, 'fr_FR.UTF-8');
        $format = date('d-m-Y H:i:s');
        return(strftime($format, $this->timestamp));
    }

    public function information(){
        $dateCreation = $this->miseEnformeTimestamp();
        return("$this->login , $this->mdp , $dateCreation");
    }

    public function __sleep(){
        echo "dodo";
        return(array('login', 'mdp' , 'timestamp'));

    }

    public function __wakeup(){
        echo "réveil";
    }

    /**
 * @return mixed
 */
public function getLogin()
{
    return $this->login;
}/**
 * @param mixed $login
 */
public function setLogin($login)
{
    $this->login = $login;
}




}