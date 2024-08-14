<?php
include 'funciones.php';

$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

agregarAlCarrito($id_producto, $cantidad);

// Redirigir de vuelta al índice o al carrito
header("Location: facturacion.php");
exit();
?>
