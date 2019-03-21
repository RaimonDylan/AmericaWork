<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Skill.php";
require_once "../../model/SkillModel.php";

$skill_id = filter_input(INPUT_GET, 'skill_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new SkillModel($db);
$controller = new Skill($model);
$edit = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $controller->edit($skill_id);

$skill = $controller->edit($skill_id);
?>

<?php
    include_once '../../includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modifier une compétences</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('../../includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            require_once('../forms/skill_form.php');
        ?>
    </form>
</div>




<?php include_once '../../includes/footer.php'; ?>