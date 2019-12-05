<?php
require_once 'Conexion.php';
require_once '../modelo/Usuario.php';

class UsuarioControlador {
    
    public static function getUsuario($DNI){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM cliente WHERE DNI='$DNI'");
        
        $resultado=$resultado->fetch_object();
        
        $usuario=new Usuario($resultado->DNI, $resultado->Nombre, $resultado->Tipo);
        
        return $usuario;
    }
    
}
