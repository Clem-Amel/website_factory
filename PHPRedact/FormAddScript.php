<?php
include "../LogBD/connectbd.php";
$login = $_POST['login'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
if ($password == $password1) 
{
    if (!empty($login)) 
    {
        $row = selectUser($login);
        if (!empty($row)) 
        {
            echo "Данный пользователь уже существует. ";
        } elseif(isset($_POST['adm'])) 
        {
            echo intoUser($login, $password, 1);
        } else 
        {
             echo intoUser($login, $password, 2);
        }
    } else 
    {
        echo "Заполните логин. ";
    }

} else
    echo "Пароль несовпадает. ";
?>