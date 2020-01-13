<%@page import="modelo.Usuario"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    HttpSession sesion=request.getSession();
    
    //Redirigir si es necesario
    if (sesion.getAttribute("usuarioLogeado")==null)
        request.getRequestDispatcher("login.jsp").forward(request,response);
    
    Usuario usuarioLogeado=(Usuario) sesion.getAttribute("usuarioLogeado");

%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
    </body>
</html>
