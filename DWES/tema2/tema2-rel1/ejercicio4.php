<?php
    
   echo ("<table border='1'>");
   
   $numero=1;
   for ($i=0; $i<5; $i++){
       echo("<tr>");
       
       for ($j=0; $j < 7; $j++){
           echo("<td> $numero </td>");
           $numero+=1;
       }
       
       echo("</tr>");
   }
   
   echo("</table>")

?>
