/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controlador;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import modelo.Mensaje;
import modelo.Usuario;

/**
 *
 * @author danir
 */
@WebServlet(name = "MensajesServlet", urlPatterns = {"/MensajesServlet"})
public class MensajesServlet extends HttpServlet {

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
        HttpSession sesion=request.getSession();
        
        //Eliminar mensaje
        if (request.getParameter("btnEliminarMensaje")!=null){
            int id=Integer.parseInt(request.getParameter("idMensaje"));
            
            ControladorMensajes.deleteMensaje(id);
        }
        
        //Enviar mensaje
        if (request.getParameter("btnEnviarMensaje")!=null){
            
            //Obtener datos del mensaje
            Usuario usuario=(Usuario) sesion.getAttribute("usuarioLogeado");
            String destinatarioMensaje=request.getParameter("destinatarioEnviar");
            String contenidoMensaje=request.getParameter("contenidoMensajeEnviar");
            
            
            //Insertar mensaje en BD
            ControladorMensajes.insertMensaje(new Mensaje(0, usuario.getNombre(), destinatarioMensaje, contenidoMensaje, "1", true));
            
        }
        
        request.getRequestDispatcher("panelMensajes.jsp").forward(request,response);
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
