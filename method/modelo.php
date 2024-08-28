<?php
class Modelo{

    public static function sqlLoguin($documento) {
        include("db_fashion/cb.php"); // Asegúrate de que $conexion esté definido en cb.php

        // Escapar el documento para prevenir inyecciones SQL
        $documento = $conexion->real_escape_string($documento);

        // Consultar el hash de la contraseña almacenado en la base de datos
        $sql = "SELECT contraseña FROM tb_usuarios WHERE documento='$documento'";
        $resultado = $conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            // Obtener el hash de la contraseña
            return $resultado->fetch_assoc(); // Devuelve el resultado con el hash
        } else {
            return false; // Usuario no encontrado
        }
    }

    public static function sqlRegistar($documento,$nombre,$apellido,$correo,$contraseña,$fecha){
        include("db_fashion/cb.php");
        $sql = "insert into tb_usuarios(documento,nombre,apellido,correo,contraseña,fecha,rol) ";
        $sql .= "values('$documento','$nombre','$apellido','$correo','$contraseña','$fecha','1')";
        #echo $sql;
        return $resultado = $conexion->query($sql); 
        
    }
    public static function sqlPerfil($id){
        include("db_fashion/cb.php");
        $sql = "select * from tb_usuarios where documento = '$id'";
        // echo $sql;
        return $resultado = $conexion->query($sql); 
        
    }
    public static function sqlRol($id){
        include("db_fashion/cb.php");
        $sql = "select rol from tb_usuarios ";
        $sql .= "where documento = '$id'";
        // echo $sql;
        return $resultado = $conexion->query($sql); 
        
    }

    public static function sqliDuplicados($documento, $correo){
        include 'db_fashion/cb.php';
        $sql="SELECT COUNT(*) as total FROM tb_usuarios WHERE documento = '$documento' OR correo = '$correo'";
        $resultado = $conexion->query($sql);
        $row=$resultado->fetch_assoc();
        return $row['total'];
        
    }

    public static function sqlAgregarPro($id_pro, $id_categoria, $nombre, $precio, $cantidad, $descripcion, $color, $tallas, $ruta_img) {
        include("db_fashion/cb.php");
        $sql = "INSERT INTO tb_productos (id_producto, id_categoria, nombre_producto, precio, cantidad, detalles, color, tallas, ruta_img) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iisdiisss", $id_pro, $id_categoria, $nombre, $precio, $cantidad, $descripcion, $color, $tallas, $ruta_img);
        $resultado = $stmt->execute();
        $stmt->close();
        $conexion->close();
        return $resultado;
    }
    

    public static function sqlMostrarPro($buscar = null) {
        include("db_fashion/cb.php");
        $sql = "SELECT * FROM vista_productos_likes ";
        if ($buscar) {
            $sql .= "WHERE nombre_producto LIKE '%$buscar%';";
        }
        return $resultado = $conexion->query($sql);
    }

    public static function sqlAgregarCate($id_categoria, $categoria) {
        include("db_fashion/cb.php");
        $sql = "INSERT INTO tb_categoria(id_categoria, categoria) "; 
        $sql .= "VALUES ('$id_categoria', '$categoria')";
        return $resultado = $conexion->query($sql);    
    }
    public static function sqlVerCate() {
        include("db_fashion/cb.php");
        $sql = "SELECT * FROM tb_categoria"; // Consulta para seleccionar todas las categorías
        return $resultado = $conexion->query($sql);
    }
    
    
 
    public static function sqlEliminarPro($id) {
        include("db_fashion/cb.php");
        $sql = "DELETE FROM tb_productos WHERE id_producto = '$id'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlEliminarCate($id) {
        include("db_fashion/cb.php");
        $sql = "DELETE FROM tb_categoria WHERE id_categoria = '$id'";
        return $resultado = $conexion->query($sql);
    }
    

    public static function sqlCategorias($des,$idCate){
        include("db_fashion/cb.php");
        $dato = "";
        if($des==1)$dato = "categoria";
        $sql = "select $dato from tb_categoria ";
        $sql .= "where id_categoria = '$idCate'";
        return $resultado = $conexion->query($sql);
        

    }

    public static function sqlEditar($id_categoria,$categoria){
        include_once("productos_class.php");
        include("db_fashion/cb.php");
        $sql = "update tb_categoria  set categoria = '$categoria' ";
        $sql .= "where id_categoria = '$id_categoria' ";
        return $resultado = $conexion->query($sql);
    }


    public static function sqlEliminarUser($id) {
        // Incluye el archivo de conexión a la base de datos
        include("db_fashion/cb.php");
    
        // Elimina registros relacionados en tb_likes
        $sqlLikes = "DELETE FROM tb_likes WHERE usuario_id = ?";
        if ($stmtLikes = $conexion->prepare($sqlLikes)) {
            $stmtLikes->bind_param("i", $id);
            $stmtLikes->execute();
            $stmtLikes->close();
        } else {
            return "Error al preparar la consulta para tb_likes: " . $conexion->error;
        }
    
        // Elimina el usuario de tb_usuarios
        $sqlUsuarios = "DELETE FROM tb_usuarios WHERE documento = ?";
        if ($stmtUsuarios = $conexion->prepare($sqlUsuarios)) {
            $stmtUsuarios->bind_param("i", $id);
            $stmtUsuarios->execute();
            $stmtUsuarios->close();
        } else {
            return "Error al preparar la consulta para tb_usuarios: " . $conexion->error;
        }
    
        // Verifica si la eliminación fue exitosa
        if ($conexion->affected_rows > 0) {
            return true;  // El usuario y las entradas relacionadas se eliminaron con éxito
        } else {
            return "No se eliminaron registros o el usuario no existía.";  // Mensaje en caso de error
        }
    }
    
    
    

    public static function sqlDatoPro($des,$idPro){
        include("db_fashion/cb.php");
        $dato = 0;
        if($des==1)$dato = "nombre_producto";
        if($des==2)$dato = "precio";
        if($des==3)$dato = "cantidad";
        if($des==4)$dato = "detalles";
        if($des==5)$dato = "color";
        if($des==6)$dato = "tallas";
        if($des==7)$dato = "ruta_img";
        $sql = "select $dato from tb_productos ";
        $sql .= "where id_producto = '$idPro'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlEditarPro($id_producto, $nombre, $precio, $cantidad, $detalles, $color, $tallas, $imagen){
        include("db_fashion/cb.php");
        include_once("productos_class.php");
        
        // Asumiendo que el nombre correcto de la columna es 'ruta_img'
        $sql = "UPDATE tb_productos 
                SET nombre_producto = '$nombre', 
                    precio = '$precio', 
                    cantidad = '$cantidad', 
                    detalles = '$detalles', 
                    color = '$color', 
                    tallas = '$tallas', 
                    ruta_img = '$imagen' 
                WHERE id_producto = '$id_producto'";
                
        return $resultado = $conexion->query($sql);
    }
    

    public static function sqlConteoEli(){
        include("db_fashion/cb.php");
        $sql = "select * from tb_conteo ";
        return $resultado = $conexion->query($sql);
    }
    public static function sqlConteoReg(){
        include("db_fashion/cb.php");
        $sql = "select * from tb_conteo_reg ";
        return $resultado = $conexion->query($sql);
    }
    public static function sqlConteoPro(){
        include("db_fashion/cb.php");
        $sql = "select * from tb_conteo_productos";
        return $resultado = $conexion->query($sql);
    }
    public static function sqlCambiarClave($nuevaClave,$id){
        include("db_fashion/cb.php");
        $sql = "update tb_usuarios set contraseña = '$nuevaClave' ";
        $sql .= "where documento = '$id'";
        return $resultado = $conexion->query($sql);
    }
    public static function sqlCambiarClaveEncrip($nuevaClave,$id){
        include("db_fashion/cb.php");
        // Configuración para password_hash (nota: el tercer parámetro es ignorado para PASSWORD_DEFAULT)
        $cont = [
            "cost" => 12
        ];

        // Encriptar la contraseña
        $contraEncrip = password_hash($nuevaClave, PASSWORD_DEFAULT, $cont);

        $sql = "update tb_usuarios set contraseña = '$contraEncrip' ";
        $sql .= "where documento = '$id'";
        return $resultado = $conexion->query($sql);
    }
    

    public static function sqlActualizarUser($idUser,$nombre,$apellido,$correo){
        include("db_fashion/cb.php");
        $sql = "update tb_usuarios set nombre = '$nombre', apellido = '$apellido', correo = '$correo' ";
        $sql .= "WHERE documento = '$idUser'";
        return $consulta = $conexion->query($sql);
    }

    public static function verficaClave($contraseñaN,$doc){
        include("db_fashion/cb.php");
        $sql = "select count(*) from tb_usuarios ";

        $sql .= "WHERE  contraseña = '$contraseñaN' and documento = '$doc'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlBuscarId($email){
        include("db_fashion/cb.php");
        $sql = "select * from tb_usuarios ";
        $sql .= "where correo = '$email'";
        return $resultado = $conexion->query($sql);
    }
   
    public static function sqlBuscarUser($des,$busqueda){
        include("db_fashion/cb.php");
        if($des==1)$dato = "documento";
        if($des==2)$dato = "nombre";
        if($des==3)$dato = "correo";
        $sql = "select * from tb_usuarios where $dato = '$busqueda'"  ;
        echo $sql;
        return $resultado = $conexion->query($sql);
    }



    public static function buscarDatosUser($des, $id) {
        include("db_fashion/cb.php");
        $salida = "";
        $dato = ""; // Define la variable $dato
    
        if ($des == 1) $dato = "nombre";
        if ($des == 2) $dato = "apellido";
        if ($des == 3) $dato = "correo";
        if ($des == 4) $dato = "fecha";
    
        $sql = "SELECT $dato FROM tb_usuarios WHERE documento = '$id'";
        $resultado = $conexion->query($sql);
    
        while ($fila = $resultado->fetch_array()) {
            $salida = $fila[0];
        }
        return $salida;
    }
    
    
    public static function sqlMostrarUser($buscaUser = Null){
        include("db_fashion/cb.php");
        $sql = "select * from tb_usuarios ";
        $sql .= "where documento  like'$buscaUser%'";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlMostrarDaUser($des,$idUser){
        include("db_fashion/cb.php");
        $dato = 0;
        if($des==1) $dato = "nombre";
        if($des==2) $dato = "apellido";
        if($des==3) $dato = "correo";
        if($des==4) $dato = "contraseña";
        if($des==5) $dato = "fecha";
        $sql = "select $dato from tb_usuarios ";
        $sql .= "WHERE documento = $idUser";
        return $resultado = $conexion->query($sql);
    }

    public static function sqlVerificLike($usuario_id, $producto_id) {
        // Incluir el archivo de conexión
        include("db_fashion/cb.php"); // Asegúrate de que `$conexion` esté definido en `cb.php`
    
        // Consulta para verificar el like para un producto específico
        $sql = "SELECT COUNT(*) as count FROM tb_likes WHERE usuario_id = '$usuario_id' AND producto_id = '$producto_id'";
        return $conexion->query($sql);
    }
    
    public static function sqlAgregarLike($usuario_id, $producto_id) {
        // Incluir el archivo de conexión
        include("db_fashion/cb.php"); // Asegúrate de que `$conexion` esté definido en `cb.php`
        include_once("productos_class.php");
    
        // Verificar si el like ya existe para ese producto
        $likeExists = Productos::verificLike($usuario_id, $producto_id);
    
        if ($likeExists == 1) {
            // Eliminar el like si ya existe
            $operacion = "DELETE FROM tb_likes WHERE usuario_id = '$usuario_id' AND producto_id = '$producto_id'";
        } else {
            // Insertar un nuevo like
            $operacion = "INSERT INTO tb_likes (producto_id, usuario_id, valor) VALUES ('$producto_id', '$usuario_id', 'like')";
        }
    
        // Ejecutar la operación y devolver el resultado
        return $conexion->query($operacion);
    }
  
    public static function sqlActuFoto($foto, $id_user) {
        include("db_fashion/cb.php");
        $sql = "UPDATE tb_usuarios SET foto = '$foto' WHERE documento = '$id_user'";
    
        if ($conexion->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error en la consulta SQL: " . $conexion->error;
            return false;
        }
    }

/**mayra */

public static function sqlmostrarCateg($categoria) {
    include 'db_fashion/cb.php';
    $sql = "SELECT * FROM tb_productos WHERE id_categoria = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $categoria);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "No se encontraron productos para la categoría $categoria.";
        return $result;
    }
}


