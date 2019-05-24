<?php
require_once './config/config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = filter_input(INPUT_POST, 'username');
	$passwd = filter_input(INPUT_POST, 'passwd');
	$remember = filter_input(INPUT_POST, 'remember');

	//Get DB instance.
	$db = getDbInstance();

	$db->where("user_name", $username);
    $row = $db->get('admin');


	if ($db->count >= 1) {

		$db_password = $row[0]['passwd'];
		$user_id = $row[0]['id'];

		if (password_verify($passwd, $db_password)) {

			$_SESSION['user_logged_in'] = TRUE;
			$_SESSION['admin_type'] = $row[0]['admin_type'];
			header('Location:admin.php');

		} else {
			$_SESSION['login_failure'] = "Nom d'utilisateur ou mot de passe invalide";
			header('Location:login.php');
		}

		exit;
	} else {
        $db->where("login", $username);
        $row = $db->get('user');
        $db_password = $row[0]['password'];
        $user_id = $row[0]['id_user'];
        if (password_verify($passwd, $db_password)) {

            $_SESSION['user_logged_in'] = TRUE;
            $_SESSION['admin_type'] = "recruteur";
            $_SESSION['id_user'] = $user_id;
            $db->where("id_user", $user_id);
            $row = $db->get('recruiter');
            if ($db->count >= 1) {
                $_SESSION['id_recruiter'] = $row[0]['id_recruiter'];
            }
            header('Location:index.php');

        } else {
            $_SESSION['login_failure'] = "Nom d'utilisateur ou mot de passe invalide";
            header('Location:login.php');
        }
		exit;
	}

}
else {
	die('Method Not allowed');
}