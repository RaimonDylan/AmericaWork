<fieldset>
    <div class="form-group">
        <label>Utilisateur *</label>
        <select name="id_user" class="form-control selectpicker" required>
            <option value=" " >Selectionner un utilisateur</option>
            <?php
                foreach ($users as $user) {
                    if ($edit && $user['id_user'] == $student['id_user']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    $id_user = $user['id_user'];
                    $nom_user = $user['l_name'];
                    echo '<option value="'.$id_user.'"' . $sel . '>' . $nom_user . '</option>';
                }

                ?>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Déscription de l'étudiant *</label>
        <input type="text" name="description" value="<?php echo $edit ? $student['description'] : ''; ?>" placeholder="Déscription de l'étudiant" class="form-control" required="required" id = "description" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="facebook">Facebook *</label>
        <input type="facebook" name="facebook" value="<?php echo $edit ? $student['facebook'] : ''; ?>" placeholder="Facebook" class="form-control" required="required" id = "facebook" readonly onfocus="this.removeAttribute('readonly');">
    </div>


    <div class="form-group">
        <label for="hobbies">Hobbies *</label>
          <input type="text" name="hobbies" value="<?php echo $edit ? $student['hobbies'] : ''; ?>" placeholder="Hobbies" class="form-control" required="required" id = "hobbies" >
    </div> 

    <div class="form-group">
        <label for="siteweb">Site web *</label>
        <input type="text" name="siteweb" value="<?php echo $edit ? $student['siteweb'] : ''; ?>" placeholder="Site web" class="form-control" required="required" id="siteweb">
    </div>

    <div class="form-group">
        <label for="twitter">Twitter *</label>
        <input type="text" name="twitter" value="<?php echo $edit ? $student['twitter'] : ''; ?>" placeholder="Twitter" class="form-control" required="required" id="twitter">
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