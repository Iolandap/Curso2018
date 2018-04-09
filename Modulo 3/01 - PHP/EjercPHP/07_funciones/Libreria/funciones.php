<?php 

// Funcion encapsulador tag P
	function tag_p($string_0){

		$concatena_0 = "<p>$string_0</p>";
		return $concatena_0;
	}

// Funcion encapsulador tag h1
	function tag_h1($string_1){

		$concatena_1 = "<h1>$string_1</h1>";
		return $concatena_1;
	}

// Funcion encapsulador tag P y HREF
	function tag_p_href($string_2){

		$concatena_2 = 	"	<p>$string_2</p>
							<a href=\"https://es.wikipedia.org/wiki/Wikipedia:Portada\">Wikipedia</a>
						";

		return $concatena_2;
	}

// Funcion estacion segun la fecha en la que estemos
	function estacion(){

		// AÑO NORMAL
		// 	Primavera: 	empieza el 21 de marzo, el día número 79 del año
		// 	Verano: 	empieza el 22 de junio, el día número 172 del año
		// 	Otoño: 		empieza el 23 de septiembre, el día número 265 del año
		// 	Invierno: 	empieza el 19 de diciembre, el día número 352 del año

		// AÑO BISIESTO
		//  +1 dia en el inicio de cada estacion

	    // Guardamos en una variable el día del año
	    $dia 		= date('z'); 	// Por ejemplo: "80" (empieza por 0)
	    $bisiesto 	= date('L');	// Devuelve 1 si es año bisiesto, si es normal da 0
	    $invierno 	= 79;		// Fecha cambio estacion año normal
	    $primavera 	= 172;		// Fecha cambio estacion año normal
	    $verano 	= 265;		// Fecha cambio estacion año normal
	    $otono 		= 352;		// Fecha cambio estacion año normal

	    // Cambiador valores iniciales de cambio estacion si es año bisiesto
	    if ($bisiesto == 1){
	    	$invierno 	+= 1;
	    	$primavera 	+= 1;
	    	$verano 	+= 1;
	    	$otono 		+= 1;
	    }
	 
	    // Si la fecha actual es anterior al 21 de marzo
	    if ( $dia < $invierno ) {
	        $estacion = 'invierno';
	 
	    // Si la fecha actual es anterior al 22 de junio
	    } elseif ( $dia < $primavera ) {
	        $estacion = 'primavera';
	 
	    // Si la fecha actual es anterior al 23 de septiembre
	    } elseif ( $dia < $verano ) {
	        $estacion = 'verano';
	 
	    // Si la fecha actual es anterior al 19 de diciembre
	    } elseif ( $dia < $oto ) {
	        $estacion = 'otono';
	 
	    // Si no es ninguna de las anteriores
	    } else {
	        $estacion = 'invierno';
	 
	    }
	 
	    return $estacion ;
	}

// Funcion punto cartesiano
	function dist_punt_cartesiano($x1,$y1,$x2,$y2){
		// calculo distacia puntos cartesianos
		// sqrt = raiz cuadrada y pow = (base, potencia)
		$dis=sqrt(pow($x2-$x1,2)+pow($y2-$y1,2));
		return $dis;
	}

// Funcion suma valores entrados en un string
	function array_suma($num_0){
		// Rompe el string y lo pasa a una array
		$string_array 	= preg_split('//', $num_0, -1, PREG_SPLIT_NO_EMPTY);
		// array_sum = suma los valores de dentro de una array
		return array_sum($string_array);
	}

// Funcion traductora idiomas segun seleccio, para "Hola Mundo"
	function traductor($idioma){
		// Selector idioma
		switch ($idioma) {
			case 'cat':
				return "Hola mon!!!";
			case 'esp':
				return "Hola mundo!!!";
			case 'eng':
				return "Hello world!!!";
		}	
	}

// Funcion calculo numero par o impar
	function par_impar($par_impar){
		if ($par_impar%2==0){
		    return "par";
		}else{
		    return "impar";
		}
	}

// Funcion extension fichero
	function extension($str_1){
		// Extraccion de los ultimos 4 digitos y pasado a minusculas
		$ext = strtolower(substr("$str_1", -4));
		switch ($ext) {
			case '.pdf':
				return "PDF, formato de almacenamiento para documentos digitales​";
			case '.exe':
				return "EXE, formato de Executable program";
			case '.jpg':
				return "JPG, formato de JPEG bitmap";
			case '.png':
				return "PNG, formato de PNG bitmap";
			case '.xls':
				return "XLS, formato de Excel spreadsheet";
			case '.csv':
				return "CSV, formato de Comma delimited";
			case '.sql':
				return "SQL, formato de Structured Query Language";
			case '.json':
				return "JSON, fa file that stores simple data structures and objects. were originally based on a subset of JavaScript";
			case '.py':
				return "PY, is a program file or script written in Python";
			default:
				return "Formato no reconocible";
		}
	}

?>
