(function () {
    // "глобальные" переменные
    let total = document.querySelector('.create-line-1'),
        button = document.querySelector('.glow-on-hover'),
        forAll = {};
    // функции
    async function getData() {
        $.ajax({
            type: "POST",
            url: '../PHP/newsAdd.php',
            data: { text: $(".glow-on-hover").text() },
            success: function (data) {              
                // Вывод текста результата отправки
                let createdDiv = document.createElement("div");
                createdDiv.innerHTML = data
                total.appendChild(createdDiv, total)
            },
            error: function (jqXHR, text, error) {
                // Вывод текста ошибки отправки
                $('.glow-on-hover').html(error);
            }
        });      
    }
    button.addEventListener('click', function () {
        getData()
    })
})();
