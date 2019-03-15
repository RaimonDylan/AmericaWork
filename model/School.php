<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:17
 */

class School
{
    private $id_skill;
    private $nom;
    
    public function __construct($id_skill, $nom)
    {
        $this->id_skill = $id_skill;
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getIdSkill()
    {
        return $this->id_skill;
    }

    /**
     * @param mixed $id_skill
     */
    public function setIdSkill($id_skill)
    {
        $this->id_skill = $id_skill;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}