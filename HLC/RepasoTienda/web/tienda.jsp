<%@page import="modelo.Carrito"%>
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
    
//Crear carrito
if (sesion.getAttribute("carrito")==null)
    sesion.setAttribute("carrito", new Carrito());

BDDProductos productos=(BDDProductos) sesion.getAttribute("productosBD");
Carrito carrito=(Carrito) sesion.getAttribute("carrito");
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Bienvenido a la tienda</h1>
        <h3>Productos</h3>
        
        <%
            //Productos
            out.println(productos.toString());
        %>
        
        <h3>Tu carrito</h3>
        
        <%
            out.println(carrito.toString());
        %>
        <br>
        <form action="LogoutServlet" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>
    </body>
</html>
