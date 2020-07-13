$(document).ready(function() {

    $('#form').submit(function () {
        var username = $('#login').val();
        var password = $('#password').val();
        if(username == "admin" && password =="123"){
            return true;
        }
        else{
            $('#login').addClass(" is-invalid");
            $('#password').addClass(" is-invalid");
            if ($('.invalid-feedback').children('#er').length == 0){
                $('.invalid-feedback').append('<p id="er">Неправильно введен логин или пароль</p>');
            }
            return false;
        }
    })
})