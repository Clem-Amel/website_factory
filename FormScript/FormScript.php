<?php
require_once("FormScriptFiles.php"); // здесь функция обработки файлов и отправки сообщения

$toEmail = "clementine.amelina@gmail.com"; // указывается почта куда мы будем отправлять документы

// получим данные формы

$name = $_POST['name'];
$number = $_POST['number'];
$message = $_POST['message'];

// обработка полученных данных


$name = htmlspecialchars($name); // преобразование символов сущности
$number = htmlspecialchars($number);
$message = htmlspecialchars($message);

$name = urldecode($name); // декодирование URL
$number = urldecode($number);
$message = urldecode($message);

$name = trim($name); // удаление пробельных символов с обеих строн
$number = trim($number);
$message = trim($message);

// отправка данных на почту

sendWithAttachments($toEmail, "Новое письмо с сайта", "Имя: " . $name . " \n" .
    "Номер телефона: " . $number . " \n" .
    "Сообщение: " . $message .
    " \r\n");
?>