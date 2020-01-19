<%@page import="java.util.ArrayList"%>
<%@page import="modelo.Mensaje"%>
<%@page import="java.util.List"%>
<%@page import="controlador.ControladorMensajes"%>
<%@page import="modelo.Usuario"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    HttpSession sesion=request.getSession();
    
    //Redirigir si es necesario
    if (sesion.getAttribute("usuarioLogeado")==null)
        request.getRequestDispatcher("login.jsp").forward(request,response);
    
    Usuario usuarioLogeado=(Usuario) sesion.getAttribute("usuarioLogeado");
    
    
    //Obtener mensajes
    List<Mensaje> mensajes=new ArrayList<Mensaje>();

    //Determinar que mensajes se mostraran segun nivel de usuario
    mensajes=ControladorMensajes.getMensajesUsuario(usuarioLogeado.getNombre());
   

%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" type="text/css" href="ejercicioMensajeria.css">
    </head>
    <body>
        <h1>Bienvenido <% out.println(usuarioLogeado.getNombre()); %>!</h1>
        
        <!--Menu-->
        <div class="contenedorMenu">
            <ul class="menu">
                <li><a href="panelMensajes.jsp">Mensajes recibidos</a></li>
                <li><a href="panelMensajesEnviados.jsp">Mensajes enviados</a></li>
                <li><a href="enviarMensaje.jsp">Enviar mensaje</a></li>
                <%
                    if (usuarioLogeado.getTipo().equalsIgnoreCase("admin")){
                        out.println("<li><a href='panelMensajesAdmin.jsp'>Ver todos los mensajes</a></li>");
                        out.println("<li><a href='panelControlUsuarios.jsp'>Control usuarios</a></li>");
                    }
                %>
            </ul>
        </div>
        
        
        <h3>Mensajes recibidos</h3>
        <%
            //Mostrar mensaje de error en caso de que no haya recibido ningun mensaje
            if (mensajes.size()<1)
                out.println("<p style='mensajeError'>Aun no has recibido ningun mensaje</p>");
            
            //Mostrar mensajes recibidos
            else{
        %>
                <div class="contenedorMensajes">
                    <%
                        for (Mensaje mensaje:mensajes){
                            mensaje.desencriptarMensaje();
                            out.println(mensaje.toString());
                        }
                    %>
                </div>
        <%
            }
        %>
        <a href="LogoffServlet">Cerrar sesion</a>
    </body>
</html>
