$(document).ready(function() {
	$('.rating-wrapper').stars({
		disabled: true
	});
	
	$.each($('.rating-wrapper'), function() {
		$(this).stars('select', $(this).attr('data-value'));
	});
	
});