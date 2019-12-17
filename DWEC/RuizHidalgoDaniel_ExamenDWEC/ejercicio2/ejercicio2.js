$(function(){
    configurarForm();
    
    //Listener focus para el textarea
    $("#observaciones1").focus(function (e) { 
        texto=e.target;
        
        $(texto).css("background-color","black" );
        $(texto).css("color","white" );

    });

    //Listener para cuando se pierde el foco del textarea
    $("#observaciones1").blur(function (e) { 
        texto=e.target;
        
        $(texto).css("background-color","white" );
        $(texto).css("color","black" );
    });

    $("#radioPortatil").click(function (e) { 

        $("<label for='marcaPortatil'>Marca: </label><input type='text' name='marcaPortatil'><br>").insertBefore("#antiguedad");
        $("<label for='modeloPortatil'>Modelo: </label><input type='text' name='modeloPortatil'><br>").insertBefore("#antiguedad");                
    });
})

//Funcion para configurar validacion del formulario
function configurarForm(){
    //Deshabilitar funcion de enviar del formulario
    $("#formulario").submit(function(event){
        event.preventDefault();
    });

    //Cambiar opciones de error por defecto del validator
    $.validator.setDefaults({
        errorClass: 'mensajeError',
        errorPlacement:function(element, error){
            $(error).after(element);
        },
        
        highlight: function(element) {
            $(element).addClass('error');
        },
        unhighlight:function(element) {
            $(element).removeClass('error');
        }
    });

    $("#formulario").validate({
        rules:{
            apellido1:"required",

            apellido2:"required",

            nombre1:"required",

            telefono:"required",

            numserie:"required",

            clasereparacion:"required",

            sintomas:"required"

        },

        errorElement:"div",

        errorPlacement: function(error, element){
            if ($(element).is(":checkbox, :radio"))
                $(error).insertBefore(element);
            else
                $(error).insertAfter(element);
        },

        submitHandler:function(event){
            mostrarCheckboxesConsola();
        }
    });
}

//Funcion para mostrar valores de los checkbox en consola
function mostrarCheckboxesConsola(){
    checkboxes=($("input[name=sintomas]:checked"));
        
    console.log("SINTOMAS:")
    for (let i=0; i < checkboxes.length; i++){
        console.log("-"+checkboxes[i].value);
    }
}