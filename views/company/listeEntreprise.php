<?php session_start();


require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Company.php";
require_once "../../model/CompanyModel.php";


$db = getDbInstance();
$model = new CompanyModel($db);
$controller = new Company($model);
$entreprises = $controller->getAllCompanyById($_SESSION['id_recruiter']);


include_once('../../includes/headerPublic.php');
?>

    <div class="unit-5 overlay" style="background-image: url('../../res/images/hero_bg_2.jpg');">
      <div class="container text-center">
        <h2 class="mb-0">Mes Entreprises</h2>
        <p class="mb-0 unit-6"><a href="../../index.php">Accueil</a> <span class="sep">></span> <span>Mes Entreprises</span></p>
      </div>
    </div>




<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-start text-left mb-5">
            <div class="col-md-9" data-aos="fade">
                <h2 class="font-weight-bold text-black mr-3">Mes Entreprises (<?php echo sizeof($entreprises) ?>)</h2>
            </div>
            <div class="col-md-3" data-aos="fade" data-aos-delay="200">
                <?php if (isset($_SESSION['user_logged_in'])) {
                    echo '<a href="views/company/new-post.php" class="btn btn-primary py-3 btn-block"><span class="h5">+</span> Rejoindre une entreprise</a>';
                }?>

            </div>
        </div>

        <?php
        $typeContrat = array("fulltime" => "Temps plein","parttime" => "Temps partiel","freelance" => "Freelance","internship" => "Stage");
        $displayBtn = array("fulltime" => "bg-warning","parttime" => "bg-primary","freelance" => "bg-info","internship" => "bg-secondary");
        foreach ($entreprises as $entreprise): ?>
            <div class="row" data-aos="fade">
                <div class="col-md-12">
                    <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">

                        <div class="mb-4 mb-md-0 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4"><?php echo $entreprise['name'] ?></h2>
                                <div class="badge-wrap">
                                    <span class="bg-primary text-white badge py-2 px-4"><?php echo $entreprise['typeSector'] ?></span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#"><?php echo $entreprise['name'] ?></a></div>
                                <div><span class="fl-bigmug-line-big104"></span> <span><?php echo $entreprise['city'] ?></span></div>
                            </div>
                        </div>

                        <div class="ml-auto">
                            <?php if (isset($_SESSION['user_logged_in'])) {
                                $id_company = $entreprise['id_company'];
                                echo "<a href='delete_company.php?company_id=$id_company' class='btn btn-danger py-2'>X</a>";
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