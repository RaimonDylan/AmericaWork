<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:10
 */

class Experience
{
    private $id_experience;
    private $nameCompagny;
    private $dtStart;
    private $dtEnd;
    private $title;
    private $description;

    public function __construct($id_experience, $nameCompagny, $dtStart, $dtEnd, $title, $description)
    {
        $this->id_experience = $id_experience;
        $this->nameCompagny = $nameCompagny;
        $this->dtStart = $dtStart;
        $this->dtEnd = $dtEnd;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIdExperience()
    {
        return $this->id_experience;
    }

    /**
     * @param mixed $id_experience
     */
    public function setIdExperience($id_experience)
    {
        $this->id_experience = $id_experience;
    }

    /**
     * @return mixed
     */
    public function getNameCompagny()
    {
        return $this->nameCompagny;
    }

    /**
     * @param mixed $nameCompagny
     */
    public function setNameCompagny($nameCompagny)
    {
        $this->nameCompagny = $nameCompagny;
    }

    /**
     * @return mixed
     */
    public function getDtStart()
    {
        return $this->dtStart;
    }

    /**
     * @param mixed $dtStart
     */
    public function setDtStart($dtStart)
    {
        $this->dtStart = $dtStart;
    }

    /**
     * @return mixed
     */
    public function getDtEnd()
    {
        return $this->dtEnd;
    }

    /**
     * @param mixed $dtEnd
     */
    public function setDtEnd($dtEnd)
    {
        $this->dtEnd = $dtEnd;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}