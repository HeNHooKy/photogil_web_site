$('.delete_review').on('click', function() {

	var id = $('.delete_review').attr('review-id');

	var action = 'delete';

	var pin = '';
	pin += prompt('Введите ваш пин-код: ');

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

	var length = $('#review_block').attr('data-number')-1;			
	var number = 0;

	$('#block_next').on('click', function() {
		number++;
		if (number > length) number = 0;
		var id = $('[number = '+ number+']').attr('id');
		$('.delete_review').attr('review-id', id);
		$('.complite_review').attr('review-id', id);
	});

	$('#block_prev').on('click', function() {
		number--;
		if (number < 0) number = length;
		var id = $('[number = '+ number+']').attr('id');
		$('.delete_review').attr('review-id', id);
		$('.complite_review').attr('review-id', id);
	});

})
