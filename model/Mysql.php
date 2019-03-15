<?php
/**
 * Created by PhpStorm.
 * User: Raimon
 * Date: 15/03/2019
 * Time: 10:13
 */

class Mysql
{
    protected $base;

    function __construct()
    {
        $this->base  = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    }
}