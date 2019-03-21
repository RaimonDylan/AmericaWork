<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Student.php";
require_once "../../model/StudentModel.php";

$student_id = filter_input(INPUT_GET, 'student_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new StudentModel($db);
$controller = new Student($model);
$edit = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $controller->edit($student_id);

$student = $controller->edit($student_id);
$users = $controller->all_user();
?>

<?php
    include_once '../../includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modifier un étudiant</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('../../includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            require_once('../forms/student_form.php');
        ?>
    </form>
</div>




<?php include_once '../../includes/footer.php'; ?>