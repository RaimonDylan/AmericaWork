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
	<form class="form loginform" method="POST" action="authenticate.php">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">Connectez-vous ci-dessous</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Nom d'utilisateur</label>
					<input type="text" name="username" class="form-control" required="required" readonly onfocus="this.removeAttribute('readonly');">
				</div>
				<div class="form-group">
					<label class="control-label">Mot de passe</label>
					<input type="password" name="passwd" class="form-control" required="required" readonly onfocus="this.removeAttribute('readonly');">
				</div>
				<?php if (isset($_SESSION['login_failure'])) {?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $_SESSION['login_failure'];unset($_SESSION['login_failure']); ?>
                    </div>
                <?php }?>
                <?php if (isset($_SESSION['signup_success'])) {?>
                    <div class="alert alert-info alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $_SESSION['signup_success'];unset($_SESSION['signup_success']); ?>
                    </div>
                <?php }?>
				<button type="submit" class="btn btn-success loginField" >Connexion</button>
			</div>
		</div>
	</form>
</div>
<?php include_once 'includes/footer.php';?>