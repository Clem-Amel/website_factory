<?php
function connect()
{
    $servername = "localhost";
    $database = "website";
    $username = "root";
    $password = "201503";
    
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Проверяем соединение
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, "SET NAMES utf8");
    return $conn;
}
?>