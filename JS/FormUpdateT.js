document.getElementById("button-te").onclick = handleButtonClickT;

function handleButtonClickT() {
    var formNm = $('#form-red');
    $.ajax({
        type: "POST",
        url: '../PHPRedact/FormUPScriptText.php',
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


           

      