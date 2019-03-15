<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:16
 */

class Skill extends Mysql
{
    private $id_skill;
    private $nom;

    public function __construct($id_skill, $nom)
    {
        $this->id_skill = $id_skill;
        $this->nom = $nom;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO user (nom) VALUES (:nom)");
        $variable->execute(array("nom" => $this->nom));
    }

    function update()
    {
        $variable = $this->base->prepare("UPDATE user SET nom = :nom WHERE id_skill = :id_skill");
        $variable->execute(array("nom" => $this->nom, "id_skill" => $this->id_skill));
    }

    function show()
    {
        echo "<tr>
                <td>$this->id_skill</td>
                <td>$this->nom</td>
                <td>
                    <i data-id = '$this->id_skill' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i data-id = '$this->id_skill' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function delete()
    {
        $variable = $this->base->prepare("DELETE FROM user WHERE id_skill = :id_skill");
        $variable->execute(array('id_skill'=> $this->id_skill));
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