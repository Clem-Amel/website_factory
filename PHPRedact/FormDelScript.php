<?php
include "../LogBD/connectbd.php";
$login = $_POST['login'];
$password = $_POST['password'];
    if (!empty($login)) 
    {
        $row = selectUser($login);
        if (empty($row))
        {
            echo "Данный пользователь не существует. ";
        } else 
        {
            echo DelUser($login);
        }
    } else 
    {
        echo "Заполните логин. ";
    }
?>