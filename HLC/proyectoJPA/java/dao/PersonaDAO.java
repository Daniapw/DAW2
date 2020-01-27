package dao;

import java.util.List;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;

import model.Persona;

public class PersonaDAO {

    protected EntityManager em;
    private EntityManagerFactory emf = null;

    public PersonaDAO() {
        // Usarmos el persistence unit
        emf = Persistence.createEntityManagerFactory("HibernatePU");
    }

    public void listar() {
        // Consulta a ejecutar
        // No necesitamos crear una nueva transaccion
        String hql = "SELECT p FROM Persona p";
        em = getEntityManager();
        Query query = em.createQuery(hql);
        List<Persona> list = query.getResultList();
        for (Persona p : list) {
            System.out.println(p);
        }
    }

    public List<Persona> listarPersonas() {
        // Consulta a ejecutar
        String hql = "SELECT p FROM Persona p";
        em = getEntityManager();
        Query query = em.createQuery(hql);
        return query.getResultList();
    }

    public void insertar(Persona persona) {
        try {
            em = getEntityManager();
            // Iniciamos una transaccion
            em.getTransaction().begin();
            // Insertamos la nueva persona
            em.persist(persona);
            // Terminamos la transaccion
            em.getTransaction().commit();
        } catch (Exception ex) {
            System.out.println("Error al insetar objeto:" + ex.getMessage());
            // ex.printStackTrace();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void actualizar(Persona persona) {
        try {
            em = getEntityManager();
            // Iniciamos una transaccion
            em.getTransaction().begin();
            // Actualizamos al objeto persona
            em.merge(persona);
            // Terminamos la transaccion
            em.getTransaction().commit();
        } catch (Exception ex) {
            System.out.println("Error al actualizar objeto:" + ex.getMessage());
            // ex.printStackTrace();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public void eliminar(Persona persona) {
        try {
            em = getEntityManager();
            // Iniciamos una transaccion
            em.getTransaction().begin();
            // Sincronizamos y eliminamos a la persona
            em.remove(em.merge(persona));
            // Terminamos la transaccion
            em.getTransaction().commit();
        } catch (Exception ex) {
            System.out.println("Error al eliminar objeto:" + ex.getMessage());
            // ex.printStackTrace();
        } finally {
            if (em != null) {
                em.close();
            }
        }
    }

    public Persona buscarPorId(Persona p) {
        em = getEntityManager();
        return em.find(Persona.class, p.getIdPersona());
    }

    private EntityManager getEntityManager() {
        return emf.createEntityManager();
    }

}