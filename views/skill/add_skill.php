<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Skill.php";
require_once "../../model/SkillModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $db = getDbInstance();
    $model = new SkillModel($db);
    $controller = new Skill($model);
    $controller->create();
}

$edit = false;

require_once '../../includes/header.php';
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Ajouter une compétences</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('../forms/skill_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            nom: {
                required: true,
                minlength: 3
            }
        }
    });
});
</script>

<?php include_once '../../includes/footer.php'; ?>