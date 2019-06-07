

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
		var contrat = $("#contrat").val();
		var localisation = $("#autocomplete").val();

		$('#listeAnnonce').empty();
		$.ajax({
			url: "views/job/filtrer.php",
			type: "post",
			data: {
				"name": emploi,
				"type": contrat,
				"localisation": localisation
			},
			success: function(data) {
				$('#listeAnnonce').append(data);
			},
			error: function(xhr) {
			}
		});
	});
});