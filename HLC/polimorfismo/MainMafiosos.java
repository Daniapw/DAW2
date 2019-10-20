/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectopararun.polimorfismo;

import java.util.ArrayList;
import java.util.List;
import javax.swing.JOptionPane;

/**
 *
 * @author danir
 */
public class MainMafiosos {
    public static List<Mafioso> mafiosos=new ArrayList<Mafioso>();

    /**
     * Main
     * @param args 
     */
    public static void main(String[] args) {
        
        mafiosos.add(new Capo("Tony", "El Gordo", "Italoamericanos", 48, "", 4));
        
        Mafioso sicario=new Sicario("Johnny", "Labios Sellados", "Italoamericanos", 30, "", 6);
        
        mafiosos.add(sicario);
        
        mafiosos.get(0).ejecutadoPor((Sicario) sicario);
        
        //Bucle principal
        int opcion=-1;
        do{
            
            try{
                //Mostrar menu
                opcion=Integer.parseInt(JOptionPane.showInputDialog("Elija una opcion: "
                        + "\n0. Salir"
                        + "\n1. Mostrar lista de mafiosos e informacion"
                        + "\n2. Mostrar mafioso en especifico"
                        + "\n3. Anadir mafioso"
                        + "\n4. Quitar mafioso"));
                
                //Llamada a funcion para gestionar respuesta
                if (opcion!=0)
                    gestionarRespuesta(opcion);
                
            }catch(NumberFormatException e){
                //Mensaje de error
                JOptionPane.showMessageDialog(null, "Elija una de las opciones");
            }
            
        }while(opcion!=0);
        
    }
    
    /**
     * Funcion que gestiona la respuesta
     * @param opcion 
     */
    public static void gestionarRespuesta(int opcion){
        
        //Si el usuario ha introducido una opcion invalida se muestra un mensaje
        if (opcion<0 || opcion>4){
             JOptionPane.showMessageDialog(null, "Elija una de las opciones");
        }
        //Si ha introducido una opcion valida se llama a una funcion
        else{
            
            switch (opcion){
                case 1:{
                    
                    if (mafiosos.isEmpty())
                        JOptionPane.showMessageDialog(null, "La lista de mafiosos esta vacia");
                    else
                        mostrarLista();
                    
                    break;
                }
                case 2:{
                    mostrarMafiosoEspecifico();
                    break;
                }
                case 3:{
                    anadirMafioso();
                    break;
                }
                case 4:{
                    quitarMafioso();
                    break;
                }
            }
        }
    }
    
    /**
     * Funcion para mostrar lista de mafiosos
     */
    public static void mostrarLista(){
        
        System.out.println("\n//////////////////LISTA MAFIOSOS//////////////////\n");
        
        for (Mafioso mafioso:mafiosos){
            System.out.println("\n------------Mafioso " + (mafiosos.indexOf(mafioso) + 1) + " (" + mafioso.getClass().getSimpleName() + ")------------");
            System.out.println(mafioso.toString());
        }
    }
    
    /**
     * Funcion para mostrar un mafioso especifico
     */
    public static void mostrarMafiosoEspecifico(){
        
        String nombre=JOptionPane.showInputDialog("Introduzca el nombre o apodo del mafioso que quieres ver");
        
        //Buscar mafioso en la lista
        for (Mafioso mafioso:mafiosos){
            if (nombre.equalsIgnoreCase(mafioso.getNombre()) || nombre.equalsIgnoreCase(mafioso.getApodo())){

                System.out.println("\n//////////////////INFORMACION "+mafioso.getClass().getSimpleName().toUpperCase()+"//////////////////\n" + mafioso.toString());
                return;
            }
        }
        
        //Si el mafioso no se ha encontrado
        JOptionPane.showMessageDialog(null, "El mafioso '"+ nombre +"' no se ha encontrado en la lista");
        
    }
    
