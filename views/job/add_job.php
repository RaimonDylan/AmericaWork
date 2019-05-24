<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $controller->create();
}

$recruiters = $controller->getAllRecruiters();
$students = $controller->getAllStudents();
$company = $controller->getAllCompany();
$edit = false;

require_once '../../includes/header.php';
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Ajouter une annonce</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('../forms/job_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            typeContrat: {
                required: true,
                minlength: 1
            }
        }
    });
});
</script>

<?php include_once '../../includes/footer.php'; ?>