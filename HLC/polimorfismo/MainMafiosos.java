/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectopararun.polimorfismo;

/**
 *
 * @author danir
 */
public class MainMafiosos {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Capo mafioso1=new Capo("Tony", "El Gordo", "Italoamericanos", 48, "", 4);
        TraficanteDrogas sicario=new TraficanteDrogas("Johnny", "Labios Sellados", "Italoamericanos", 36, "", 14);
        
        System.out.println(mafioso1.getNombre() + " fue ejecutado por el sicario " + mafioso1.getNombreEjecutor()+
                "\n" + sicario.aLaTrena());
    }
    
}
