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
        $uppercase = preg_match('@[A-Z]@', $motDePasse);
        $number = preg_match('@[0-9]@', $motDePasse);
        $letter = preg_match('@[a-z]@', $motDePasse);
        if($uppercase && $number && $letter)
        {
            $this->motDePasse = $motDePasse;
        }
    }
    public function getDateDeCreation()
    {
        return $this->dateDeCreation;
    }

    function __construct($login, $motDePasse)
    {
        $this->login = $login;
        $this->setMotDePasse($motDePasse);
        $this->dateDeCreation = date('d/m/y H:i:s');
    }

    public function verifyLogin($login,$password){
        return ($login == $this->login && $password == $this->motDePasse);
    }
}