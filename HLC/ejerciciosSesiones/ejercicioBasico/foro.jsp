<%-- 
    Document   : foro
    Created on : 02-dic-2019, 13:17:51
    Author     : diurno
--%>

<%@page import="ejercicioBasico.modelo.Foro"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

<%
    HttpSession sesion=request.getSession();
    
    //Si el usuario no se ha logeado se redirige al index
    if (sesion.getAttribute("usuario")==null)
        request.getRequestDispatcher("index.jsp").forward(request, response);
    
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
        out.println("<h1>Bienvenido " + sesion.getAttribute("usuario") + "</h1>");
    
        //Mostrar mensajes del foro
        if (!(Boolean) sesion.getAttribute("admin"))
            out.println(foro.listarMensajes(false));
        else
            out.println(foro.listarMensajes(true));

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
