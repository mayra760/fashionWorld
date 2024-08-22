<?php

class Usuarios{

    // public static function perfilUsuario($id){
    //     include_once("modelo.php");
    //     $salida = "<div class='perfil-container'>";
        
    //     $consulta = Modelo::sqlPerfil($id);
    //     while($fila = $consulta->fetch_assoc()){
    //         $salida .= "<div class='perfil-foto-container'>";
    //         $foto = !empty($fila['foto']) ? $fila['foto'] : '../imagenes/31ec2ce212492e600b8de27f38846ed7.jpg';
    //         $salida .= "<img src='" . $foto . "' alt='Foto de perfil' class='perfil-foto' id='perfilFoto'>";
    //         $salida .= "<input type='file' id='inputFoto' style='display: none;' onchange='cambiarFoto(this)'>";
    //         // $salida .= "<img src='" . $foto . "' alt='Foto de perfil' class='perfil-foto' id='perfilFoto'>";
    //         // $salida .= "<input type='file' id='inputFoto' style='display: none;' onchange='cambiarFoto()'>";
    //         $salida .= "<button onclick=\"document.getElementById('inputFoto').click();\" class='btn btn-primary'>Cambiar foto</button>";
            
    //         $salida .= "</div>";
    //         $salida .= "<div class='perfil-datos'>";
    //         $salida .= "<div class='perfil-item'><span>Documento:</span> " . $fila['documento'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Nombre:</span> " . $fila['nombre'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Apellido:</span> " . $fila['apellido'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Correo:</span> " . $fila['correo'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Contraseña:</span> " . $fila['contraseña'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Fecha de nacimiento:</span> " . $fila['fecha'] . "</div>";
    //         $salida .= "<a class='btn btn-success' href='../admi/ctroBar.php?seccion=actuUser' role='button'><i class='fa fa-pencil-alt'></i> Editar</a>";
    //         $salida .= "</div>";
    //     }
        
    //     $salida .= "</div>";  x
    //     return $salida;
    // }
    public static function perfilUsuario($id) {
        include_once("modelo.php");
        $salida = "<div class='perfil-container'>";
        
        $consulta = Modelo::sqlPerfil($id);
        while($fila = $consulta->fetch_assoc()) {
            $salida .= "<div class='perfil-foto-container'>";
            
            // Verificar si el usuario tiene una foto, si no, mostrar una imagen por defecto
            $foto = !empty($fila['foto']) ? $fila['foto'] : '../imagenes/perfil.jpg';
            
            // Construir la ruta completa de la imagen
            $rutaImagen = "../imagenes/" . $foto;
            
            // Verificar si la imagen existe, si no, usar la imagen por defecto
            if (!file_exists($rutaImagen)) {
                $rutaImagen = '../imagenes/perfil.jpg';
            }
            
            $salida .= "<img src='" . $rutaImagen . "' alt='Foto de perfil' class='perfil-foto'>";
            $salida .= "<a class='btn btn-primary' href='#' role='button'>Cambiar foto</a>";
            $salida .= "</div>";
            
            $salida .= "<div class='perfil-datos'>";
            $salida .= "<div class='perfil-item'><span>Documento:</span> " . $fila['documento'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Nombre:</span> " . $fila['nombre'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Apellido:</span> " . $fila['apellido'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Correo:</span> " . $fila['correo'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Contraseña:</span> " . $fila['contraseña'] . "</div>";
            $salida .= "<div class='perfil-item'><span>Fecha de nacimiento:</span> " . $fila['fecha'] . "</div>";
            $salida .= "<a class='btn btn-success' href='../usuarios/conBaBus.php?seccion=actuUser' role='button'><i class='fa fa-pencil-alt'></i> Editar</a>";
            $salida .= "</div>";
        }
        
        $salida .= "</div>"; 
        return $salida;
    }
    
    
    

    // public static function perfilUsuario($id){
    //     include_once("modelo.php");
    //     $salida = "<div class='perfil-container'>";
        
    //     $consulta = Modelo::sqlPerfil($id);
    //     while($fila = $consulta->fetch_assoc()){
    //         $salida .= "<div class='perfil-foto-container'>";
    //         $foto = !empty($fila['foto']) ? $fila['foto'] : '../imagenes/user.webp';
    //         $salida .= "<img src='" . $foto . "' alt='Foto de perfil' class='perfil-foto'>";
    //         $salida .= "<a class='btn btn-primary' href='#' role='button'>cambiar foto</a>";
    //         $salida .= "</div>";
    //         $salida .= "<div class='perfil-datos'>";
    //         $salida .= "<div class='perfil-item'><span>Documento:</span> " . $fila['documento'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Nombre:</span> " . $fila['nombre'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Apellido:</span> " . $fila['apellido'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Correo:</span> " . $fila['correo'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Contraseña:</span> " . $fila['contraseña'] . "</div>";
    //         $salida .= "<div class='perfil-item'><span>Fecha de nacimiento:</span> " . $fila['fecha'] . "</div>";
    //         $salida .= "<a class='btn btn-success' href='../admi/ctroBar.php?seccion=actuUser' role='button'><i class='fa fa-pencil-alt'></i> Editar</a>";
    //         $salida .= "</div>";
    //     }
        
    //     $salida .= "</div>"; 
    //     return $salida;
    // }
    

    public static function eliminarCuentaUser($id){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlEliminarUser($id);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function buscarId($email){
        include_once("modelo.php");
        $salida = "";
        $consulta = Modelo::sqlBuscarId($email);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function verificaCon($contraseñaN,$doc){
        include_once("modelo.php");
        $consulta = Modelo::verficaClave($contraseñaN,$doc);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }
    
    
    

}
