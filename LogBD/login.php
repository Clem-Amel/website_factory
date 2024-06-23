<?php
function connect()
{
    $servername = "127.0.0.1";
    $database = "website";
    $username = "root";
    $password = "JuN*YYITt5443ffeew";
    // ������� ����������
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, "SET NAMES utf8");
    return $conn;
}
?>