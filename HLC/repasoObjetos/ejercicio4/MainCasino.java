/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package repasoObjetos.ejercicio4;

/**
 *
 * @author diurno
 */
public class MainCasino {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
        Casino casino=new Casino("Lucky 38", 10000);
        
        Jugador jugador=new Jugador("Dani", 1000);
        
        casino.blackJack(jugador);
        
    }
    
}
