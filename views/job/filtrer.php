<?php session_start();


require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);

$job_name = $_POST[name];
$job_type = $_POST[type];
$job_localisation = $_POST[localisation];

return $job_name;
//$job = $controller->postuler($job_id,$_SESSION['id_student']);
return true;