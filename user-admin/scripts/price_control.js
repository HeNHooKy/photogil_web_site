$(document).ready(function() {
  re_p();
  re_span();
  re_h2();
  re_price();

  var begining = false;

  function re_p() {//replace

    $( "p" ).dblclick(function() {
      if(begining == false) {

        var that = this;
        var input = '<input type="text" name="';
        input += $(this).parent('section').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+$(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';

        $(this).replaceWith(input);

        re_input("p", that);
      }

    });
  }

  function re_p_again(that) {

    $(that).dblclick(function() {
      if(begining == false) {

        var input = '<input type="text" name="';
        input += $(this).parent('section').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+$(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';

        $(this).replaceWith(input);

        begining = true;

        re_input("p", that);

      }
    });
  }

  function re_span() {

    $( "span" ).dblclick(function() {
      if(begining == false) {

        var input = '<input type="text" name="';
        input += $(this).closest('div').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+$(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';

        $(this).replaceWith(input);

        begining = true;

        re_input("span");
      }

    });
    
  }

  function re_span_again(that) {

    $( that ).dblclick(function() {
      if(begining == false) {

        var input = '<input type="text" name="';
        input += $(this).closest('div').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+$(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';

        $(this).replaceWith(input);

        begining = true;

        re_input("span");
      }

    });
    
  }

  function re_h2() {
    $( "h2" ).dblclick(function() {
      if(begining == false) {

        var input = '<input type="text" name="';
        input += $(this).parent('div').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+$(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';

        $(this).replaceWith(input);

        begining = true;

        re_input("h2");
      }

      });
  }

  function re_h2_again(that) {
    $(that).dblclick(function() {
      if(begining == false) {

        var input = '<input type="text" name="';
        input += $(this).parent('div').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+$(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';

        $(this).replaceWith(input);

        begining = true;

        re_input("h2");
      }

      });
  }



  function re_price() {

    $( "h3" ).dblclick(function() {
      if(begining == false) {
      
        var input = '<input type="text" name="';
        input += $(this).parent('div').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+ $(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';
        
        $(this).replaceWith(input);

        begining = true;

        re_input("h3");
      }
        
    });
        
  }

  function re_price_again(that) {

    $(that).dblclick(function() {
      if(begining == false) {
      
        var input = '<input type="text" name="';
        input += $(this).parent('div').attr('name')+'" ';
        input += 'style="width:'+$(this).css('width')+'; height:'+30+';" ';
        input += 'value="'+ $(this).text() + '" number ="';
        input += $(this).attr('number') + '" />';
        
        $(this).replaceWith(input);

        begining = true;

        re_input("h3");
      }
        
    });
        
  }

  function re_input(teg) {

    $('input').on( "focusout", function() {

      var that = $(this); //Сохраняем input вызвавший функцию c::::>>>>>>>>>>>>

      var value = $(this).val();
      var name = $(this).attr('name');
      var number = $(this).attr('number');
      var lang = $('.language').attr('lang');

      var ph_value = value.trim();

      if(ph_value != '') {

        value = value.replace(/\*\*/ig, "<br />");

        if(teg == 'h3') {
          if(value.match(/€/ig) != null) { //Находим коль-во элеменетов эвро(Если нет, устанавливаем в ноль и для value+)
            var a = value.match(/€/ig).length;
            if(a>1) {
              value = value.replace(/€/ig, "");
              value += " €";
            }
          } else {
            var a = 0;
            value += " &#8364;";
          } 
        }

        var data = '{"value": "'+value+'", "name": "'+name+'", "number": "'+number+'", "lang": "'+lang+'"}';

        data = JSON.parse(data);

        $.ajax({ // Отправляем данные
          type: 'POST',
          data: data,
          url: 'user-admin/server_controls/price_rewrite.php',
          success: function(msg) { //Закрываем input

            var p = '<'+ teg +' number="'+ number +'" >' //Формируем return тега
            p += value;
            p += '</'+teg+'>';

            that.replaceWith(p);

            if(teg == "p") {
              var NEW_THAT = $('section[ name = "'+name+'"]').children(teg+'[ number = "'+number+'"]');
              re_p_again(NEW_THAT);
            } else if(teg == "span") {
              var NEW_THAT = $('div[ name = "'+name+'"]').find(teg+'[ number = "'+number+'"]');
              re_span_again(NEW_THAT);
            } else if(teg == "h2") {
              var NEW_THAT = $('div[ name = "'+name+'"]').children(teg+'[ number = "'+number+'"]');
              re_h2_again(NEW_THAT);
            } else if(teg == "h3") {
              var NEW_THAT = $('div[ name = "'+name+'"]').children(teg+'[ number = "'+number+'"]');
              re_price_again(NEW_THAT);
            }

            begining = false;

            console.log(msg);

          }
        });
      } else {
        alert('Осторожно: Вы оставили поле пустым! Перезагрузка страницы');
        window.location.reload();
      }
    });

  }

  function showMessage(msg) {
    $('#message p').text(msg);
    $('#message').show()
           .animate({opacity: 1}, 200);
  }

  $('#message').on('click', function() {
    $('#message').hide('fast');
  });
    
  showMessage('Добро пожаловать! Чтобы изменить поле кликните по нему дважды. Когда вы открываете поле - все переходы на следующую строку сбрасываются. Чтобы добавить свой переход на след строку в тексте добавьте знак  " ** "  . ');
});
