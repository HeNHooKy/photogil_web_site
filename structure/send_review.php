<div id="send_review" class="modal_window">

  <form enctype="multipart/form-data" id="send_review_form">

    <h4> Оставить отзыв </h4>

    <label class="set_img">
      <img id="image" alt="" />
      <span>Добавить <br> фото <br> <i>(450х450)</i> </span>
      <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
      <input type="file" accept="image/jpeg,image/gif,image/x-png" id="imgInput" name="user_img" required="true" />
    </label>

    <input name="lang" type="hidden" value="ru" required>

    <div style="display: block;" class="label_conteiner">
      <label for="name"  > Имя </label>
      <input id = "input_name" type="text" required name="name" class="send_review_input" style="width: 51.5%; margin-left: 10px; margin-bottom: 15px;">
    </div>

    <div style="display: block;" class="label_conteiner">
      <label for="tel_number"  > Телефон </label>
      <input id = "input_tel" type="tel" required name="tel_number" class="send_review_input" style="width: 43.8%; margin-left: 10px; margin-bottom: 15px;">
    </div>
    
    <div style="display: block;" class="label_conteiner">
      <label for="email" > E-mail </label>
      <input id = "input_email" type="email" required name="email" class="send_review_input" style="width: 48%; margin-left: 10px; margin-bottom: 25px;">
    </div>
    
    <div style="display: block;">
      <label for="content" class="textarea_front" required="text" > Текст </label>
      <textarea name="content" required class="send_review_input"></textarea>
    </div>
    
    <div style="display: block;">
      <input type="checkbox" class="checkbox" id="checkbox-1" required />
      <label for="checkbox-1"> Я согласен/на на обработку моих персональных данных </label>
    </div>

    <button style="float: right; margin: 10px 5px" type="submit"> Отправить </button>

  </form>

</div>