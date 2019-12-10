<%@page import="modelo.ListaUsuarios"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    HttpSession sesion=request.getSession();
    
    //Redirigir si esta logeado
    if (sesion.getAttribute("usuario")!=null)
        request.getRequestDispatcher("tienda.jsp").forward(request, response);
    
    //Variables de sesion para controlar errores
    if (sesion.getAttribute("usuarioYaExiste")==null)
        sesion.setAttribute("usuarioYaExiste", false);
    
    if (sesion.getAttribute("contraIncorrecta")==null)
        sesion.setAttribute("contraIncorrecta", false);

    
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Formulario de registro</h1>
        <%
            
        //Si el registro no se ha completado
        if (sesion.getAttribute("registroCompletado")==null){
            //Mensaje de error si el usuario ya existe
            if ((Boolean) sesion.getAttribute("usuarioYaExiste"))
                out.println("<p style='color:red;'>El usuario ya existe</p>");

            //Mensaje de error si los campos contrasena y confirmar contrasena no coinciden
            if ((Boolean) sesion.getAttribute("contraIncorrecta"))
                out.println("<p style='color:red;'>Las contraseñas deben coincidir</p>");

        %>
            <!--Formulario de registro-->
            <form action="RegistroServlet" method="post">
                Usuario: <input type="text" name="usuarioRegistro" required><br>
                Contraseña: <input type="password" name="contraRegistro" required><br>
                Confirmar contraseña: <input type="password" name="confirmarContraRegistro" required><br>
                <input type="submit" name="btnRegistro" value="Registro">
            </form>
        <%
        }

        //Si el registro se ha completado
        else{
            //Se muestra un mensaje de informacion
            out.println("<h1 style='color:green;'>Registro completado con exito, ya puede logearse con ese usuario!</h1>");
            out.println("<p> En 2 segundos sera redirigido a la pagina de logeo...</p>");

            //Se borran las variables que controlan el registro (se vuelven a crear si el usuario entra en esta pagina)
            sesion.removeAttribute("registroCompletado");
            sesion.removeAttribute("usuarioYaExiste");
            sesion.removeAttribute("contraIncorrecta");


            //Se redirige al usuario al index tras 2 segundos
            response.setHeader("Refresh", "2;URL=index.jsp");
        }
        %>
    </body>
</html>
