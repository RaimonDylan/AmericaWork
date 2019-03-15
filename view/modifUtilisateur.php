<?php
/**
 * Page Modifier utilisateur
 * Formulaire de modification d'un utilisateur
 * Recupère les informations d'un utilisateur
 */
include 'header.php';

$dbh  = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$id = htmlspecialchars($_POST['id']);

$variable = $dbh->prepare("SELECT *  FROM Utilisateur WHERE idUtilisateur = :id");

$variable->execute(array('id'=>$id));
$data = $variable->fetch();
$nom = $data['nom'];
$prenom = $data['prenom'];
$login = $data['login'];
$password = $data['password'];
$dt = $data['dtNaissance'];
$id = $data['idUtilisateur'];

?>
<h2 style="text-align: center;color:#000;margin-top:1%;">Modification d'un utilisateur</h2>
<div class="login-dark">

    <form method="post" action="../controller/modifUtilisateurBDD.php" style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 1%">
        <div class="form-group">
            <label>Nom</label>
            <?php echo "<input type='text' name='nom' size='12' class='form-control' value='$nom'>" ?>
        </div>
        <div class="form-group">
            <label>Prénom</label>
            <?php echo "<input type='text' name='prenom' size='12' class='form-control' value='$prenom'>" ?>
        </div>
        <div class="form-group">
            <label>Identifiant</label>
            <?php echo "<input type='text' name='identifiant' size='12' class='form-control' value='$login'>" ?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <?php echo "<input type='password' name='motdepasse' size='12' class='form-control' value='$password'>" ?>
        </div>
        <div class="form-group">
            <label>Date de naissance</label>
            <?php echo "<input type='date' name='ddn' size='12' class='form-control' value='$dt'>" ?>
        </div>
        <?php echo "<input type='hidden' name='id' value='$id'>" ?>
        <input type="submit" value="Modifier" class="btn btn-default">
    </form>
</div>
