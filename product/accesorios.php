
<head>

    <title><?php echo 'accesorios'; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/stylePro.css" rel="stylesheet">
    <link href="../css/plantill2.css" rel="stylesheet"><!-- Incluye el CSS para contadores -->
</head>
<body>
    <?php
    include '../product/plantill2.php';
    include_once '../method/productos_class.php';
    ?>
<div class="producto" onmouseover="cambiarColor(this)" onmouseout="restablecerColor(this)">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
            <?php echo Productos::verAccesorios(); ?>
            </div>
            <div class="col-2"> <!-- Columna para tallas y colores -->
                    <div class="selector">
                            <label for="color">Color:</label>
                            <select id="color" class="form-control" onchange="filtrarPorColor(this.value)">
                                <option value="todos">Todos</option>
                                <option value="plata">plata</option>
                                <option value="dorado">dorado</option>
                                <option value="oro">oro</option>
                                <option value="negro, dorado">negro, dorado</option>
                            </select>
                    </div>
                        <br>
                    <div class="selector">
                        <label for="talla">Talla:</label>
                            <select id="talla" class="form-control" onchange="filtrarPorTalla(this.value)">
                                <option value="todos">Mostrar Todos</option>
                                <option value="18-19 cm">18-19 cm</option>
                                <option value="16-17 cm">16-17 cm</option>
                                <option value="16cm">16cm</option>
                            </select>
                    </div>
                </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/añadirCarro.js"></script>
    <script src="../js/añadirFavo.js"></script>
    <script src="../js/colorTalla.js"></script>
</body>

