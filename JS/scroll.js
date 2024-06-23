jQuery(document).ready(function($){
    $('#button').fadeOut(); //скрываем кнопку
    $(window).scroll(function () {
    if ($(this).scrollTop() > 150) { // при прокрутке страницы на 200 пикселей вниз
    $('#button').fadeIn();   // отображаем кнопку
    } else {
    $('#button').fadeOut(); // в противном случае скрываем
    }
    });
    });