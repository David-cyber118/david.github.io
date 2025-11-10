<?php
include 'conexion.php';
session_start();

if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Verificar si el correo ya existe
    $check = $conn->query("SELECT correo FROM clientes WHERE correo='$correo'");
    if($check->num_rows > 0){
        echo "⚠️ Este correo ya está registrado. <a href='registro_cliente.php'>Volver</a>";
        exit();
    }

    $sql = "INSERT INTO clientes (nombre, direccion, telefono, correo, contrasena)
            VALUES ('$nombre', '$direccion', '$telefono', '$correo', '$contrasena')";

    if($conn->query($sql) === TRUE){
        // Guardar sesión del cliente recién registrado
        $_SESSION['id_cliente'] = $conn->insert_id;
        $_SESSION['nombre'] = $nombre;

        // Redirigir directamente al formulario de pedidos
        header("Location: pedido_cliente.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
