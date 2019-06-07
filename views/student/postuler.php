<?php session_start();


require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);

$job_id = $_POST[id];

$job = $controller->postuler($job_id,$_SESSION['id_student']);
return true;