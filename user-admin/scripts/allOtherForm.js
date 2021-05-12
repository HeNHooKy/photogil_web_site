$(document).ready(function() {

 $('#new_about_me').on('submit', function() {
	event.stopPropagation(); // Остановка происходящего
  event.preventDefault();  // Полная остановка происходящего
  
  $.ajax({
    type: 'POST',
    url: 'server_controls/db_manipulate/about_meUpdate.php',
    data: $(this).serialize(),
    success: function(msg) {
      if($('input[name=about_me_image]').val() != '') {
        setimage($('input[name=about_me_image]'), 'server_controls/db_manipulate/about_meUpdate_photo.php', msg);
      } else {
        showMessage(msg);
      }
    },
    error: function() {
      showMessage(msg);
    }

  });
 });

 $('#change_contacts').on('submit', function() {
  event.stopPropagation(); // Остановка происходящего
  event.preventDefault();  // Полная остановка происходящего

  $.ajax({
    type: 'POST',
    url: 'server_controls/db_manipulate/socialServiceUpdate.php',
    data: $(this).serialize(),
    success: function(msg) {
      showMessage(msg);
    },
    error: function(msg) {
      showMessage(msg);
    }

  });

 });

 $('#change_header').on('submit', function() {
  event.stopPropagation(); // Остановка происходящего
  event.preventDefault();  // Полная остановка происходящего

  $.ajax({
    type: 'POST',
    url: 'server_controls/db_manipulate/headerUpdate.php',
    data: $(this).serialize(),
    success: function(msg) {
      showMessage(msg);
    },
    error: function(msg) {
      showMessage(msg);
    }
  });
 })

});