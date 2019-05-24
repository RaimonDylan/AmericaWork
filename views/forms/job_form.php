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
        <label>Entreprise</label>
        <select name="id_company" class="form-control selectpicker">
            <option value=" " >Selectionner une entreprise</option>
            <?php
            foreach ($company as $oneCompany) {
                if ($edit && $oneCompany['id_company'] == $job['id_company']) {
                    $sel = "selected";
                } else {
                    $sel = "";
                }
                $id_company = $oneCompany['id_company'];
                $nom_company = $oneCompany['name'];
                echo '<option value="'.$id_company.'"' . $sel . '>' . $nom_company . '</option>';
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="typeContract">Type du contrat *</label>
        <select name="typeContract" class="form-control selectpicker">
            <option value=" " >Selectionner le type du contrat</option>
            <?php
            $typeContrat = array("fulltime" => "Temps plein","parttime" => "Temps partiel","freelance" => "Freelance","internship" => "Stage");
            foreach ($typeContrat as $idContrat => $contrat) {
                if ($edit && $idContrat == $job['typeContract']) {
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
        <input type="text" name="jobTitle" value="<?php echo $edit ? $job['jobTitle'] : ''; ?>" placeholder="Titre" class="form-control" required="required" id = "jobTitle" readonly onfocus="this.removeAttribute('readonly');">
    </div>

    <div class="form-group">
        <label for="location">Localisation</label>
        <input type="text" name="location" value="<?php echo $edit ? $job['location'] : ''; ?>" placeholder="Localisation" class="form-control" required="required" id = "location" readonly onfocus="this.removeAttribute('readonly');">
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

    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" name="description" class="form-control" required="required" id = "description" readonly onfocus="this.removeAttribute('readonly');"><?php echo $edit ? $job['description'] : ''; ?></textarea>
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