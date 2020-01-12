<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    //Sesion
    HttpSession sesion=request.getSession();

    //Redireccion en caso de que el usuario ya se haya logeado
    if (sesion.getAttribute("usuarioLogeado")!=null)
        request.getRequestDispatcher("panelMensajes.jsp").forward(request, response);
     
    //Atributo de error usuario ya existe
    if (sesion.getAttribute("usuarioExiste")==null)
        sesion.setAttribute("usuarioExiste", false);
    
    //Atributo de error contrasena incorrecta
    if (sesion.getAttribute("passIncorrecta")==null)
        sesion.setAttribute("passIncorrecta", false);
    
    //Atributo de error contrasena incorrecta
    if (sesion.getAttribute("registroCompletado")==null)
        sesion.setAttribute("registroCompletado", false);
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Registro</h1>
        <%
        if (!(Boolean) sesion.getAttribute("registroCompletado")){
            
            //Mostrar mensajes de error
            if ((Boolean) sesion.getAttribute("usuarioExiste"))
                out.println("<p style='color:red;'>Ese nombre ya esta en uso</p>");
            
            if ((Boolean) sesion.getAttribute("passIncorrecta"))
                out.println("<p style='color:red;'>Las contrasenas no coinciden</p>");
        %>
            <form action="RegistroServlet" method="POST">
                Nombre de usuario: <input type="text" name="usuarioRegistro" required><br>
                Contraseña: <input type="password" name="passRegistro" required><br>
                Confirmar contraseña: <input type="password" name="confirmarPassRegistro" required><br>
                <input type="submit" value="Registrarse" name="btnRegistro">
            </form>
        <%
        }
        else{
            //Se muestra un mensaje de informacion
            out.println("<h1 style='color:green;'>Registro completado con exito, ya puede logearse con ese usuario!</h1>");
            out.println("<p> En 2 segundos sera redirigido a la pagina de logeo...</p>");

            sesion.removeAttribute("usuarioExiste");
            sesion.removeAttribute("passIncorrecta");
            sesion.removeAttribute("registroCompletado");

            //Se redirige al usuario al index tras 2 segundos
            response.setHeader("Refresh", "2;URL=login.jsp");

        }
        %>
    </body>
</html>
