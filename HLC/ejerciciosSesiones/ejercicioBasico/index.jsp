<%-- 
    Document   : index
    Created on : 27-nov-2019, 12:55:01
    Author     : diurno
--%>

<%@page import="ejercicioBasico.modelo.Foro"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<% 
HttpSession sesion=request.getSession();

//Si el usuario ya se ha logeado
if (sesion.getAttribute("usuario")!=null)
    response.sendRedirect("foro.jsp");

//Crear variable de sesion para saber si el usuario ha intentado logearse
if (sesion.getAttribute("intentoFallido")==null)
    sesion.setAttribute("intentoFallido", false);


%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Login</h1>
        <%
        //Mostrar mensaje de error si es necesario
        if ((Boolean) session.getAttribute("intentoFallido"))
            out.println("<p style='color:red;'>Usuario o contraseña incorrectos, pruebe otra vez</p>");
        %>
        <form action="LoginServlet" method="post">
            Usuario: <input type="text" name="usuario" required><br>
            Contraseña: <input type="password" name="contra" required><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <a href="registro.jsp">Registrarse</a>
        
    </body>
</html>
