<?php session_start();


require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";


$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);
$jobs = $controller->getAllJob($_SESSION['id_recruiter']);


include_once('../../includes/headerPublic.php');
?>
<script type="text/javascript">

    function removeJob(id_annonce) {
        $.ajax({
            url: "removeJob.php",
            type: "post",
            data: {
                id: id_annonce
            },
            success: function(response) {
                $('.annonceJob'+id_annonce).remove();
            },
            error: function(xhr) {
                alert(xhr.text);
            }
        });
    }
</script>

    <div class="unit-5 overlay" style="background-image: url('../../res/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Mes Annonces</h2>
        <p class="mb-0 unit-6"><a href="../../index.php">Accueil</a> <span class="sep">></span> <span>Mes Annonces</span></p>
      </div>
    </div>




<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-md-9" data-aos="fade">
                <h2 class="font-weight-bold text-black">Mes Annonces</h2>
            </div>
        </div>

        <?php
        $typeContrat = array("fulltime" => "Temps plein","parttime" => "Temps partiel","freelance" => "Freelance","internship" => "Stage");
        $displayBtn = array("fulltime" => "bg-warning","parttime" => "bg-primary","freelance" => "bg-info","internship" => "bg-secondary");
        foreach ($jobs as $job): ?>
            <div class="row annonceJob<?php echo $job['id_job'] ?>" data-aos="fade">
                <div class="col-md-12">
                    <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                        <div class="mb-4 mb-md-0 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4"><?php echo $job['jobTitle'] ?></h2>
                                <div class="badge-wrap">
                                    <span class="<?php echo $displayBtn[$job['typeContract']] ?> text-white badge py-2 px-4"><?php echo $typeContrat[$job['typeContract']] ?></span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#"><?php echo $job['name'] ?></a></div>
                                <div><span class="fl-bigmug-line-big104"></span> <span><?php echo $job['location'] ?></span></div>
                            </div>
                        </div>

                        <div class="ml-auto">
                            <?php if (isset($_SESSION['user_logged_in'])) {
                                $id_job = $job['id_job'];
                                echo "<a href='listeCandidats.php?job_id=$id_job' class='btn btn-primary py-2 viewCandidats'>Voir les candidats</a>&nbsp";
                                echo "<a href='javascript:removeJob($id_job)' class='btn btn-danger py-2'>X</a>";
                            }?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach;?>

        <!-- TODO PAGINATION
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#"><i class="icon-keyboard_arrow_left h5"></i></a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="icon-keyboard_arrow_right h5"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        -->


    </div>
</div>




      <?php

      include_once('../../includes/footerPublic.php');
      ?>
  </body>
</html>