<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login Empleado</title>
</head>
<body>
<h2>Iniciar Sesión - Empleado / Administrador</h2>
<form action="procesar_login_empleado.php" method="POST">
    Usuario:<br>
    <input type="text" name="usuario" value="" required><br><br>
    Contraseña:<br>
    <input type="password" name="contrasena" value="" required><br><br>
    <input type="submit" name="submit" value="Iniciar sesión">
</form>
<p><a href="index.php">Volver al inicio</a></p>
</body>
</html>
