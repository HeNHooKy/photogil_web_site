$(document).ready(function() {

  // $('#create_album').find(('[type = radio]')).on("change", function() {
  //   var value = $(this).val();

  //   if(value != 'new') {
  //     var name, real_name, description;
  //     $.ajax({
  //         type: 'GET',
  //         url: 'server_controls/createOrChangeAlbum_source/returnInfo.php?value='+value+'&action=albumDescript',
  //         success: function(array) {
  //           array = JSON.parse(array);
  //           name = array['album'];
  //           real_name = array['real_name'];
  //           description = array['write'];

  //           $('#create_album').find('[name=album_name]').attr('value', '');
  //           $('#create_album').find('[name=album_image]').attr('required', 'true');
  //           $('#create_album').find('[name=album_real_name]').attr('value', '');
  //           $('#create_album').find('[name=description]').text('');

  //           $('#create_album').find('[name=album_image]').removeAttr('required');
  //           $('#create_album').find('[name=album_name]').attr('value', real_name);
  //           $('#create_album').find('[name=album_real_name]').attr('value', name);
  //           $('#create_album').find('[name=description]').text(description);
  //         },
  //         error: function() {
  //           console.log('error');
  //         }
  //     });

  //   } else {
  //     $('#create_album').find('[name=album_name]').attr('value', '');
  //     $('#create_album').find('[name=album_image]').attr('required', 'true');
  //     $('#create_album').find('[name=album_real_name]').attr('value', '');
  //     $('#create_album').find('[name=description]').text('');
  //   }

  // });

    $('#create_album').on('submit', function() {
      event.stopPropagation(); // Остановка происходящего
      event.preventDefault();  // Полная остановка происходящего
      
      $.ajax({
        type: 'POST',
        url: 'server_controls/db_manipulate/album_recreate.php',
        data: $(this).serialize(),
        success: function(msg) {
          
          if($('input[name=album_image]').val() != '') {
            setimage($('input[name=album_image]'), 'server_controls/db_manipulate/album_recreate_photo.php?name='+$('input[name=album_real_name]').val(), msg);
          } else {
            showMessage(msg);
          }
          if($('[name="album_rad"]:checked').attr('value') != 'new') {
            $('[name="album_rad"]:checked').attr('value', $('[name="album_real_name"]').val())
          } else {
            window.location.reload();
          }
        },
        error: function(msg) {
          showMessage(msg);
        }
      });
      

    });
    $('.album_update_form').on('submit', function() {
      event.stopPropagation(); // Остановка происходящего
      event.preventDefault();  // Полная остановка происходящего
      
      $.ajax({
        type: 'POST',
        url: 'server_controls/db_manipulate/album_recreate_content.php',
        data: $(this).serialize(),
        success: function(msg) {
          
          if($('input[name=am_foto]').val() != '') {
            setimage($('input[name=am_foto]'), 'server_controls/db_manipulate/album_recreate_photo.php?name='+$('#photos').attr('wed'), msg);
          } else {
            showMessage(msg);

          }
        },
        error: function(msg) {
          showMessage(msg);
        }
    });
  });
});