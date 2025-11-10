<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro de Cliente - Panadería Fátima</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: url('cake.jpg') no-repeat center center fixed;
        background-size: cover;
        color: white;
        text-align: center;
        padding-top: 80px;
    }
    form {
        background-color: rgba(0, 0, 0, 0.6);
        display: inline-block;
        padding: 30px;
        border-radius: 15px;
    }
    input, button {
        margin: 10px;
        padding: 10px;
        width: 250px;
        border-radius: 5px;
        border: none;
    }
    button {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<h2>Registro de Cliente</h2>
<form action="procesar_registro_cliente.php" method="POST" autocomplete="off">
    <input type="text" name="nombre" placeholder="Nombre completo" required autocomplete="off"><br>
    <input type="text" name="direccion" placeholder="Dirección" required autocomplete="off"><br>
    <input type="text" name="telefono" placeholder="Teléfono" required autocomplete="off"><br>
    <input type="email" name="correo" placeholder="Correo electrónico" required autocomplete="new-email"><br>
    <input type="password" name="contrasena" placeholder="Contraseña" required autocomplete="new-password"><br>
    <input type="submit" name="submit" value="Registrarse">
</form>
<br>
<a href="index.php" style="color: white;">Volver al inicio</a>
</body>
</html>
