package web;

import java.io.IOException;
import java.util.List;
import javax.servlet.*;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;
import model.Persona;
import servicio.ServicioPersonas;

@WebServlet(name = "ServletControlador", urlPatterns = {"/ServletControlador"})
public class ServletControlador extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        try {
            // 1. Nos conectamos a la capa de servicio
            ServicioPersonas servicioPersonas = new ServicioPersonas();

            // 2.Solicitamos el listado de personas
            List<Persona> personas = servicioPersonas.listarPersonas();

            // 3.Compartimos el modelo con la vista
            request.setAttribute("personas", personas);
            System.out.println("listado:" + personas);

            // 4.Redireccionamos a la vista
            request.getRequestDispatcher("/listado.jsp").forward(request, response);

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}