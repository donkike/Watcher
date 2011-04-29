$(document).ready(function() {
	$('div.movie-index .rating-wrapper').stars({
		split: 2,
		starWidth: 30,
		disabled: true,
		captionEl: $('.rating-overall')
	});
	
	$('div#movie-info .rating-wrapper').stars({
		split: 2,
		starWidth: 30,
		captionEl: $('.rating-caption'),
		oneVoteOnly: true,
		callback: function(ui, type, value) {
			var movie_id = $('div#movie-info').attr('data-movie');
			var url = '/frontend_dev.php/movieRating/' + movie_id + '/rateMovie/' + value;
			$.post(url);
			alert("Thanks for voting!");
		}
	});
	
	$.each($('div.movie-index .rating-wrapper'), function() {
		$(this).stars('select', $(this).attr('data-value'));
	});
	
});