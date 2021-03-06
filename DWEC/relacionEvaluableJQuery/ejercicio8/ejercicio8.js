$(function(){
    $("#formulario input[name=kilos]").focus(function(){
        $("#formulario input[name=gramos]").val("");
    });

    $("#formulario input[name=gramos]").focus(function(){
        $("#formulario input[name=kilos]").val("");
    });

    $("#formulario input[name=kilometros]").focus(function(){
        $("#formulario input[name=metros]").val("");
    });

    $("#formulario input[name=metros]").focus(function(){
        $("#formulario input[name=kilometros]").val("");
    });

    $("#btnPeso").click(convertirPeso);
    $("#btnDistancia").click(convertirDistancia);
})

//Funcion para botones de peso
function convertirPeso(){
    //Campos
    kgs=$("#formulario input[name=kilos]");
    gs= $("#formulario input[name=gramos]");

    //Booleans para controlar contenido
    gsVacio=false;
    kgVacio=false;

    //Comprobar si ambos estan vacios
    if (kgs.val()=="")
        kgVacio=true;
    if (gs.val()=="")
        gsVacio=true;

    //Si estan vacios se acaba la funcion
    if (gsVacio && kgVacio){
        alert("No ha introducido ningun dato");
        return;
    }
    else if (!kgVacio && gsVacio)
        gs.val(kgs.val()*1000);
    else if(kgVacio && !gsVacio)
        kgs.val(gs.val()/1000);


}

//Funcion para botones de distancia
function convertirDistancia(){
    //Campos
    kms=$("#formulario input[name=kilometros]");
    ms= $("#formulario input[name=metros]");

    //Booleans para controlar contenido
    kmsVacio=false;
    msVacio=false;

    //Comprobar si ambos estan vacios
    if (kms.val()=="")
        kmsVacio=true;
    if (ms.val()=="")
        msVacio=true;

    //Si estan vacios se acaba la funcion
    if (kmsVacio && msVacio){
        alert("No ha introducido ningun dato");
        return;
    }
    else if (!kmsVacio && msVacio)
        ms.val(kms.val()*1000);
    else if(kmsVacio && !msVacio)
        kms.val(ms.val()/1000);


}