<?php
include 'funciones.php';

$productos = obtenerTodosLosProductos();
?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Catálogo de Productos</h1>
        <div class="product-list">
            <?php foreach ($productos as $producto): ?>
            <div class="product">
                <h2><?php echo $producto['nombre_producto']; ?></h2>
                <p><?php echo $producto['detalles']; ?></p>
                <p>Precio: $<?php echo $producto['precio']; ?></p>
                <form action="agregar_al_carrito.php" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                    <input type="number" name="cantidad" min="1" max="<?php echo $producto['cantidad']; ?>" value="1" required>
                    <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div><br>

        <div class="cart-link">
            <a href="ver_carrito.php" class="btn btn-primary">Ver Carrito</a>
        </div>
    </div>
</body>
</html>
