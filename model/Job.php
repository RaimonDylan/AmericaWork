<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 09:46
 */

class Job extends Mysql
{
    private $id_job;
    private $typeContrat;
    private $dtDebut;
    private $dtFin;
    private $experience;

    public function __construct($id_job, $typeContrat, $dtDebut, $dtFin, $experience)
    {
        $this->id_job = $id_job;
        $this->typeContrat = $typeContrat;
        $this->dtDebut = $dtDebut;
        $this->dtFin = $dtFin;
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getIdJob()
    {
        return $this->id_job;
    }

    /**
     * @param mixed $id_job
     */
    public function setIdJob($id_job)
    {
        $this->id_job = $id_job;
    }

    /**
     * @return mixed
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * @param mixed $typeContrat
     */
    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;
    }

    /**
     * @return mixed
     */
    public function getDtDebut()
    {
        return $this->dtDebut;
    }

    /**
     * @param mixed $dtDebut
     */
    public function setDtDebut($dtDebut)
    {
        $this->dtDebut = $dtDebut;
    }

    /**
     * @return mixed
     */
    public function getDtFin()
    {
        return $this->dtFin;
    }

    /**
     * @param mixed $dtFin
     */
    public function setDtFin($dtFin)
    {
        $this->dtFin = $dtFin;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }
}