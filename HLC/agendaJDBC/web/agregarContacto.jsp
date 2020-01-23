<%
    HttpSession sesion=request.getSession();
%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
        <link rel="stylesheet" type="text/css" href="agendaEstilos.css">

    </head>
    <body>
        <center><h1>Agenda personal</h1></center>
        <center><h3>Agregar contacto</h3></center>
        
        <div class="contendorAgenda">
            <%
            //Imprimir mensajes de exito o error
            if (sesion.getAttribute("mensajeExito")!=null){
                out.println("<div class='mensajeExito'>"+(String) sesion.getAttribute("mensajeExito")+"</div>");
                sesion.removeAttribute("mensajeExito");
            }
            
            if (sesion.getAttribute("mensajeError")!=null){
                out.println("<div class='mensajeError'>"+(String) sesion.getAttribute("mensajeError")+"</div>");
                sesion.removeAttribute("mensajeError");
            }
            
            %>
            
            <div class="agenda">
                <form action="Agenda" method="POST">
                    <div class="camposContacto">
                        <table class="tablaAgenda">
                            <tr>
                                <td>Nombre de contacto</td>
                                <td><input type="text" name="nombreNuevo" required></td>
                            </tr>

                            <tr>
                                <td>Telefono:</td>
                                <td><input type="text" name="telefonoNuevo" required></td>
                            </tr>

                            <tr>
                                <td>Direccion:</td>
                                <td><input type="text" name="direccionNuevo"></td>
                            </tr>

                            <tr>
                                <td>Email:</td>
                                <td><input type="mail" name="emailNuevo"></td>
                            </tr>
                        </table>
                    </div>

                    <!--Boton anadir contacto-->
                    <div class="anadirContacto">
                            <input  type="submit" name="nuevoContacto" value="Enviar">
                    </div>
                </form>

            </div>
            
            <!--Boton volver a inicio-->
            <div class="anadirContacto">
                <form action="agenda.jsp" method="POST">
                    <input  type="submit" value="Volver a inicio">
                </form>
            </div>
    </body>
</html>
