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
                <?php if (isset($_SESSION['fail'])) {?>
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $_SESSION['fail'];unset($_SESSION['fail']); ?>
                    </div>
                <?php }?>
				<div class="form-group">
					<label class="control-label">Nom d'utilisateur</label>
					<input type="text" required="required" name="login" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
				</div>
				<div class="form-group">
					<label class="control-label">Mot de passe</label>
					<input type="password" required="required" name="password" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
				</div>
                <div class="form-group">
                    <label class="control-label">Nom</label>
                    <input type="text" required="required" name="l_name" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <label class="control-label">Prénom</label>
                    <input type="text" required="required" name="f_name" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <label class="control-label">Téléphone</label>
                    <input type="tel" required="required" name="phone" class="form-control" readonly onfocus="this.removeAttribute('readonly');" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
                </div>
                <div class="form-group">
                    <label class="control-label">Adresse mail</label>
                    <input type="email" required="required" name="email" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <input type="text" required="required" name="address" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <label class="control-label">Ville</label>
                    <input type="text" required="required" name="city" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <label class="control-label">Code postal</label>
                    <input type="text" required="required" maxlength="5" pattern="[0-9]{5}" name="pc" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="form-group">
                    <input class="typeSignup" type="radio" name="choice" value="student"> Élève<br>
                    <input class="typeSignup" type="radio" name="choice" value="recruiter"> Recruteur<br>
                </div>
                <div style="display: none;" class="student">
                    <div class="form-group">
                        <label class="control-label">Site web</label>
                        <input type="url" required="required" name="siteweb" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea type="text" style="resize: none;" rows="4" cols="50" name="description" class="form-control" readonly onfocus="this.removeAttribute('readonly');"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Twitter</label>
                        <input type="url" name="twitter" class="form-control" readonly onfocus="this.removeAttribute('readonly');">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Facebook</label>
                        <input type="url" name="facebook" class="form-control" readonly onfocus="this.removeAttribute('readonly');" pattern="(?:(?:http|https):\/\/)?(?:www.)?facebook.com\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[?\w\-]*\/)?(?:profile.php\?id=(?=\d.*))?([\w\-]*)?">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Hobbies</label>
                        <textarea type="text" style="resize: none;" rows="4" cols="50" name="hobbies" class="form-control" readonly onfocus="this.removeAttribute('readonly');"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success loginField" >Valider</button>
			</div>
		</div>
	</form>
</div>
<?php include_once 'includes/footer.php';?>