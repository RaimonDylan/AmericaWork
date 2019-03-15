<?php
/**
 * Page Ajout utilisateur
 * ajoute un utilisateur dans la base de données
 */

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$login = htmlspecialchars($_POST['identifiant']);
$motdepasse = htmlspecialchars($_POST['motdepasse']);
$ddn = htmlspecialchars($_POST['ddn']);

$uppercase = preg_match('@[A-Z]@', $motDePasse);
$number = preg_match('@[0-9]@', $motDePasse);
$letter = preg_match('@[a-z]@', $motDePasse);

if(!$uppercase || !$number || !$letter)
{
    $_SESSION['error'] = "Mot de passe invalide";
    header('Location: ../view/ajoutUtilisateur.php');
}else{
    $dbh  = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $variable = $dbh->prepare("INSERT INTO Utilisateur (login,password,nom,prenom,dtNaissance) VALUES (:login, :password, :nom, :prenom, :dtNaissance)");
    $variable->execute(array("login" => $login, "password" => $motdepasse, "nom" => $nom, "prenom" => $prenom, "dtNaissance" => $ddn));
    header('Location: ../view/admin.php');
}

