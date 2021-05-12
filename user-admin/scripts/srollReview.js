$(document).ready(function () {

	$('.review_content').css('display','inline-block')
						.hide();

	var length_non_filetered = $('#non_filtered').attr('data-number')-1;			
	var number_non_filetered = 0;

	$('[non_number = '+number_non_filetered+']').show();

	$('#non_next').on('click', function() {
		
		$('[non_number = '+number_non_filetered+']').hide();
		number_non_filetered++;
		if(number_non_filetered > length_non_filetered) number_non_filetered = 0;
		$('[non_number = '+number_non_filetered+']').stop()
								.animate({opacity: 'show'},600);
	});

	$('#non_prev').on('click', function() {
		
		$('[non_number = '+number_non_filetered+']').hide();
		number_non_filetered--;
		if(number_non_filetered < 0) number_non_filetered = length_non_filetered;
		$('[non_number = '+number_non_filetered+']').stop()
								.animate({opacity: 'show'},600);
	});

//Повторить для другоих отзывов

	var length = $('#filtered').attr('data-number')-1;			
	var number = 0;

	$('[number = '+number+']').show();

	$('#next').on('click', function() {
		
		$('[number = '+number+']').hide();
		number++;
		if(number > length) number = 0;
		$('[number = '+number+']').stop()
								.animate({opacity: 'show'},600);
	});

	$('#prev').on('click', function() {
		
		$('[number = '+number+']').hide();
		number--;
		if(number < 0) number = length;
		$('[number = '+number+']').stop()
								.animate({opacity: 'show'},600);
	});




});