<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Recruiter.php";
require_once "../../model/RecruiterModel.php";

$db = getDbInstance();
$model = new RecruiterModel($db);
$controller = new Recruiter($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $controller->create();
}

$edit = false;
$users = $controller->all_user();

require_once '../../includes/header.php';
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Ajouter un recruteur</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('../forms/recruiter_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            id_user: {
                required: true,
                minlength: 1
            },

       }
    });
});
</script>

<?php include_once '../../includes/footer.php'; ?>