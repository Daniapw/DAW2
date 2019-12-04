$(function(){
    //Mostrar parrafos al entrar
    $(".parrafo").mouseenter(function (e) { 
        parrafo=e.target;
        $(parrafo).children(" .textoAEsconder").css("display", "block");
    });

    //Mostrar parrafos al salir
    $(".parrafo").mouseout(function (e) { 
        parrafo=e.target;
        $(parrafo).children(" .textoAEsconder").css("display", "none");
    });
})