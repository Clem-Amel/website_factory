<?php
session_start();
$addr = $_SESSION['order'];
$head = $_POST['head'];
include "../LogBD/connectbd.php";
if(selectTitle($head, "?id=".$addr))
{
    echo DelRecord($head);
} else 
{
    echo "Такой записи не существует. ";
}
?>