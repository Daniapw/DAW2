<%-- 
    Document   : formulario.jsp
    Created on : 30-oct-2019, 13:06:02
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
        if (session.isNew() && request.getParameter("enviar")==null){;%>
            <form action="formulario.jsp" method="post">
                Nombre: <input type="text" name="nombre"/><br>
                Apellidos: <input type="text" name="apellidos"/><br>
                Edad: <input type="number" name="edad" min="1" max="140"/><br>
                Domicilio:  <input type="text" name="domicilio"/><br>
                <input type="submit" name="enviar"/>
            </form>
        <%}
        else if (!session.isNew() && request.getParameter("enviar")!=null){
            out.println(
            "Nombre: " + request.getParameter("nombre") +
            "Apellidos " + request.getParameter("apellidos") +
            "Edad: " + request.getParameter("edad") +
            "Domicilio: " + request.getParameter("domicilio")
            );
        }%>
    </body>
</html>
