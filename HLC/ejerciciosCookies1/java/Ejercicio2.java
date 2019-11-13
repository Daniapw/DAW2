/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package servlets;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author diurno
 */
@WebServlet(name = "Ejercicio2", urlPatterns = {"/Ejercicio2"})
public class Ejercicio2 extends HttpServlet {

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
        
        //Valores formulario
        String nombreCookie=request.getParameter("nombreCookie");
        nombreCookie=nombreCookie.trim();
        
        String valorCookie=request.getParameter("valorCookie");
        valorCookie=valorCookie.trim();
        
        //Valor boton pulsado
        String botonPulsado=request.getParameter("botones");
        
        Cookie[] cs=request.getCookies();
        
        //Texto que se mostrara segun opcion
        String texto="";
        
        if (!validarCampos(botonPulsado, nombreCookie, valorCookie)){
            texto="<h1>Campos no validos para esas operacion</h1>";
        }
        else{
            //Switch para ejecutar codigo segun boton pulsado
            switch (botonPulsado){
                //Boton crear
                case "Crear":{
                    Cookie c=new Cookie(nombreCookie, valorCookie);
                    c.setMaxAge(300);
                    response.addCookie(c);
                    texto="<p style='color:green; font-size:30px'><b>Cookie " + nombreCookie +" creada con exito</b></p>";

                    break;
                }

                //Boton visualizar
                case "Visualizar":{

                    if (cs!=null){
                        texto=
                        "<h1>Visualizacion de cookies</h1>"
                        +"<table border='1px solid' cellpadding='10px'>"
                            +"<th>Nombre</th>"
                            +"<th>Valor</th>";

                        for (Cookie c:cs){
                            texto=texto.concat(
                                "<tr>"
                                    + "<td>"+c.getName()+"</td>"
                                    + "<td>" +c.getValue()+"</td>"
                                +"</tr>");
                        }

                        texto=texto.concat("</table>");
                    }
                    else{
                        texto=texto.concat("<p>No hay cookies en uso</p>");
                    }

                    break;
                }

                //Boton modificar
                case "Modificar":{
                    for (Cookie c:cs){
                        if (c.getName().equals(nombreCookie)){
                            c.setValue(valorCookie);
                            c.setMaxAge(300);
                            response.addCookie(c);
                            texto=texto.concat("<p style='color:green; font-size:30px'/><b>Cookie " + nombreCookie +" modificada con exito</b></p>");

                        }
                    }
                    break;
                }

                //Boton eliminar
                case "Eliminar":{

                    for (Cookie c:cs){
                        if (c.getName().equals(nombreCookie)){
                            c.setMaxAge(0);
                            response.addCookie(c);
                            texto=texto.concat("<p style='color:green; font-size:30px'/><b>Cookie " + nombreCookie +" eliminada con exito</b></p>");

                        }
                    }
                    break;
                }
            }
        }
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Ejercicio2</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println(texto);
            out.println("<a href='ejercicio2.html'>Volver al formulario</a>");
            out.println("</body>");
            out.println("</html>");
        }
    }
    
    /**
     * Validar campos enviados
     * @param valorBoton
     * @param nombreCookie
     * @param valorCookie
     * @return 
     */
    protected boolean validarCampos(String valorBoton, String nombreCookie, String valorCookie){
        boolean nombre=true;
        boolean valor=true;
        
        if (nombreCookie.equals(""))
            nombre=false;
        
        if (valorCookie.equals(""))
            valor=false;
        
        if ((!nombre || !valor) && (valorBoton.equals("Crear") || valorBoton.equals("Modificar")))
            return false;
        else if(!nombre && valorBoton.equals("Eliminar"))
            return false;
                    
                    
        return true;
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
