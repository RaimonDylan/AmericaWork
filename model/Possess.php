<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:25
 */

class Possess extends Mysql
{
    private $percentage;
    private $nbExpe;

    private $id_student;
    private $id_skill;

    public function __construct($percentage, $nbExpe)
    {
        $this->setPercentage($percentage);
        $this->nbExpe = $nbExpe;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO user (percentage) VALUES (:percentage)");
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
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage)
    {
        $number = preg_match('@[0-9]@', $percentage);

        if($number && $percentage <= 100 && $percentage >= 0)
        {
            $this->percentage = $percentage;
        }
    }

    /**
     * @return mixed
     */
    public function getNbExpe()
    {
        return $this->nbExpe;
    }

    /**
     * @param mixed $nbExpe
     */
    public function setNbExpe($nbExpe)
    {
        $this->nbExpe = $nbExpe;
    }


}