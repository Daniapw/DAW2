/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectopararun.repasoObjetos.ejercicio2;
import javax.swing.JOptionPane;
import proyectopararun.repasoObjetos.*;
/**
 *
 * @author danir
 */
public class MainEjercicio2 {
    
    public static void main(String[] args) {
        
        //Pedir nombre, edad, sexo, peso y altura
        String nombre=JOptionPane.showInputDialog("Introduce el nombre");
        int edad=Integer.parseInt(JOptionPane.showInputDialog("Introduce la edad"));
        String pedirSexo= JOptionPane.showInputDialog("Introduce el sexo (H o M)");
        char sexo=pedirSexo.charAt(0);
        double peso=Double.parseDouble(JOptionPane.showInputDialog("Introduce el peso"));
        double altura=Double.parseDouble(JOptionPane.showInputDialog("Introduce el altura"));
        
        
        //Creacion de objetos Persona
        Persona persona1=new Persona(nombre, edad, sexo, peso, altura);
        Persona persona2=new Persona(nombre, edad, sexo);
        Persona persona3=new Persona();
        
        persona3.setNombre("Antonio");
        persona3.setEdad(18);
        persona3.setPeso(56);
        persona3.setSexo('H');
        persona3.setAltura(176);
        
        Persona personas[] = {persona1, persona2, persona3};
        
        comprobarYMostrarDatos(personas);
        
    }
    
    //Mostrar y comprobar datos personas
    public static void comprobarYMostrarDatos(Persona personas[]){
        
        //Comprobacion peso, edad y mostrar información
        for (Persona persona:personas){
            //Comprobacion peso
            switch (persona.calcularIMC()) {
                case -1:
                    System.out.println(persona.getNombre() + " esta por debajo de su peso ideal");
                    break;
                case 0:
                    System.out.println(persona.getNombre() + " esta en su peso ideal");
                    break;
                case 1:
                    System.out.println(persona.getNombre() + " tiene sobrepeso");
                    break;
            }
            
            //Comprobacion mayor de edad
            if(persona.esMayorDeEdad()){
                System.out.println(persona.getNombre() + " es mayor de edad");
            }
            else{
                System.out.println(persona.getNombre() + " es menor de edad");
            }
            
            System.out.println(persona.toString() +"\n");
        }
    }
}
