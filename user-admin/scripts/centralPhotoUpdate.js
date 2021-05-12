$(document).ready(function() {

  $('#central_photo').submit(function() {
    event.stopPropagation(); // Остановка происходящего
    event.preventDefault();  // Полная остановка происходящего

    setimage($('input[name=central_photo_image]'), 'server_controls/db_manipulate/loadCentralPhoto.php?count='+$('#central_photo').attr('slide'));
  });
  $('#central_photo').children('.prev').on('click', function() {
  	var count = +$('#central_photo').attr('slide');
  	count--;
  	if(count <= 0) {
  		count = 5;
  	}
  	changeSlide(count);
  });
  function changeSlide(count) {
  	if($('#central_photo').children('input[type=file]').val( ) != '') {
  		var isGo = confirm('Вы уже загрузили файл. Уверены, что хотите продолжить? Загрузка этого файла будет отменена. (Нажмите esc или "cancel", чтобы отменить операцию)');
  	} 
  	if(($('#central_photo').children('input[type=file]').val( ) == '') || isGo) {
  		$('#central_photo').children('p').text('Слайд # '+count);
  		$('#central_photo').attr('slide', count);
  		$('#central_photo').children('input[type=file]').val('');
  	}
  }

  $('#central_photo').children('.next').on('click', function() {
  	var count = +$('#central_photo').attr('slide');
  	count++;
  	if(count > 5) {
  		count = 1;
  	}
  	changeSlide(count);
  });
    
});