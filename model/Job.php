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

    private $id_recruiter;
    private $id_student;

    public function __construct($id_job, $typeContrat, $dtDebut, $dtFin, $experience, $id_recruiter, $id_student)
    {
        $this->id_job = $id_job;
        $this->typeContrat = $typeContrat;
        $this->dtDebut = $dtDebut;
        $this->dtFin = $dtFin;
        $this->experience = $experience;
        $this->id_recruiter = $id_recruiter;
        $this->id_student = $id_student;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO user (typeContrat,dtDebut,dtFin,experience,id_recruiter,id_student) VALUES (:typeContrat, :dtDebut, :dtFin, :experience, :id_recruiter, :id_student)");
        $variable->execute(array("typeContrat" => $this->typeContrat, "dtDebut" => $this->dtDebut, "dtFin" => $this->dtFin, "experience" => $this->experience, "id_recruiter" => $this->id_recruiter, "id_student" => $this->id_student));
    }

    function update()
    {
        $variable = $this->base->prepare("UPDATE user SET typeContrat = :typeContrat, dtDebut = :dtDebut, dtFin = :dtFin, experience = :experience WHERE id_job = :id_job");
        $variable->execute(array("typeContrat" => $this->typeContrat, "dtDebut" => $this->dtDebut, "dtFin" => $this->dtFin, "experience" => $this->experience));
    }

    function show()
    {
        echo "<tr>
                <td>$this->id_job</td>
                <td>$this->typeContrat</td>
                <td>$this->dtDebut</td>
                <td>$this->dtFin</td>
                <td>$this->experience</td>
                <td>
                    <i data-id = '$this->id_job' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i data-id = '$this->id_job' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function delete()
    {
        $variable = $this->base->prepare("DELETE FROM job WHERE id_job = :id_job");
        $variable->execute(array('id_job'=> $this->id_job));
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