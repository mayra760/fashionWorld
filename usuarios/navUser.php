<!doctype html>
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
        

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/styProInicio.css">
    <link rel="stylesheet" type="text/css" href="../css/styPerfil.css">
    <link rel="stylesheet" type="text/css" href="../css/styLike.css">
    <link rel="stylesheet" type="text/css" href="../css/styMostrarPro.css">
    <link rel="stylesheet" type="text/css" href="../css/styActuUser.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
  </head>
  <body>
  <!-- class="navbar navbar-expand-lg navbar-light bg-light" -->
    <nav  class="navbar navbar-expand-lg navbar-light" style="background-color: #7ED0D8;">
  <div class="container-fluid">
    <a class="navbar-brand" href="conBaBus.php?seccion=home"><h1><b>FASHION WORLD</b></h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menú  
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="../product/favoritos.php">Tus favoritos</a></li>
            <li><a class="dropdown-item" href="../product/carrito.php">Carrito</a></li>
            <li><a class="dropdown-item" href="../product/vista.php">categorias</a></li>
            <li><a class="dropdown-item" href="conBaBus.php?seccion=perfil">Mi perfil</a></li>
            <li><a class="dropdown-item" href="conBaBus.php?seccion=cerrarSe">Cerrar sesión</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="../facturacion/lista_deseos.php">Lista deseos</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="controlador.php?seccion=seccion4">Video</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="controlador.php?seccion=seccion6">Ver</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="https://www.sena.edu.co" target="blank">Ir al Sena</a></li>
        </ul>
        <form id="formulario"class="d-flex ms-auto">
          <input id="nombrePro" class="form-control me-2" type="search" placeholder="producto" aria-label="Search">
          <button id="enviar" class="btn btn-outline-success" type="button" onclick="buscador()">Buscar</button>
        </form>
      </ul>
    </div>
  </div>
</nav>
<div class="main-banner">
        <div class="container text-center">
            <h1 class="display-4"> Bienvenido a Fashion World</h1>
            <p class="lead">Explora nuestras colecciones y encuentra lo que estás buscando.</p>
            <p class="lead">Encuentra lo mejor en moda y estilo.</p>
            <a href="../facturacion/facturacion.php" class="btn btn-warning btn-lg">Comprar Ahora</a>
        </div>
    </div>


<!-- Featured Products Section -->
<section class="featured-products py-5">
    <div class="container">
        <h2 class="text-center mb-4">Lo más vendido</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    <img src="../imagenes/favoritos1.png" class="img-fluid" alt="Producto 1">
                    <h5 class="product-title">Zapatos</h5>
                    <p class="product-description">Zapatos blancos de plataforma</p>
                    <a href="producto1.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    <img src="../imagenes/favorito5.png" class="img-fluid" alt="Producto 2">
                    <h5 class="product-title">Buzo</h5>
                    <p class="product-description">Buzo malgalarga negro</p>
                    <a href="producto2.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    <img src="../imagenes/favorito7.png" class="img-fluid" alt="Producto 3">
                    <h5 class="product-title">Camisa</h5>
                    <p class="product-description">camisa oversiza negra</p>
                    <a href="producto3.php" class="btn btn-primary">Ver Producto</a>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Categories Section -->
    <section class="categories-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="categorias-mujer.php" class="d-block category-card">
                        <img src="../imagenes/ropa-mujer.png" alt="Mujeres" class="img-fluid">
                        <div class="category-text">Mujeres</div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="categorias-ninos.php" class="d-block category-card">
                        <img src="../imagenes/ropa-niños.jpg" alt="Niños" class="img-fluid">
                        <div class="category-text">Niños</div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="categorias-hombre.php" class="d-block category-card">
                        <img src="../imagenes/ropa-hombres.jpg" alt="Hombres" class="img-fluid">
                        <div class="category-text">Hombres</div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
<!-- Footer -->
<footer class="site-footer ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>Información de Contacto</h3>
                <ul class="list-unstyled">
                    <li>San José del Guaviare, Guaviare</li>
                    <li><a href="tel://57 3152802997" class="text-white">+57 3152802997</a></li>
                    <li>fashionworld@gmail.com</li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h3>Más Productos</h3>
                <a href="categorias.php">
                    <img src="../imagenes/logo.jpeg" alt="Logo" class="img-fluid" height="90" width="90">
                </a>
            </div>
        </div>
    </div>
</footer>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>





</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/ajaxBusca.js"></script>
    <script src="../js/likes.js"></script>
    
   
  </body>
</html>