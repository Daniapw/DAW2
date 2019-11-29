<?php

require_once 'Conexion.php';

/**
 * Description of ControladorBD
 *
 * @author DWES
 */
class ControladorBD {
    
    public static function login($usuario, $pass){
        //Se comprueba si el usuario y la contrasena son correctos
        $conex=new Conexion("ejemplo");

        //La contrasena se encripta
        $passEnc=md5($pass);

        $resultado=$conex->query("SELECT * FROM usuarios WHERE contrasena='$passEnc' AND usuario='$usuario';");
        
        echo "$conex->error";
        
        $conex->close();
        
        //Si se ha encontrado se inicia la sesion y se redirige a la pagina portal
        if ($resultado->num_rows==1){
            return true;
        }
        
        return false;
    }
}
