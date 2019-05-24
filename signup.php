<?php
session_start();

require_once './config/config.php';
$token = bin2hex(openssl_random_pseudo_bytes(16));

//If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
	header('Location:admin.php');
}

include_once 'includes/header.php';
?>
<div id="page-" class="col-md-4 col-md-offset-4">
	<form class="form loginform" method="POST" action="signupValidate.php">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Formulaire d'inscription ci-dessous</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Nom d'utilisateur</label>
					<input type="text" name="login" class="form-control" required="required" readonly onfocus="this.removeAttribute('readonly');">
				</div>
				<div class="form-group">
					<label class="control-label">Mot de passe</label>
					<input type="password" name="password" class="form-control" required="required" readonly onfocus="this.removeAttribute('readonly');">
				</div>
                <div class="form-group">
                    <label class="control-label">Nom</label>
                    <input type="text" name="l_name" class="form-control" required="required" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <label class="control-label">Prénom</label>
                    <input type="password" name="f_name" class="form-control" required="required" readonly onfocus="this.removeAttribute('readonly');">
                </div>
				<button type="submit" class="btn btn-success loginField" >Valider</button>
			</div>
		</div>
	</form>
</div>
<?php include_once 'includes/footer.php';?>