<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:24
 */

class Recruiter extends Mysql
{
    private $id_recruiter;

    /**
     * Recruiter constructor.
     * @param $id_recruiter
     */
    public function __construct($id_recruiter)
    {
        $this->id_recruiter = $id_recruiter;
    }

    /**
     * @return mixed
     */
    public function getIdRecruiter()
    {
        return $this->id_recruiter;
    }

    /**
     * @param mixed $id_recruiter
     */
    public function setIdRecruiter($id_recruiter)
    {
        $this->id_recruiter = $id_recruiter;
    }


}