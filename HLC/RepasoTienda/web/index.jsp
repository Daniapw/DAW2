
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
    
    //Crear atributo intento fallido si no existe
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
        <h1>Login tienda</h1>
        <%
            //Mostrar mensaje de error si procede
            if ((Boolean) sesion.getAttribute("intentoFallido"))
                out.println("<p style='color:red;'>Usuario o contraseña incorrectos</p>");
        %>
        <form action="LoginServlet" method="post">
            Usuario: <input type="text" name="usuarioLogin" required><br>
            Contraseña: <input type="password" name="contraLogin" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>
