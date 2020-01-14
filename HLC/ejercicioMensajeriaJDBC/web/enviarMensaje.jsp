<%@page import="controlador.ControladorUsuario"%>
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
    List<Usuario> usuariosDisponibles=ControladorUsuario.getAllUsuarios();
    List<Mensaje> mensajesRecibidos=ControladorMensajes.getMensajesEnviados(usuarioLogeado.getNombre());

%>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" type="text/css" href="ejercicioMensajeria.css">

    </head>
    <body>
        <h1>Enviar mensaje</h1>
    
        <!--Menu-->
        <div class="contenedorMenu">
            <ul class="menu">
                <li><a href="panelMensajes.jsp">Mensajes recibidos</a></li>
                <li><a href="panelMensajesEnviados.jsp">Mensajes enviados</a></li>
                <li><a href="enviarMensaje.jsp">Enviar mensaje</a></li>
            </ul>
        </div>            
                
        <!--Formulario enviar mensaje-->
        <form action="MensajesServlet" method="POST">
            Destinatario:
            
            <select name="destinatarioEnviar">
                <%
                    for (Usuario usuario:usuariosDisponibles){
                        out.println("<option value='"+usuario.getNombre()+"'>"+usuario.getNombre()+"</option>");
                    }
                %>
            </select><br>
            
            Escribe el mensaje aquí:<br>
            <textarea name="contenidoMensajeEnviar" maxlength="250" cols="60" rows="7"></textarea><br>
            
            <input type="submit" name="btnEnviarMensaje" value="Enviar mensaje">
        </form>
        <a href="LogoffServlet">Cerrar sesion</a>

    </body>
</html>
