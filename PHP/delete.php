<?php
session_start();
$_SESSION['order'] = $_GET['order'];
$_SESSION['block'] = $_GET['block'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Удаление контента</title>
    <script src="../JS/FormDel.js" defer></script><!-- скрипт для правильной отправки формы -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- скрипт для правильной отправки формы -->
</head>
<body>
    <main>       
        <form action="" id="form-ou" class="form-ou">
            <h1>Удаление контента</h1>
        <div class="up_block">
            <input type="text" name="head" placeholder="Введите название блока для удаления">
        </div>        
         <button type="submit" class="up_btn" id="button-submi">Удалить</button>
        </form>
    </main>
</body>
</html>