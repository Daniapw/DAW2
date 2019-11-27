<%-- 
    Document   : index
    Created on : 27-nov-2019, 12:55:01
    Author     : diurno
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<% HttpSession sesion=request.getSession();

if (sesion.getAttribute("intentoFallido")==null)
    session.setAttribute("intentoFallido", false);


%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            if ((Boolean) session.getAttribute("intentoFallido"))
                out.println("<p style='color:red;'>Usuario o contraseña incorrectos, pruebe otra vez</p>");
        %>
        <form action="Servlet1">
            Usuario: <input type="text" name="usuario"><br>
            Contraseña: <input type="password" name="contra"><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
