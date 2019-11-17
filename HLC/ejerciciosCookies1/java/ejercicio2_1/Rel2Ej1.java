/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ejercicio2_1;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author danir
 */
@WebServlet(name = "Rel2Ej1", urlPatterns = {"/Rel2Ej1"})
public class Rel2Ej1 extends HttpServlet {
    
    private List<Noticia> noticias=new ArrayList<Noticia>();
    
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
        
        for (int i=0; i < 6; i++){
            noticias.add(new Noticia("Noticia "+i, "Contenido noticia " + i));
        }
        
        int noticia=Integer.parseInt(request.getParameter("noticia"));
        
        String texto="";
        
        if (!limiteSuperado(request, response))
            texto="<h1>" + noticias.get(noticia-1).getTitular() +"</h1><br>"
                    + "<p>" + noticias.get(noticia-1).getContenido() +"</p>";
        else
            texto="<h1>Limite de noticias de cortesia superado! Debe suscribirse si quiere ver mas</h1>";
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Rel2Ej1</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println(texto);
            out.println("</body>");
            out.println("</html>");
        }
    }

    //Metodo para saber si ha superado el limite de noticias
    public boolean limiteSuperado(HttpServletRequest request, HttpServletResponse response){
        Cookie[] cs=request.getCookies();
        Integer contador=0;
        Cookie c;
        
        //Si no hay cookies se busca el valor de la cookie contadorNoticias
        if (cs==null){
            //Crear cookie con valor contador actualizado
            contador++;
            c=new Cookie("contadorNoticias", contador.toString());
            c.setMaxAge(3600);
            response.addCookie(c);
        }
        else{
            //Si hay cookies se busca el valor de la cookie contadorNoticias
            for (Cookie c1:cs){
                if (c1.getName().equals("contadorNoticias")){
                    contador=Integer.parseInt(c1.getValue());
                    //Crear cookie con valor contador actualizado
                    contador++;
                    c=new Cookie("contadorNoticias", contador.toString());
                    c.setMaxAge(3600);
                    response.addCookie(c);
                    break;
                }
            }
        }
        
        
        //Devolver true o false
        return contador>5;
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
