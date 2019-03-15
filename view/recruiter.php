<?php
/**
 * Page Admin
 * Affiche la liste des utilisateurs
 * Permet d'ajouter un utilisateur, de le modifier et de le supprimer
 */
include 'header.php';
include '../model/Mysql.php';
include '../model/User.php';
include '../model/Recruiter.php';
$dbh  = new PDO('mysql:host=localhost;dbname=america', 'root', '');
$datas = $dbh->query("SELECT * FROM user NATURAL join recruiter");
$recruiters = null;
while ($data = $datas->fetch()){
    $user = new User($data['id_user'],$data['login'],$data['password'],$data['dt_ins'],$data['surname'],$data['name'],$data['tel'],$data['mail'],$data['addr'],$data['city'],$data['pc']);
    $users[] = $user;
    $recruiters[] = new Recruiter($data['id_recruiter'],$user);
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="student.php">Etudiants</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="recruiter.php">Recruteurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="job.php">Annonces</a>
            </li>
        </ul>
    </div>
</nav>
<div style="width: 80%; margin-left: auto; margin-right: auto; margin-top: 1%">
    <h2 style="float:left;">liste recruteurs</h2>
    <form style="float:right;"  method="post" action="ajoutRecruiter.php">
        <input type="submit" value="Ajouter recruteur" class = "btn btn-primary"></button>
    </form>
    <?php

    echo "<table class='table table-striped' style='text-align: center;'>
    <thead class='thead-dark'>
        <tr>
            <th>id</th>
            <th>Login</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Gestion</th>
        </tr>
    </thead>
    <tbody>";
    foreach ($recruiters as $recruiter){
        $id = $recruiter->getIdRecruiter();
        $user = $recruiter->getUser();
        $login = $user->getLogin();
        $nom = $user->getSurname();
        $prenom = $user->getName();
        echo "<tr>
                <td>$id</td>
                <td>$login</td>
                <td>$nom</td>
                <td>$prenom</td>
                <td>
                    <i data-id='$id' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i data-id='$id' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
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
                // TODO
            }
        });

        $(document).on("click",".update",function () {
            // TODO
        });
    })
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>