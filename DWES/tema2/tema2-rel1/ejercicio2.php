<?php
   echo ("<table border='1'>");
   
   for ($i=0; $i<10; $i++){
       echo("<tr>");
       
       for ($j=0; $j < 10; $j++){
           echo("<td>");
           
           do{
               $num= rand(1, 10000); 
           }while($num%2==0);
           
           echo("$num </td>");
       }
       
       echo("</tr>");
   }
   
   echo("</table>")
?>

