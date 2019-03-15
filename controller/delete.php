<?php
/**
 * Page Supprimer utilisateur
 * Supprime un utilisateur dans la base de données
 */

$dbh  = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$id = htmlspecialchars($_POST['id']);

$variable = $dbh->prepare("DELETE FROM Utilisateur WHERE idUtilisateur = :id");

$variable->execute(array('id'=>$id));

header('Location: ../view/admin.php');