$(function(){

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

    configurarValidate("#form1");
    configurarValidate("#form2");
})


//Funcion para configurar validate
function configurarValidate(form){
    $(form).validate({
        rules:{
            apellidos:{
                required:true,
                lettersonly:true
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

            asignaturas:'required'

        },

        messages:{
            apellidos:{
                lettersonly:'Solo se admiten letras y espacios para el apellido'
            },

            nombre:{
                lettersonly:'Solo se admiten letras y espacios para el nombre'
            }
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