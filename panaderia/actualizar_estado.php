<?php
session_start();
include 'conexion.php';

if(!isset($_SESSION['id_empleado']) || $_SESSION['rol'] != 'Administrador'){
    header("Location: login_empleado.php");
    exit();
}

if(isset($_GET['id']) && isset($_GET['estado'])){
    $id_pedido = $_GET['id'];
    $nuevo_estado = $_GET['estado'];

    $sql = "UPDATE pedidos SET estado='$nuevo_estado' WHERE id_pedido='$id_pedido'";
    if($conn->query($sql) === TRUE){
        header("Location: panel_empleado.php");
        exit();
    } else {
        echo "Error al actualizar estado: ".$conn->error;
    }
}
?>
