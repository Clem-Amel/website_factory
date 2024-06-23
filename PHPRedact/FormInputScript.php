<?php
include "../LogBD/connectbd.php";
$login = $_POST['login'];
$password = $_POST['password'];
$row = selectUser($login, $password);
if (!empty($row)) 
{
    session_start();
    $_SESSION['ID'] = $row['login'];
    $_SESSION['TYPE'] = $row['type'];
    session_commit();
    echo $_SESSION['ID'];
} else
{
    echo "Error";
}

?>