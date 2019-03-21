<fieldset>
    <div class="form-group">
        <label for="login">Nom d'utilisateur *</label>
        <input type="text" name="login" value="<?php echo $edit ? $user['login'] : ''; ?>" placeholder="Nom d'utilisateur" class="form-control" required="required" id = "login" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <?php if(!$edit){?>
        <div class="form-group">
            <label for="password">Mot de passe *</label>
            <input type="password" name="password" value="" placeholder="Mot de passe" class="form-control" required="required" id = "password" readonly onfocus="this.removeAttribute('readonly');">
        </div>

    <?php } ?>

    <div class="form-group">
        <label for="f_name">Prénom *</label>
          <input type="text" name="f_name" value="<?php echo $edit ? $user['f_name'] : ''; ?>" placeholder="Prénom" class="form-control" required="required" id = "f_name" >
    </div> 

    <div class="form-group">
        <label for="l_name">Nom *</label>
        <input type="text" name="l_name" value="<?php echo $edit ? $user['l_name'] : ''; ?>" placeholder="Nom" class="form-control" required="required" id="l_name">
    </div>

    <div class="form-group">
        <label for="phone">Téléphone *</label>
        <input name="phone" value="<?php echo $edit ? $user['phone'] : ''; ?>" placeholder="0606060606" class="form-control"  type="text" required="required" id="phone">
    </div>

    <div class="form-group">
        <label for="email">Email *</label>
        <input  type="email" name="email" value="<?php echo $edit ? $user['email'] : ''; ?>" placeholder="Adresse email" class="form-control" required="required" id="email">
    </div>

    <div class="form-group">
        <label for="address">Adresse *</label>
        <textarea name="address" placeholder="Adresse" class="form-control" id="address"><?php echo ($edit)? $user['address'] : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="city">Ville *</label>
        <input type="text" name="city" value="<?php echo $edit ? $user['city'] : ''; ?>" placeholder="Ville" class="form-control" required="required" id="city">
    </div>

    <div class="form-group">
        <label for="pc">Code postale *</label>
        <input type="text" name="pc" value="<?php echo $edit ? $user['pc'] : ''; ?>" placeholder="00000" class="form-control" required="required" id="pc">
    </div>



    <!-- Exemple radio button

    <div class="form-group">
        <label>Gender * </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" <?php echo ($edit &&$user['gender'] =='male') ? "checked": "" ; ?> required="required"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" <?php echo ($edit && $user['gender'] =='female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>

    !-->

    <!-- Exemple select form

    <div class="form-group">
        <label>State </label>
           <?php  //$opt_arr = array("Maharashtra", "Kerala", "Madhya pradesh");
                            ?>
            <select name="state" class="form-control selectpicker" required>
                <option value=" " >Please select your state</option>
                <?php /*
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['state']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                */?>
            </select>
    </div>
    !-->

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" ><?php echo $edit ? 'Modifier' : 'Ajouter'; ?> <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>