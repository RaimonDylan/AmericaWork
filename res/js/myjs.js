

jQuery(document).ready(function($) {

	$('.typeSignup').on('change', function() {
		let choix = $('input[name="choice"]:checked').val();
		if(choix == "student"){
			$('.student').show();
		}else{
			$('.student').hide();
		}
	});

	$('#forget').on('click', function() {
		$(".login").hide();
		$(".forgot").show();
	});

	$('#Rechercher').on('click', function(e) {
		var emploi = $("#emploi").val();
		alert(emploi);
		var contrat = $("#contrat").val();
		var localisation = $("#autocomplete").val();

		$('#listeAnnonce').empty();
		$.ajax({
			url: "views/job/filtrer.php",
			type: "post",
			data: {
				name: emploi,
				type: contrat,
				localisation: localisation
			},
			success: function(data) {
				//$('.job'+id_job).append("<button disabled href='#' class='btn btn-success py-2'>Vous avez postulé</button>&nbsp;<a href='javascript:removePostuler("+id_job+")' class='btn btn-danger py-2 removePostuler'> Annuler</a>");
				alert(data);
			},
			error: function(xhr) {
				alert(xhr.text);
			}
		});
	});
});