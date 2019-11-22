<?php
//Conexion
function getConex(){
    $conex=new mysqli("localhost", 'dwes', 'abc123.', 'tema4_logeo');

    return $conex;
}

//Funcion para redirigir si la sesion ha sido iniciada o no
function checkSesion($iniciada, $url){
    
    if ($iniciada){
        if (isset($_SESSION['usuario']))
            header("Location: $url");
    }
    else{
        if (!isset($_SESSION['usuario']))
            header("Location: $url");
    }
}
    

//Validar email
function validarEmail($mail){
    if (!preg_match("/^[a-zA-Z\d]+@[a-zA-Z]+.[a-z]+$/", $mail))
        return false;
    
    $conex= getConex();
    
    $resultados=$conex->query("SELECT * FROM usuarios WHERE mail='$mail';");

    $conex->close();
    
    if ($resultados->num_rows>0)
        return false;
    
    return true;
}

//Comprobar si usuario es correcto
function login($mail, $contr){
    $conex= getConex();
    
    $contr=md5($contr);
    
    $resultados=$conex->query("SELECT * FROM usuarios WHERE mail='$mail' AND pass='$contr';");

    $conex->close();
    
    if ($resultados->num_rows==0)
        return false;
    
    return true;
}

//Obtener config usuario
function getUsuario($mail){
    $conex= getConex();
    
    $resultados=$conex->query("SELECT * FROM usuarios WHERE mail='$mail';");

    $conex->close();
    
    return $resultados->fetch_assoc();
}

//Funcion para configurar sesion
function configurarSesion(){
    $configuracionUsu= getUsuario($_POST['email']);

    //Configurar sesion
    $_SESSION['usuario']=$configuracionUsu['mail'];
    $_SESSION['nombre']=$configuracionUsu['nombre'];
    $_SESSION['colorLetra']=$configuracionUsu['colorLetra'];
    $_SESSION['colorFondo']=$configuracionUsu['colorFondo'];
    $_SESSION['tipoLetra']=$configuracionUsu['tipoLetra'];
    $_SESSION['tamLetra']=$configuracionUsu['tamLetra'];

}

//Funcion para cambiar estilos
function getStyles(){
?>
    <style>
        body{
            background-color:<?php echo "$_SESSION[colorFondo];" ?>;
            color:<?php echo "$_SESSION[colorLetra];" ?>;
            font-size:<?php echo "$_SESSION[tamLetra]px;"; ?>;
            font-family:<?php echo "'$_SESSION[tipoLetra]';" ?>;
        }

    </style>
<?php
}