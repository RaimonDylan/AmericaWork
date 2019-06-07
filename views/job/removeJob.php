<?php session_start();


require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);

$id_job = $_POST[id];
$job = $controller->removeJob($id_job);
return true;