

// Funcion para confirmar el SUBMIT del formulario
    function mostrar_un_alert() {

        var confirmacion = confirm("Esta seguro!!!!! ");

        if (confirmacion){                          // Equivale a preguntar si la variable es TRUE
            document.Myform.submit();               // Envio de formulario
            return true;                            // Devuelve TRUE al origen de llamada
        }else{
            alert("Formulario no enviado");
            return false;                           // Devuelve FALSE al origen de llamada
        }
    }