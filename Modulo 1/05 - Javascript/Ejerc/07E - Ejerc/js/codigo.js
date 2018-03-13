
/* Cread un script que, utilizando un bucle “for”, muestre con mensajes “confirm”
una cuenta atrás empezando desde un número X (de 10 a 0, por ejemplo).
Modificad  el  script para  que,  si  el usuario  pulsa  “cancelar”  en uno  de  los
confirm, la cuenta atrás se detenga y se muestre un alert informando de ello. (la
función confirm(…) devuelve true o false dependiendo del botón que se pulse)  */ 

// Entrada bucle

    for(i=10 ; i >= 0; i--) {
        var cancelar = confirm("Cuentra atras -->" + i);

        //Accion al pulsar la techa cancelar
        if(cancelar == false){         
            alert("Pulsada techa Cancelar");
            break;
        }

    }


