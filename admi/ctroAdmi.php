<?php
include("../method/productos_class.php");
if(!isset($_SESSION))session_start();

//esto es para crear un producto
if(isset($_GET['crear'])){
    $id_pro = $_GET['id_producto'];
    $nombre = $_GET['nombre'];
    $precio = $_GET['precio'];
    $color = $_GET['color'];
    $tallas = $_GET['tallas'];
    $cantidad = $_GET['cantidad'];
    $descripcion = $_GET['descripcion'];
    $ruta_img = $_GET['ruta_img'];
    if( Productos::agregarPro($id_pro, $nombre, $precio, $cantidad, $color, $tallas, $descripcion, $ruta_img) == 1){
        header("location:ctroBar.php?seccion=verPro");
    }
}

//esto es para agregar una categoria
if(isset($_GET['agreCate'])){
    $id_categoria = $_POST['id_categoria'];
    $categoria = $_POST['categoria'];
    Productos::agregarCate($id_categoria,$categoria);
}

//esto es para eliminar categoria
if(isset($_GET['idCateEliminar'])){
    if(Productos::eliminarCate($_GET['idCateEliminar'])==1){
        echo Productos::mostrarCate(); 
    }else{
        echo 0;
    }
}

//Elimina producto
if(isset($_GET['idProEliminar'])){
    // echo $_GET['idProEliminar'];
    if(Productos::eliminarPro($_GET['idProEliminar'])==1){
        echo Productos::mostrarPro(); 
    }else{
        echo 0;
    }
}

//Actualizar categoria
if(isset($_GET['ediCate'])){
    $categoria = $_POST['categoria'];
    $id_categoria = $_GET['dato'];
    if(Productos::editarCategoria($id_categoria,$categoria)==1){
        header("location:ctroBar.php?seccion=verCate");
    }
}

if(isset($_GET['bou'])){
    $id = $_POST['documento'];
    if(Productos::eliminarUser($id)==1){
        header("location:login.php");
    }
}

if(isset($_GET['ediPro'])){
    $id_producto = $_GET['dato'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $detalles = $_POST['detalles'];
    $imagen = $_FILES['imagen'];
    if(Productos::editarProducto($id_producto,$nombre,$precio,$cantidad,$detalles,$imagen)==1){
        header("location:ctroBar.php?seccion=verPro");
    }

}

if(isset($_GET['eli'])){
    header("location:ctroBar.php?seccion=verConteoEli");
        
}

if(isset($_GET['reg'])){
    header("location:ctroBar.php?seccion=verConteoReg");
}
if(isset($_GET['producto'])){
    header("location:ctroBar.php?seccion=verConteoProductos");
}
if (isset($_GET['buscarU']) && $_GET['buscarU'] == 'true') {
    if (isset($_POST['busqueda'])) {
        $busqueda = $_POST['busqueda'];
        echo Productos::buscarUsuario(1, $busqueda);
    } else {
        echo "Parámetro de búsqueda no proporcionado.";
    }
}

if(isset($_GET['IDbuscar'])){
    echo Productos::mostrarUsuarios($_GET['IDbuscar']);
    
}

if(isset($_GET['ediUser'])) {
    if(isset($_GET['dato'])) {
        $idUser = $_GET['dato'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        if(Productos::actualizarUser($idUser, $nombre, $apellido, $correo)==1) {
            header("location: ctroBar.php?seccion=perfilAdmi");
        }
    }
}
