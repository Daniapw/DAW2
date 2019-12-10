<%@page import="modelo.BDDProductos"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
HttpSession sesion=request.getSession();

//Redirigir si no esta logeado
if (sesion.getAttribute("usuario")==null)
    request.getRequestDispatcher("index.jsp").forward(request, response);
   
//Crear lista de productos si es necesario
if (sesion.getAttribute("productosBD")==null)
    sesion.setAttribute("productosBD", new BDDProductos());
    
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <form action="LogoutServlet" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>
    </body>
</html>
