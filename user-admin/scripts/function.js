function setimage(obj, url, add_msg) {
  var $input = obj;
  var fd = new FormData;

  fd.append('img', $input.prop('files')[0]);

  $.ajax({
    url: url,
    data: fd,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (msg) {
      if(add_msg) {
        showMessage(msg+add_msg);
      } else {
        showMessage(msg);
      }
      
      $("form").trigger('reset');
    },
    error: function(msg) {
      showMessage('Нет подключения к серверу.');
    }
  });
}

function showMessage(msg) {
  $('#modal_back').hide();
  $('.modal_window').hide();
  $('#message p').text(msg);
  $('#message').show()
         .animate({opacity: 1}, 200);
  $('#modal_back').css('cursor', 'pointer');
  setTimeout(function(){
    $('#message').animate({opacity: 0}, 200)
           .hide();
  }, 3000);
}

  $('#message').on('click', function() {
    $('#message').hide();
  });

  var slide_status = false;

  function slide(object, height) {
    if(!slide_status) {
      slide_status = true;
      $(object).show();
      $(object).animate({height: height+'px'}, 200);
    } else {
      slide_status = false;
      $(object).animate({height: 0+'px'}, 200);
      setTimeout(function(){
        $(object).hide();
      }, 200)
                
    }
  }

  