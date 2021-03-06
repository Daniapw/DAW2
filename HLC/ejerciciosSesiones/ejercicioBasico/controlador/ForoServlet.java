/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ejercicioBasico.controlador;

import ejercicioBasico.modelo.Foro;
import ejercicioBasico.modelo.Mensaje;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author diurno
 */
@WebServlet(name = "ForoServlet", urlPatterns = {"/ForoServlet"})
public class ForoServlet extends HttpServlet {
    public Foro foro=Foro.getInstancia();
    
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
        
        //Si se quiere escribir un mensaje
        if (request.getParameter("mensaje")!=null){
            if (!request.getParameter("mensaje").trim().equals(""))
                foro.add(new Mensaje((String) sesion.getAttribute("usuario"),request.getParameter("mensaje"), foro.getSiguientetId()));
        }
        
        //Si el usuario es admin y quiere borrar un mensaje
        if (request.getParameter("eliminar")!=null && (Boolean) sesion.getAttribute("admin")){
            int id=Integer.parseInt(request.getParameter("idMensaje"));
            foro.borrarMensaje(id);
        }
        
        //Redirigir a foro
        request.getRequestDispatcher("foro.jsp").forward(request, response);
        
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
