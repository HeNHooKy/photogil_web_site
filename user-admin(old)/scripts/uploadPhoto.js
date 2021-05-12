$('.upload_form').on('submit',function(e) {
	e.preventDefault();
    var $that = $(this);
	formData = new FormData($that.get(0));

	var pin = prompt('Подтвердите ваше действие.(pin-code)');
	$.ajax({
		type: 'POST',
		url: 'server_controls/uploadInServer.php',
		data: formData,
		dataType: 'json',
		contentType: false,
		processData: false,
		success: function(msg) {
			alert('Успех! Все фото загружены. ' + msg);
			window.location.reload();
		},
		error: function(msg) {
			alert('Передача не была завершена. Возможная причина: ' + msg);
		}
	});
});