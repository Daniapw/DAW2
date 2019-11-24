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

        alert("Bienvenido al sistema");
    });
});

//Funcion para comprobar usuario
function comprobarUsuario(){
    if ($("input[name=usuario]").val()=="admin")
        return true;
    
    return false;
}

//Funcion para comprobar contrasena
function comprobarContra(){
    if ($("input[name=cont]").val()=="1234")
        return true;
    
    return false;
}