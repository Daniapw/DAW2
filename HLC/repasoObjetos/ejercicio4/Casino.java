/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package repasoObjetos.ejercicio4;

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
        
        //Pedir apuesta y generar numero
        int apuesta=pedirApuesta(jugador, "Black Jack");
        int numeroAleatorio=((int) Math.round(Math.random() * (27-19))) + 19;
        
        System.out.println("El numero es " + numeroAleatorio);
        //Si el jugador gana
        if (numeroAleatorio<=21){
            aplicarResultado(jugador, apuesta, 3, true);
        }
        //Si el jugador pierde
        else{
            aplicarResultado(jugador, apuesta, 3, false);
        }
        
        System.out.println("Fichas restantes del jugador: " + jugador.getCash());
        System.out.println("Fichas restantes del casino: " + cash);
    }
    
    //Rojo y Negro
    public void rojoYNegro(Jugador jugador){
        
        //Pedir apuesta y color
        int apuesta=pedirApuesta(jugador, "Rojo y Negro");
        String colorJugador=pedirColor();
        String colorRuleta="";
        
        //Generar numero que determinara si ha salido rojo o negro
        double numero=Math.random();
        
        //Comprobar si ha salido rojo o negro
        if(numero<0.5){
            System.out.println("Ha salido rojo");
            colorRuleta="rojo";
        }
        else{
            System.out.println("Ha salido negro");
            colorRuleta="negro";
        }
        
        //Comprobar si el jugador ha ganado y aplicar resultado
        if(colorJugador.equals(colorRuleta)){
            aplicarResultado(jugador, apuesta, 2, true);
        }
        else{
            aplicarResultado(jugador, apuesta, 2, false);
        }
        
        System.out.println("Fichas restantes del jugador: " + jugador.getCash());
        System.out.println("Fichas restantes del casino: " + cash);
    }
    
    //Ruleta rusa
    public void ruletaRusa(Jugador jugador){
        
        //Pedir apuesta y generar numero de la ruleta
        int apuesta=pedirApuesta(jugador, "Ruleta Rusa");
        int numeroAleatorio=((int) Math.round(Math.random() * (36-1))) + 1;
        
        //Pedir numero al jugador y mostrar el numero que ha salido en la ruleta
        int numJugador=pedirNumero();
        System.out.println("El numero es " + numeroAleatorio);
        
        //Si el jugador gana
        if (numeroAleatorio==numJugador){
            aplicarResultado(jugador, apuesta, 36, true);
        }
        //Si el jugador pierde
        else{
            aplicarResultado(jugador, apuesta, 36, false);
        }
        
        System.out.println("Fichas restantes del jugador: " + jugador.getCash());
        System.out.println("Fichas restantes del casino: " + cash);
    }
    
    
    //////////////////METODOS AUXILIARES///////////////////
    //Metodo para pedir apuesta
    public int pedirApuesta(Jugador jugador, String juego){
        
        int apuesta=0;
        
        do{
            //Try-Catch para que solo puedan introducir numeros enteros
            try{
                apuesta=Integer.parseInt(JOptionPane.showInputDialog("\t"+juego
                        + "\nIntroduzca la cantidad de fichas que desea apostar (0 para salir)"
                        + "\nCantidad actual: " + jugador.getCash()));

                //Si cancela
                if(apuesta==0){
                    System.exit(0);
                }
                
                //Si el jugador apuesta mas fichas de las que tiene saldra un mensaje de error
                if ((jugador.getCash()-apuesta)<0){
                    JOptionPane.showMessageDialog(null, "Fichas insuficientes, inserte una cantidad valida");
                } 
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Por favor, introduzca un valor valido");
            }
            
        }while((jugador.getCash()-apuesta)<0 || apuesta<=0);
        
        return apuesta;
    }
    
    //Metodo para asignar o quitar fichas al jugador segun resultado
    public void aplicarResultado(Jugador jugador, int apuesta, int multiplicador, boolean haGanado){
        
        if(haGanado){
            System.out.println("El jugador " + jugador.getNombre() + " gana " + (apuesta*multiplicador) + " fichas");
            jugador.setCash(jugador.getCash()+ (apuesta*multiplicador));
            this.cash-=(apuesta*multiplicador);
        }
        else{
            System.out.println("Gana la casa, el jugador " + jugador.getNombre() + " pierde " + apuesta + " fichas");
            jugador.restarCash(apuesta);
            this.cash+=apuesta;            
        }
        
    }
    
    //Pedir numero ruleta rusa
    public int pedirNumero(){
        
        int numero=0;
        do{
            
            //Try-Catch para que solo puedan introducir numeros enteros
            try{
                numero=Integer.parseInt(JOptionPane.showInputDialog("Introduzca el numero al que va a apostar (entre 1 y 36; 0 para salir)"));
                  
                //Si introduce 0 se para el programa
                if(numero==0){
                    System.exit(0);
                }
                
                //Si el numero es menor o igual a 0 o mayor a 36 sale un mensaje de error
                if (numero<=0 || numero>36){
                    JOptionPane.showMessageDialog(null, "Por favor, elija un numero del 1 al 36");
                }
                
                
            }catch(NumberFormatException e){
                JOptionPane.showMessageDialog(null, "Por favor, introduzca un valor valido");
            }
            
        }while(numero<=0 || numero>36);
        
        return numero;
    }
    
    //Pedir color rojo y negro
    public String pedirColor(){
        
        String color;
        
        do{
            
            color=JOptionPane.showInputDialog("Escriba el color al que va a apostar ('rojo' o 'negro')?");
            
            //Si el usuario le da a cancelar se cierra el programa
            if(color==null){
                System.exit(0);
            }
            
            color=color.toLowerCase();
            
            if (!color.equals("rojo") && !color.equals("negro")){
                JOptionPane.showMessageDialog(null, "Elija rojo o negro por favor");
            }
            
        }while(!color.equals("rojo") && !color.equals("negro"));
        
        return color;
    }
}
