<?php
// panel_empleado.php
session_start();
// Simulación de autenticación (debería verificar $_SESSION['empleado_id'] aquí)

include 'header_nav.php';

// Obtener la vista solicitada, por defecto 'pedidos'
$vista = isset($_GET['vista']) ? $_GET['vista'] : 'pedidos';

// --- CONTENIDO DE LA VISTA DEL ADMINISTRADOR ---

if ($vista == 'pedidos' || $vista == 'clientes' || $vista == 'ventas') {
    // Vistas 4Ad: Pedidos / Clientes / Ventas (Con botones de ARRIBA y ABAJO)
    generar_header_nav("4Ad Panadería Fátima", $vista, true); 
    
    // Contenido central (cambia según la sub-vista)
    if ($vista == 'pedidos') {
        echo "<h2>Pedidos</h2>";
        $img_text = "Gestion+de+Pedidos+Administracion";
    } elseif ($vista == 'clientes') {
        echo "<h2>Listado de Clientes</h2>";
        $img_text = "Gestion+de+Clientes";
    } else { // $vista == 'ventas'
        echo "<h2>Resumen de Ventas y Estadísticas</h2>";
        $img_text = "Reporte+de+Ventas";
    }
    ?>
    <div style="text-align: center; margin-top: 20px;">
        <img src="https://via.placeholder.com/700x400?text=<?php echo $img_text; ?>" alt="Gestión" style="max-width: 60%; border-radius: 8px;">
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 30px;">
        <div class="nav-group">
            <a href="?vista=pedidos" class="btn-rojo <?php echo ($vista == 'pedidos' ? 'active' : ''); ?>">Pedidos</a>
            <a href="?vista=clientes" class="btn-rojo <?php echo ($vista == 'clientes' ? 'active' : ''); ?>">Clientes</a>
            <a href="?vista=ventas" class="btn-rojo <?php echo ($vista == 'ventas' ? 'active' : ''); ?>">Ventas</a>
        </div>
        <div class="nav-group">
            <a href="#" class="btn-azul">Generar reporte</a>
            <a href="#" class="btn-azul">Exportar a Excel/PDF</a>
        </div>
    </div>
    <?php
} elseif ($vista == 'inventario') {
    // Vista 5: Inventario (Con botones de ARRIBA y ABAJO)
    generar_header_nav("5 Panadería Fátima", 'inventario', true);
    ?>
    <h2>Inventario y Flujo de Trabajo</h2>

    <div style="text-align: center; margin-top: 20px;">
        <img src="https://via.placeholder.com/700x400?text=Inventario+y+Flujo+de+Proceso" alt="Inventario" style="max-width: 60%; border-radius: 8px;">
    </div>

    <div style="display: flex; justify-content: center; margin-top: 30px;">
        <a href="?vista=inventario" class="btn-rojo active" style="margin-right: 15px;">Inventario</a>
        <a href="?vista=pedidos" class="btn-rojo">Administración</a>
    </div>
    <?php
} elseif ($vista == 'agregar_carrito') {
    // Tomar Pedido (Con botones de ARRIBA, SIN botones de ABAJO)
    generar_header_nav("Tomar Pedido", 'agregar_carrito', true);
    ?>
    <h2>Tomar Pedido Rápido (Empleado)</h2>
    <p>Esta vista se usaría para crear un nuevo pedido rápidamente, quizás seleccionando productos del catálogo.</p>
    <?php
} else {
    // Vista no encontrada
    generar_header_nav("Error", '', true);
    echo "<h2>Error 404: Vista no encontrada</h2>";
}

generar_footer();
?>