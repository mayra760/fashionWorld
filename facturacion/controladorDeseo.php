<?php
require_once 'funciones_deseos.php'; // Asegúrate de que la ruta sea correcta

session_start(); // Inicia la sesión

// Establece la conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'fw';

$conn = new mysqli($host, $user, $password, $database);

// Verifica si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer la conexión en la clase Deseos
Deseos::setDb($conn);

// Manejar la acción de agregar un deseo
if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
    $documento = $_POST['documento'];
    $nombreProducto = $_POST['nombre_producto'];
    
    // Subir la imagen
    if (isset($_FILES['foto_referencia']) && $_FILES['foto_referencia']['error'] == UPLOAD_ERR_OK) {
        $nombreArchivo = basename($_FILES['foto_referencia']['name']);
        $rutaDestino = 'uploads/' . preg_replace('/[^a-zA-Z0-9\.\-_]/', '_', $nombreArchivo);

        if (move_uploaded_file($_FILES['foto_referencia']['tmp_name'], $rutaDestino)) {
            // Verificar si el documento existe
            $consulta = $conn->prepare('SELECT COUNT(*) FROM tb_usuarios WHERE documento = ?');
            $consulta->bind_param('s', $documento);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $numUsuarios = $resultado->fetch_row()[0];

            if ($numUsuarios > 0) {
                // Agregar el deseo a la base de datos
                if (Deseos::agregarDeseo($documento, $nombreProducto, $rutaDestino)) {
                    header('Location: lista_deseos.php?mensaje=Producto añadido a la lista de deseos');
                } else {
                    header('Location: lista_deseos.php?mensaje=Error al agregar el producto');
                }
            } else {
                header('Location: lista_deseos.php?mensaje=El documento del usuario no existe');
            }
        } else {
            header('Location: lista_deseos.php?mensaje=Error al subir la imagen');
        }
    } else {
        header('Location: lista_deseos.php?mensaje=Error al subir la imagen');
    }
}

// Manejar la acción de eliminar un deseo
if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
    $idDeseo = $_POST['id_deseo'];
    if (Deseos::eliminarDeseo($idDeseo)) {
        header('Location: lista_deseos.php?mensaje=Producto eliminado de la lista de deseos');
    } else {
        header('Location: lista_deseos.php?mensaje=Error al eliminar el producto');
    }
}

// Cerrar la conexión
$conn->close();
?>
