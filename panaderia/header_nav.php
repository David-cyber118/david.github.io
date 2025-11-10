<?php
// header_nav.php

// Función para generar la cabecera y la barra de navegación.
function generar_header_nav($titulo, $vista_activa, $es_admin = false) {
    $panel_base = $es_admin ? 'panel_empleado.php' : 'panel_cliente.php';
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titulo; ?></title>
        <style>
            /* Estilos básicos para replicar la maqueta */
            body { 
                background-color: #0d0d26; 
                color: white; 
                font-family: Arial, sans-serif; 
                margin: 0; 
                padding: 0; 
            }
            .header { 
                text-align: center; 
                padding: 20px 0; 
            }
            .nav-bar { 
                display: flex; 
                justify-content: space-between; 
                padding: 10px 5%; 
                margin-bottom: 20px;
            }
            .nav-group a {
                text-decoration: none; 
                padding: 10px 20px; 
                margin: 0 5px; 
                border-radius: 5px;
                color: white; 
                font-weight: bold; 
                transition: background-color 0.3s;
            }
            /* Colores de botones según las maquetas */
            .btn-rojo { background-color: #d9534f; }
            .btn-azul { background-color: #334d99; }
            /* Estilo para destacar el botón activo */
            .active.btn-rojo { 
                background-color: #c9302c; 
                border: 2px solid white; 
            }
            .active.btn-azul { 
                background-color: #284185; 
                border: 2px solid white; 
            }
            .btn-rojo:hover { background-color: #c9302c; }
            .btn-azul:hover { background-color: #284185; }

            /* Estilo para el contenido central */
            .contenido {
                padding: 20px 5%;
                min-height: 70vh; 
            }
            h2 {
                margin-top: 0;
            }
        </style>
    </head>
    <body>

    <div class="header">
        <h1><?php echo $titulo; ?></h1>
    </div>

    <div class="nav-bar">
        <div class="nav-group">
            <a href="<?php echo $panel_base; ?>?vista=principal" class="btn-rojo <?php echo ($vista_activa == 'principal' ? 'active' : ''); ?>">Principal</a>
            <a href="<?php echo $panel_base; ?>?vista=catalogo" class="btn-rojo <?php echo ($vista_activa == 'catalogo' ? 'active' : ''); ?>">Catálogo</a>
            <a href="<?php echo $panel_base; ?>?vista=personalizar" class="btn-rojo <?php echo ($vista_activa == 'personalizar' ? 'active' : ''); ?>">Personalizar</a>
        </div>

        <div class="nav-group">
            <?php if ($es_admin): ?>
                <a href="<?php echo $panel_base; ?>?vista=agregar_carrito" class="btn-azul <?php echo ($vista_activa == 'agregar_carrito' ? 'active' : ''); ?>">Agregar al carrito</a>
                <a href="<?php echo $panel_base; ?>?vista=pedidos" class="btn-azul <?php echo ($vista_activa == 'pedidos' || $vista_activa == 'inventario' || $vista_activa == 'clientes' || $vista_activa == 'ventas' ? 'active' : ''); ?>">Clientes y Ventas</a>
            <?php else: ?>
                <a href="<?php echo $panel_base; ?>?vista=carrito" class="btn-azul <?php echo ($vista_activa == 'carrito' ? 'active' : ''); ?>">Carrito de compras</a>
                <a href="<?php echo $panel_base; ?>?vista=ventas_cliente" class="btn-azul <?php echo ($vista_activa == 'ventas_cliente' ? 'active' : ''); ?>">Clientes y Ventas</a>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="contenido">
    <?php
}

// Función para el pie de página
function generar_footer() {
    ?>
    </div> </body>
    </html>
    <?php
}
?>