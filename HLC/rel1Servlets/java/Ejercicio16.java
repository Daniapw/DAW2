/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package relacion1;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author diurno
 */
@WebServlet(name = "Ejercicio16", urlPatterns = {"/Ejercicio16"})
public class Ejercicio16 extends HttpServlet {

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
        
        
        String fechaIntroducida=request.getParameter("fecha");

        
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Ejercicio16</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("Fecha introducida: " + fechaIntroducida + "<br>");
            
            if (fechaIntroducida.matches("^\\d\\d-\\d\\d-\\d\\d\\d\\d$")){
                String partes[]=fechaIntroducida.split("-");
                
                boolean errorFecha=false;
                
                int dia=Integer.parseInt(partes[0]);
                int mes=Integer.parseInt(partes[1]);
                int anio=Integer.parseInt(partes[2]);
                
                if (dia<1 || dia>30){
                    out.println("<p>El dia es incorrecto: tiene que ser un numero de1 1 al 30</p><br>");
                    errorFecha=true;
                }
                
                if (mes<1 || mes>12){
                    out.println("<p>El mes es incorrecto: tiene que ser un numero de1 1 al 12</p><br>");
                    errorFecha=true;
                }
                
                if (anio<1 || anio>2010){
                    out.println("<p>El anio es incorrecto: tiene que ser un anio de1 1 al 2010</p><br>");
                    errorFecha=true;
                }
                
                if (!errorFecha){
                    out.println("<p>El formato de la fecha introducida es correcta</p><br>");

                }
            }
            else{
                out.println("<p>El formato es incorrecto</p>");
            }
            
            
            out.println("</body>");
            out.println("</html>");
        }
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
