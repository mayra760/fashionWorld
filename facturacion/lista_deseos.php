<?php
require_once 'funciones_deseos.php'; // Asegúrate de que la ruta sea correcta

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

$documentoUsuario = "123456789"; // Este valor debe ser dinámico según el usuario logueado
$deseos = Deseos::obtenerDeseos($documentoUsuario);

// Obtener mensaje de confirmación, si existe
$mensaje = isset($_GET['mensaje']) ? htmlspecialchars($_GET['mensaje']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Deseos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> 
    <link href="../css/listaDeseos.css" rel="stylesheet">
    <link href="../css/ofertaVis.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Lista de Deseos</h1>
        <center><a href="../usuarios/navUser.php" class="btn btn-home"><i class="fas fa-home"> Home</i></a></center>
        <?php if ($mensaje): ?>
            <div class="mensaje <?php echo strpos($mensaje, 'Error') === false ? 'exito' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <h2>Agregar Nuevo Deseo</h2>
        <form action="controladorDeseo.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="documento" value="<?php echo htmlspecialchars($documentoUsuario); ?>">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" name="nombre_producto" required>
            <label for="foto_referencia">Foto del Producto:</label>
            <input type="file" name="foto_referencia" accept="image/*" required>
            <button type="submit" name="accion" value="agregar">Agregar a la Lista de Deseos</button>
        </form>

        <h2>Mis Deseos</h2>
        <?php if ($deseos->num_rows > 0): ?>
            <div class="deseos">
                <?php while ($deseo = $deseos->fetch_assoc()): ?>
                    <div class="deseo">
                        <img src="<?php echo htmlspecialchars($deseo['foto_referencia']); ?>" alt="Foto del Producto">
                        <div class="nombre"><?php echo htmlspecialchars($deseo['nombre_producto']); ?></div>
                        <div class="acciones">
                            <form action="controladorDeseo.php" method="post">
                                <input type="hidden" name="id_deseo" value="<?php echo htmlspecialchars($deseo['id_deseo']); ?>">
                                <button type="submit" name="accion" value="eliminar">Eliminar de la Lista</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No tienes productos en tu lista de deseos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
