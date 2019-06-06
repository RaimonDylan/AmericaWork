
<?php
include ('config.php');
$fonction = DB::get()->query('SELECT startAdventure(1) as id_adv');
$donneesId = $fonction->fetch();
$id_adv = $donneesId['id_adv'];
$fonction = DB::get()->query("SELECT startQuestion($id_adv,1) as id_question");
$donneesId = $fonction->fetch();
$id_question = $donneesId['id_question'];
echo $id_question;
?>

