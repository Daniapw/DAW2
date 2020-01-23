<%@page import="java.util.List"%>
<%@page import="java.util.ArrayList"%>
<%@page import="modelo.Contacto"%>
<%@page import="controlador.ControladorContacto"%>
<%
    HttpSession sesion=request.getSession();
    
    //Establecer id actual y lista de contactos en caso de que el usuario haya entrado por primera vez
    if (sesion.getAttribute("indiceActual")==null)
        sesion.setAttribute("indiceActual", 0);
    
    //Recuperar lista contactos
    List<Contacto> listaContactos=ControladorContacto.getAllContactos();
    
    //Recuperar lista de contactos y contacto actual
    int indice=(Integer) sesion.getAttribute("indiceActual");
    
    Contacto contactoActual=null;
    
    if (listaContactos.size()>0)
        contactoActual=listaContactos.get(indice);

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
        
        <center><h3>Lista de contactos</h3></center>
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
                        
                        <%
                        //Si no hay contactos se muestra un mensaje
                        if (contactoActual==null){
                        %>
                            <div class="contendorErrorNoContactos">
                                <p>No hay ningun contacto guardado.</p>
                            </div>
                        <%
                        }

                        //Si los hay se muestra la informacion del contacto mediante un formulario
                        else{
                        %>
                            <table class="tablaAgenda">
                                <tr>
                                    <td>Nombre de contacto</td>
                                    <td><input type="text" name="nombreContacto" value="<% if (contactoActual!=null) out.println(contactoActual.getNombre()); %>" required><br></td>
                                </tr>

                                <tr>
                                    <td>Telefono:</td>
                                    <td><input type="text" name="telefonoContacto" value="<% if (contactoActual!=null) out.println(contactoActual.getTelefono()); %>" required></td>
                                </tr>

                                <tr>
                                    <td>Direccion:</td>
                                    <td><input type="text" name="direccionContacto" value="<% if (contactoActual!=null) out.println(contactoActual.getDireccion()); %>" required></td>
                                </tr>

                                <tr>
                                    <td>Email:</td>
                                    <td><input type="mail" name="emailContacto" value="<% if (contactoActual!=null) out.println(contactoActual.getEmail()); %>" required></td>
                                </tr>
                            </table>
                        <%
                        }
                        %>
                    </div>
                    
                    <!--Botones-->
                    <div class="botonera">
                        <input type="hidden" name="telefonoActual" value="<% if (contactoActual!=null) out.println(contactoActual.getTelefono()); %>">
                        <input type="submit" name="editar" value="Guardar cambios" <% if (contactoActual==null) out.println("disabled"); %>>
                        <input type="submit" name="eliminar" value="Eliminar contacto" <% if (contactoActual==null) out.println("disabled"); %><br><br>
                        <br>
                        <input type="submit" name="primero" value="<<" <% if (indice==0) out.println("disabled"); %>>
                        <input type="submit" name="anterior" value="<" <% if (indice==0) out.println("disabled"); %>>
                        <input type="submit" name="siguiente" value=">" <% if (indice==listaContactos.size()-1 || contactoActual==null) out.println("disabled"); %>>
                        <input type="submit" name="ultimo" value=">>" <% if (indice==listaContactos.size()-1 || contactoActual==null) out.println("disabled"); %>>
                    </div>

                </form>

            </div>
            
            <!--Boton anadir contacto-->
            <div class="anadirContacto">
                <form action="agregarContacto.jsp" method="POST">
                    <input  type="submit" name="nuevoContacto" value="Agregar contacto">
                </form>
            </div>
        </div>
    </body>
</html>
