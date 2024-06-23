<?php
session_start();
$_SESSION['order'] = $_GET['order'];
$_SESSION['block'] = $_GET['block'];
$_SESSION['check_text'] = $_GET['check_text'];
$_SESSION['check_img'] = $_GET['check_img'];
$_SESSION['check_titel'] = $_GET['check_titel'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="../JS/FormUpdate.js" defer></script>
    <script src="../JS/FormUpdateI.js" defer></script>
    <script src="../JS/FormUpdateT.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- скрипт для правильной отправки формы -->
    <title>Редактирование контента</title>
</head>
<body>
    <main>        
        <form action="" id="form-red" class="form-red">
            <h1>Редактирование контента</h1>
            <?php
            if ($_GET['check_titel'] == "-2") 
            {
                echo "<div class=\"up_block\">
                      <input type=\"text\" name=\"head1\" placeholder=\"Введите номер изображения, пример: 1\" />
                      </div>";
            } elseif ($_GET['check_titel'] == "-3") 
            {
               echo "<div class=\"up_block\">
                     <input type=\"text\" name=\"head2\" placeholder=\"Изменить заголовок\" />
                     <input type=\"button\" class=\"up_btn\" id=\"button-tit\" value=\"Изменить\" />
                     </div>";
            }elseif ($_GET['check_titel'] != "-1")
            {
               echo "<div class=\"up_block\">
                     <input type=\"text\" name=\"head1\" placeholder=\"Введите заголовок\" />
                     </div>
                     <div class=\"up_block\">
                     <input type=\"text\" name=\"head2\" placeholder=\"Изменить заголовок\" />
                     <input type=\"button\" class=\"up_btn\" id=\"button-tit\" value=\"Изменить\" />
                     </div>";
            }
            if ($_GET['check_text'] != "-1") 
            {
                echo "<div class=\"up_block\">
                      <input type=\"text\" name=\"text\" placeholder=\"Изменить текст\">
                      <input type=\"button\" class=\"up_btn\" id=\"button-te\" value=\"Изменить\">
                      </div>";
            }
            if ($_GET['check_img'] != "-1")
            {
                echo "<div class=\"up_block\">
                      <input type=\"text\" name=\"image\" placeholder=\"Изменить фото в слайдере\" />
                      <input type=\"button\" class=\"up_btn\" id=\"button-img\" value=\"Изменить\" /></div> ";}
            ?>            
        </form>
</main>
</body>
</html>