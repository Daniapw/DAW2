<?php

   echo ("<table border='1'>");
   
   $numero=1;
   do{ 
       echo("<tr>");
       
       $contador=0;
       
       while($contador<7){
           echo("<td>$numero</td>");
           $contador++;
           $numero++;
       }
     
       echo("</tr>");
   }while($numero<35);
   
   echo("</table>")

?>

