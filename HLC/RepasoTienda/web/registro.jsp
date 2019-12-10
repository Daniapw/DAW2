<%@page import="modelo.ListaUsuarios"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    HttpSession sesion=request.getSession();
    
    //Redirigir si esta logeado
    if (sesion.getAttribute("usuario")!=null)
        request.getRequestDispatcher("tienda.jsp").forward(request, response);
  
    //Crear lista de usuarios si no existe
    if (sesion.getAttribute("listaUsuarios")==null)
        sesion.setAttribute("listaUsuarios", new ListaUsuarios());
    
    //Crear atributo registro fallido si no existe
    if (sesion.getAttribute("registroFallido")==null)
        sesion.setAttribute("registroFallido", false);
    
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
        //Mensaje de registro
        if (!(Boolean) sesion.getAttribute("registroFallido"))
            out.println("<p style='color:red;'>El usuario ya existe</p>");
        %>
        <form action="RegistroServlet" method="post">
            Usuario: <input type="text" name="usuarioRegistro" required><br>
            Contraseña: <input type="password" name="contraRegistro" required><br>
            Confirmar contraseña: <input type="password" name="confirmarContraRegistro" required><br>
            <input type="submit" name="registrarse" value="Registro">
        </form>
    </body>
</html>
