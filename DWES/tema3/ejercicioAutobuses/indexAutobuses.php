<html>
<head></head>
<body>
    <?php
    REQUIRE 'funcionesAutobuses.php';
    
    //Funcion para saber si el formulario se ha enviado y existen los datos
    function lineaExiste(){
        if (isset($_POST['consultar'])){

            $resultados=getLinea($_POST['fecha'], $_POST['origen'], $_POST['destino']);

            if ($resultados->num_rows>0)
                return true;
            
            return false;
        }
        
        return false;
    }
    ?>
    
    <h1>Autobuses</h1>
    
    <?php
    //Formulario inicial, se mostrara siempre
    if (!lineaExiste() && isset($_POST['consultar']))
        echo "<h3 style='color:red;'> Ningun viaje programado en esa linea para esa fecha </h3>";
    ?>

    <form action="indexAutobuses.php" method="post">
        Fecha: <input type="date" name="fecha" required/><br>
        Origen: 
        <select name="origen" required>
        <?php
            $resultadosOrigenes= getOrigenes();

            while($objeto=$resultadosOrigenes->fetch_object()){
                echo "<option value=$objeto->Origen > $objeto->Origen</option>";
            }

        ?>
        </select><br>
        Destino:
        <select name="destino" required>
        <?php
            $resultadosDestinos= getDestinos();

            while($objeto=$resultadosDestinos->fetch_object()){
                echo "<option value=$objeto->Destino > $objeto->Destino</option>";
            }

        ?>
        </select><br>
        <input type="submit" name="consultar" value="Consultar"/>
    </form>
    <?php
    
    //Datos de la linea y formulario para reservar plazas, se mostrara si se ha introducido una liena valida
    if (lineaExiste()){
        
        if (isset($_POST['reservar'])){
            $conex=getConex();
            
            $conex->query("UPDATE viajes SET Plazas_libres=(Plazas_libres - $_POST[plazasUsuario]) WHERE Fecha='$_POST[fecha]' AND Matricula='$_POST[matricula]' AND Origen='$_POST[origen]' AND Destino='$_POST[destino]';");
            
            if ($conex->errno!=null)
                echo $conex->error;
            
            $conex->close();
            
            echo "<h1 style='color:green;'>Plaza/s reservadas con exito</h1>";
        }
        
        $resultadosLinea=getLinea($_POST['fecha'], $_POST['origen'], $_POST['destino']);
        $linea=$resultadosLinea->fetch_object();
        
        echo
        "<h2>Informacion de la linea</h2>"
        . "<ul>"
            . "<li>Fecha: $linea->Fecha</li>"
            . "<li>Origen: $linea->Origen</li>"
            . "<li>Destino: $linea->Destino</li>"
            . "<li>Plazas disponibles: ". $linea->Plazas_libres." libres</li>"
        . "</ul>"
        
        ?>
    
        <form action="indexAutobuses.php" method="post">
            <input type="hidden" value="<?php echo $linea->Fecha; ?>" name="fecha" />
            <input type="hidden" value="<?php echo $linea->Origen;  ?>" name="origen" />
            <input type="hidden" value="<?php echo $linea->Destino;  ?>" name="destino"/>
            <input type="hidden" value="<?php echo $linea->Plazas_libres; ?>" name="plazasDisponibles"/>
            <input type="hidden" value="<?php echo $linea->Matricula; ?>" name="matricula"/>
            <input type="hidden" name="consultar"/>
            <?php
            $plazas=true;
            if ($linea->Plazas_libres==0){
                $plazas=false;
                echo "<p style='color:red;'> <b>No hay plazas disponibles</b></p>";
            }?>
            Reservar plazas: <input type="number" min="1" max="<?php echo $linea->Plazas_libres;?>" name="plazasUsuario" <?php if (!$plazas) echo 'disabled'; ?> required/><br>
            <input type="submit" name="reservar" value="Reservar" <?php if (!$plazas) echo 'disabled'; ?>/>
        </form>
    
    <?php
    }?>
    
    
    
</body>
</html>
