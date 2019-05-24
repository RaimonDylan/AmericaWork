

jQuery(document).ready(function($) {

	$('body').on('click', '.arrow-collapse', function(e) {
		var $this = $(this);
		if ( $this.closest('li').find('.collapse').hasClass('show') ) {
			$this.removeClass('active');
		} else {
			$this.addClass('active');
		}
		e.preventDefault();

	});
});