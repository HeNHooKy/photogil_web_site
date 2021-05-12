$('.upload_form').on('submit',function() {
	event.stopPropagation(); // Остановка происходящего
    event.preventDefault();  // Полная остановка происходящего

	formData = new FormData($(this).get(0));

	$.ajax({
		type: 'POST',
		url: 'server_controls/uploadInServer.php',
		data: formData,
		dataType: 'json',
		contentType: false,
		processData: false,
		success: function() {
			window.location.reload();
		},
		error: function() {///ГИГАНСКИЙ КОСТЫЛЬ! как пойму - изменить.
			window.location.reload();
		}
	});
});
