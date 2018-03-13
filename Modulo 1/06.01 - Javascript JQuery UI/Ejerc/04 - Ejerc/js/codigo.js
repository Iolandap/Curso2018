
// Carga de Javascript al iniciar la hoja
$(document).ready(function(){       
    
    // Formato TABs
        $( "#tabs" ).tabs({
            event:"mouseover"   // Cuando pasas el mouse cambia de pestaña
        });

    // Tabs Sortable
        var tabs = $( "#tabs" ).tabs();

        tabs.find( ".ui-tabs-nav" ).sortable({
            axis: "x",
            stop: function() {
                tabs.tabs( "refresh" );
            }
        });
    
    // Tabs Verticales. OJO se ha de modificar el CSS para que funcione
        $( "#tabs" )
            .tabs()
            .addClass( "ui-tabs-vertical ui-helper-clearfix" );
        $( "#tabs li" )
            .removeClass( "ui-corner-top" )
            .addClass( "ui-corner-left" );

}); // Fin Document Ready

