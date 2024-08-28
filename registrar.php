<!DOCTYPE html>
<html lang="en"> 
<head>
        <!-- Google tag (gtag.js) -->
         <script async src="https://www.googletagmanager.com/gtag/js?id=G-MW395SN41J"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-MW395SN41J');
        </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styRegistro.css">
    <title>Registrarse</title>
</head>
<body>
    <div class="container">
        <img src="img/logo.png" alt="Imagen">
        <div class="form-container">
            <h1>Registrarse</h1>
            <form action="method/controler_login.php?recorrido=2" method="post">
                <input type="number" name="documento" placeholder="Documento" required><br>
                <input type="text" name="nombre" placeholder="Nombre" required><br>
                <input type="text" name="apellido" placeholder="Apellido" required><br>
                <input type="email" name="correo" placeholder="Correo" required><br>
                <input type="password" name="contraseña" placeholder="Contraseña" required><br>
                <input type="date" name="fecha" placeholder="Fecha de nacimiento" required><br>
                <input type="submit" value="Registrarse"><br>
                <center><a href="politicaPri.php">Política de privacidad</a>
                <a href="usuarios/terminosCon.php">Términos y condiciones</a><br><br></center>
                <center><a href="login.php">Inicia sesión</a></center>
            </form>
        </div>
    </div>
    <!-- Incluir SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Incluir el archivo JavaScript con tus alertas personalizadas -->
    <script src="js/alertError.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
