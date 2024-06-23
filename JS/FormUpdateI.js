document.getElementById("button-img").onclick = handleButtonClickI;

function handleButtonClickI() {
    var formNm = $('#form-red');
    $.ajax({
        type: "POST",
        url: '../PHPRedact/FormUPScriptI.php',
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

           

      