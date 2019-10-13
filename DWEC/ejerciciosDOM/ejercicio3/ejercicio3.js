//Funcion para anadir elementos a la lista
function anadirElemento(){
    //Meter elemento lista en variable
    lista=document.getElementById("diariosdeportivos");

    //Crear <li> y asignar texto
    elemento=document.createElement("li");
    texto=document.createTextNode(prompt("Escribe el nombre del diario deportivo"));
    elemento.appendChild(texto);

    //Anadir a la lista
    lista.appendChild(elemento);
    
}