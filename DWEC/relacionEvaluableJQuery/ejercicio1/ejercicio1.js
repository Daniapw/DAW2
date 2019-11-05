$(function(){
    $("#formulario").submit(function(event){
        if (!comprobarUsuario()){
            alert("Usuario incorrecto");
            event.preventDefault();
            return;
        }

        if (!comprobarContra()){
            alert("Contrasena incorrecta");
            event.preventDefault();
            return;
        }

        alert("Credenciales correctas");
    });
});

//Funcion para comprobar usuario
function comprobarUsuario(){
    if ($("input[name=usuario]").val()=="admin"){
        console.log($("input[name=usuario]").val());
        return true;
    }
    return false;
}

//Funcion para comprobar contrasena
function comprobarContra(){
    if ($("input[name=cont]").val()=="1234"){
        console.log($("input[name=cont]").val());
        return true;
    }
    return false;
}