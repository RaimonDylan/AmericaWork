<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 09:33
 */

class Company extends Mysql
{
    private $id_company;
    private $name;
    private $addr;
    private $city;
    private $pc;
    private $nbEmploye;
    private $typeSector;

    public function __construct($id_company, $name, $addr, $city, $pc, $nbEmploye, $typeSector)
    {
        $this->id_company = $id_company;
        $this->name = $name;
        $this->addr = $addr;
        $this->city = $city;
        $this->setPc($pc);
        $this->setNbEmploye($nbEmploye);
        $this->typeSector = $typeSector;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO company (name,addr,city,pc,nbEmploye,typeSector) VALUES (:name, :addr, :city, :pc, :nbEmploye, :typeSector)");
        $variable->execute(array("name" => $this->name, "addr" => $this->addr, "city" => $this->city, "pc" => $this->pc, "nbEmploye" => $this->nbEmploye, "typeSector" => $this->typeSector));
    }

    function update()
    {
        $variable = $this->base->prepare("UPDATE company SET name = :name, addr = :addr, city = :city, pc = :pc, nbEmploye = :nbEmploye, typeSector = :typeSector WHERE id_company = :id_company");
        $variable->execute(array("login" => $this->login, "password" => $this->password, "dt_ins" => $this->dt_ins, "surname" => $this->surname, "name" => $this->name, "tel" => $this->tel, "mail" => $this->mail, "addr" => $this->addr, "city" => $this->city, "pc" => $this->pc, "id_user" => $this->id_user));
    }

    function show()
    {
        echo "<tr>
                <td>$this->id_company</td>
                <td>$this->name</td>
                <td>$this->addr</td>
                <td>$this->city</td>
                <td>$this->pc</td>
                <td>$this->nbEmploye</td>
                <td>$this->typeSector</td>
                <td>
                    <i data-id = '$this->id_company' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i data-id = '$this->id_company' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function delete()
    {
        $variable = $this->base->prepare("DELETE FROM company WHERE id_company = :id_company");
        $variable->execute(array('id_company'=> $this->id_company));
    }

    /**
     * @return mixed
     */
    public function getIdCompany()
    {
        return $this->id_company;
    }

    /**
     * @param mixed $id_company
     */
    public function setIdCompany($id_company)
    {
        $this->id_company = $id_company;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     * @param mixed $addr
     */
    public function setAddr($addr)
    {
        $this->addr = $addr;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * @param mixed $pc
     */
    public function setPc($pc)
    {
        $number = preg_match('@[0-9]@', $pc);

        if($number && strlen($pc) == 5)
        {
            $this->pc = $pc;
        }
    }

    /**
     * @return mixed
     */
    public function getNbEmploye()
    {
        return $this->nbEmploye;
    }

    /**
     * @param mixed $nbEmploye
     */
    public function setNbEmploye($nbEmploye)
    {
        $number = preg_match('@[0-9]@', $nbEmploye);

        if($number)
        {
            $this->nbEmploye = $nbEmploye;
        }
    }

    /**
     * @return mixed
     */
    public function getTypeSector()
    {
        return $this->typeSector;
    }

    /**
     * @param mixed $typeSector
     */
    public function setTypeSector($typeSector)
    {
        $this->typeSector = $typeSector;
    }
}