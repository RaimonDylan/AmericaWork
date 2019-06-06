
<?php
include ('config.php');
$id_question = $_GET['id'];
$fonction = DB::get()->query("CALL getResultsVote($id_question)");
$nb_vote = 0;
$num_choice = 0;
while($donnees = $fonction->fetch()){
    if($donnees['nb_vote'] > $nb_vote){
        $nb_vote = $donnees['nb_vote'];
        $num_choice = $donnees['num_choice'];
    }
}
echo $num_choice;
?>

