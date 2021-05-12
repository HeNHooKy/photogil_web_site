<div id="send_message" class="modal_window">

  <form id="send_message_form" enctype="multipart/form-data">

    <h4> Написать фотографу </h4>


    <input name="lang" type="hidden" value="ru" required>
    <div style="display: block;" class="label_conteiner">
      <label for="name"  > Имя </label>
      <input type="text" required name="name" class="send_review_input" style="width: 84%; margin-left: 10px; margin-bottom: 15px;">
    </div>

    <div style="display: block;" class="label_conteiner">
      <label for="tel_number"  > Телефон </label>
      <input type="tel" required name="tel_number" class="send_review_input" style="width: 74.2%; margin-left: 10px; margin-bottom: 15px;">
    </div>
    
    <div style="display: block;" class="label_conteiner">
      <label for="email" > E-mail </label>
      <input type="email" required name="email" class="send_review_input" style="width: 79.2%; margin-left: 10px; margin-bottom: 25px;">
    </div>
    
    <div style="display: block;">
      <label for="content" class="textarea_front" > Текст </label>
      <textarea name="content" required class="send_review_input"></textarea>
    </div>
    
    <div style="display: block;">
      <input type="checkbox" class="checkbox" id="checkbox-2" required />
      <label for="checkbox-2"> Я согласен/на на обработку моих <br> персональных данных </label>
    </div>

    <button style="float: right; margin: 10px 5px" type="submit"> Отправить </button>

  </form>

</div>