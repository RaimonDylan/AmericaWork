<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Recruiter.php";
require_once "../../model/RecruiterModel.php";

$recruiter_id = filter_input(INPUT_GET, 'recruiter_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new RecruiterModel($db);
$controller = new Recruiter($model);
$edit = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $controller->edit($recruiter_id);

$recruiter = $controller->edit($recruiter_id);
$users = $controller->all_user();
?>

<?php
    include_once '../../includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modifier un recruteur</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('../../includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            require_once('../forms/recruiter_form.php');
        ?>
    </form>
</div>




<?php include_once '../../includes/footer.php'; ?>