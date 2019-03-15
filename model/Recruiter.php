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
    private $user;

    /**
     * Recruiter constructor.
     * @param $id_recruiter
     */
    public function __construct($id_recruiter,$user)
    {
        $this->id_recruiter = $id_recruiter;
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
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