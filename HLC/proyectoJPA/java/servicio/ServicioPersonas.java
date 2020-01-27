package servicio;

import java.util.List;

import dao.PersonaDAO;
import model.Persona;

public class ServicioPersonas {

    public List<Persona> listarPersonas() {
        PersonaDAO personaDao = new PersonaDAO();
        return personaDao.listarPersonas();
    }
}