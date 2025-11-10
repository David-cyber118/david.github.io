<?php
$servername = "localhost";
$username = "root";
$password = "123"; // si tu root tiene contraseña, ponla aquí
$dbname = "panaderia_fatima";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
