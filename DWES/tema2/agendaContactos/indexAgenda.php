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

if (isSet($_POST["enviar"])){
    
    //Si ya se han anadido contactos a la agenda
    if(isSet($_POST["agenda"])){    
        $agendaCodificada=$_POST["agenda"];
        $agenda=json_decode($agendaCodificada, true);    
    }
    else{
        $agenda=[];
    }
    
    $agenda= agenda($agenda); 
    
    ?>
    
    <div id="agenda">
        <?php  echo(mostrarAgenda($agenda)); ?>
    </div>
    
    <div id="formulario">
        <h1>Añadir contacto</h1>
        <form action="indexAgenda.php" method="post">
            Nombre: <input type="text" name="nombre" value="" /><br>
            Telefono: <input type="text" name="telefono" value=""/><br>
            <input type="hidden" name="agenda" value='<?php echo json_encode($agenda); ?>'/>
            <input type="submit" value="Enviar" name="enviar" />
        </form>

    </div>
    
    <?php 
}
else{?>
    
    <form action="indexAgenda.php" method="post">
        Nombre: <input type="text" name="nombre" value="" required /><br>
        Telefono: <input type="text" name="telefono" value="" required/><br>
        <input type="submit" value="Enviar" name="enviar" />
    </form>
    
<?php
}
?>
</body>
</html>