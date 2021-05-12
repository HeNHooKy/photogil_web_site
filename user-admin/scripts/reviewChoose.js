$('.delete_review').on('click', function() {

	var id = $(this).attr('review-id');

	var action = 'delete';

	var dBase = $(this).attr('dBase');

	var pin = '';
	pin += prompt('Введите ваш пин-код: ');

	$.ajax({
		type: "GET",
		url: 'server_controls/reviewChoose.php?action='+action+'&pin='+pin+'&dbase='+dBase+'&id='+id,
		success: function(msg) {
			alert(msg);
			window.location.reload();
		},
		error: function(msg) {
			alert('Ошибка: ' + msg);
			window.location.reload();
		}

	});
});

$('.complite_review').on('click', function() {

	var id = $('.complite_review').attr('review-id');

	var action = 'complite';

	var pin = prompt('Введите ваш пин-код: ');

	$.ajax({
		type: "GET",
		url: 'server_controls/reviewChoose.php?action='+action+'&pin='+pin+'&id='+id,
		success: function(msg) {
			alert(msg);
			window.location.reload();
		},
		error: function(msg) {
			alert('Ошибка: ' + msg);
			window.location.reload();
		}

	});
});
$(document).ready(function() {

	var length = $('#non_filtered').attr('data-number')-1;			
	var number = 0;

	$('#non_next').on('click', function() {
		number++;
		if (number > length) number = 0;
		var id = $('[non_number = '+ number+']').attr('id');
		$('.non_filtered_choose').attr('review-id', id);
	});

	$('#non_prev').on('click', function() {
		number--;
		if (number < 0) number = length;
		var id = $('[non_number = '+ number+']').attr('id');
		$('.non_filtered_choose').attr('review-id', id);
	});

});

$(document).ready(function() {

	var length = $('#filtered').attr('data-number')-1;			
	var number = 0;

	$('#next').on('click', function() {
		number++;
		if (number > length) number = 0;
		var id = $('[number = '+ number+']').attr('id');
		$('#delete_review_filtered').attr('review-id', id);
	});

	$('#prev').on('click', function() {
		number--;
		if (number < 0) number = length;
		var id = $('[number = '+ number+']').attr('id');
		$('#delete_review_filtered').attr('review-id', id);
	});

});
