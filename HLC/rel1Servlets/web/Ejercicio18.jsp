<%-- 
    Document   : Ejercicio18.jsp
    Created on : 05-nov-2019, 9:22:47
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
        <h1>Introduzca un numero</h1>
            
        <%
        
            if (session.isNew()){
                session.setAttribute("cantidad", new Integer(0));
            }
            
            if (request.getParameter("enviar")!=null){
                
               Integer cantidadNum=(Integer) session.getAttribute("cantidad");
               
               cantidadNum++;
               
               session.setAttribute("cantidad", cantidadNum);
               
               out.println("Numero: " + request.getParameter("numero") +"<br>");
               
               out.println("Cantidad de numeros leidos: " + session.getAttribute("cantidad"));
            }
        %>
       
        <form action="Ejercicio18.jsp" method="post">
            Numero: <input type="number" name="numero" required/><br>
            <input type="submit" name="enviar" value="Enviar"/>
        </form>
    </body>
</html>
