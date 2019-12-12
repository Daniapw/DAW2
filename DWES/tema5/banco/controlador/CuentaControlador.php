<?php
require_once 'Conexion.php';
require_once '../modelo/Cuenta.php';

/**
 * Description of CuentaControlador
 *
 * @author DWES
 */
class CuentaControlador {
    
    //Obtener cuenta
    public static function getCuenta($iban){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM cuentas WHERE iban='$iban';");
        
        $registro=$resultado->fetch_object();
        
        $cuenta=new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);
        
        $conex->close();
        
        return $cuenta;
    }
    
    
    //Obtener todas las cuentas de un usuario
    public static function getCuentasUsuario($dni){
        $conex=new Conexion();
        
        $resultado=$conex->query("SELECT * FROM cuentas WHERE dni_cuenta='$dni';");
        
        $cuentas=[];
        
        while ($registro=$resultado->fetch_object()){
            $cuenta=new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);
            $cuentas[]=$cuenta;
        }
        
        return $cuentas;
    }
    
    //Funcion para obtener cuentas + nombres de propietarios. Si se le pasa un IBAN se excluira la cuenta con ese IBAN de los resultados
    //Devolvera un array asociativo que contendra un array de cuentas por cada usuario, usando el nombre de usuario como clave
    public static function getCuentasUsuarios($ibanExcluido=false){
        $conex=new Conexion();
        
        //Si se le pasa un IBAN para excluir se hara la busqueda excluyendo dicho IBAN
        if ($ibanExcluido!=false)
            $query="SELECT u.Nombre, c.* FROM cuentas c JOIN usuarios u ON u.DNI=c.dni_cuenta WHERE c.iban!='$ibanExcluido' ORDER BY dni_cuenta;";
        else
            $query="SELECT u.Nombre, c.* FROM cuentas c JOIN usuarios u ON u.DNI=c.dni_cuenta ORDER BY dni_cuenta;";
        
        $resultados=$conex->query($query);
        
        $cuentas=[];
        
        //Recorrer registros
        while ($registro=$resultados->fetch_object()){
            $cuenta=new Cuenta($registro->iban, $registro->saldo, $registro->dni_cuenta);
            
            //Si el usuario no tiene una entrada en el array se creara una nueva usando su nombre como clave
            if (!array_key_exists($registro->Nombre, $cuentas))
                $cuentas[]=[$registro->Nombre=>$cuenta];
            
            //Si el usuario ya tiene una entrada se anadira esta cuenta a dicha entrada
            else
                array_push($cuentas[$registro->Nombre], $cuenta);
        }
        
        return $cuentas;
    }
    
}
