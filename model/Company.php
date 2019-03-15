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