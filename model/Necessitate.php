<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 10:31
 */

class Necessitate
{
    private $type;

    public function __construct($type)
    {
        $this->setType($type);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        if($type == 'Optionnel' || $type == 'Obligatoire')
        {
            $this->type = $type;
        }
    }
}