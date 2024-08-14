<?php
include 'funciones.php';

$factura_id = $_GET['factura_id'];
$factura = obtenerFactura($factura_id);
$detalles = obtenerDetallesFactura($factura_id);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Factura</h1>
        <p>Factura ID: <?php echo $factura['id_factura']; ?></p>
        <p>Fecha: <?php echo $factura['fecha_factura']; ?></p>
        <p>Cliente: <?php echo $factura['documento_usuario']; ?></p>
        <p>Método de Pago: <?php echo $factura['metodo_pago']; ?></p>
        <p>Dirección: <?php echo $factura['direccion']; ?></p>
        <p>Telefono: <?php echo $factura['telefono']; ?></p>

        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td><?php echo $detalle['nombre_producto']; ?></td>
                    <td><?php echo $detalle['cantidad']; ?></td>
                    <td><?php echo $detalle['precio_unitario']; ?></td>
                    <td><?php echo $detalle['subtotal']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td><?php echo $factura['total']; ?></td>
                </tr>
            </tfoot>
        </table><br>

        <button type="submit" class="btn btn-primary" onclick="window.print();">Imprimir Factura</button>
        <button type="submit" class="btn btn-primary" onclick="window.location.href='facturacion.php';">Volver a Productos</button>
    </div>
</body>
</html>
