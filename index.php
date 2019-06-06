<?php session_start();


require_once 'config/config.php';
require_once "controller/Job.php";
require_once "model/JobModel.php";

$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);
$jobs = $controller->getAllJob();
include_once('includes/headerPublic.php');
?>



    <div class="site-blocks-cover" style="background-image: url(res/images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row row-custom align-items-center">
          <div class="col-md-10">
            <h1 class="mb-2 text-black w-75"><span class="font-weight-bold">Pôle emploi </span> mais en plus simple </h1>
            <div class="job-search">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active py-3" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="true">Trouver un travail</a>
                </li>
              </ul>
              <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                  <form action="#" method="post">
                    <div class="row">
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="text" class="form-control" placeholder="ex. Web Developer">
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <div class="select-wrap">
                          <span class="icon-keyboard_arrow_down arrow-down"></span>
                          <select name="" id="" class="form-control">
                            <option value="">Type Contrat</option>
                            <option value="fulltime">Temps plein</option>
                            <option value="partime">Temps partiel</option>
                            <option value="freelance">Freelance</option>
                            <option value="internship">Stage</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Localisation" onFocus="geolocate()">
                      </div>
                      <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                        <input type="submit" class="btn btn-primary btn-block" value="Rechercher">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.3"></script>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-start text-left mb-5">
          <div class="col-md-9" data-aos="fade">
            <h2 class="font-weight-bold text-black">Annonces récentes</h2>
          </div>
          <div class="col-md-3" data-aos="fade" data-aos-delay="200">
              <?php if (isset($_SESSION['user_logged_in'])) {
                  echo '<a href="views/job/new-post.php" class="btn btn-primary py-3 btn-block"><span class="h5">+</span> Poster une annonce</a>';
              }?>

          </div>
        </div>

          <?php
          $typeContrat = array("fulltime" => "Temps plein","parttime" => "Temps partiel","freelance" => "Freelance","internship" => "Stage");
          $displayBtn = array("fulltime" => "bg-warning","parttime" => "bg-primary","freelance" => "bg-info","internship" => "bg-secondary");
           foreach ($jobs as $job): ?>
              <div class="row" data-aos="fade">
                  <div class="col-md-12">
                      <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                          <div class="mb-4 mb-md-0 mr-5">
                              <div class="job-post-item-header d-flex align-items-center">
                                  <?php echo "<h2 class='mr-3 text-black h4'><a href='http://stmncv1.fr/views/job/look-post.php?job_id=".$job['id_job']."' style='color:black;'>".$job['jobTitle']."</a></h2>" ?>
                                  <div class="badge-wrap">
                                      <span class="<?php echo $displayBtn[$job['typeContract']] ?> text-white badge py-2 px-4"><?php echo $typeContrat[$job['typeContract']] ?></span>
                                  </div>
                              </div>
                              <div class="job-post-item-body d-block d-md-flex">

                                  <div class="fb-share-button mr-3" data-href="http://stmncv1.fr/views/job/look-post.php?job_id='<?php echo $job['id_job']; ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fstmncv1.fr%2Findex.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div>
                                  <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#"><?php echo $job['name'] ?></a></div>
                                  <div><span class="fl-bigmug-line-big104"></span> <span><?php echo $job['location'] ?></span></div>
                              </div>
                          </div>
                          <div class="ml-auto">
                              <?php if ($_SESSION['admin_type'] == "etudiant") {
                                  echo ' <a href="#" class="btn btn-primary py-2">Postuler</a>';
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

      include_once('includes/footerPublic.php');
      ?>

    
  </body>
</html>