
<?php
include ('config.php');
$fonction = DB::get()->query('CALL closeAdventure()');
$donneesId = $fonction->fetch();
?>

