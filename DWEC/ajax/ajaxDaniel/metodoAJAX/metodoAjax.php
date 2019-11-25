<?php

//Conexion
$conex=new mysqli("localhost", "dwes", "abc123.", "usuarios");

//Consulta con parametro
$resultado=$conex->query("SELECT * FROM usuarios WHERE dni='$_POST[dni]';");

//Fetch object para el conseguir resultado en formato objeto
$usuario=$resultado->fetch_object();

//Convertir $usuario en objeto JSON
$jsonRespuesta=json_encode($usuario);

//echo para que Ajax pille la respuesta
echo $jsonRespuesta;

//Cerrar conexion
$conex->close();