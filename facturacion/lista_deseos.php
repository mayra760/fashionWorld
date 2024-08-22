<?php
include 'funciones_deseos.php';

// Configura la conexión a la base de datos
include('../method/db_fashion/cb.php');

session_start();
$documento = 4;
$mensaje = "";


// Manejo de formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $nombre_producto = $_POST['nombre_producto'];
        $foto_referencia = $_FILES['foto_referencia']['name'];
        move_uploaded_file($_FILES['foto_referencia']['tmp_name'], "imagenes/" . $foto_referencia);
        Deseos::agregarDeseo($documento, $nombre_producto, $foto_referencia);
        $mensaje = "Deseo agregado con éxito.";
    } elseif (isset($_POST['actualizar'])) {
        $id_deseo = $_POST['id_deseo'];
        $nombre_producto = $_POST['nombre_producto'];
        $foto_referencia = $_FILES['foto_referencia']['name'];
        if ($foto_referencia) {
            move_uploaded_file($_FILES['foto_referencia']['tmp_name'], "imagenes/" . $foto_referencia);
        }
        Deseos::actualizarDeseo($id_deseo, $nombre_producto, $foto_referencia);
        $mensaje = "Deseo actualizado con éxito.";
    } elseif (isset($_POST['eliminar'])) {
        $id_deseo = $_POST['id_deseo'];
        Deseos::eliminarDeseo($id_deseo);
        $mensaje = "Deseo eliminado con éxito.";
    }
}

$deseos = Deseos::obtenerDeseos($documento);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> 
    <title>Lista de Deseos</title>
    <link rel="stylesheet" href="../css/styles_deseos.css">
</head>
<body><br>
<nav class="nav">
    <li class="nav-item">
        <a class="nav-link active" href="#"><h1><B>FASHION WORLD</B></h1></a>
    </li>
</nav>
<center><a href="../usuarios/navUser.php" class="btn btn-home"><i class="fas fa-home"></i></a></center>

<h1>Lista de Deseos</h1>

    
    
    <!-- Mensaje de confirmación -->
    <div id="mensaje" class="mensaje"><?php echo $mensaje; ?></div>

<!-- Formulario para agregar deseos -->
    <form class="form-deseos" action="lista_deseos.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre_producto" placeholder="Nombre del Producto" required>
        <input type="file" name="foto_referencia" id="foto_referencia">
        <label for="foto_referencia" class="custom-file-upload">Agregar imagen</label>
        <button class="btn" type="submit" name="agregar">Agregar Deseo</button>
    </form>


    <ul>
    <?php foreach ($deseos as $deseo): ?>
    <li>
        <h3><?php echo htmlspecialchars($deseo['nombre_producto']); ?></h3>
        <?php if ($deseo['foto_referencia']): ?>
            <img src="imagenes/<?php echo htmlspecialchars($deseo['foto_referencia']); ?>" alt="Foto de Referencia">
        <?php endif; ?>
        
        <!-- Formulario para actualizar o eliminar deseo -->
        <form action="lista_deseos.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_deseo" value="<?php echo $deseo['id_deseo']; ?>">
                <input type="text" name="nombre_producto" value="<?php echo htmlspecialchars($deseo['nombre_producto']); ?>" required>
                <input type="file" name="foto_referencia" id="foto_referencia_<?php echo $deseo['id_deseo']; ?>">
                <div>
                    <label for="foto_referencia_<?php echo $deseo['id_deseo']; ?>" class="custom-file-upload">Agregar imagen</label>
                    <button class="btn btn-primary" type="submit" name="actualizar">Actualizar Deseo</button>
                    <button class="btn btn-danger" type="submit" name="eliminar">Eliminar Deseo</button>
                </div>
            </form>
    <?php endforeach; ?>
    </ul>
    <script>
        // Mostrar mensaje de confirmación si existe
        const mensaje = document.getElementById('mensaje');
        if (mensaje.textContent.trim() !== "") {
            mensaje.style.display = 'block';
            setTimeout(() => {
                mensaje.style.display = 'none';
            }, 3000);
        }
    </script>

</body>
</html>
