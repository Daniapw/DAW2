<%-- 
    Document   : registro
    Created on : 02-dic-2019, 16:52:16
    Author     : danir
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
HttpSession sesion=request.getSession();

//Si ya esta logeado se le redirige a inicio
if (sesion.getAttribute("usuario")!=null)
    response.sendRedirect("index.jsp");

//Si el registro ha sido completado con exito
if (sesion.getAttribute("registroCompletado")==null)
    sesion.setAttribute("registroCompletado", false);

//Variable de sesion para saber si se ha comprobado que el usuario ya existe
if (sesion.getAttribute("usuarioYaExiste")==null)
    sesion.setAttribute("usuarioYaExiste", false);

%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
        //Si el usuario no se ha registrado con exito aun
        if (!(Boolean) sesion.getAttribute("registroCompletado")){

            //Si el nombre de usuario ya existe se le muestra un mensaje de error
            if ((Boolean) sesion.getAttribute("usuarioYaExiste"))
                out.println("<p style='color:red;'>Ese nombre de usuario ya esta en uso</p>");
            %>
            <h3>Formulario de registro</h3>
            <form action="RegistroServlet">
                Usuario: <input type="text" name="usuarioRegistro" required><br>
                Contraseña: <input type="text" name="passRegistro" required><br>
                Edad: <input type="number" min="18" max="130" name="edad" required><br>
                <input type="submit" name="registrarse" value="Registrarse"/>
            </form><br>
            <a href="index.jsp">Volver a inicio</a>
        <%
        }
        //Si se ha registrado con exito 
        else{
            //Se muestra un mensaje de informacion
            out.println("<h1 style='color:green;'>Registro completado con exito, ya puede logearse con ese usuario!</h1>");
            out.println("<p> En 2 segundos sera redirigido a la pagina de logeo...</p>");

            //Se borran las variables que controlan el registro (se vuelven a crear si el usuario entra en esta pagina)
            sesion.removeAttribute("registroCompletado");
            sesion.removeAttribute("usuarioYaExiste");

            //Se redirige al usuario al index tras 2 segundos
            response.setHeader("Refresh", "2;URL=index.jsp");
        }%>
    </body>
</html>
