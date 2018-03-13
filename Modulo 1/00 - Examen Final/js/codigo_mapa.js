$(document).ready(function() {

    /* Definicion Ubicacion y zoom */
        var myLocation = new google.maps.LatLng(41.223288, 1.735622);
        var mapOptions = {
            center: myLocation,
            zoom: 16
        };

    /* Definicion texto emergente marker mapa */
        var contentString = 
        '<div id="content">'+
            '<h1 id="firstHeading" class="firstHeading">PC Box</h1>'+
            '<div id="bodyContent">'+
                '<p>Ordenadores, teléfonos móviles y componentes en tiendas '+
                'de informática con periféricos para videojuegos.</p>'+
            '</div>'+
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

    // Texto Icono marker
        var marker = new google.maps.Marker({
            position: myLocation,
            title: "Pc Box"
        });

    // Carga mapa
        var map = new google.maps.Map(document.getElementById("map1"),
            mapOptions);
        marker.setMap(map);

    // Listener para click en el marker
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

    // Listener para envio y control formato Email
        $("#envio").click(function(){ 
            
            // Definiciones variables
            var email = document.getElementById('email');
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            // Control formato email segun datos FILTER
            if (!filter.test(email.value)) {
                alert('Error en el email');
                email.focus;
                return false;
            }else{
                //Envio contacto y regreso a pagian previa
                window.open("../html.html");
            }
        });
        
});
