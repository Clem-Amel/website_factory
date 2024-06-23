document.getElementById("button-tit").onclick = handleButtonClick; 

function handleButtonClick() {
    var formNm = $('#form-red');
    $.ajax({
        type: "POST",
        url: '../PHPRedact/FormUPScriptT.php',
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


           

      