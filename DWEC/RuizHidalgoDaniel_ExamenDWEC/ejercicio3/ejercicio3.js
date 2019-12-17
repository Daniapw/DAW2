function Carta(palo, valor){
    this.palo=palo;
    this.valor=valor;
    this.palos=["corazones", "diamantes", "picas", "treboles"];
    this.valores=["as", 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];

    //Metodo nombre carta
    this.nombreCarta=function(){
        paloCarta=this.palos[this.palo-1];
        valorCarta=this.valores[this.valor-1];

        return ""+valorCarta + " de " + paloCarta;
    };


}