<?php session_start();


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
$company = $controller->getCompanyByUser($_SESSION['id_user']);
$edit = false;
include_once('../../includes/headerPublic.php');
?>

    <div class="unit-5 overlay" style="background-image: url('../../res/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Poster une Annonce</h2>
        <p class="mb-0 unit-6"><a href="../../index.php">Accueil</a> <span class="sep">></span> <span>Poster une annonce</span></p>
      </div>
    </div>

    
    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">

              <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
                  <?php  include_once('../forms/jobPublic_form.php'); ?>
              </form>
          </div>

          <div class="col-lg-4">
              <!--
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>
            -->
          </div>
        </div>
      </div>
    </div>




      <?php

      include_once('../../includes/footerPublic.php');
      ?>
  </body>
</html>