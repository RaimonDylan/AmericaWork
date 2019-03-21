<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/User.php";
require_once "../../model/UserModel.php";

$user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new UserModel($db);
$controller = new User($model);
$edit = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $controller->edit($user_id);

$user = $controller->edit($user_id);
?>

<?php
    include_once '../../includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modifier un utilisateur</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('../../includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            require_once('../forms/user_form.php');
        ?>
    </form>
</div>




<?php include_once '../../includes/footer.php'; ?>