/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package servlets;

import controlador.ControladorContacto;
import java.io.IOException;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import modelo.Contacto;

/**
 *
 * @author danir
 */
@WebServlet(name = "Agenda", urlPatterns = {"/Agenda"})
public class Agenda extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        HttpSession sesion=request.getSession();
        String ruta="agenda.jsp";    
        
        int idActual=(Integer) sesion.getAttribute("indiceActual");
        
        //Primer contacto
        if (request.getParameter("primero")!=null){
            sesion.setAttribute("indiceActual", 0);
        }
        
        //Anterior contacto
        if (request.getParameter("anterior")!=null){
            idActual--;
            
            sesion.setAttribute("indiceActual", idActual);
        }
        
        //Siguiente contacto
        if (request.getParameter("siguiente")!=null){
            idActual++;

            sesion.setAttribute("indiceActual", idActual);
        }
        
        //Ultimo contacto
        if (request.getParameter("ultimo")!=null){
            List<Contacto> lista=ControladorContacto.getAllContactos();
            idActual=lista.size()-1;
           
            sesion.setAttribute("indiceActual", idActual);
        }
        
        
        //Actulizar contacto
        if (request.getParameter("editar")!=null)
            actualizarContacto(request, sesion);
        
        //Eliminar contacto
        if (request.getParameter("eliminar")!=null)
            eliminarContacto(request, sesion);
            
        //Agregar contacto
        if (request.getParameter("nuevoContacto")!=null)
            ruta=agregarContacto(request, sesion);
        
        
        
        //Redireccion
        request.getRequestDispatcher(ruta).forward(request,response);
    }

    /**
     * Agregar contacto
     * @param request
     * @param sesion 
     * @return  
     */
    protected String agregarContacto(HttpServletRequest request, HttpSession sesion){
        //Ruta redireccion
        String ruta="agenda.jsp";
        
        //Obtener parametros
        String nombre=request.getParameter("nombreNuevo");
        String telefono=request.getParameter("telefonoNuevo");
        String direccion=request.getParameter("direccionNuevo");
        String email=request.getParameter("emailNuevo");

        //Realizar actualizacion
        if (validarDatos(nombre, telefono)){
            
            //Realizar actualizacion
            Contacto contacto=new Contacto( nombre.trim(), telefono, direccion, email);
            boolean resultado=ControladorContacto.insertContacto(contacto);

            //Mensaje
            if (resultado)
                sesion.setAttribute("mensajeExito", "Contacto agregado con exito");
            else{
                sesion.setAttribute("mensajeError", "Error al agregar contacto: el numero de telefono ya esta en uso");
                ruta="agregarContacto.jsp";
            }
        }
        else{
            sesion.setAttribute("mensajeError", "Debe introducir un nombre y numero de telefono validos");
            ruta="agregarContacto.jsp";
        }
        
        return ruta;
    }

    /**
     * Actualizar contacto
     * @param request
     * @param sesion 
     */
    protected void actualizarContacto(HttpServletRequest request, HttpSession sesion){
        //Obtener parametros
        String telefonoActual=request.getParameter("telefonoActual");
        String nombre=request.getParameter("nombreContacto");
        String telefono=request.getParameter("telefonoContacto");
        String direccion=request.getParameter("direccionContacto");
        String email=request.getParameter("emailContacto");

        
        if (validarDatos(nombre, telefono)){
            
            //Realizar actualizacion
            Contacto contacto=new Contacto( nombre, telefono, direccion, email);
            boolean resultado=ControladorContacto.updateContacto(contacto, telefonoActual);

            //Mensaje
            if (resultado)
                sesion.setAttribute("mensajeExito", "Contacto actualizado con exito");
            else
                sesion.setAttribute("mensajeError", "Error al actualizar contacto: el numero de telefono ya esta en uso");
        }
        else
            sesion.setAttribute("mensajeError", "Debe introducir un nombre y numero de telefono validos");
    }
    
   /**
    * Eliminar contacto
    * @param request
    * @param sesion 
    */
    protected void eliminarContacto(HttpServletRequest request, HttpSession sesion){
        //Obtener parametros
        String telefonoActual=request.getParameter("telefonoActual");

        //Realizar borrado
        boolean resultado=ControladorContacto.eliminarContacto(telefonoActual);

        //Actualizar indice actual
        sesion.setAttribute("indiceActual", 0);

        //Mensaje
        if (resultado)
            sesion.setAttribute("mensajeExito", "Contacto eliminado con exito");
        else
            sesion.setAttribute("mensajeError", "Error al eliminar contacto");

    }

    /**
     * Validar datos
     * @param nombre
     * @param telefono
     * @return 
     */
    protected boolean validarDatos(String nombre, String telefono){
        boolean res=true;
        
        if (nombre.trim().equals(""))
            res=false;
        else if(telefono.trim().equals(""))
            res=false;
        else{
            try{
                Integer.parseInt(telefono);
            }
            catch(NumberFormatException ex){
                res=false;
            }
        }
        
        return res;
    }
    
    
    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
