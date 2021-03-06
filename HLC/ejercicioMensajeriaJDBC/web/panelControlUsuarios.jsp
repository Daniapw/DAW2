<%@page import="controlador.ControladorUsuario"%>
<%@page import="java.util.ArrayList"%>
<%@page import="modelo.Mensaje"%>
<%@page import="java.util.List"%>
<%@page import="controlador.ControladorMensajes"%>
<%@page import="modelo.Usuario"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    HttpSession sesion=request.getSession();
    
    //Redirigir si el usuario no esta logeado
    if (sesion.getAttribute("usuarioLogeado")==null)
        request.getRequestDispatcher("login.jsp").forward(request,response);
    
    Usuario usuarioLogeado=ControladorUsuario.getUsuario((String) sesion.getAttribute("usuarioLogeado"));

    //Si el usuario ha sido baneado se le redirige al login
    if (usuarioLogeado.isBloqueado()){
        sesion.setAttribute("usuarioBloqueado", true);
        request.getRequestDispatcher("LogoffServlet").forward(request,response);
    }
    
    //Si el usuario no es administrador se le redirige
    if (!usuarioLogeado.getTipo().equalsIgnoreCase("admin"))
        request.getRequestDispatcher("panelMensajes.jsp").forward(request,response);
    
    
    //Obtener lista de usuarios
    List<Usuario> listaUsuarios=ControladorUsuario.getAllUsuarios();
    List<String> spammers=ControladorMensajes.getPosiblesSpammers();

   

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

        <%
        //Mostrar mensaje spammers
        if (usuarioLogeado.getTipo().equals("admin") && spammers.size()>0){%>
            <div class="advertencia">
                <h5><b>ATENCION, POSIBLES SPAMMERS DETECTADOS:</b></h5>
                <ul>
                <%
                    for (String spammer:spammers){
                        out.println("<li>'"+spammer+"'</li>");
                    }
                %>
                </ul>
            </div>
            
        <%
        }
        %>
        
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
            
        <!--Lista usuarios-->
        <h3>Control de usuarios</h3>
        <div class="cuerpo">
            <%
            //Recorrer lista de usuarios y crear formularios
            for(Usuario usuario:listaUsuarios){%>
                <div class="usuarioLista">
                    <form action="ServletAdmin" method="POST">
                        Usuario <% out.println(usuario.getNombre()); %>
                        <input type="hidden" name="nombreUsuarioControl" value="<% out.println(usuario.getNombre()); %>">
                        <input type="submit" name="desbloquearUsuario" value="Desbloquear" <% if (!usuario.isBloqueado()) out.println("disabled");%>>
                        <input type="submit" name="bloquearUsuario" value="Bloquear" <% if(usuario.isBloqueado()) out.println("disabled");%>>
                    </form>
                </div>
            <%
            }
            %>
        </div>
        <a href="LogoffServlet">Cerrar sesion</a>
    </body>
</html>
