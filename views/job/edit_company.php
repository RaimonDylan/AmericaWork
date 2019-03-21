<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Company.php";
require_once "../../model/CompanyModel.php";

$company_id = filter_input(INPUT_GET, 'company_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new CompanyModel($db);
$controller = new Company($model);
$edit = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
    $controller->edit($company_id);

$company = $controller->edit($company_id);
?>

<?php
    include_once '../../includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Modifier une entreprise</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('../../includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            require_once('../forms/company_form.php');
        ?>
    </form>
</div>




<?php include_once '../../includes/footer.php'; ?>