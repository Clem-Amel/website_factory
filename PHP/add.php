<?php
session_start();
$_SESSION['order'] = $_GET['order'];
$_SESSION['block'] = $_GET['block'];
$_SESSION['check_text'] = $_GET['check_text'];
$_SESSION['check_img'] = $_GET['check_img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Добавление контента</title>
    <script src="../JS/FormAdd.js" defer></script><!-- скрипт для правильной отправки формы -->
</head>
<body>
    <main>      
            <form action="" id="form-in" class="form-in">
                <h1>Добавление контента</h1>
                <div class="up_block">
                    <input type="text" name="head" id="head" placeholder="Добавить заголовок" />
                </div>
                <?php
            if ($_GET['check_text'] != "-1") 
            {
            echo "<div class=\"up_block\">
                  <input type=\"text\" name=\"text\" placeholder=\"Добавить текст\">
                  </div>";
            }
            if ($_GET['check_img'] != "-1") 
            {
                echo "<div class=\"up_block\">
                      <input type=\"text\" name=\"img\" id=\"img\" placeholder=\"Добавить ссылку на изображение\" /> </div>";}
                ?>
                <button type="submit" class="up_btn" id="button-submi">Добавить</button>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- скрипт для правильной отправки формы -->        
    </main>
</body>
</html>