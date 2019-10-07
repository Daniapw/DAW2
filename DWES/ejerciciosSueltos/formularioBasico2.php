<?php
require './formularioUtils.php';

if (isSet($_POST["sig"]) && formularioRelleno(3)){
?>
<form action="confirmar.php" method="post">
    <h1>Datos matrícula</h1>
    Nº matrícula:<input type="text" name="numMatricula" value="<?php rellenarInputTexto("nombre", "aceptar");?>" required/><br>
    Curso: <input type="text" name="curso" value="<?php rellenarInputTexto("nombre", "aceptar");?>" required/>
    <input type="hidden" name="nombre" value="<?php echo($_POST["nombre"])?>"/>
    <input type="hidden" name="apellidos" value="<?php echo($_POST["apellidos"])?>"/>
    <input type="submit" value="Siguiente" name="sig2" />
</form>
<?php
}
else{
    if(isset($_POST["sig"]) && !formularioRelleno(3)){
        echo('<script language="javascript">alert("Debe rellenar todos los datos del formulario")</script>');
    }
?>
    <form action="formularioBasico2.php" method="post">

        <h1>Datos personales</h1>
        Nombre: <input type="text" name="nombre" value="<?php if(isset($_POST["cancelar"])){ 
                                                                rellenarInputTexto("nombre", "cancelar");
                                                            }
                                                            else{
                                                                rellenarInputTexto("nombre", "sig");
                                                            }
?>" /><br/>
        Apellido:<input type="text" name="apellidos" value="<?php rellenarInputTexto("apellidos", "aceptar");?>" /><br>
        <input type="submit" value="Siguiente" name="sig"/>
    </form>
<?php
}