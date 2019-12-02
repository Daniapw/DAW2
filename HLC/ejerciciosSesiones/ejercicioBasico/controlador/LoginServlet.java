/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ejercicio1.controlador;

import ejercicio1.modelo.ListaUsuarios;
import ejercicio1.modelo.Usuario;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author danir
 */
@WebServlet(name = "LoginServlet", urlPatterns = {"/LoginServlet"})
public class LoginServlet extends HttpServlet {
    private ListaUsuarios listaUsuarios=ListaUsuarios.getInstancia();

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
        
        //Ruta redireccion
        String ruta="";
        
        //Usuario
        Usuario usuario=null;
        
        //Si se ha enviado el formulario correctamente
        if (request.getParameter("enviar")!=null)
            usuario=listaUsuarios.login(request.getParameter("usuario"), request.getParameter("contra"));
        
        //Si el usuario es nulo (no se ha enviado el formulario o las credenciales son incorrectas
        if (usuario==null){
            
            //Si se ha enviado el formulario entonces ha sido un intento de login fallido
            if (request.getParameter("enviar")!=null)
                sesion.setAttribute("intentoFallido", true);
            
            ruta="index.jsp";
        }
        //Si el usuario existe
        else{
            sesion.setAttribute("usuario", usuario.getNombre());
            ruta="foro.jsp";
        }
        
        //Redirigir a la ruta
        request.getRequestDispatcher(ruta).forward(request, response);

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
