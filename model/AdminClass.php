<?php
/**
 * Class Admin
 *
 */
class AdminClass
{
    private $login;
    private $motDePasse;
    private $dateDeCreation;

    public function getLogin()
    {
        return $this->login;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }
    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    function __construct($login, $motDePasse)
    {
        $this->login = $login;
        $this->setMotDePasse($motDePasse);
    }

    public function verifyLogin($login,$password){
        return ($login == $this->login && password_verify($password ,$this->motDePasse));
    }
}