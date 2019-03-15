<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:29
 */

class Student_job
{
    private $dtApply;

    private $id_job;
    private $id_student;

    public function __construct($dtApply)
    {
        $this->dtApply = $dtApply;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO student_job (dtApply, id_job, id_student) VALUES (:dtApply, :id_job, :id_student)");
        $variable->execute(array('dtApply' => $this->dtApply, 'id_job' => $this->id_job, 'id_student' => $this->id_student));
    }

    function show()
    {
        echo "<tr>
                <td>$this->dtApply</td>
                <td>$this->id_job</td>
                <td>$this->id_student</td>
                <td>
                   <i data-idj = '$this->id_job' data-ids = '$this->id_student' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function deleteByJob()
    {
        $variable = $this->base->prepare("DELETE FROM student_job WHERE id_job = :id_job");
        $variable->execute(array('id_job'=> $this->id_job));
    }

    function deleteByStudent()
    {
        $variable = $this->base->prepare("DELETE FROM student_job WHERE id_student = :id_student");
        $variable->execute(array('id_student'=> $this->id_student));
    }

    /**
     * @return mixed
     */
    public function getDtApply()
    {
        return $this->dtApply;
    }

    /**
     * @param mixed $dtApply
     */
    public function setDtApply($dtApply)
    {
        $this->dtApply = $dtApply;
    }
}