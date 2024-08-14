<?php
include 'funciones.php';

$id_ca = $_POST['id_ca'];

eliminarDelCarrito($id_ca);

// Redirigir de vuelta al carrito
header("Location: ver_carrito.php");
exit();
?>
