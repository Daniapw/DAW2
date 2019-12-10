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
import modelo.ListaUsuarios;
import modelo.Usuario;

/**
 *
 * @author diurno
 */
@WebServlet(name = "RegistroServlet", urlPatterns = {"/RegistroServlet"})
public class RegistroServlet extends HttpServlet {

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
        
        String rutaRedir="registro.jsp";
        
        //Si el usuario ya se ha logeado se le manda a la tienda
        if (sesion.getAttribute("usuario")!=null)
            rutaRedir="tienda.jsp";
        
        //Si se ha enviado el form de registro
        if (request.getParameter("btnRegistro")!=null){
            
            //Reiniciar variables de sesion que controlan los errores
            sesion.setAttribute("usuarioYaExiste", false);
            sesion.setAttribute("contraIncorrecta", false);

            
            //Si la contrasena es correcta
            if (comprobarContra(request.getParameter("contraRegistro"), request.getParameter("confirmarContraRegistro"))){
                
                //Se obtiene la lista
                ListaUsuarios lista=(ListaUsuarios) sesion.getAttribute("listaUsuarios");
                
                //Si el nombre de usuario esta libre
                if (lista.comprobarNombreUsuario(request.getParameter("usuarioRegistro"))){
                    
                    //Se guarda el usuario en la lista
                    lista.add(new Usuario(request.getParameter("usuarioRegistro"), request.getParameter("contraRegistro"), "usuario"));
                    
                    //Se guarda la lista en la variable de sesion
                    sesion.setAttribute("listaUsuario", lista);
                    
                    //El registro se ha completado
                    sesion.setAttribute("registroCompletado", false);

                }
                else
                    sesion.setAttribute("usuarioYaExiste", true);
                
            }
            //Si la contrasena no es correcta
            else
                sesion.setAttribute("contraIncorrecta", true);
        }
        
        //Redireccion
        request.getRequestDispatcher(rutaRedir).forward(request, response);
    }

    //Comprobar contrasena
    private boolean comprobarContra(String contra, String contraConfirm){
        if (contra.equals(contraConfirm))
            return true;
        
        return false;
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
