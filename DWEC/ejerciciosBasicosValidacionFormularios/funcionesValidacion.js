function validar(boton){
    //Cambiar estado del boton
    actualizarEstadoBoton(boton);
    console.log(boton);
    //Validacion
    if (validarNombre() && validarSexo()){
        alert("Formulario enviado con exito");
        boton.submit();
    }
    else{
        
    }

    //Volver a cambiar estado del boton
    actualizarEstadoBoton(boton);
}

//Actualizar estado boton
function actualizarEstadoBoton(boton){
    
    if (boton.disabled){
        boton.disabled=true;
        boton.value="Enviando";
    }
    else{
        boton.disabled=false;
        boton.value="Enviar";
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
    console.log(sexoRadio);
    for (i=0; i < sexoRadio.length; i++){
        if (sexoRadio[i].checked){
            return true;
        }
    }

    return false;
}