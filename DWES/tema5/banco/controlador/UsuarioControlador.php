<?php

require_once 'Conexion.php';
require_once '../modelo/Usuario.php';


/**
 * Description of UsuarioControlador
 *
 * @author DWES
 */
class UsuarioControlador {
    
    //Comprobar credenciales
    public static function login($dni, $pass){
        //Se comprueba si el usuario y la contrasena son correctos
        $conex=new Conexion();

        $resultado=$conex->query("SELECT * FROM usuarios WHERE DNI='$dni' AND clave='$pass';");
        
        echo "$conex->error";
        
        $conex->close();
        
        //Si se ha encontrado se inicia la sesion y se redirige a la pagina portal
        if ($resultado->num_rows==1)
            return true;
        
        
        return false;
    }
    
    //Obtener usuario de la BD
    public static function getUsuario($dni){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM usuarios WHERE DNI='$dni';");
        
        $usuario=false;
        
        if ($resultado->num_rows==1){
            $objeto=$resultado->fetch_object();
            
            $usuario=new Usuario($objeto->Nombre, $objeto->DNI, $objeto->clave, $objeto->Direccion, $objeto->Telefono);
        }
        
        $conex->close();
        
        return $usuario;
    }
}
