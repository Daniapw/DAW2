<%-- 
    Document   : index
    Created on : 27-nov-2019, 12:55:01
    Author     : diurno
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<% 
HttpSession sesion=request.getSession();
sesion.setMaxInactiveInterval(3600);

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
        if (sesion.getAttribute("usuario")==null){
            
            if ((Boolean) session.getAttribute("intentoFallido"))
                out.println("<p style='color:red;'>Usuario o contraseña incorrectos, pruebe otra vez</p>");
        %>
        <form action="LoginServlet" method="post">
            Usuario: <input type="text" name="usuario" required><br>
            Contraseña: <input type="password" name="contra" required><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <%
        }
        else{
            out.println("<h1>Bienvenido " + sesion.getAttribute("usuario")+"</h1>");
        %>
        <form action="LogoutServlet" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>
        <%
        }
        %>
        
    </body>
</html>
