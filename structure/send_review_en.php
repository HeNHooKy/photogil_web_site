<div id="send_review" class="modal_window">

  <form enctype="multipart/form-data" id="send_review_form">

    <h4> Contact </h4>

    <label class="set_img">
      <img id="image" alt="" />
      <span>Add <br> photo <br> <i>(450х450)</i> </span>
      <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
      <input type="file" accept="image/jpeg,image/gif,image/x-png" id="imgInput" name="user_img" required="true" />
    </label>
    
    <input type="hidden" value="en" required name="lang" >

    <div style="display: block;" class="label_conteiner">
      <label for="name"  > Name </label>
      <input id = "input_name" type="text" required name="name" class="send_review_input" style="width: 51.5%; margin-left: 10px; margin-bottom: 15px;">
    </div>

    <div style="display: block;" class="label_conteiner">
      <label for="tel_number"  > Phone </label>
      <input id = "input_tel" type="tel" required name="tel_number" class="send_review_input" style="width: 43.8%; margin-left: 10px; margin-bottom: 15px;">
    </div>
    
    <div style="display: block;" class="label_conteiner">
      <label for="email" > E-mail </label>
      <input id = "input_email" type="email" required name="email" class="send_review_input" style="width: 48%; margin-left: 10px; margin-bottom: 25px;">
    </div>
    
    <div style="display: block;">
      <label for="content" class="textarea_front" required="text" > Text </label>
      <textarea name="content" required class="send_review_input"></textarea>
    </div>
    
    <div style="display: block;">
      <input type="checkbox" class="checkbox" id="checkbox-1" required />
      <label for="checkbox-1"> I agree to the processing of my personal data </label>
    </div>

    <button style="float: right; margin: 10px 5px" type="submit"> Send </button>

  </form>

</div>