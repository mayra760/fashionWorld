<?php
class Productos{

    public static function mostrarPro($buscar = null) {
    include_once("modelo.php");
    include("controler_login.php");
    
    $salida = "";
    $salida .= '<div class="productos-container">';
    
    $consulta = Modelo::sqlMostrarPro($buscar);
    
    if ($consulta->num_rows > 0) {
        while ($fila = $consulta->fetch_assoc()) {
            $salida .= '<div class="producto">';
            
            if (Loguin::verRol($_SESSION['id']) == 0) {
                $salida .= "<span class='producto-id'>ID: " . $fila['id_producto'] . "</span>";
            }
            
            $salida .= "<h3 class='producto-nombre'>" . $fila['nombre_producto'] . "</h3>";
            $salida .= "<p class='producto-precio'>Precio: $" . number_format($fila['precio'], 2) . "</p>";
            $salida .= "<p class='producto-cantidad'>Cantidad: " . $fila['cantidad'] . "</p>";
            $salida .= "<p class='producto-detalles'>" . $fila['detalles'] . "</p>";
            
            if (!empty($fila['ruta_img'])) {
                $rutaImagen = "../imagenes/" . $fila['ruta_img'];
                $salida .= '<div class="imagen-container"><img src="' . $rutaImagen . '" alt="' . $fila['nombre_producto'] . '" class="producto-imagen"></div>';
            } else {
                $salida .= "<p class='sin-imagen'>Imagen no disponible</p>";
            }
            
            $likeClass = Productos::verificLike($_SESSION['id'], $fila['id_producto']) ? 'fas fa-heart liked' : 'far fa-heart';
            $salida .= "<div class='producto-acciones'>";
            $salida .= "<a href='ctroBar.php?dato=" . $fila['id_producto'] . "&seccion=editarPro' class='btn btn-editar'>Editar</a>";
            $salida .= "<i class='$likeClass' data-id_producto='" . $fila['id_producto'] . "' onclick='likear(this)'></i>";
            $salida .= "</div>";
            
            $salida .= '</div>'; // Cierre del div .producto
        }
    } else {
        $salida .= "<p>No se encontraron productos.</p>";
    }
    
    $salida .= '</div>'; // Cierre del div .productos-container
    
    return $salida;
}

    


    public static function mostrarCate() {
        include_once("modelo.php");
        $salida = "";
        $consulta = Modelo::sqlVerCate();
    
        // Verifica si hay resultados
        if ($consulta->num_rows > 0) {
            // Muestra las categorías utilizando un ciclo while
            while ($fila = $consulta->fetch_assoc()) {
                $salida .=  "<div class='categoria-item' style='position: relative;'>"; 
                $salida .=  "<div class='categoria-id'>" . $fila['id_categoria'] . "</div>";
                $salida .=  "<div class='categoria-titulo'>" . $fila['categoria'] . "</div>";
                $salida .=  "<a href='ctroBar.php?seccion=editarCate&dato=" .$fila['id_categoria']."'  class='editar-btn top-left' >Editar</a>"; 
                $salida .=  "</div>";
            }
        } else {
            $salida .=  "No se encontraron categorías.";
        }
        return $salida;
    
        $conexion->close(); // Cierra la conexión a la base de datos
    }

    // public static function buscarPro($nombre){
    //     include_once("modelo.php");
    //     $consulta = Modelo::sqlBuscarPro($nombre);
    //     return $consulta;
    // }
    public static function eliminarPro($id){
        $salida = 0;
        include_once("modelo.php");
        $consulta = Modelo::sqlEliminarPro($id);
        if($consulta){
            $salida = 1;
        }else{
            $salida = 0;
        }
        return $salida;
    }
    
    public static function eliminarCate($id){
        $salida = 0;
        include_once("modelo.php");
        $consulta = Modelo::sqlEliminarCate($id);
        if($consulta){
            $salida = 1;
        }else{
            $salida = 0;
        }
        return $salida;
    }