public static function sqlCateNiños($categoria) {
    include 'db_fashion/cb.php';
    $sql = "SELECT * FROM tb_productos WHERE id_categoria = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $categoria); // Asumiendo que la categoría es un entero
    $stmt->execute();
    return $stmt->get_result(); // Devuelve el resultado de la consulta
}


public static function sqlverAcce($categoria) {
    include 'db_fashion/cb.php';
    $sql = "SELECT * FROM tb_productos WHERE id_categoria = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $categoria); // Asumiendo que la categoría es un entero
    $stmt->execute();

    return $stmt->get_result(); // Devuelve el resultado de la consulta
}


public static function sqlverZapatos($categoria) {
    include 'db_fashion/cb.php';
    $sql = "SELECT * FROM tb_productos WHERE id_categoria = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $categoria); // Asumiendo que la categoría es un entero
    $stmt->execute();

    return $stmt->get_result(); // Devuelve el resultado de la consulta
}

    public static function sqlVerFavoritos(){
        include 'db_fashion/cb.php';
        $salida = "";
        $sql = "SELECT * FROM tb_favoritos";
        return $consulta = $conexion->query($sql);
    }

    public static function sqlverCarrito(){
        include 'db_fashion/cb.php';
        $salida = "";
        $sql = "SELECT * FROM tb_carrito";
        return $consulta = $conexion->query($sql);
    } 

    public static function sqlBuscador() {
        include 'db_fashion/cb.php'; // Conexión a la base de datos
    
        $query = isset($_GET['query']) ? $_GET['query'] : ''; // Se obtiene el término de la búsqueda
    
        // Consulta a la base de datos
        $sql = "SELECT * FROM tb_productos WHERE nombre_producto LIKE ?";
        $fila = $conexion->prepare($sql);
        $searchTerm = "%" . $query . "%";
        $fila->bind_param('s', $searchTerm);
        $fila->execute();
    
        $resultado = $fila->get_result();
        $fila->close(); // Cerramos la consulta preparada
        $conexion->close(); // Cerramos la conexión
    
        return $resultado;
    }

}
