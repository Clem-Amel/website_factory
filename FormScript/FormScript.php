<?php
require_once("FormScriptFiles.php"); 

$toEmail = "clementine.amelina@gmail.com"; 

$name = $_POST['name'];
$number = $_POST['number'];
$message = $_POST['message'];

$name = htmlspecialchars($name); 
$number = htmlspecialchars($number);
$message = htmlspecialchars($message);

$name = urldecode($name); 
$number = urldecode($number);
$message = urldecode($message);

$name = trim($name); 
$number = trim($number);
$message = trim($message);



sendWithAttachments($toEmail, "Новое заявление", "ФИО: " . $name . " \n" .
    "Номер телефона: " . $number . " \n" .
    "Сообщение: " . $message .
    " \r\n");
?>