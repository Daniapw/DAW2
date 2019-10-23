function validar(boton){

    //Validacion
    if (!validarNombre()){
        alert("Error: debe introducir un nombre");
        return;
    }
    else if(!validarSexo()){
        alert("Error: debe elegir un sexo");
        return;
    }

    //Enviar formulario
    document.getElementById("formulario").submit();
}

//Actualizar estado boton (no funciona)
function actualizarEstadoBoton(boton){
    
    if (boton.disabled){
        alert("true");
        boton.disabled="false";
        boton.value="Enviar";
    }
    else{
        alert("false");
        boton.disabled="true";
        boton.value="Enviando";
    }
}

//Validar nombre
function validarNombre(){
    
    inputNombre=document.getElementById("nombre");

    if (inputNombre.value.length==0 || /^\s+$/.test(inputNombre.value)){
        return false;
    }
    
    return true;
}

//Validar sexo
function validarSexo(){

    sexoRadio=document.getElementsByName("sexo");

    for (i=0; i < sexoRadio.length; i++){
        if (sexoRadio[i].checked){
            return true;
        }
    }

    return false;
}