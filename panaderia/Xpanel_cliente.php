<?php
session_start();
if(!isset($_SESSION['id_cliente'])){
    header("Location: login_cliente.php");
    exit();
}

include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel de Cliente - Panadería Fátima</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url('cake.jpg') no-repeat center center fixed;
        background-size: cover;
        color: white;
    }
    .container {
        width: 100%;
        min-height: 100vh;
        background-color: rgba(0,0,0,0.6);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 50px 0;
    }
    h1 {
        margin-bottom: 30px;
        text-shadow: 2px 2px 4px #000;
    }
    form {
        background-color: rgba(255, 255, 255, 0.1);
        padding: 30px;
        border-radius: 15px;
        width: 350px;
    }
    input, select, button {
        display: block;
        margin: 15px auto;
        padding: 10px;
        width: 90%;
        border-radius: 5px;
        border: none;
    }
    button {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        font-size: 1em;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?>. Elige tu pastel</h1>

    <form action="procesar_pedido_cliente.php" method="POST">
        <label>Sabor:</label>
        <select name="id_sabor" required>
            <option value="">Selecciona un sabor</option>
            <option value="1">Chocolate</option>
            <option value="2">Vainilla</option>
            <option value="3">Fresa</option>
        </select>

        <label>Temática:</label>
        <select name="id_tematica" required>
            <option value="">Selecciona una temática</option>
            <option value="1">Cumpleaños</option>
            <option value="2">Boda</option>
            <option value="3">Aniversario</option>
        </select>

        <label>Decoración:</label>
        <select name="id_decoracion" required>
            <option value="">Selecciona decoración</option>
            <option value="1">Frutas</option>
            <option value="2">Chocolates</option>
            <option value="3">Fondant</option>
        </select>

        <label>Peso (kg):</label>
        <input type="number" name="peso" step="0.1" placeholder="Ej: 1.5" required>

        <label>Fecha de entrega:</label>
        <input type="date" name="fecha_entrega" required>

        <label>Expendio:</label>
        <select name="id_expendio" required>
            <option value="">Selecciona un expendio</option>
            <option value="1">Expendio Central</option>
            <option value="2">Expendio Norte</option>
            <option value="3">Expendio Sur</option>
        </select>

        <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['id_cliente']; ?>">

        <button type="submit">Registrar Pedido</button>
    </form>
    <br>
    <a href="index.php" style="color: white;">Cerrar sesión</a>
</div>
</body>
</html>
