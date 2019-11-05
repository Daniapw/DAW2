<%-- 
    Document   : Ejercicio19
    Created on : 05-nov-2019, 9:40:29
    Author     : diurno
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
        
            int numero=1;
            do{
                out.println(numero + " ");
                
                numero+=7;
            }while(numero<100);
        
        
        %>
    </body>
</html>
