<?php
/**
 * Page Ajout utilisateur
 * Formulaire d'ajout d'un utilisateur
 */
    include 'header.php';
?>
<h2 style="text-align: center;color:#000;margin-top:1%;">Création d'un utilisateur</h2>
<?php
if(isset($_SESSION['error'])){
    $erreur = $_SESSION['error'];
    echo "<h2 style='text-align: center;color:#000;margin-top:1%;color:red;'>Erreur : $erreur</h2>";
    unset($_SESSION['error']);
}
?>

<div class="login-dark">

<form method="post" action="../controller/ajoutUtilisateurBDD.php" style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 1%">
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" size="12" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" size="12" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <div class="form-group">
        <label>Identifiant</label>
        <input id='login' type="text" name="identifiant" size="12" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input id='password' type="password" name="motdepasse" size="12" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" name="ddn" size="12" class="form-control">
    </div>
    <input type="submit" value="Créer" class="btn btn-default">
</form>
</div>

