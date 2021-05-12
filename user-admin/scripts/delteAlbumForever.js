$(document).ready(function() {


var count_attempt = 0;
$('#delete_forever_____').on('click', function() {
	if(count_attempt < 1) {
		$(this).css('font-size', '50%');
		count_attempt++;
	} else if(count_attempt < 2) {
		$(this).css('font-size', '5%');
		count_attempt++;
	} else {
		var pin = prompt('Введите пин-код.');
		var wed = $('#photos').attr('wed');

		var srData = '{"pin": "'+pin+'","wed":"'+wed+'"}';
		data = JSON.parse(srData);

		$.ajax({
			url: 'server_controls/deleteAlbum.php',
			data: data,
			type: 'POST',
			success: function(msg) {
				alert(msg);
				location.assign("https://ru.photodaria.com/user-admin/admin.php");
			},
			error: function() {
				alert('Кажется, альбом НЕ был удален.');
			}

		});
	}
});



})
