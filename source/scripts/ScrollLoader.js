        var begining = false;
        var changingText = $('.changingText').text(); //Статичная переменная

        // Вставка изображений в html
        var renderImages = function(images) {
            var html = '';

            // подготовка html
            if(images != null) {
                for (var i = 0; i < images.length; i++) {
                    html += '<img src="' + images[i] + '" class="album_photo" style="display: none; opacity: 0">';
                }

                begining = false;
            }

            // вставка фото в html с классом js_images
            $('.album').append(html);
            setTimeout(function() {
                    $('#photo_load').animate({opacity: 0}, 200)
                                .hide();
                    $('.album_photo').show()
                                     .animate({opacity: 1}, 1000);
                    }, 400);
            
        };

        // Вытащить изображения
        var getImages = function(page, wed) {
            $.ajax({

                // можно вставить свой url
                // source/php/album/getLink.php?page=
                url: "source/php/album/getLink.php?page=" + page +"&wed=" + wed,
                type: "GET",
                success: function(res) {

                    // если сервер выдает в json формате нужно подготовить его для дальнейшей обработки
                    // если нет, то просто var images = res;
                    var images = JSON.parse(res);

                    // Если не пусто
                    if (images != 'null') {

                        // увеличить страницу на 1
                        var currentPage = +$('.album').attr('data-page');
                        $('.album').attr('data-page', currentPage + 1);

                        // отобразить изображения
                        return renderImages(images);
                    }
                },
                error: function(err) {
                    console.log(err + "::error_2");
                }
            });
        };


    $(document).on('scroll', function() {
        if(!begining && $(window).scrollTop()>100 && $(".album img").children('.album_photo').length > 1) {
            if($(window).scrollTop() > $(".album img:last-child").offset().top-100) {
                
                // возьмем текущую страницу
                var page = $('.album').attr('data-page');

                var wed = $('.album').attr('wed');

                $('#photo_load').show('fast')
                                .animate({opacity: 1}, 100);

                // получим фото и вставим в html
                return getImages(page, wed);
            }
        }
    });

    $(".portfolio_block").on('click', function() { //Тут подключим возможность изменять загружаемый альбом прямо на странице
        begining = false; // Закрываем все загруженные фото
        $('.album').animate({opacity: 0, height: 0}, 300);
        //обнуляем счетчик
        $(".album").attr("data-page", 1);
        var this_o = $(this);
        //Обновим заглавный текст:
        var addText = $(this).children('h4').text();
        $('.changingText').text(addText);

        setTimeout(function() {
            $('.album').empty();
            //добавляем новую метку для блока с фото
            $(".album").attr("wed", this_o.attr("wed"));

            var lang = $('.language').attr('lang'); //Получим description
            var wed = $('.album').attr('wed');
            $.ajax({
                url: 'source/php/album/getDescription.php?lang='+lang+'&wed='+wed,
                type: 'GET',
                success: function(description) {
                    $('.description').text(description);
                },
                error: function() {
                    console.log('error get description.');
                }
            });
            
            var page = $('.album').attr('data-page');

            var wed = $('.album').attr('wed');

            // получим фото и вставим в html
            $('.album').animate({opacity: 1}, 300);
            $('.album').css('height','auto');

            //Вернем крестик
            $('#mom_slash').animate({opacity: 1}, 200);
            $(this).show();

            $('body').animate( { scrollTop: 400 }, 1600 );
            $('html').animate( { scrollTop: 400 }, 1600 );

            return getImages(page, wed);
            
        }, 400);
        

    });