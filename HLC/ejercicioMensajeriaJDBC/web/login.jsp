<%@page import="modelo.Usuario"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    //Sesion
    HttpSession sesion=request.getSession();

    //Redireccion en caso de que el usuario ya se haya logeado
    if (sesion.getAttribute("usuarioLogeado")!=null)
        request.getRequestDispatcher("panelMensajes.jsp").forward(request, response);
     
    //Atributo de error de login sesion
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
        <h1>Bienvenido al foro Comares</h1>
        <%
            //Mostrar mensaje de error
            if ((Boolean) sesion.getAttribute("intentoFallido"))
                out.println("<p style='color:red;'>Usuario o contrasena incorrectos, vuelva a intentarlo.</p>");
                
        %>
        <!--Formulario de logeo-->
        <form action="LoginServlet" method="post">
            Usuario: <input type="text" name="usuarioLogin" required><br>
            Contraseña: <input type="password" name="passLogin" required><br>
            <input type="submit" name="enviarLogin" value="Entrar">
        </form>
        
        <a href="registro.jsp">Registrarse</a>
    </body>
</html>
