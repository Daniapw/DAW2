<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //EL FICHERO TIENE QUE SER SUBIDO EN EL MISMO SCRIPT, YA QUE SE BORRARA DE LA CARPETA TMP EN CUANTO EL SCRIPT ACABE
            if (isset($_POST['enviar'])){
                
                //Si el fichero se ha subido correctamente
                if (is_uploaded_file($_FILES['fichero']['tmp_name'])){
                    
                    //Concatenar tiempo UNIX actual + nombre del fichero para que no haya dos ficheros con el mismo nombre
                    //El tiempo debe ir delante para que el fichero no pierda la extension
                    $fich_unix=time()."-".$_FILES['fichero']['name'];
                    
                    //Ruta en la que se va a guardar el fichero
                    $ruta="imagenes/".$fich_unix;
                    
                    //Mover fichero subido a la ruta indicada
                    move_uploaded_file($_FILES['fichero']['tmp_name'], $ruta);
                    
                    //Subirlo a base de datos
                    $conex=new mysqli("localhost", "dwes", "abc123.", "imagenes");
                    
                    $conex->query("INSERT INTO imagenes VALUES('$fich_unix', '$ruta');");
                }
                else{
                    echo "ERROR EN LA SUBIDA DEL FICHERO";
                }
            }
            
            //Mostrar imagenes de BDD
            if (isset($_POST['mostrar'])){
                $conex=new mysqli("localhost", "dwes", "abc123.", "imagenes");
                
                $resultado=$conex->query("SELECT * FROM imagenes");
                
                while ($objeto=$resultado->fetch_object()){
                    echo "<a href=mostrarImagen.php?ruta=".$objeto->ruta."><img src='$objeto->ruta' width='50px'></a>";
                }
            }
        ?>
        <!-- TODOS LOS FORMULARIOS QUE VAYAN A SUBIR FICHEROS DEBEN TENER EL ATRIBUTO ENCTYPE OBLIGATORIAMENTE-->
        <form action="" method="post" enctype="multipart/form-data">
            Fichero: <input type="file" name="fichero"><br>
            <input type="submit" name="mostrar" value="Mostrar">
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
    </body>
</html>
