<html>
<head>
    <style>
        body{
            text-align:center;
        }
        
        #formulario{
            border: solid 1px;
            position:fixed;
            padding:10px;
            right:40px;
            font-size:20px;
            
        }
        
        #agenda{
            margin:auto;
            width:50%;
            text-align:center;

        }
        
        #agenda table{
            text-align:center;
            margin:auto;
            width:50%;
            font-size:20px;
        }
       
        
    </style>
</head>
<body>
<?php
require 'funcionesAgenda.php';

    //Si no es la primera vez que se carga la pagina se decodifica la agenda
    if(isSet($_POST["agenda"]) && isSet($_POST["enviar"])){    
        $agendaCodificada=$_POST["agenda"];
        $agenda=json_decode($agendaCodificada, true); 
        
        /*Se llama a la funcion agenda para que gestione la informacion enviada
         por el usuario y modifique la agenda en consecuencia*/
        $agenda= agenda($agenda); 
        
        //Imprimir agenda
        ?>
        <div id="agenda">
            <?php  echo(mostrarAgenda($agenda)); ?>
        </div>
    <?php
    }
    //Si es la primera vez que se carga la pagina se crea la agenda
    else{
        $agenda=[];
    }

    ?>
    <div id="formulario">
        <h1>Añadir contacto</h1>
        <form action="indexAgenda.php" method="post">
            Nombre: <input type="text" name="nombre" value="" /><br>
            Telefono: <input type="text" name="telefono" value=""/><br>
            <input type="hidden" name="agenda" value='<?php echo json_encode($agenda); ?>'/>
            <input type="submit" value="Enviar" name="enviar" />
        </form>
    </div>
</body>
</html>