<?php
// procesar_login_cliente.php
session_start();
include 'conexion.php'; 

if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])){
    
    // Obtener los datos del formulario (el campo del formulario se llama 'usuario')
    $usuario_ingresado = $conn->real_escape_string($_POST['usuario']); 
    $contrasena_ingresada = $_POST['contrasena'];

    // Buscamos por la columna 'nombre_usuario'
    $sql = "SELECT id_cliente, nombre, contrasena 
            FROM clientes 
            WHERE nombre_usuario = '$usuario_ingresado'"; 
            
    $resultado = $conn->query($sql);

    // 1. Verificar si el usuario fue encontrado
    if($resultado && $resultado->num_rows == 1){
        $cliente = $resultado->fetch_assoc();
        
        // 2. Verificar la contraseña hasheada
        if(password_verify($contrasena_ingresada, $cliente['contrasena'])){
            
            // ÉXITO DEL LOGIN
            $_SESSION['id_cliente'] = $cliente['id_cliente'];
            $_SESSION['nombre'] = $cliente['nombre'];
            
            header("Location: panel_cliente.php?vista=catalogo"); 
            exit();
        } else {
            // Falla aquí si el hash no coincide
            echo "Usuario o contraseña incorrecta. <a href='login_cliente.php'>Volver</a>";
        }
    } else {
        // Falla aquí si no encuentra el usuario 'Cliente1'
        echo "Usuario o contraseña incorrecta. <a href='login_cliente.php'>Volver</a>";
    }
} else {
    // Si no se enviaron datos
    header("Location: login_cliente.php?error=nodata");
    exit();
}

if(isset($conn)) {
    $conn->close();
}
?>