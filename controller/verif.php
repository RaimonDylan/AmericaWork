<?php
/**
 * Page Verification de connexion
 * Permet de vérifier si le login et le mot de passe sont bon
 * Redirection vers page selon l'utilisateur ou administrateur
 */
include '../model/AdminClass.php';
$dbh  = new PDO('mysql:host=localhost;dbname=america', 'root', '');
/////////// Creation de l'admin //////////////
$infos = $dbh->query("SELECT * FROM admin");
$admin = null;
if($data = $infos->fetch()) {
    $login = $data['login'];
    $password = $data['password'];
    $admin = new AdminClass($login,$password);
}
$infos->closeCursor();
//////////////////////////////////////////////
$login = htmlspecialchars($_POST['identifiant']);
$motdepasse = htmlspecialchars($_POST['motdepasse']);

if($admin->verifyLogin($login,$motdepasse))
{
    header('Location: ../view/admin.php');
} else {
    $variable = $dbh->prepare("SELECT * FROM utilisateur WHERE login =:login AND password =:motdepasse");
    $variable->execute(array("login" => $login,"motdepasse" => $motdepasse));
    if($data = $variable->fetch()){
        print("<h2>Pannel utilisateur</h2>");
    } else {
        header('Location: ../index.php');
    }
}



?>