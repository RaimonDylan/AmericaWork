<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Administrator</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="http://localhost/AmericaWork/res/css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link href="http://localhost/AmericaWork/res/js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="http://localhost/AmericaWork/res/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="http://localhost/AmericaWork/res/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="http://localhost/AmericaWork/res/js/jquery.min.js" type="text/javascript"></script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true): ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="">Administration</a>
                    </div>

                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <!--
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                !-->
                                <li><a href="http://localhost/AmericaWork/logout.php"><i class="fa fa-sign-out fa-fw"></i>Déconnexion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="http://localhost/AmericaWork/index.php"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord</a>
                                </li>

                                <li <?php echo (CURRENT_PAGE == "user.php" || CURRENT_PAGE == "add_user.php") ? 'class="active"' : ''; ?>>
                                    <a href="http://localhost/AmericaWork/views/user/user.php"><i class="fa fa-user-circle fa-fw"></i> Utilisateurs</a>
                                </li>

                                <li <?php echo (CURRENT_PAGE == "recruiter.php" || CURRENT_PAGE == "add_recruiter.php") ? 'class="active"' : ''; ?>>
                                    <a href="http://localhost/AmericaWork/views/recruiter/recruiter.php"><i class="fa fa-user-circle fa-fw"></i> Recruteur</a>
                                </li>


                                <li <?php echo (CURRENT_PAGE == "student.php" || CURRENT_PAGE == "add_student.php") ? 'class="active"' : ''; ?>>
                                    <a href="http://localhost/AmericaWork/views/student/student.php"><i class="fa fa-user-circle fa-fw"></i> Étudiants</a>
                                </li>

                                <li <?php echo (CURRENT_PAGE == "company.php" || CURRENT_PAGE == "add_company.php") ? 'class="active"' : ''; ?>>
                                    <a href="http://localhost/AmericaWork/views/company/company.php"><i class="fa fa-building fa-fw"></i> Entreprises</a>
                                </li>

                                <li <?php echo (CURRENT_PAGE == "job.php" || CURRENT_PAGE == "add_job.php") ? 'class="active"' : ''; ?>>
                                    <a href="http://localhost/AmericaWork/views/job/job.php"><i class="fa fa-briefcase fa-fw"></i> Annonces</a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
            <?php endif;?>
            <!-- The End of the Header -->