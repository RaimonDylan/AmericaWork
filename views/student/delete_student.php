<?php 
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Student.php";
require_once "../../model/StudentModel.php";;
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $db = getDbInstance();
    $model = new StudentModel($db);
    $controller = new Student($model);
    $controller->delete($del_id);
    
}