    /**
     * Funcion para anadir mafioso a la lista
     */
    public static void anadirMafioso(){
        int opcion=-1;
        do{
            
            try{
                //Mostrar menu
                opcion=Integer.parseInt(JOptionPane.showInputDialog("Elija el rango del mafioso: "
                        + "\n0. Salir"
                        + "\n1. Capo"
                        + "\n2. Sicario"
                        + "\n3. Soplon"
                        + "\n4. Traficante de drogas"
                        + "\n5. Traficante de alcohol"));
                
                
                if (opcion==0){
                    break;
                }
                else if (opcion<0 || opcion>5){
                    JOptionPane.showMessageDialog(null, "Elija una de las opciones");
                }
                
            }catch(NumberFormatException e){
                //Mensaje de error
                JOptionPane.showMessageDialog(null, "Elija una de las opciones");
            }
            
        }while(opcion<0 || opcion>5);
         
        //Llamada a funcion creacionMafioso
        creacionMafioso(opcion);
    }
    
    /**
     * Funcion para pedir datos del mafioso y crearlo
     * @param opcion 
     */
    public static void creacionMafioso(int opcion){
        String nombre=JOptionPane.showInputDialog("Introduzca el nombre del mafioso");
        String apodo=JOptionPane.showInputDialog("Introduzca el apodo del mafioso");
        String banda=JOptionPane.showInputDialog("Introduzca la banda del mafioso");
        int edad=pedirNumero("Introduzca la edad del mafioso");
        
        //Segun el tipo de mafioso escogido se pedira un ultimo dato
        Mafioso mafioso = null;
        switch (opcion){
            case 1:{
                int numBarrios=pedirNumero("Numero de barrios controlados por este capo");
                mafioso = new Capo(nombre, apodo, banda, edad, "", numBarrios);
                break;
            }
            case 2:{
                int numAsesinatos=pedirNumero("Numero de asesinatos cometidos por este sicario");
                mafioso = new Sicario(nombre, apodo, banda, edad, "", numAsesinatos);
                break;
            }
            case 3:{
                int numSoplos=pedirNumero("Numero de soplos dados por este soplon");
                mafioso = new Soplon(nombre, apodo, banda, edad, "", numSoplos);
                break;
            }
            case 4:{
                int numOperaciones=pedirNumero("Numero de operaciones llevadas a cabo por este traficante de drogas");
                mafioso = new TraficanteDrogas(nombre, apodo, banda, edad, "", numOperaciones);
                break;
            }
            case 5:{
                int numOperaciones=pedirNumero("Numero de operaciones llevadas a cabo por este traficante de alcohol");
                mafioso = new TraficanteAlcohol(nombre, apodo, banda, edad, "", numOperaciones);
                break;
            }
        }
        
        //Anadir mafioso a la lista
        mafiosos.add(mafioso);
        
        //Mensaje final
        JOptionPane.showMessageDialog(null, mafioso.getClass().getSimpleName() + " '" + mafioso.getNombre() + "' anadido a la lista con exito");
    }
    
    
    /**
     * Funcion para quitar mafioso
     */
    public static void quitarMafioso(){
        
        String nombreOApodo="";
        
        nombreOApodo=JOptionPane.showInputDialog("Introduzca el nombre o apodo del mafioso que desea eliminar de la lista");
        
        //Si el usuario cancela, la funcion termina
        if (nombreOApodo==null){
            return;
        }
        
        //Recorrer lista
        for (Mafioso mafioso:mafiosos){
            //Si el nombre o apodo es igual al que ha introducido el usuario se elimina al mafioso en cuestion
            if (mafioso.getNombre().equalsIgnoreCase(nombreOApodo) || mafioso.getApodo().equalsIgnoreCase(nombreOApodo)){
                mafiosos.remove(mafioso);
                JOptionPane.showMessageDialog(null, "Mafioso '" + nombreOApodo + "' eliminado con exito");
                return;
            }
        }
        
        //Si el mafioso no se ha encontrado
        JOptionPane.showMessageDialog(null, "El mafioso '" + nombreOApodo + "' no esta en la lista");
    }
    
    /**
     * Funcion para pedir numeros enteros con JOptionPane
     * @param mensaje
     * @return 
     */
    public static int pedirNumero(String mensaje){
        
        int numero=0;
        try {
            numero=Integer.parseInt(JOptionPane.showInputDialog(mensaje));
            
            if (numero<=0){
                JOptionPane.showMessageDialog(null, "Por favor, introduzca un numero entero mayor que 0");
                pedirNumero(mensaje);
            }
        } catch (NumberFormatException e) {
            JOptionPane.showMessageDialog(null, "Por favor, introduza un numero entero");
            pedirNumero(mensaje);
        }
        
        return numero;
    }
}
