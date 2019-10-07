<?php

function comprobarSiguiente(){
    
}

?>


<form action="formularioBasico.php" method="post">
    <?php if (!isset($_POST["sig"])){ ?>
    
        <input type="text" name="nombre" value="" /><br/>
        <input type="text" name="apellido" value="" />

        <input type="button" value="Siguiente" name="sig" />
    
    <?php
    }
    else{?>
        <h1>Datos matrícula</h1>
        <input type="text" name="numMatricula" value="" />
        
    
    <?php
    }
    
