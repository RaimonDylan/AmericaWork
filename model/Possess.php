<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:25
 */

class Possess
{
    private $percentage;
    private $nbExpe;

    public function __construct($percentage, $nbExpe)
    {
        $this->setPercentage($percentage);
        $this->nbExpe = $nbExpe;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage)
    {
        $number = preg_match('@[0-9]@', $percentage);

        if($number && $percentage <= 100 && $percentage >= 0)
        {
            $this->percentage = $percentage;
        }
    }

    /**
     * @return mixed
     */
    public function getNbExpe()
    {
        return $this->nbExpe;
    }

    /**
     * @param mixed $nbExpe
     */
    public function setNbExpe($nbExpe)
    {
        $this->nbExpe = $nbExpe;
    }


}