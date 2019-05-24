<?php
session_start();
require_once 'config/config.php';
require_once 'includes/auth_validate.php';
require_once "controller/User.php";
require_once "model/UserModel.php";

$db = getDbInstance();
$model = new UserModel($db);
$controller = new User($model);
$controller->createNew();