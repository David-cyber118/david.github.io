<?php
session_start();
include 'conexion.php';

if(!isset($_SESSION['id_cliente'])){
    header("Location: login_cliente.php");
    exit();
}

if(isset($_POST['submit'])){
    $id_cliente = $_SESSION['id_cliente'];
    $sabor = $_POST['sabor'];
    $tematica = $_POST['tematica'];
    $decoracion = $_POST['decoracion'];
    $peso = $_POST['peso'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $sucursal = $_POST['sucursal'];

    $sql = "INSERT INTO pedidos (id_cliente, sabor, tematica, decoracion, peso, fecha_entrega, sucursal)
            VALUES ('$id_cliente','$sabor','$tematica','$decoracion','$peso','$fecha_entrega','$sucursal')";

    if($conn->query($sql) === TRUE){
        echo "✅ Pedido registrado correctamente. <a href='pedido_cliente.php'>Hacer otro pedido</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
