function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);

        $('.set_img').children('span').hide();
    }
}

$("#imgInput").change(function(){
    readURL(this);
});