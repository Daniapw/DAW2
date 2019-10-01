/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package proyectopararun.repasoObjetos.ejercicio4;

import javax.swing.JOptionPane;

/**
 *
 * @author danir
 * 1º Black Jack, el juego devolverá un número entre 19 y 27 si el es menor o igual a 21 ganará el jugador, y se embolsará el triple de lo apostado.

2º RojoyNegro. El jugador juagará a rojo y negro, si acierta ganará el doble de lo apostado.

3º RuletaRusa. Se apuesta a un número entre 0 y 36. Si acierta ganará 36 veces lo apostado, siendo el 0 exclusivo de la banca

Los jugadores sólo podrán apostar las fichas en su poder, no fiando el casino ningún tipo de dinero para apuestas.
 */
public class Casino {
    private String nombre="";
    private int cash=0;
    
    public Casino (String nombre, int cash){
        this.nombre=nombre;
        this.cash=cash;
    }
    
    //Blackjack
    public void blackJack(Jugador jugador){
        int numeroAleatorio=((int) Math.round(Math.random() * (27-19))) + 19;
        
        int apuesta=pedirApuesta(jugador);
        
        System.out.println("El numero es " + numeroAleatorio);
        //Si el jugador gana
        if (numeroAleatorio<=21){
            System.out.println("El jugador " + jugador.getNombre() + " gana " + (apuesta*3) + " fichas");
            jugador.setCash(jugador.getCash()+ (apuesta*3));
            this.cash-=(apuesta*3);
        }
        //Si el jugador pierde
        else{
            System.out.println("Gana la casa, el jugador " + jugador.getNombre() + " pierde " + apuesta + " fichas");
            jugador.restarCash(apuesta);
            this.cash+=apuesta;
        }
        
        System.out.println("Cash restante: " + jugador.getCash());
    }
    
    //Metodo para Rojo y Negro
    public void rojoYNegro(Jugador jugador, String color){
        
    }
    
    
    //Ruleta rusa
    public void ruletaRusa(Jugador jugador){
        
        int numeroAleatorio=((int) Math.round(Math.random() * (36-1))) + 1;
        
        int apuesta=pedirApuesta(jugador);
        
        int numJugador=pedirNumero();
        
        System.out.println("El numero es " + numeroAleatorio);
        //Si el jugador gana
        if (numeroAleatorio==numJugador){
            System.out.println("El jugador " + jugador.getNombre() + " gana " + (apuesta*36) + " fichas");
            jugador.setCash(jugador.getCash()+ (apuesta*3));
            this.cash-=(apuesta*36);
        }
        //Si el jugador pierde
        else{
            System.out.println("Gana la casa, el jugador " + jugador.getNombre() + " pierde " + apuesta + " fichas");
            jugador.restarCash(apuesta);
            this.cash+=apuesta;
        }
        
        System.out.println("Cash restante: " + jugador.getCash());
    }
    
    
    //Metodo para pedir apuesta
    public int pedirApuesta(Jugador jugador){
        
        int apuesta=0;
        
        do{
            
            try{
                apuesta=Integer.parseInt(JOptionPane.showInputDialog("Introduzca la cantidad de fichas que desea apostar (0 para salir)"
                        + "\nCantidad actual: " + jugador.getCash()));

                if(apuesta==0){
                    System.exit(0);
                }
                
                if ((jugador.getCash()-apuesta)<0){
                    JOptionPane.showMessageDialog(null, "Fichas insuficientes, inserte una cantidad valida");
                }
                
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Por favor, introduzca un valor valido");
            }
            
        }while((jugador.getCash()-apuesta)<0);
        
        return apuesta;
    }
    
    //Pedir numero ruleta rusa
    public int pedirNumero(){
        
        int numero=0;
        do{
            
            try{
                numero=Integer.parseInt(JOptionPane.showInputDialog("Introduzca el numero al que va a apostar (entre 1 y 36; 0 para salir)"));
                   
                if(numero==0){
                    System.exit(0);
                }
                
                if (numero<=0 || numero>36){
                    JOptionPane.showMessageDialog(null, "Por favor, elija un numero del 1 al 36");
                }
                
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Por favor, introduzca un valor valido");
            }
            
        }while(numero<=0 || numero>36);
        
        return numero;
    }
}
