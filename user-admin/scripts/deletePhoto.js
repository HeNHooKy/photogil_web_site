$('.mom_slash').on('click',function() {

	var id = $(this).attr('id');

	var that_slash = $(this);

	var img = $(this).parent().children('.image');

	var sql = $('#photos').attr('wed');

	console.log(sql);

	$.ajax({
		type: "GET",
		url: 'server_controls/deletePhoto.php?id=' + id + '&sql=' + sql,
		success: function(msg) {
			showMessage('Фото '+ msg +' было удалено.');
			that_slash.remove();
			img.remove();
		},
		error: function(msg) {
			showMessage('Что-то пошло не так.. Код ошибки: ' + msg);
		}
	});
});