<!DOCTYPE html>
<html lang="en">
<head>
    <title>America Work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="http://stmncv1.fr/res/fonts/icomoon/style.css">

    <link rel="stylesheet" href="http://stmncv1.fr/res/scss/bootstrap.min.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/magnific-popup.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/jquery-ui.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/owl.carousel.min.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/animate.css">


    <link rel="stylesheet" href="http://stmncv1.fr/res/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="http://stmncv1.fr/res/css/fl-bigmug-line.css">

    <link rel="stylesheet" href="http://stmncv1.fr/res/css/aos.css">

    <link rel="stylesheet" href="http://stmncv1.fr/res/css/style.css">

</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <header class="site-navbar py-1" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0"><a href="http://stmncv1.fr/index.php" class="text-black h2 mb-0">America<strong>Work</strong></a></h1>
                </div>

                <div class="col-10 col-xl-10 d-none d-xl-block">
                    <nav class="site-navigation text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">

                          <li class="active"><a href="http://stmncv1.fr/index.php">Accueil</a></li>
                            <!--
                          <li><a href="about.html">About</a></li>
                          <li><a href="contact.html">Contact</a></li>
                          <li><a href="new-post.html"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2">+</span> Post a Job</span></a></li>
                          -->
                            <?php if (!isset($_SESSION['user_logged_in'])) {
                                echo '<li><a href="http://stmncv1.fr/signup.php"><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2"></span>Inscription</span></a></li>';
                                echo '<li><a href="http://stmncv1.fr/login.php"><span class="rounded bg-secondary py-2 px-3 text-white"><span class="h5 mr-2"></span>Connexion</span></a></li>';
                            } else{
                                echo '<li><a href="http://stmncv1.fr/logout.php"><span class="rounded bg-danger py-2 px-3 text-white"><span class="h5 mr-2"></span>Déconnexion</span></a></li>';
                            }?>

                        </ul>
                    </nav>
                </div>

                <div class="col-6 col-xl-2 text-right d-block">

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                </div>

            </div>
        </div>

    </header>