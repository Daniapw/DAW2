<%-- 
    Document   : Ejercicio17
    Created on : 30-oct-2019, 13:35:33
    Author     : diurno
--%>

<%@page import="javax.swing.JOptionPane"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Introduzca un numero</h1>
            
        <%
        
           if (request.getParameter("enviar")!=null){
               int numero=Integer.parseInt(request.getParameter("numero"));
               
               out.println("Numero: " + numero +"<br>");
               
               if (numero<0)
                   out.println("El numero es negativo");
               else if(numero>0)
                   out.println("El numero es positivo");  
           }
        %>
       
        <form action="Ejercicio17.jsp" method="post">
            Numero: <input type="number" name="numero"/><br>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
    </body>
</html>
