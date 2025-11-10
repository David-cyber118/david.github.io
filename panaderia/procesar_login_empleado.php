<?php
// procesar_login_empleado.php
session_start();
include 'conexion.php'; 

if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['contrasena'])){
    
    $usuario_ingresado = $conn->real_escape_string($_POST['usuario']);
    $contrasena_ingresada = $_POST['contrasena'];

    // CORRECCIÓN: Buscamos por la columna 'usuario' (que existe en la tabla 'empleados')
    $sql = "SELECT id_empleado, nombre, contrasena, rol 
            FROM empleados 
            WHERE usuario = '$usuario_ingresado'"; 
            
    $resultado = $conn->query($sql);

    if($resultado && $resultado->num_rows == 1){
        $empleado = $resultado->fetch_assoc();
        
        // 1. Verificar la contraseña con HASHING
        if(password_verify($contrasena_ingresada, $empleado['contrasena'])){
            
            // ÉXITO DEL LOGIN
            $_SESSION['id_empleado'] = $empleado['id_empleado'];
            $_SESSION['nombre'] = $empleado['nombre'];
            $_SESSION['rol'] = $empleado['rol'];
            
            // Redirige al panel del empleado/admin
            header("Location: panel_empleado.php?vista=pedidos"); 
            exit();
            
        } else {
            // Contraseña incorrecta
            echo "Usuario o contraseña incorrecta. <a href='login_empleado.php'>Volver</a>";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario o contraseña incorrecta. <a href='login_empleado.php'>Volver</a>";
    }
} else {
    echo "No se enviaron datos del formulario. <a href='login_empleado.php'>Volver</a>";
}

if(isset($conn)) {
    $conn->close();
}
?>