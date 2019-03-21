<?php
session_start();
require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$page = filter_input(INPUT_GET, 'page');
$pagelimit = 10;
if (!$page) {
    $page = 1;
}
$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);
$db->pageLimit = $pagelimit;

$jobs = $controller->index($page);
$total_pages = $db->totalPages;

include_once '../../includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Annonces</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_company.php">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter </button>
	            </a>
            </div>
        </div>
    </div>
        <?php include('../../includes/flash_messages.php') ?>
    <hr>

    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header">#</th>
                <th>Type Annonce</th>
                <th>Type Contrat</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
                <th>Expérience necessaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job) : ?>
                <tr>
                    <td><?php echo $job['id_job'] ?></td>
	                <td><?php
                        if(isset($job['id_recruiter']))
                            echo "Recruteur";
                        else
                            echo "Etudiant";
                            ?></td>
	                <td><?php echo $job['typeContract'] ?></td>
                    <td><?php echo $job['dtDebut'] ?></td>
                    <td><?php echo $job['dtFin'] ?></td>
                    <td><?php echo $job['experience'] ?></td>
	                <td>
					    <a href="edit_job.php?job_id=<?php echo $job['id_job'] ?>" class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>
					    <a href=""  class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $job['id_job'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                    </td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $job['id_job'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_job.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirmation</h4>
						        </div>
						        <div class="modal-body">
						      
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $job['id_job'] ?>">
						        	
						          <p>Etes-vous sûr de bien vouloir supprimer cette entreprise ?</p>
						        </div>
						        <div class="modal-footer">
						         	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Non</button>
                                    <button type="submit" class="btn btn-default">Oui</button>
						        </div>
						      </div>
					      </form>
					      
					    </div>
  					</div>
            <?php endforeach; ?>      
        </tbody>
    </table>


   
    <div class="text-center">

        <?php
        if (!empty($_GET)) {
            unset($_GET['page']);
            $http_query = "?" . http_build_query($_GET);
        } else {
            $http_query = "?";
        }
        //Show pagination links
        if ($total_pages > 1) {
            echo '<ul class="pagination text-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                ($page == $i) ? $li_class = ' class="active"' : $li_class = "";
                echo '<li' . $li_class . '><a href="user.php' . $http_query . '&page=' . $i . '">' . $i . '</a></li>';
            }
            echo '</ul></div>';
        }
        ?>
    </div>

</div>


<?php include_once '../../includes/footer.php'; ?>

