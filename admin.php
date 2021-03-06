<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information
$numUsers = $db->getValue ("user", "count(*)");
$numStudents = $db->getValue ("student", "count(*)");
$numRecruiters = $db->getValue ("recruiter", "count(*)");
$numCompany = $db->getValue ("company", "count(*)");
$numAnnonces = $db->getValue ("job", "count(*)");
$numSkill = $db->getValue ("skill", "count(*)");

include_once('includes/header.php');
?>

<div id="page-wrapper">
    <?php if ($_SESSION['admin_type'] == "super"):?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tableau de bord</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numUsers; ?></div>
                            <div>Utilisateurs</div>
                        </div>
                    </div>
                </div>
                <a href="views/user/user.php">
                    <div class="panel-footer">
                        <span class="pull-left">Voir détails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numRecruiters; ?></div>
                            <div>Recruteurs</div>
                        </div>
                    </div>
                </div>
                <a href="views/recruiter/recruiter.php">
                    <div class="panel-footer">
                        <span class="pull-left">Voir détails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numStudents; ?></div>
                            <div>Etudiants</div>
                        </div>
                    </div>
                </div>
                <a href="views/student/student.php">
                    <div class="panel-footer">
                        <span class="pull-left">Voir détails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-building fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numCompany; ?></div>
                            <div>Entreprise</div>
                        </div>
                    </div>
                </div>
                <a href="views/company/company.php">
                    <div class="panel-footer">
                        <span class="pull-left">Voir détails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-violet">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numAnnonces; ?></div>
                            <div>Annonces</div>
                        </div>
                    </div>
                </div>
                <a href="views/job/job.php">
                    <div class="panel-footer">
                        <span class="pull-left">Voir détails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-rose">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numSkill; ?></div>
                            <div>Compétences</div>
                        </div>
                    </div>
                </div>
                <a href="views/skill/skill.php">
                    <div class="panel-footer">
                        <span class="pull-left">Voir détails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <?php endif;?>
</div>

<?php include_once('includes/footer.php'); ?>
