<?php 
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Recruiter.php";
require_once "../../model/RecruiterModel.php";;
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $db = getDbInstance();
    $model = new RecruiterModel($db);
    $controller = new Recruiter($model);
    $controller->delete($del_id);
    
}