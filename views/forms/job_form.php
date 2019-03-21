<fieldset>

    <div class="form-group">
        <label>Recruteur </label>
        <select name="id_recruiter" class="form-control selectpicker">
            <option value=" " >Selectionner un recruteur</option>
            <?php
            foreach ($recruiters as $recruiter) {
                if ($edit && $recruiter['id_recruiter'] == $job['id_recruiter']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                $id_recruiter = $recruiter['id_recruiter'];
                $nom_user = $recruiter['l_name'];
                echo '<option value="'.$id_recruiter.'"' . $sel . '>' . $nom_user . '</option>';
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Etudiant</label>
        <select name="id_student" class="form-control selectpicker">
            <option value=" " >Selectionner un étudiant</option>
            <?php
            foreach ($students as $student) {
                if ($edit && $student['id_student'] == $job['id_student']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                $id_student = $student['id_student'];
                $nom_user = $student['l_name'];
                echo '<option value="'.$id_student.'"' . $sel . '>' . $nom_user . '</option>';
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="typeContract">Type du contrat *</label>
        <input type="text" name="typeContract" value="<?php echo $edit ? $job['typeContract'] : ''; ?>" placeholder="Type du contrat" class="form-control" required="required" id = "typeContract" readonly onfocus="this.removeAttribute('readonly');">
    </div>
    <div class="form-group">
        <label for="dtDebut">Date de début</label>
        <input type="date" name="dtDebut" value="<?php echo $edit ? $job['dtDebut'] : ''; ?>" placeholder="" class="form-control" required="required" id = "dtDebut" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="dtFin">Date de fin</label>
        <input type="date" name="dtFin" value="<?php echo $edit ? $job['dtFin'] : ''; ?>" placeholder="" class="form-control" required="required" id = "dtFin" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="experience">Expérience</label>
        <input type="text" name="experience" value="<?php echo $edit ? $job['experience'] : ''; ?>" placeholder="Expériences" class="form-control" required="required" id = "experience" readonly onfocus="this.removeAttribute('readonly');">
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