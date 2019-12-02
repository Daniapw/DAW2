<%-- 
    Document   : foro
    Created on : 02-dic-2019, 13:17:51
    Author     : diurno
--%>

<%@page import="ejercicio1.modelo.Foro"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%
    HttpSession sesion=request.getSession();
    
    if (sesion.getAttribute("usuario")==null)
        response.sendRedirect("index.jsp");
    
    Foro foro=Foro.getInstancia();

%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <style>
            .cajaMensaje{
                width:500px;
                padding:5px;
                margin-bottom:5px;
                background-color:lightblue;
                border-radius: 5px 5px;  
            }
            
            .mensaje{
                padding-left:10px;
            }
            
            .autor{
                font-weight: bold;
            }
        </style>
    </head>
    <body>
    <%
        out.println(foro.toString());
    %>
    <form action="ForoServlet" method="post">
        <textarea name="mensaje" maxlength="400" cols="30" rows="5" placeholder="Escribe tu mensaje aqui..."></textarea><br>
        <input type="submit" name="logout" value="Escribir mensaje"/>
    </form>
    
    
    <form action="LogoutServlet" method="post">
        <input type="submit" name="logout" value="Salir"/>
    </form>
    </body>
</html>
