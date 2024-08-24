<?php

class Deseos {
    private static $db;

    // Método para establecer la conexión a la base de datos
    public static function setDb($database) {
        self::$db = $database;
    }

    // Método para agregar un producto a la lista de deseos
    public static function agregarDeseo($documento, $nombreProducto, $fotoReferencia) {
        if (self::$db === null) {
            throw new Exception("La conexión a la base de datos no está establecida.");
        }
        $sql = "INSERT INTO tb_lista_deseos (documento, nombre_producto, foto_referencia) 
                VALUES (?, ?, ?)";
        $stmt = self::$db->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Error en la preparación de la consulta: " . self::$db->error);
        }
        $stmt->bind_param("sss", $documento, $nombreProducto, $fotoReferencia);
        return $stmt->execute();
    }

    // Método para obtener todos los deseos de un usuario
    public static function obtenerDeseos($documento) {
        if (self::$db === null) {
            throw new Exception("La conexión a la base de datos no está establecida.");
        }
        $sql = "SELECT id_deseo, nombre_producto, foto_referencia 
                FROM tb_lista_deseos WHERE documento = ?";
        $stmt = self::$db->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Error en la preparación de la consulta: " . self::$db->error);
        }
        $stmt->bind_param("s", $documento);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Método para eliminar un deseo por su ID
    public static function eliminarDeseo($idDeseo) {
        if (self::$db === null) {
            throw new Exception("La conexión a la base de datos no está establecida.");
        }
        $sql = "DELETE FROM tb_lista_deseos WHERE id_deseo = ?";
        $stmt = self::$db->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Error en la preparación de la consulta: " . self::$db->error);
        }
        $stmt->bind_param("i", $idDeseo);
        return $stmt->execute();
    }
}
?>
