<html>
    <head></head>

    <body>
        
        <?php
        
        //Funcion para validar campos
        function formularioCorrecto(){
            
            if (isset($_POST['enviar'])){
                if (!preg_match('/^[a-z]+\s?[a-z]*$/i', $_POST['nombre']) || strlen($_POST['nombre'] > 30)){
                    return false;
                }
                elseif(!preg_match('/^\d{8}[A-Z]$/', $_POST['dni'])){
                    return false;
                }
                elseif(!preg_match('/^\d{2}-[a-z]+-\d{4}$/i', $_POST['fechaNac'])){
                    return false;
                }
                elseif(!preg_match('/^\d{1,3}$/', $_POST['edad']) || $_POST['edad']<18){
                    return false;
                }
                
                return true;
            }
            return false;
        }
        
        
        //Si se ha enviado el formulario y no tiene errores
        if (isset($_POST['enviar']) && formularioCorrecto()){
            echo
            "Nombre: $_POST[nombre] <br>".
            "DNI: $_POST[dni] <br>".
            "Fecha de nacimiento: $_POST[fechaNac] <br>".
            "Edad: $_POST[edad]";
        }
        //Si no se ha enviado o tiene errores
        else{
        ?>
        <form action="ejercicioValidacion.php" method="post">
            Nombre: <input type="text" name="nombre" value="<?php if (isset($_POST['enviar'])) echo $_POST['nombre'] ?>" />
                <?php if (isset($_POST['enviar']) && (!preg_match('/^[a-z]+\s?[a-z]*$/i', $_POST['nombre']) || strlen($_POST['nombre'] > 30))){
                    echo ' Nombre incorrecto';
                }?>
            <br>
                
            DNI: <input type="text" name="dni" value="<?php if (isset($_POST['enviar'])) echo $_POST['dni'] ?>" />
            <?php if (isset($_POST['enviar']) && !preg_match('/^\d{8}[A-Z]$/', $_POST['dni'])){
                echo ' DNI incorrecto';
            }
                
            ?>
            <br>
            Fecha de nacimiento: <input type="text" name="fechaNac" value="<?php if (isset($_POST['enviar'])) echo $_POST['fechaNac'] ?>" />
            <?php if (isset($_POST['enviar']) && !preg_match('/^\d{2}-[a-z]+-\d{4}$/i', $_POST['fechaNac'])){
                
                echo ' Fecha incorrecta';
            }
            ?>
            
            <br>
            Edad: <input type="text" name="edad" value="<?php if (isset($_POST['enviar'])) echo $_POST['edad'] ?>" />
            <?php if (isset($_POST['enviar']) && (!preg_match('/^\d{1,3}$/', $_POST['edad']) || $_POST['edad']<18)){
                
                echo ' Edad incorrecta';
                
            }?>
            
            <br>
            
            <input type="submit" value="Enviar" name="enviar" />
        
        </form>
        
        <?php
        }
        ?>
    </body>
</html>
