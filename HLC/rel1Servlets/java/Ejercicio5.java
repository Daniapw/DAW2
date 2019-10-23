package relacion1;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
@WebServlet(urlPatterns = {"/Ejercicio5"})
public class Ejercicio5 extends HttpServlet {

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
        
        int varX=Integer.parseInt(request.getParameter("varX"));
        int varY=Integer.parseInt(request.getParameter("varY"));
        float varN=Float.parseFloat(request.getParameter("varN"));
        float varM=Float.parseFloat(request.getParameter("varM"));
        
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Ejercicio4</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1> Ejercicio 4 </h1>");
            out.println("<ol>"
                            + "<li>Variable X: " + varX +"</li>"
                            + "<li>Variable Y: " + varY +"</li>"
                            + "<li>Variable N: " + varN +"</li>"
                            + "<li>Variable M: " + varM +"</li>"
                            + "<li>X+Y: " + (varX+varY) +"</li>"
                            + "<li>X-Y: " + (varX-varY) +"</li>"
                            + "<li>X*Y: " + (varX*varY) +"</li>"
                            + "<li>X/Y: " + (varX/varY) +"</li>"
                            + "<li>X%Y: " + (varX%varY) +"</li>"
                            + "<li>N+M: " + (varN+varM) +"</li>"
                            + "<li>N-M: " + (varN-varM) +"</li>"
                            + "<li>N/M: " + (varN/varM) +"</li>"
                            + "<li>N%M: " + (varN%varM) +"</li>"
                            + "<li>X+N: " + (varX+varN) +"</li>"
                            + "<li>Y/M: " + (varY/varM) +"</li>"
                            + "<li>Y%M: " + (varY%varM) +"</li>"
                        + "</ol");
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
