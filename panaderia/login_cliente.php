<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Iniciar Sesión - Cliente | Panadería Fátima</title>
<style>
    /* Estilos de la página */
    body {
        font-family: Arial, sans-serif;
        /* Asegúrate de que 'cake.jpg' esté en la misma carpeta o ajusta la ruta */
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
    /* Estilo para los enlaces inferiores */
    a {
        text-decoration: none;
        color: white;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<h2>Inicio de Sesión - Cliente</h2>

<form action="procesar_login_cliente.php" method="POST" autocomplete="off">
    <input type="text" name="usuario" placeholder="Nombre de Usuario (o Correo)" required value=""><br>
    
    <input type="password" name="contrasena" placeholder="Contraseña" required value=""><br>
    
    <button type="submit" name="submit">Ingresar</button>
</form>

<br>
<a href="registro_cliente.php">¿No tienes cuenta? Registrarse</a><br>
<a href="index.php">Volver al inicio</a>
</body>
</html>