<div id="send_message" class="modal_window">

  <form enctype="multipart/form-data" id="send_message_form">

    <h4> Contact </h4>


    <input name="lang" type="hidden" value="en" required>
    <div style="display: block;" class="label_conteiner">
      <label for="name"  > Name </label>
      <input type="text" required name="name" class="send_review_input" style="width: 79.8%; margin-left: 10px; margin-bottom: 15px;">
    </div>

    <div style="display: block;" class="label_conteiner">
      <label for="tel_number"  > Telephone </label>
      <input type="tel" required name="tel_number" class="send_review_input" style="width: 70.7%; margin-left: 10px; margin-bottom: 15px;">
    </div>
    
    <div style="display: block;" class="label_conteiner">
      <label for="email" > E-mail </label>
      <input type="email" required name="email" class="send_review_input" style="width: 79.2%; margin-left: 10px; margin-bottom: 25px;">
    </div>
    
    <div style="display: block;">
      <label for="content" class="textarea_front" > Text </label>
      <textarea name="content" required class="send_review_input" style="width: 84%"></textarea>
    </div>
    
    <div style="display: block;">
      <input type="checkbox" class="checkbox" id="checkbox-2" required />
      <label for="checkbox-2"> I agree to the processing of my personal data </label>
    </div>

    <button style="float: right; margin: 10px 5px" type="submit"> Send message </button>

  </form>

</div>