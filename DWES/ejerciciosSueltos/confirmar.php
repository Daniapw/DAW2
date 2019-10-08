<h1>Confirmar Datos</h1>

Nombre: <?php echo($_POST["nombre"]); ?><br>
Apellidos: <?php echo($_POST["apellidos"]); ?><br>
Nº matrícula: <?php echo($_POST["numMatricula"]); ?><br>
Curso: <?php echo($_POST["curso"]); ?><br>

<form action="formularioBasico2.php" method="post">
    
    <input type="hidden" name="nombre" value="<?php echo($_POST["nombre"])?>"/>
    <input type="hidden" name="apellidos" value="<?php echo($_POST["apellidos"])?>"/>
    <input type="submit" value="Cancelar" name="cancelar" />
    <input type="submit" value="Aceptar" name="aceptar"/>
    
</form>
