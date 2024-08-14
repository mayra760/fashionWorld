<?php

class Loguin{
    public static function verificaUsuarios($documento,$contraseña){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlLoguin($documento,$contraseña);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida; 
    }

    public static function registraUsuarios($documento,$nombre,$apellido,$correo,$contraseña,$fecha){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlRegistar($documento,$nombre,$apellido,$correo,$contraseña,$fecha);
        if($consulta){
            $salida = 2;
        }
        return $salida;
    }

    public static function verRol($id){
        include_once("modelo.php");
        $salida = 0;
        $consulta = Modelo::sqlRol($id);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    
    



}