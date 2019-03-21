<fieldset>
    <div class="form-group">
        <label for="name">Nom de l'entreprise *</label>
        <input type="text" name="name" value="<?php echo $edit ? $company['name'] : ''; ?>" placeholder="Nom de l'entreprise" class="form-control" required="required" id = "name" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <div class="form-group">
        <label for="nbEmploye">Nombre d'employés</label>
        <input type="text" name="nbEmploye" value="<?php echo $edit ? $company['nbEmploye'] : ''; ?>" placeholder="nombre d'employés" class="form-control" required="required" id = "nbEmploye" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="addr">Adresse *</label>
        <textarea name="addr" placeholder="Adresse" class="form-control" id="addr"><?php echo ($edit)? $company['addr'] : ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="city">Ville *</label>
        <input type="text" name="city" value="<?php echo $edit ? $company['city'] : ''; ?>" placeholder="Ville" class="form-control" required="required" id="city">
    </div>

    <div class="form-group">
        <label for="pc">Code postale *</label>
        <input type="text" name="pc" value="<?php echo $edit ? $company['pc'] : ''; ?>" placeholder="00000" class="form-control" required="required" id="pc">
    </div>

    <div class="form-group">
        <label for="typeSector">Type Secteur *</label>
        <input type="text" name="typeSector" value="<?php echo $edit ? $company['typeSector'] : ''; ?>" placeholder="Type secteur" class="form-control" required="required" id="pc">
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