<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:29
 */

class Apply
{
    private $dtApply;

    public function __construct($dtApply)
    {
        $this->dtApply = $dtApply;
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