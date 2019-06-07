

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

});