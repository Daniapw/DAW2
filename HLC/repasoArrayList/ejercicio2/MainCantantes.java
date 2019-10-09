/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package repasoArrayList.ejercicio2;

import java.util.ArrayList;
import javax.swing.JOptionPane;

/**
 *
 * @author diurno
 */
public class MainCantantes {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ListaCantantesFamosos lista = new ListaCantantesFamosos();
        
        //Crear cantantes
        CantanteFamoso cantante=new CantanteFamoso("Michael Jackson", "Thriller");
        CantanteFamoso cantante2=new CantanteFamoso("Leonard Cohen", "Various Positions");
        
        //Anadir cantantes con metodo
        lista.anadirCantante(cantante);
        lista.anadirCantante(cantante2);

        //Imprimir y preguntar si quiere anadir mas cantantes
        pedirCantantes(lista);
          
    }
   
    
    /**
     * Metodo para pedir cantantes
     * @param lista 
     */
    public static void pedirCantantes(ListaCantantesFamosos lista){    
        
        boolean confirmacion=true;
        
        do{
            
            //Imprimir cantantes
            System.out.println("\n\nLISTA CANTANTES");
            for (CantanteFamoso cantanteFamoso : lista) {
                System.out.println("\nCantante: "+ cantanteFamoso.getNombre()+ " | Disco: " + cantanteFamoso.getDiscoMasVendido());
            }
            
            //Preguntar al usuario si quiere continuar
            confirmacion=continuar();
            
            //Si quiere continuar se crea un cantante
            if (confirmacion){
                
                CantanteFamoso cantante=crearCantante();
                
                //Si el usuario cancela
                if(cantante!=null){
                    lista.anadirCantante(cantante);
                }
                
            }
            
        }while(confirmacion);
        
    }
    
    /**
     * Metodo para preguntar al usuario si quiere continuar
     * @return 
     */
    public static boolean continuar(){
        
        String peticion="";
        
        peticion=JOptionPane.showInputDialog("¿Quiere introducir mas cantantes (s/n)?");
        
        try{
            return peticion.equalsIgnoreCase("s");  
        }catch(NullPointerException e){
            return false;
        }       
       
    }
    
    /**
     * Metodo para crear cantante
     * @return 
     */
    public static CantanteFamoso crearCantante(){
        
        //Pedir nombre
        String nombre=JOptionPane.showInputDialog("Introduce el nombre del cantante");
        
        if (nombre==null || nombre.trim().equals("")){
            JOptionPane.showMessageDialog(null, "Cancelado");
            return null;
        }
        
        //Pedir disco
        String disco=JOptionPane.showInputDialog("Introduce el disco mas vendido del cantante");

        if (disco==null || disco.trim().equals("")){
            JOptionPane.showMessageDialog(null, "Cancelado");
            return null;
        }
        
        //Crear cantante
        CantanteFamoso cantante=new CantanteFamoso(nombre, disco);

        return cantante;

    }

}
