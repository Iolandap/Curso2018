$(document).ready(function() {

    // JQUERY MENU LATERAL
        // Definicion status inicial menu lateral
        $(".submenu").hide();
        $(".contenedor--menu").hide();
        

        // Evento escucha pulsacion Icono menu lateral
        $(".icono").click(function() {
            $(".contenedor--menu").animate({
                width: "toggle"
            });
        });  //  Fin evento escucha icono lateral


        $( ".submenu" ).before(innerHTML = "\u25bc");

        $('.submenu')
        //despliega solo el submenu de ese menu concreto
        $('.menu__enlace').click(function(event){
            var elem = $(this).next();
        
            if(elem.is('ul')){          
                event.preventDefault();
                elem.slideToggle();
            }
        });
    
    // JQUERY Opcion Iniciar Sesion
        //Mensaje alerta oculto por defecto
        $('.alert').hide();

        // Listener de Click para el envio
        $("#envio").click(function(){ 
            /* carga datos introducidos en el INPUT*/
            var username = $("#username").val();
            var pasword  = $("#pasword").val();
    
            /* Control campos vacios en los INPUTS*/
            if(username ==""){
                // Mostar warning
                $('.alert').show();
            }else{
                if(pasword ==""){
                    // Mostar warning
                    $('.alert').show();
                }
            }
        }); // Fin funcion Click envio
    
        /* Funcion cierre alerta error */
        $(".close").click(function(){
            /* Ocultar mensaje alerta */
            $('.alert').hide();
        }); // Fin funcion alerta error

        // Funcion SLIDER
        $(function(){
            $('.bxslider').bxSlider({
                mode: 'fade',
                captions: true,
                slideWidth: 300
            });
        });

});//fin de la funcion ready