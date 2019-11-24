$(function(){

    $("#mostrar").click(function (e) { 
        //Crear objeto request que contendra la respuesta
        respuesta=new XMLHttpRequest();

        //Listener para cuando cambie el readyState (estado de completacion) de la respuesta
        respuesta.onreadystatechange=function(){
            //Si el estado de completacion es 4 (finalizado) y el estado enviado por el servidor es igual a 200 (respuesta correcta)
            if (this.readyState===4 && this.status===200){
                //Metera dentro del div #info el texto de la respuesta, que se genera en el servidor en el archivo PHP indicado mas abajo
                $("#info").html(this.responseText);
            }
        };

        /*Funcion open:
        -Metodo de envio: 'GET' | 'POST'
        -Url: Archivo php en el servidor que generara la respuesta
        -Async: Indicar si la respuesta va a ser síncrona (false) o asíncrona (true).  Si se establece a false, se bloquearía la
            navegación hasta obtener respuesta. Esto en general es indeseable, pero puede ser necesario por ejemplo si se
            requiere usuario y contraseña que han de verificarse antes de proseguir. Por defecto es true, es decir, asíncrona.
        */
        respuesta.open("GET", "prueba.php", true);
        
        //Metodo send para enviar la respuesta
        respuesta.send();
        
    });

});