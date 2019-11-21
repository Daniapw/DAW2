$(function(){

    reescribirMensajesPD();

    //Inicializar select curso
    initSelectCurso();

    $("form").submit(function(event){
        event.preventDefault();
    });

    //Cambiar opciones por defecto del validator
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

    //Metodo letras y espacios
    $.validator.addMethod('letrasyespacios', function(value, element){
        patr=new RegExp("^[a-zA-Z\s]*$");

        if (patr.test(value))
            return true;

        return false;
    }, 'Solo se admiten letras y espacios');

    configurarValidate("#form1");
    configurarValidate("#form2");
})


//Funcion para configurar validate
function configurarValidate(form){
    $(form).validate({
        rules:{
            apellidos:{
                required:true,
                letrasyespacios:true
            },

            nombre:{
                required:true,
                lettersonly:true,
            },

            domicilio:{
                required:true
            },

            sexo:'required',

            edad:'required',

            curso:'required',

            asignaturas:'required',

            observaciones:{
                maxlength: 50
            }

        },

        errorElement:"div",

        errorPlacement: function(error, element){
            console.log($(element).is(":checkbox"));
            if ($(element).is(":checkbox, :radio"))
                $(error).insertBefore(element);
            else
                $(error).insertAfter(element);
        },

        messages:{
            apellidos:{
                lettersonly:'Solo se permiten letras y espacios para el apellido'
            },

            nombre:{
                lettersonly:'Solo se permiten letras'
            },

            curso: 'Debe elegir al menos un modulo',

            observaciones: 'Maximo 50 caracteres'
        },

        submitHandler:function(event){
            $("form input[type=submit]").prop('disabled', true);
            alert('Formulario enviado');
        }
    })
}


//Inicializar selects cursos
function initSelectCurso(){
    $("form input[class=segundo]").prop('disabled', true);

    $("#form1 select[name=curso]").change(function () { 
        if ($(this).val()=="1"){
            $("#form1 input[class=segundo]").prop('disabled', true);
            $("#form1 input[class=primero], #form1 input[class='primero error']").prop('disabled', false);
        }
        else{
            $("#form1 input[class=primero], #form1 input[class='primero error']").prop('disabled', true);
            $("#form1 input[class=segundo]").prop('disabled', false);
        }
    });

    $("#form2 select[name=curso]").change(function () { 
        if ($(this).val()=="1"){
            $("#form2 input[class=segundo]").prop('disabled', true);
            $("#form2 input[class=primero], #form2 input[class='primero error']").prop('disabled', false);
        }
        else{
            $("#form2 input[class=primero], #form2 input[class='primero error']").prop('disabled', true);
            $("#form2 input[class=segundo]").prop('disabled', false);
        }
    });
}

//Funcion para reescribir mensaje de campo obligatorio
function reescribirMensajesPD(){
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Please fix this field.",
        email: "Please enter a valid email address.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {0} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });
}