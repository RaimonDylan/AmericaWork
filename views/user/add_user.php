<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/User.php";
require_once "../../model/UserModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $db = getDbInstance();
    $model = new UserModel($db);
    $controller = new User($model);
    $controller->create();
}

$edit = false;

require_once '../../includes/header.php';
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Ajouter un utilisateur</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('../forms/user_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>

<?php include_once '../../includes/footer.php'; ?>