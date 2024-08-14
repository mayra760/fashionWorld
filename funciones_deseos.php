<?php
include 'method/db_fashion/cb.php'; // Asegúrate de que este es el archivo correcto

class Deseos {
    public static function agregarDeseo($documento_usuario, $nombre_producto, $foto_referencia) {
        global $conexion; // Usa la conexión global desde el archivo de conexión
        $stmt = $conexion->prepare("INSERT INTO tb_lista_deseos (documento_usuario, nombre_producto, foto_referencia) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $documento_usuario, $nombre_producto, $foto_referencia);
        $stmt->execute();
        $stmt->close();
    }

    public static function obtenerDeseos($documento) {
        global $conexion; // Usa la conexión global
        $stmt = $conexion->prepare("SELECT * FROM tb_lista_deseos WHERE documento = ?" );
        $stmt->bind_param("i", $documento);
        $stmt->execute();
        $result = $stmt->get_result();
        $deseos = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close(); 
        return $deseos;
    }

    public static function actualizarDeseo($id_deseo, $nombre_producto, $foto_referencia) {
        global $conexion; // Usa la conexión global
        if ($foto_referencia) {
            $stmt = $conexion->prepare("UPDATE tb_lista_deseos SET nombre_producto = ?, foto_referencia = ? WHERE id_deseo = ?");
            $stmt->bind_param("ssi", $nombre_producto, $foto_referencia, $id_deseo);
        } else {
            $stmt = $conexion->prepare("UPDATE tb_lista_deseos SET nombre_producto = ? WHERE id_deseo = ?");
            $stmt->bind_param("si", $nombre_producto, $id_deseo);
        }
        $stmt->execute();
        $stmt->close();
    }

    public static function eliminarDeseo($id_deseo) {
        global $conexion; // Usa la conexión global
        $stmt = $conexion->prepare("DELETE FROM tb_lista_deseos WHERE id_deseo = ?");
        $stmt->bind_param("i", $id_deseo);
        $stmt->execute();
        $stmt->close();
    }
}
?>
