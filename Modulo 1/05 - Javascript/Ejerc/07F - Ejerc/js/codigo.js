
/* Cread un script que, con un bucle “for”, recorra un array en sentido contrario (desde la última posición hasta la primera) y muestre con alerts el contenido de cada posición. Utilizad el array de “meses”, por ejemplo. Modificad el ejercicio para que este bucle   sirva para arrays de cualquier longitud, es decir que no tengáis por qué saber el tamaño del array de entrada (pista: usad la propiedad “length” de los arrays)  */ 

// Definicion variables y array meses

    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    var long_array = meses.length;

// Entrada bucle marcha atras

    for (i=long_array-1 ; i >= 0; i--) {
        alert("Mes --> "+ meses[i]);    // Muestra meses marcha atras
    }


