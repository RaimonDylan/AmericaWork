<?php
/**
 * Page Modifier utilisateur
 * Modifie un utilisateur dans la base de données
 */

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$login = htmlspecialchars($_POST['identifiant']);
$motdepasse = htmlspecialchars($_POST['motdepasse']);
$ddn = htmlspecialchars($_POST['ddn']);
$id = htmlspecialchars($_POST['id']);

$dbh  = new PDO('mysql:host=localhost;dbname=test', 'root', '');
$variable = $dbh->prepare("UPDATE Utilisateur SET login =:login, password =:password, nom =:nom, prenom =:prenom, dtNaissance =:dtNaissance WHERE idUtilisateur = :id");
$variable->execute(array("login" => $login, "password" => $motdepasse, "nom" => $nom, "prenom" => $prenom, "dtNaissance" => $ddn,"id" => $id));
header('Location: ../view/admin.php');
