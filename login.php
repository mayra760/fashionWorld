<?php
session_start(); // Inicia la sesión al inicio del archivo

if(isset($_GET['error'])){
    if($_GET['error'] == "error-1"){
        if(!isset($_SESSION['stop'])) {
            $_SESSION['stop'] = 0;
        }
        $_SESSION['stop'] += 1;
    }
}

// Verificamos si la cuenta está bloqueada temporalmente
if(isset($_SESSION['bloqueado_hasta']) && $_SESSION['bloqueado_hasta'] > time()) {
    $tiempo_restante = $_SESSION['bloqueado_hasta'] - time();
    echo "Tu cuenta está bloqueada temporalmente. Intenta nuevamente en $tiempo_restante segundos.";
    exit;
}
?> 
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
    <link rel="stylesheet" type="text/css" href="css/styInicioSesion.css">
    <title>Inicio de sesión</title>
</head>
<body>
    
<div class="container">
    <div class="form-container">
        <h1>Iniciar sesión</h1>
        <form action="method/controler_login.php?recorrido=1" method="post">
            <input type="number" name="documento" placeholder="Usuario" required><br><br>
            <input type="password" name="contraseña" placeholder="Contraseña" required><br><br>

            <!-- Mostrar el CAPTCHA -->
            <iframe src="method/captcha.php" style="border: none; width: 150px; height: 50px;"></iframe><br><br>
            <input type="text" name="captcha" placeholder="Ingrese el texto mostrado arriba" required><br><br>

            <input type="submit" value="Ingresar"><br>
            <center><a href="recuperarContraseña.php">¿Olvidaste tu contraseña?</a></center>
            <center><a href="registrar.php">Registrarse</a></center>
        </form>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>
