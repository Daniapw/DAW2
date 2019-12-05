<?php
require_once 'Conexion.php';


class ControladorBD {
    
    
    public static function login($usuario, $pass){
        //Se comprueba si el usuario y la contrasena son correctos
        $conex=new Conexion();

        $resultado=$conex->query("SELECT * FROM cliente WHERE Clave='$pass' AND Nombre='$usuario';");
        
        echo "$conex->error";
        
        $conex->close();
        
        //Si se ha encontrado se inicia la sesion y se redirige a la pagina portal
        if ($resultado->num_rows==1){
            return true;
        }
        
        return false;
    }
}
