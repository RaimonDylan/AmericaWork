<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$job_id = filter_input(INPUT_GET, 'job_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);
$edit = true;

$recruiters = $controller->getAllRecruiters();
$students = $controller->getAllStudents();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $controller->edit($job_id);

$job = $controller->edit($job_id);
?>

<?php
    include_once '../../includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modifier une annonce</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('../../includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            require_once('../forms/job_form.php');
        ?>
    </form>
</div>




<?php include_once '../../includes/footer.php'; ?>