<?php 
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

    $db = getDbInstance();
    $model = new JobModel($db);
    $controller = new Job($model);
    $controller->delete($del_id);
    
}