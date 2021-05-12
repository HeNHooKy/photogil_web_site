var downloading_proces = false;
$(document).ready(function() {


	function returnIsSend() {
		var message;
		$.ajax({
			url: 'source/php/index/isSendReview.php?send=request',
			type: 'GET',
			success: function(msg) {
				if(msg != '') {
					message = msg;
				} 
			},
			error: function() {
				alert('You broke It!');
			}
		});
		return message;
	}

	function setimage() {
		var $input = $("#imgInput");
		var fd = new FormData;

		fd.append('img', $input.prop('files')[0]);

		$.ajax({
			url: 'source/php/index/imgReviewTBD.php?',
			data: fd,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function (msg) {
				showMessage(msg);
				$('#loading_process').hide();
				$("form").trigger('reset');
			},
			error: function(msg) {
				$('#loading_process').hide();
				showMessage('No connect to the server');
			}
		});
	}

	function showMessage(msg) {
		$('#modal_back').hide();
		$('.modal_window').hide();
		$('#message p').text(msg);
		$('#message').show()
					 .animate({opacity: 1}, 200);
		downloading_proces = false;
		$('#modal_back').css('cursor', 'pointer');
		setTimeout(function(){
			$('#message').animate({opacity: 0}, 200)
						 .hide();
		}, 3000);
	}

	

	$('#send_review_form').submit(function() {
		event.stopPropagation(); // Остановка происходящего
    	event.preventDefault();  // Полная остановка происходящего
    	
    	$('.modal_window').hide();
		$('#loading_process').show();
		downloading_proces = true;
		$('#modal_back').css('cursor', 'default');

		$.ajax({
			type: 'POST',
			url: 'source/php/index/dataToDB.php',
			data: $(this).serialize(),
			success: function() {
				setimage();
			},
			error: function() {
				var message = 'No connect to server, or giving so less arguments!';

				if(!(returnIsSend() != '')) {
					message = returnIsSend();
				}
				$('#modal_back').hide();
				$('.modal_window').hide();
				$('#loading_process').hide();
				showMessage(message);
				
				
			}
		});
	});

	$("#send_message_form").submit(function(event) { //Вставить название(id) формы
		event.stopPropagation(); // Остановка происходящего
    	event.preventDefault();  // Полная остановка происходящего

    	var name = $('input[name=name]').val();
    	var number = $('input[name=tel_number]').val();
    	var email = $('input[name=email]').val();
    	var content = $('.send_review_input textarea').val();

		var solution = $.ajax({
			type: "POST",
			url: "source/php/index/toMail.php", //Вставить ссылку на php
			data: $(this).serialize()
		});

		solution.done(function(msg) {
			showMessage(msg);
			$("form").trigger('reset'); 
		});
		
		solution.fail(function(msg) {
			showMessage(msg);
		});
	});

});

