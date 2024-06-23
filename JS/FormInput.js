$(document).ready(function () {
    $("#form-input").submit(function () {
        // Получение ID формы
        var formID = $(this).attr('id');
        // Добавление решётки к имени ID
        var formNm = $('#' + formID);
        $.ajax({
            type: "POST",
            url: '../PHPRedact/FormInputScript.php',
            data: formNm.serialize(),
           success: function (data) {
                // Вывод текста результата отправки
               $(formNm).html(data);
               location.reload();             
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $(formNm).html(error);
            } 
        });
        return false;
    });
});

window.onload = init;

function init() {
    var button = document.getElementById("button-out")
    button.onclick = handleButtonClick;
    var button = document.getElementById("button-add")
    button.onclick = handleButtonClickA;
    var button = document.getElementById("button-del")
    button.onclick = handleButtonClickD;
}

function handleButtonClick() {
    var formID = $(this).attr('id');
    // Добавление решётки к имени ID
    var formNm = $('#' + formID);
    $.ajax({
        type: "POST",
        url: '../FormScript/FormOutScript.php',
        data: formNm.serialize(),
        success: function (data) {
            // Вывод текста результата отправки
            $(formNm).html(data);
            location.reload();
        },
        error: function (jqXHR, text, error) {
            // Вывод текста ошибки отправки
            $(formNm).html(error);
        }
    });
}

function handleButtonClickA() {
    var formNm = $('#form-input');
    $.ajax({
        type: "POST",
        url: '../PHPRedact/FormAddScript.php',
        data: formNm.serialize(),
        success: function (data) {
            // Вывод текста результата отправки
            alert(data);
        },
        error: function (jqXHR, text, error) {
            // Вывод текста ошибки отправки
            $(formNm).html(error);
        }
    });
}

function handleButtonClickD() {
    var formNm = $('#form-input');
    $.ajax({
        type: "POST",
        url: '../PHPRedact/FormDelScript.php',
        data: formNm.serialize(),
        success: function (data) {
            // Вывод текста результата отправки
            alert(data);

        },
        error: function (jqXHR, text, error) {
            // Вывод текста ошибки отправки
            $(formNm).html(error);
        }
    });
}

$("input:checkbox").on('click', function () {
    var $box = $(this);
    if ($box.is(":checked")) {     
        var group = "input:checkbox[id='" + $box.attr("id") + "']";        
        $(group).prop("checked", false);
        $box.prop("checked", true);
    } else {
        $box.prop("checked", false);
    }
});