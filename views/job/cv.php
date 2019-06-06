<?php session_start();


require_once '../../config/config.php';
require_once '../../includes/auth_validate.php';
require_once "../../controller/Job.php";
require_once "../../model/JobModel.php";

$student_id = filter_input(INPUT_GET, 'student_id', FILTER_VALIDATE_INT);
$db = getDbInstance();
$model = new JobModel($db);
$controller = new Job($model);

$experiences = $controller->getExperiences($student_id);
$skills = $controller->getCompetences($student_id);
$ecoles = $controller->getEcoles($student_id);
$etudiant = $controller->getStudent($student_id);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Responsive Resume Template</title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="http://stmncv1.fr/res/css/cv.css">
</head>

<body>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<div class="resume-wrapper">
  <section class="profile section-padding">
    <div class="container">
      <div class="picture-resume-wrapper">
        <div class="picture-resume"> <span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg" alt="" /></span></div>
        <div class="clearfix"></div>
      </div>
      <div class="name-wrapper">
        <h1><?php echo $etudiant['l_name'] ?><br/>
            <?php echo $etudiant['f_name'] ?></h1>
        <!-- YOUR NAME AND LAST NAME  --> 
      </div>
      <div class="clearfix"></div>
      <div class="contact-info clearfix">
        <ul class="list-titles">
          <li>Call</li>
          <li>Mail</li>
          <li>Web</li>
          <li>Home</li>
        </ul>
        <ul class="list-content ">
          <li><?php echo $etudiant['phone'] ?></li>
          <!-- YOUR PHONE NUMBER  -->
          <li><?php echo $etudiant['email'] ?></li>
          <!-- YOUR EMAIL -->
          <li><a href="<?php echo $etudiant['siteweb'] ?>"><?php echo $etudiant['siteweb'] ?></a></li>
          <!-- YOUR WEBSITE  -->
          <li><?php echo $etudiant['address'] ?>, <?php echo $etudiant['city'] ?></li>
          <!-- YOUR STATE AND COUNTRY  -->
        </ul>
      </div>
      <div class="contact-presentation"> <!-- YOUR PRESENTATION RESUME  -->
        <p><span class="bold">Présentation : </span><?php echo $etudiant['description'] ?></p>
      </div>
      <div class="contact-social clearfix">
        <ul class="list-titles">
          <li>Twitter</li>
          <li>Facebook</li>
        </ul>
        <ul class="list-content">
          <!-- REMEMBER TO PUT THE URL ON THE HREF TAG  -->
          <li><a href=""><?php echo $etudiant['twitter'] ?></a></li>
          <!-- YOUR TWITTER USER  -->
          <li><a href=""><?php echo $etudiant['facebook'] ?></a></li>
          <!-- YOUR FACEBOOK USER  -->
        </ul>
      </div>
    </div>
  </section>

  <section class="experience section-padding">
    <div class="section-bouton">
          <input class="fas fa-file-download" type="image" id="image" alt="Login"
                 src="/media/examples/login-button.png">
    </div>
    <div class="container">
      <h3 class="experience-title">Experience</h3>
        <?php foreach ($experiences as $experience) {
            $dt1 = date_parse($experience['dtDebut']);
            $dt2 = date_parse($experience['dtFin']);
            $dtDebut = $dt1['year'];
            $dtFin = $dt2['year'];
            $nameCompagny = $experience['nameCompany'];
            $title = $experience['title'];
            $description = $experience['description']
            ?>
            <div class="experience-wrapper" >
                <div class="company-wrapper clearfix" >
                    <div class="experience-title" > <?php echo $nameCompagny ?> </div >
                    <!--NAME OF THE COMPANY YOUWORK WITH-->
                    <div class="time" > <?php echo $dtDebut ?> - <?php echo $dtFin ?> </div >
                    <!--THE TIME YOU WORK WITH THE COMPANY-->
                </div >
                <div class="job-wrapper clearfix" >
                    <div class="experience-title" > <?php echo $title ?> </div >
                    <!--JOB TITLE-->
                    <div class="company-description" >
                        <p > <?php echo $description ?> </p >
                        <!--JOB DESCRIPTION-->
                    </div >
                </div >
            </div >
        <?php }?>

    <div class="container">
        <h3 class="experience-title">Formation</h3>
        <?php foreach ($ecoles as $ecole) {
            $dt1 = date_parse($ecole['dt_formation_entree']);
            $dt2 = date_parse($ecole['dt_formation_sortie']);
            $dtEntree = $dt1['year'];
            $dtSortie = $dt2['year'];
            $nomEcole = $ecole['nom_ecole'];
            $libelle = $ecole['libelle']
            ?>
                <div class="experience-wrapper" >
                    <div class="company-wrapper clearfix" >
                        <div class="experience-title" > <?php echo $nomEcole ?> </div >
                        <!--NAME OF THE COMPANY YOUWORK WITH-->
                        <div class="time" > <?php echo $dtEntree ?> - <?php echo $dtSortie ?> </div >
                        <!--THE TIME YOU WORK WITH THE COMPANY-->
                    </div >
                    <div class="job-wrapper clearfix" >
                        <div class="experience-title" > <?php echo $libelle ?> </div >
                        <!--JOB TITLE-->
                        <div class="company-description" >
                        <p > Lorem ipsum dolor sit amet, consectetur adipiscing elit . Fusce a elit facilisis, adipiscing leo in, dignissim magna .</p >
                        </div >
                    </div >
                </div >
        <?php }?>



      <!--Skill experience-->
      
      <div class="section-wrapper clearfix">
        <h3 class="section-title">Compétences</h3>
        <!-- YOUR SET OF SKILLS  -->
        <?php
            foreach ($skills as $skill)
            {
                $nom = $skill['nom'];
                $percentage = $skill['percentage'];
               echo "<li class='skill-percentage' style='width: $percentage%'>$nom</li>";
            }
        ?>
      </div>
      <div class="section-wrapper clearfix">
        <h3 class="section-title">Hobbies</h3>
        <!-- DESCRIPTION OF YOUR HOBBIES -->
        <p><?php echo $etudiant['hobbies'] ?></p>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
</div>
</body>
</html>
