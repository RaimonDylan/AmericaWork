<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 14:15
 */

class Recruiter_company
{
    private $id_recruiter;
    private $id_company;

    public function __construct($id_recruiter, $id_company)
    {
        $this->id_recruiter = $id_recruiter;
        $this->id_company = $id_company;
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO recruiter_company (id_recruiter, id_company) VALUES (:id_recruiter, :id_company)");
        $variable->execute(array('id_recruiter' => $this->id_recruiter, 'id_company' => $this->id_company));
    }

    function show()
    {
        echo "<tr>
                <td>$this->id_recruiter</td>
                <td>$this->id_company</td>
                <td>
                   <i data-idc = '$this->id_recruiter' data-idd = '$this->id_company' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function deleteByRecruiter()
    {
        $variable = $this->base->prepare("DELETE FROM recruiter_company WHERE id_recruiter = :id_recruiter");
        $variable->execute(array('id_recruiter'=> $this->id_recruiter));
    }

    function deleteByCompany()
    {
        $variable = $this->base->prepare("DELETE FROM recruiter_company WHERE id_company = :id_company");
        $variable->execute(array('id_company'=> $this->id_company));
    }
}