    public static function agregarPro($id_pro, $nombre, $precio, $cantidad, $descripcion, $imagen){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlAgregarPro($id_pro, $nombre, $precio, $cantidad, $descripcion, $imagen);
        if($consulta){
            $salida = 1;
        }
        return $salida;

    }
    public static function agregarCate($id_categoria, $categoria){
        include_once("modelo.php");
        $consulta = Modelo::sqlAgregarCate($id_categoria, $categoria);
        if($consulta){
            header("location:ctroBar.php?seccion=verCate");
        }

    }
    public static function editarCate($des,$categoria){
        $salida = "";
        include_once("modelo.php");
        $consulta = Modelo::sqlCategorias($des,$categoria);
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[0];

        }
        return $salida;
        
       
    }
    
    public static function editarCategoria($id_categoria,$categoria){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlEditar($id_categoria,$categoria);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function EliminarUser($id){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlEliminarUser($id);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function datoPro($des,$idPro){
        include_once("modelo.php");
        $salida = "";
        $consulta = Modelo::sqlDatoPro($des,$idPro);
        while($fila = $consulta->fetch_array()){
            $salida .= $fila[0];
        }
        return $salida; 
    }

    public static function editarProducto($id_producto,$nombre,$precio,$cantidad,$detalles,$imagen){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlEditarPro($id_producto,$nombre,$precio,$cantidad,$detalles,$imagen);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }



    public static function mostrarConteoEli(){
        include_once("modelo.php");
        $salida = "<br><br><table class='conteo-table'>";
        $consulta = Modelo::sqlConteoEli();
        while($fila= $consulta->fetch_assoc()){
            $salida .= "<tr>"; 
            $salida .= "<td>" .$fila['id_conteo']. "</td>";
            $salida .= "<td>" .$fila['descripcion']. "</td>";
            $salida .= "<td>" .$fila['conteo']. "</td>";
            $salida .= "<td>" .$fila['fec_eli']. "</td>";
            $salida .= "</tr>";
        }
        $salida .= "</table>";
        return $salida; 
    }

    public static function mostrarConteoReg(){
        include_once("modelo.php");
        $salida = "<br><br><table class='conteo-table'>";
        $consulta = Modelo::sqlConteoReg();
        while($fila= $consulta->fetch_assoc()){
            $salida .= "<tr>"; 
            $salida .= "<td>" .$fila['id_conteo']. "</td>";
            $salida .= "<td>" .$fila['descripcion']. "</td>";
            $salida .= "<td>" .$fila['docUser']. "</td>";
            $salida .= "<td>" .$fila['conteo']. "</td>";
            $salida .= "<td>" .$fila['fec_reg']. "</td>";
            $salida .= "</tr>";
        }
        $salida .= "</table>";
        return $salida; 
    }

    public static function mostrarConteoProductos(){
        include_once("modelo.php");
        $salida = "";
        $salida = "<br><br><table class='conteo-table'>";
        $consulta = Modelo::sqlConteoPro();
        while($fila = $consulta->fetch_assoc()){
            $salida .= "<tr>"; 
            $salida .= "<td>" .$fila['id_conteo']. "</td>";
            $salida .= "<td>" .$fila['descripcion']. "</td>";
            $salida .= "<td>" .$fila['docPro']. "</td>";
            $salida .= "<td>" .$fila['conteo']. "</td>";
            $salida .= "<td>" .$fila['fec_eli']. "</td>";
            $salida .= "</tr>";
        }
        $salida .= "</table>";
        return $salida;
    }

    public static function buscarUsuario($des, $busqueda) {
        include_once("modelo.php");
        $salida = "";
        $consulta = Modelo::sqlBuscarUser($des, $busqueda);
        if ($consulta->num_rows > 0) {
            while ($fila = $consulta->fetch_assoc()) {
                $salida .= $fila['nombre'] . " "; // Agrega un espacio después de cada valor
                $salida .= $fila['apellido'] . " ";
                $salida .= $fila['correo'] . " ";
                $salida .= $fila['fecha'] . " ";
            }
        } else {
            $salida .= "No se encontró ningún usuario con esta búsqueda";
        }
        return $salida;
    }

    public static function mostrarUsuarios($buscaUser = Null){
        include_once("modelo.php");
        $salida = "";
        $consulta = Modelo::sqlMostrarUser($buscaUser);
    
        while($fila = $consulta->fetch_assoc()){
            $salida .= "<div class='usuario'>";
            $salida .= "<img src='" . $fila['foto'] . "' alt='Imagen de " . $fila['nombre'] . "'>";
            $salida .= "<div>"; 
            $salida .= "<p><strong>Documento:</strong> " . $fila['documento'] . "</p>";
            $salida .= "<p><strong>Nombre:</strong> " . $fila['nombre'] . "</p>";
            $salida .= "<p><strong>Apellido:</strong> " . $fila['apellido'] . "</p>";
            $salida .= "<p><strong>Correo:</strong> " . $fila['correo'] . "</p>";
            $salida .= "<p><strong>Fecha:</strong> " . $fila['fecha'] . "</p>";
            $salida .= "<p><strong>Rol:</strong> " . $fila['rol'] . "</p>";
            $salida .= "</div>";
            $salida .= "</div>";
        }
    
        return $salida;
    }

    public static function actualizaDatosUser($des,$idUser){
        include_once("modelo.php");
        $consulta = Modelo::sqlMostrarDaUser($des,$idUser);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }
    
    public static function actualizarUser($idUser,$nombre,$apellido,$correo){
        include_once("modelo.php");
        $consulta = Modelo::sqlActualizarUser($idUser,$nombre,$apellido,$correo);
        if($consulta){
            $salida = 1;
        }
        return $salida; 
    }
    
    public static function verificLike($usuario_id, $producto_id) {
        include_once("modelo.php");
        $consulta = Modelo::sqlVerificLike($usuario_id, $producto_id);
        if($consulta && $consulta->num_rows > 0) {
            $fila = $consulta->fetch_assoc();
            return $fila['count'] > 0 ? 1 : 0;
        }
        return 0;
    }
    
    public static function agregarLike($usuario_id, $producto_id) {
        include_once("modelo.php");
        
        return Modelo::sqlAgregarLike($usuario_id, $producto_id);
    }

/**mayra */
    public static function mostrarProductos() {
        include 'modelo.php';
        $salida = "";
        $consulta=Modelo::sqlMostrarProd();
        while ($fila = $consulta->fetch_assoc()) {

            $salida .= "<div class='producto'>";
            $salida .= "<img src='" . $fila['ruta_img'] . "' alt='" . $fila['detalles'] . "' width='100px' class='img-thumbnail'>";
            $salida .= "<p><strong>" . $fila['detalles'] . "</strong></p>";
            $salida .= "</div>";
        }
        return $salida;
    }

    public static function mostrarCategorias() {
        include 'modelo.php';
        $salida = "";
        $consulta = Modelo::sqlmostrarCateg();
        $salida .= "<div class='categorias'>";
        while ($fila = $consulta->fetch_assoc()) {
            $salida .= "<div class='categoria' data-color='" . strtolower($fila['color']) . "' data-talla='" . strtolower($fila['tallas']) . "'>"; // Cambiado a strtolower
            $salida .= "<h5><p><li>" . $fila['nombre_producto'] . "; por solo: </h5></li></p>";
            $salida .= "<strong> $" . $fila['precio'] . "</strong>";
            if (!empty($fila['ruta_img'])) {
                $rutaImagen = "../imagenes/" . $fila['ruta_img'];
                $salida .= '<div class="imagen-container"><img src="' . $rutaImagen . '" alt="' . $fila['nombre_producto'] . '" class="img-thumbnail"></div>';
            } else {
                $salida .= "<p class='sin-imagen'>Imagen no disponible</p>";
            }
            $salida .= "<div class='carfav'>";
            $salida .= "<button class='btn btn-info btn-agregar-carrito' data-id='{$fila['id_producto']}'><i class='fa fa-shopping-cart'></i> carrito</button>-";
            $salida .= "<button class='btn btn-info btn-favoritos' data-id='{$fila['id_producto']}'><i class='fas fa-heart'></i> Favoritos</button>";
            $salida .= "</div><br>";
            $salida .= "</div><br>";
        }
        $salida .= "</div>";
    
        return $salida;
    }
    
    
    
    

    public static function CateNiños() {
        include 'modelo.php';
        $salida="";
        $consulta=Modelo::sqlCateNiños();
        $salida .= "<div class='categorias'>";
        while ($fila = $consulta->fetch_assoc()) {
            $salida .= "<div class='categoria' data-color='" . strtolower($fila['color']) . "' data-talla='" . strtolower($fila['tallas']) . "'>";  
            $salida .= "<h5><p><li>" . $fila['nombre_producto'] . "; por solo: </h5></li></p>";
            $salida .= "<strong> $" . $fila['precio'] . "</strong>";
            $salida .= "<img src='" . $fila['ruta_img'] . "' alt='" . $fila['nombre_producto'] . "' class='img-thumbnail'>";
            $salida .= "<div class='carfav'>";
            $salida.="<button class='btn btn-primary btn-agregar-carrito' data-id='{$fila['id_producto']}'><i class='fa fa-shopping-cart'></i> carrito</button>-";
            $salida .= "<button class='btn btn-primary btn-favoritos' data-id='{$fila['id_producto']}'><i class='fas fa-heart'></i> Favoritos</button>";
            $salida .= "</div><br>";
            $salida .= "</div><br>";
        }
        $salida .= "</div>";
        
        return $salida;
    }

    public static function verAccesorios() {
        include 'modelo.php';
        $salida="";
        $consulta=Modelo::sqlverAcce();
        $salida .= "<div class='categorias'>";
        while ($fila = $consulta->fetch_assoc()) {
            $salida .= "<div class='categoria' data-color='" . strtolower($fila['color']) . "' data-talla='" . strtolower($fila['tallas']) . "'>";
            $salida .= "<h5><p><li>" . $fila['nombre_producto'] . "; por solo: </h5></li></p>";
            $salida .= "<strong> $" . $fila['precio'] . "</strong>";
            $salida .= "<img src='" . $fila['ruta_img'] . "' alt='" . $fila['nombre_producto'] . "' class='img-thumbnail'>";
            $salida .= "<div class='carfav'>";
            $salida .= "<button class='btn btn-info btn-agregar-carrito' data-id='{$fila['id_producto']}'><i class='fa fa-shopping-cart'></i>  carrito</button>-";
            $salida .= "<button class='btn btn-info btn-favoritos' data-id='{$fila['id_producto']}'><i class='fas fa-heart'></i> Favoritos</button><br>";
            $salida .= "</div><br>";
            $salida .= "</div>";
         
            
        }
        $salida .= "</div>";
        
        return $salida;
    }

    public static function verZapatos() {
        include 'modelo.php';
        $salida="";
        $consulta=Modelo::sqlverZapatos();
        $salida .= "<div class='categorias'>";
        while ($fila = $consulta->fetch_assoc()) {
            $salida .= "<div class='categoria' data-color='" . strtolower($fila['color']) . "' data-talla='" . strtolower($fila['tallas']) . "'>"; 
            $salida .= "<h5><p><li>" . $fila['nombre_producto'] . "; por solo: </h5></li></p>";
            $salida .= "<strong> $" . $fila['precio'] . "</strong>";
            $salida .= "<img src='" . $fila['ruta_img'] . "' alt='" . $fila['nombre_producto'] . "' class='img-thumbnail'><br>";
            $salida .= "<div class='carfav'>";
            $salida .= "<button class='btn btn-info btn-agregar-carrito' data-id='{$fila['id_producto']}'><i class='fa fa-shopping-cart'></i> carrito</button>-";
            $salida .= "<button class='btn btn-info btn-favoritos' data-id='{$fila['id_producto']}'><i class='fas fa-heart'></i>favoritos</button>";
            $salida .= "</div><br>";
            $salida .= "</div>";
        }
        $salida .= "</div>";
        
        return $salida;
    }
    

    public static function verFavoritos() {
        include 'modelo.php';
        $salida="";
        $consulta= Modelo::sqlVerFavoritos();
        $salida .= "<table class='table table-hover'>";
        $salida .= "<thead><tr><th>Producto</th><th>Cantidad</th><th>Eliminar</th></tr></thead><tbody>";
        
        while ($fila = $consulta->fetch_assoc()) {
            $salida .= "
                <tr>
                    <td data-label='Producto' class='product-name'>{$fila['nombre_produc']}</td>
                    <td data-label='Cantidad'>
                        <div class='quantity-buttons'>
                            <input type='text' value='{$fila['cantidad_fav']}' class='quantity-input' readonly>
                        </div>
                    </td>
                    <td data-label='Eliminar'>
                        <a href='eliminarFavo.php?id={$fila['id_favo']}' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>";
        }
        $salida .= "</tbody></table>";
        return $salida;
    }
     
    
    public static function verCarrito() {
        include 'modelo.php';
        $salida = "";
        $consulta = Modelo::sqlverCarrito();
        $salida .= "<table class='table table-hover'>";
        $salida .= "<thead><tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Eliminar</th></tr></thead><tbody>";
        $subtotal = 0;
        
        while ($fila = $consulta->fetch_assoc()) {
            $total_producto = $fila['precio_pro'] * $fila['cantidad_pro'];
            $subtotal += $total_producto;
            $salida .= "
                <tr>
                    <td data-label='Producto' class='product-name'>{$fila['nombre_producto']}</td>
                    <td data-label='Precio'>\${$fila['precio_pro']}</td> <!-- Corregido aquí -->
                    <td data-label='Cantidad'>
                        <div class='quantity-buttons'>
                            <input type='text' value='{$fila['cantidad_pro']}' class='quantity-input' readonly>
                        </div>
                    </td>
                    <td data-label='Total'>\${$total_producto}</td>
                    <td data-label='Eliminar'>
                        <a href='eliminarCa.php?id={$fila['id_ca']}' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>";
        }
        
        $salida .= "</tbody>";
        $salida .= "<tfoot><tr class='total-row'><td colspan='3'>Subtotal</td><td>\${$subtotal}</td><td></td></tr></tfoot>";
        $salida .= "</table>";
        
        return $salida;
    }
    

    public static function buscador() {
        include 'modelo.php';
        $salida = "";
        $resultado = Modelo::sqlBuscador();
    
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $salida .= "<div class='product-container'>";
                $salida .= "<h2>" . htmlspecialchars($fila['nombre_producto']) . "</h2>";
                $salida .= "<p>Precio: $" . htmlspecialchars($fila['precio']) . "</p>";
                $salida .= "<img src='" . $fila['ruta_img'] . "' alt='" . htmlspecialchars($fila['nombre_producto']) . "' class='img-thumbnail'>";
                $salida .= "<p>" . htmlspecialchars($fila['detalles']) . "</p>";
                $salida .= "<div class='carfav'>";
                $salida .= "<button class='btn btn-primary btn-agregar-carrito' data-id='{$fila['id_producto']}'><i class='fa fa-shopping-cart'></i> carrito</button>-";
                $salida .= "<button class='btn btn-primary btn-favoritos' data-id='{$fila['id_producto']}'><i class='fas fa-heart'></i>favoritos</button>";
                $salida .= "</div><br>";
                $salida .= "</div>";
            }
        } else {
            $salida .= "<div class='no-results'>";
            $salida .= "<h2>No se encontraron productos</h2>";
            $salida .= "<p>Intenta con otro término de búsqueda.</p>";
            $salida .= "</div>";
        }
    
        return $salida; // Se devuelve la salida generada
    }
}

