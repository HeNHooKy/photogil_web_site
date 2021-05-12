$('.open_modal').on('click', function() {

	var select_modal = $(this).attr('modal');

	console.log(select_modal);

	$('#'+select_modal).show()
					   .animate({opacity: 1}, 200);
	$('#modal_back').show();

});

$('#modal_back').on('click', function() {
	if(downloading_proces == false) {
		$('.modal_window').animate({opacity: 0}, 200)
						.hide();
		$('#modal_back').hide();
		$("form").trigger('reset');
	}
})

$('#message').on('click', function() {
	$('#message').hide();
});