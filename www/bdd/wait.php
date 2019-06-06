
<?php
include ('config.php');
$question = DB::get()->query('SELECT * FROM question');
$donneesQuestion = $question->fetch();
print_r($donneesQuestion);
?>

