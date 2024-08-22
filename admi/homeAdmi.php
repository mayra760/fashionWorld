<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Fashion World</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #343a40;
        }
        .navbar {
            background-color: #007bff;
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-nav .nav-link:hover {
            color: #d1ecf1;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            display: block;
        }
        .sidebar a:hover {
            background-color: #007bff;
            padding-left: 10px;
        }
        .content {
            margin-left: 220px;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 36px;
        }
        .header p {
            font-size: 18px;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #343a40;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }
        .stat {
            font-size: 32px;
            font-weight: bold;
        }
        .stat-title {
            font-size: 18px;
            color: #888;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #343a40;
            color: #fff;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>


    <!-- Contenido Principal -->
    <div class="content">
        <div class="header">
            <h1>Bienvenido, Admin</h1>
            <p>¡Nos alegra verte de nuevo! Gestiona tu tienda con confianza y haz crecer tu negocio.</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Total Productos</div>
                    <div class="card-body">
                        <span class="stat">320</span>
                        <p class="stat-title">Productos en la tienda</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Usuarios Registrados</div>
                    <div class="card-body">
                        <span class="stat">150</span>
                        <p class="stat-title">Usuarios activos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Pedidos Completados</div>
                    <div class="card-body">
                        <span class="stat">85</span>
                        <p class="stat-title">Pedidos finalizados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
