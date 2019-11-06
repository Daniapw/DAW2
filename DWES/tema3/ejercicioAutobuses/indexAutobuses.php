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
    //Formulario inicial, se mostrara cuando se entra por primera vez o si no hay ninguna linea con esos parametros
    if (!isset($_POST['consultar']) || !lineaExiste()){
        var_dump($_POST);
        if (!lineaExiste() && isset($_POST['consultar']))
            echo "<h2 style='color:red;'> No hay ninguna linea como esa en esa fecha</h2>";
        ?>
    
        <form action="indexAutobuses.php" method="post">
            Fecha: <input type="date" name="fecha" required/><br>
            Origen: 
            <select name="origen" required>
            <?php
                $resultados= getOrigenes();
                
                while($objeto=$resultados->fetch_object()){
                    echo "<option value=$objeto->Origen > $objeto->Origen</option>";
                }
                
            ?>
            </select><br>
            Destino:
            <select name="destino" required>
            <?php
                $resultados= getDestinos();
                
                while($objeto=$resultados->fetch_object()){
                    echo "<option value=$objeto->Destino > $objeto->Destino</option>";
                }
                
            ?>
            </select><br>
            <input type="submit" name="consultar" value="Consultar"/>
        </form>
    <?php
    }
    else{
        
        $resultados=getLinea($_POST['fecha'], $_POST['origen'], $_POST['destino']);
        $linea=$resultados->fetch_object();
    
        echo
        "<h2>Informacion de la linea</h2>"
        . "<ul>"
            . "<li>Fecha: $linea->Fecha</li>"
            . "<li>Origen: $linea->Origen</li>"
            . "<li>Destino: $linea->Destino</li>"
            . "<li>Plazas disponibles: ". getNumPlazas($linea->Plazas_libres)."</li>"
        . "</ul>"
        
        ?>
    
        <form action="indexAutobuses.php" method="post">
            <input type="hidden" value="<?php echo $linea->Fecha; ?>" name="fecha" />
            <input type="hidden" value="<?php echo $linea->Origen;  ?>" name="origen" />
            <input type="hidden" value="<?php echo $linea->Destino;  ?>" name="destino"/>
            <input type="hidden" value="<?php echo $linea->Plazas_libres; ?>" name="plazasDisponibles"/>
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
    
        <a href="indexAutobuses.php">Volver a inicio</a>
    
    <?php
    }?>
    
    
    
</body>
</html>
