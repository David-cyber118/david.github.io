<?php
// panel_cliente.php
session_start();
// En un proyecto real, se verificaría la sesión del cliente:
// if (!isset($_SESSION['id_cliente'])) { header("Location: index.php"); exit; }

include 'header_nav.php';

// Obtener la vista solicitada, por defecto 'catalogo'
$vista = isset($_GET['vista']) ? $_GET['vista'] : 'catalogo';

// --- CONTENIDO DE LA VISTA DEL CLIENTE LOGUEADO ---

// La vista 'principal' (rebanada de pastel) ahora está en index.php,
// aquí solo manejamos las vistas funcionales.

if ($vista == 'principal' || $vista == 'catalogo') {
    // Vista 2: Catálogo (Principal funcional para el cliente logueado)
    generar_header_nav("2 Panadería Fátima", 'catalogo', false);
    ?>
    <h2>Catálogo de Pasteles</h2>

    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin: 20px 0;">
        <?php for ($i = 1; $i <= 12; $i++): ?>
            <img src="https://via.placeholder.com/150x150?text=Pastel+Catalogo+<?php echo $i; ?>" alt="Pastel <?php echo $i; ?>" style="width: 100%; border-radius: 4px;">
        <?php endfor; ?>
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 30px;">
        <div class="nav-group">
            <a href="#" class="btn-rojo">Tamaño</a>
            <a href="#" class="btn-rojo">Sabor</a>
            <a href="#" class="btn-rojo">Relleno</a>
        </div>
        <div class="nav-group">
            <a href="#" class="btn-azul">Decoración</a>
            <a href="#" class="btn-azul">Calcular precio</a>
            <a href="#" class="btn-azul">Guardar</a>
        </div>
    </div>
    <?php
} elseif ($vista == 'personalizar') {
    // Vista 3: Personalizar
    generar_header_nav("3 Panadería Fátima", 'personalizar', false);
    ?>
    <h2>Personaliza tu Pastel</h2>
    
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin: 20px 0;">
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <img src="https://via.placeholder.com/200x200?text=Diseño+Personalizado+<?php echo $i; ?>" alt="Diseño <?php echo $i; ?>" style="width: 100%; border-radius: 4px;">
        <?php endfor; ?>
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 30px;">
        <div class="nav-group">
            <a href="#" class="btn-rojo">Tamaño</a>
            <a href="#" class="btn-rojo">Sabor</a>
            <a href="#" class="btn-rojo">Relleno</a>
        </div>
        <div class="nav-group">
            <a href="#" class="btn-azul">Decoración</a>
            <a href="#" class="btn-azul">Calcular precio</a>
            <a href="#" class="btn-azul">Guardar</a>
        </div>
    </div>
    <?php
} elseif ($vista == 'carrito') {
    // Vista 4Cli: Carrito de Compras
    generar_header_nav("4Cli Panadería Fátima", 'carrito', false);
    ?>
    <h2>Revisión de Pedido (Carrito)</h2>

    <div style="text-align: center; margin-top: 20px;">
        <img src="https://via.placeholder.com/600x400?text=Pedidos+en+Carrito" alt="Pedidos en Carrito" style="max-width: 60%; border-radius: 8px;">
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 30px;">
        <div class="nav-group">
            <a href="?vista=carrito" class="btn-rojo">Carrito de compras</a>
            <a href="#" class="btn-rojo">Ver carrito</a>
            <a href="#" class="btn-rojo">Modificar</a>
        </div>
        <div class="nav-group">
            <a href="#" class="btn-azul">Eliminar producto</a>
            <a href="procesar_pedido_cliente.php" class="btn-azul">Confirmar pedido</a>
        </div>
    </div>
    <?php
} elseif ($vista == 'ventas_cliente') {
    // Historial de Pedidos del Cliente
    generar_header_nav("Historial de Pedidos", 'ventas_cliente', false);
    ?>
    <h2>Tu Historial de Pedidos</h2>
    <p>Aquí se mostrarían todos los pedidos anteriores del cliente y su estado.</p>
    <?php
} else {
    // Vista no encontrada
    generar_header_nav("Error", '', false);
    echo "<h2>Error 404: Vista no encontrada</h2>";
}

generar_footer();
?>