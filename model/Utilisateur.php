<?php
/**
 * Class Utilisateur
 *
 */

class Utilisateur
{
    private $nom;
    private $prenom;
    private $login;
    private $motDePasse;
    private $dateDeCreation;
    private $dtNaissance;
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
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
    public function getDtNaissance()
    {
        return $this->dtNaissance;
    }
    public function setDtNaissance($dtNaissance)
    {
        $date = DateTime::createFromFormat('d/m/Y', $dtNaissance);
        if ($date)
        {
            $this->dtNaissance = $dtNaissance;
        }else{
            $newDt = date('d/m/Y',strtotime($dtNaissance));
            $this->dtNaissance = $newDt;
        }
    }

    function __construct($id,$nom, $prenom, $login, $motDePasse,$dtNaissance)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->setMotDePasse($motDePasse);
        $this->setDtNaissance($dtNaissance);
        $this->dateDeCreation = date('d/m/y H:i:s');
    }

    function afficherInformation()
    {
        echo $this->nom."<br/>";
        echo $this->prenom."<br/>";
        echo $this->login."<br/>";
        echo $this->motDePasse."<br/>";
        echo $this->dateDeCreation."<br/>";
    }
}
