<?php
    session_start();
    require_once './config/config.php';
    require_once './includes/auth_validate.php';
    require_once "./controller/User.php";
    require_once "./model/UserModel.php";

    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
    $db = getDbInstance();
    $model = new UserModel($db);
    $controller = new User($model);

    print_r($_POST);
    $username = $_POST["username"];
    $mdp = $_POST["passwd"];

    $controller->reinit($username, $mdp);
    $_SESSION['forgotten'] = "Mot de passe réinitialisé avec succès ! ";
    header('Location:login.php');
?>