<fieldset>
    <div class="form-group" style="display:none;">
        <label for="id_recruiter">Titre</label>
        <input type="text" name="id_recruiter" value="<?php echo $_SESSION['id_recruiter'] ?>" placeholder="Titre" class="form-control" required="required" id = "id_recruiter" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label>Entreprise</label>
        <select disabled name="id_company" class="form-control selectpicker">
            <option value=" " ><?php echo $job['name']?></option>
        </select>
    </div>

    <div class="form-group">
        <label for="typeContract">Type du contrat *</label>
        <select disabled name="typeContract" class="form-control selectpicker">
            <?php
            $typeContrat = array("fulltime" => "Temps plein","parttime" => "Temps partiel","freelance" => "Freelance","internship" => "Stage");
            foreach ($typeContrat as $idContrat => $contrat) {
                if ( $idContrat == $job['typeContract']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                echo '<option value="'.$idContrat.'"' . $sel . '>' . $contrat . '</option>';
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="jobTitle">Titre</label>
        <input disabled type="text" name="jobTitle" value="<?php echo $job['jobTitle'] ?>" placeholder="Titre" class="form-control" required="required" id = "jobTitle" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="location">Localisation</label>
        <input disabled type="text" name="location" value="<?php echo $job['location'] ?>" placeholder="Localisation" class="form-control" required="required" id = "location" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="dtDebut">Date de début</label>
        <input disabled type="date" name="dtDebut" value="<?php echo $job['dtDebut'] ?>" min="<?php echo date('Y-m-d'); ?>" placeholder="" class="form-control" required="required" id = "dtDebut" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="dtFin">Date de fin</label>
        <input disabled type="date" name="dtFin" value="<?php echo $job['dtFin'] ?>" min="<?php echo date('Y-m-d'); ?>" placeholder="" class="form-control" required="required" id = "dtFin" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="experience">Expérience</label>
        <input disabled type="text" name="experience" value="<?php echo $job['experience']; ?>" placeholder="Expériences" class="form-control" required="required" id = "experience" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea  disabled type="text" name="description" class="form-control" required="required" id = "description" readonly onfocus="this.removeAttribute('readonly');"><?php echo $job['description'] ?></textarea>
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
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" ><?php echo $edit ? 'Modifier' : 'Ajouter'; ?> <span class="glyphicon glyphicon-send"></span></button>
    </div>
    !-->


</fieldset>