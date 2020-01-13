/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controlador;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import modelo.Usuario;

/**
 *
 * @author danir
 */
@WebServlet(name = "LoginServlet", urlPatterns = {"/LoginServlet"})
public class LoginServlet extends HttpServlet {

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
        
        //Sesion
        HttpSession sesion=request.getSession();
        
        //Ruta redireccion
        String ruta="login.jsp";
        
        //Recoger parametros
        if (request.getParameter("enviarLogin")!=null){
            String usuarioLogin=request.getParameter("usuarioLogin");
            String passLogin=request.getParameter("passLogin");
            
            //Comprobacion y login
            if (ControladorUsuario.login(usuarioLogin, passLogin)){
                
                //Obtener usuario de bd y crear objeto Usuario
                Usuario usuarioLogeado=ControladorUsuario.getUsuario(usuarioLogin);
                
                //Atributos de sesion
                sesion.setAttribute("intentoFallido", false);
                sesion.setAttribute("usuarioLogeado", usuarioLogeado);
                
                
                //Cambiar ruta en funcion del tipo de usuario logeado
                if (usuarioLogeado.getTipo().equalsIgnoreCase("usuario"))
                    ruta="panelMensajes.jsp";
                else
                    ruta="panelAdmin.jsp";
            }
            else
                sesion.setAttribute("intentoFallido", true);
        }
        
        
        //Redireccion
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
