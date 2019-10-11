<?php

function mostrarAgenda($agenda){
    echo
    "<table border='1'>
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
        </tr>";
    
    foreach ($agenda as $nombre => $telefono) {
        
        if ($nombre!="enviar"){
            echo
            "<tr>
                 <td>$nombre</td>
                 <td>$telefono</td>
            </tr>";
        }
    }
    
    echo("</table>");

}
