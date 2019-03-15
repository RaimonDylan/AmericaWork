<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:17
 */

class School extends Mysql
{
    private $id_school;
    private $libelle;
    
    public function __construct($id_school, $libelle)
    {
        $this->id_school = $id_school;
        $this->libelle = $libelle;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO user (libelle) VALUES (:libelle)");
        $variable->execute(array("libelle" => $this->libelle));
    }

    function update()
    {
        $variable = $this->base->prepare("UPDATE user SET libelle = :libelle WHERE id_school = :id_school");
        $variable->execute(array("libelle" => $this->libelle, "id_school" => $this->id_school));
    }

    function show()
    {
        echo "<tr>
                <td>$this->id_school</td>
                <td>$this->libelle</td>
                <td>
                    <i data-id = '$this->id_school' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i data-id = '$this->id_school' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function delete()
    {
        $variable = $this->base->prepare("DELETE FROM user WHERE id_school = :id_school");
        $variable->execute(array('id_school'=> $this->id_school));
    }

    /**
     * @return mixed
     */
    public function getIdSchool()
    {
        return $this->id_school;
    }

    /**
     * @param mixed $id_skill
     */
    public function setIdSchool($id_school)
    {
        $this->id_school = $id_school;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->nom = $libelle;
    }
}