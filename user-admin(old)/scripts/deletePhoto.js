$('.mom_slash').on('click',function() {

	var id = $(this).attr('id');

	var elem = $(this);

	var sql = elem.parent().parent().parent().attr('id');

	console.log(sql);

	$.ajax({
		type: "GET",
		url: 'server_controls/deletePhoto.php?id=' + id + '&sql=' + sql,
		success: function(msg) {
			alert('Фото '+ msg +' было удалено.');
			elem.parent().parent().empty();
			window.location.reload();
		},
		error: function(msg) {
			alert('Что-то пошло не так.. Код ошибки: ' + msg);
		}
	});
});