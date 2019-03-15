<?php
/**
 * Page Admin
 * Affiche la liste des utilisateurs
 * Permet d'ajouter un utilisateur, de le modifier et de le supprimer
 */
include 'header.php';
include '../model/Mysql.php';
include '../model/User.php';
$dbh  = new PDO('mysql:host=localhost;dbname=america', 'root', '');
$datas = $dbh->query("SELECT * FROM recruiter");
$utilisateurs = null;
while ($data = $datas->fetch()){
    $utilisateurs[] = new Utilisateur($data['idUtilisateur'],$data['nom'], $data['prenom'], $data['login'], $data['password'],$data['dtNaissance']);
}
?>
<div style="width: 80%; margin-left: auto; margin-right: auto; margin-top: 1%">
    <h2 style="float:left;">Admin</h2>
    <form style="float:right;"  method="post" action="ajoutUtilisateur.php">
        <input type="submit" value="Ajouter utilisateur" class = "btn btn-primary"></button>
    </form>
    <?php

    echo "<table class='table table-striped' style='text-align: center;'>
    <thead class='thead-dark'>
        <tr>
            <th>Login</th>
            <th>Password</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Gestion</th>
        </tr>
    </thead>
    <tbody>";
    foreach ($utilisateurs as $utilisateur){
        $login = $utilisateur->getLogin();
        $password = $utilisateur->getMotDePasse();
        $nom = $utilisateur->getNom();
        $prenom = $utilisateur->getPrenom();
        $dtNaissance = $utilisateur->getDtNaissance();
        $id = $utilisateur->getId();
        echo "<tr>
                <td>$login</td>
                <td>$password</td>
                <td>$nom</td>
                <td>$prenom</td>
                <td>$dtNaissance</td>
                <td>
                    <i class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                    <form style='display: none' class='formDelete' action='../controller/delete.php' method='POST'>
                       <input type='hidden' name='id' value='$id'/>
                    </form>
                    <form style='display: none' class='formUpdate' action='modifUtilisateur.php' method='POST'>
                       <input type='hidden' name='id' value='$id'/>
                     </form>
                </td>
              </tr>";
    }
    echo "</tbody></table>";

    ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click",".delete",function () {
            if(confirm("Voulez vous vraiment supprimer cet utilisateur ?"))
            {
                $(this).parent().find('.formDelete').submit();
            }
        });

        $(document).on("click",".update",function () {
            $(this).parent().find('.formUpdate').submit();
        });
    })
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>