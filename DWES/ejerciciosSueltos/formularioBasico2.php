<?php
require './formularioUtils.php';

if (isSet($_POST["sig"])){
?>
<form action="confirmar.php" method="post">
    <h1>Datos matrícula</h1>
    Nº matrícula:<input type="text" name="numMatricula" value="" required/><br>
    Curso: <input type="text" name="curso" value="" required/><br>
    <input type="hidden" name="nombre" value="<?php echo($_POST["nombre"])?>"/>
    <input type="hidden" name="apellidos" value="<?php echo($_POST["apellidos"])?>"/>
    <input type="submit" value="Siguiente" name="sig2" />
</form>
<?php
}
else{
    if(isset($_POST["sig"])){
        echo('<script language="javascript">alert("Debe rellenar todos los datos del formulario")</script>');
    }
?>
    <form action="formularioBasico2.php" method="post">

        <h1>Datos personales</h1>
        Nombre: <input type="text" name="nombre" required value="<?php rellenarInputTexto("nombre", "cancelar"); ?>" /><br/>
        Apellido:<input type="text" name="apellidos" required value="<?php rellenarInputTexto("apellidos", "cancelar"); ?>" /><br>
        <?php
            //Guardar datos matricula y curso si el usuario le da a cancelar
            if (isset($_POST["cancelar"])){?>

                <input type="hidden" name="numMatricula" value="<?php echo($_POST["numMatricula"])?>"/>
                <input type="hidden" name="curso" value="<?php echo($_POST["curso"])?>"/>
      <?php } ?>
        
        <input type="submit" value="Siguiente" name="sig"/>
    </form>
<?php
}