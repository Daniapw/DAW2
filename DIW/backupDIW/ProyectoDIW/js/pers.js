
$(function() {

    var scroll=false;    

    var tamanios=getTamanios();

    $(".chart").css({
        width:tamanios[0]+"px",
        height:tamanios[0]+"px"
    });

    $(".percent").css({
        lineHeight:tamanios[0]+"px",
        fontSize:tamanios[1]+"em"
    });

    //Evento que se activara cuando el usuario haga scroll
    $(window).scroll(function () { 

        //Si el usuario ha hecho scroll por primera vez
        if (!scroll){

            //Tiempo que tardara en cargarse el grafico
            tiempo=450;

            //IDs de los graficos
            idsCharts=["fuerza", "resistencia", "intel", "agilidad", "combate", "velocidad"];

            for (let i=0; i<idsCharts.length; i++){

                setTimeout(function(){
                    //Mostrar grafico puntuacion
                    $("#"+idsCharts[i]).easyPieChart({
                        size: ""+tamanios[0],
                        lineWidth: "17",
                        trackColor:"white",
                        barColor:'#f52c2c',
                        lineCap:'square',
                        scaleLength:'1',
                        animate:({
                            duration:"450",
                            enabled:true
                        })
                    });
                }, tiempo);

                //Aumentar tiempo
                tiempo+=450;
            }

            scroll=true;
        }

        
    });


    //Para que cambie de tamanio segun resolucion
    $(window).resize(function () { 
        if (scroll){
            tamanios=getTamanios();

            $(".chart").css({
                width:tamanios[0]+"px",
                height:tamanios[0]+"px"
            });

            $(".chart canvas").css({
                width:tamanios[0]+"px",
                height:tamanios[0]+"px"
            });

            $(".percent").css({
                lineHeight:tamanios[0]+"px",
                fontSize:tamanios[1]+"em"
            });
        }
    });
    
});


//Funcion para configurar tamanios al cargar plugin
function getTamanios(){

    //0=valor para atributo 'size' del canvas de easyPieChart y para varios atributos
    //1=valor para font-size
    tamanios=[130,1.8];

    if (window.matchMedia("(max-width: 767px)").matches) {
        tamanios[0]=110;
        tamanios[1]=1.4;
    }
    else if(window.matchMedia("(max-width: 992px)").matches){
        tamanios[0]=120;
        tamanios[1]=1.6;
    }

    return tamanios;
}
