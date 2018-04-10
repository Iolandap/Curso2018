<?php 

// Funcion contador strings
	function contador_str ($string_0){

		// Pasamos el string a array, letra a letra
		$string_array 				= preg_split('//', $string_0, -1, PREG_SPLIT_NO_EMPTY);
		// Contamos la elementos que se repiten y generamos la nueva array, con clave y valor
		$string_array_count			= array_count_values($string_array);
		// Ordenamos la array
		asort($string_array_count);		
		// Calculo longitud de la array contador
		$long_0						= count($string_array_count);

		print ("Texto introducido --> ".$string_0."<br><br>");



		// Definicion inicial para controlador de primer y final elemento de la array contador
		$contador=0;
		// Bucle para correr array contador
		foreach($string_array_count as $clave=>$valor){
			echo str_repeat('&nbsp;', 10)."Clave: $clave; valor: $valor\n"."<br>" ;

			// Buscador elemento 0 y ultimo de la array en funcion de contador
			if($contador == 0){
				echo "La letra MINIMA --> ".$clave." aparece ".$valor. " veces "."<br>";
			}elseif ($contador == $long_0-1) {
				echo "La letra MAXIMA --> ".$clave." aparece ".$valor. " veces "."<br>";
			}

			$contador= $contador+1;
		}
	}

?>