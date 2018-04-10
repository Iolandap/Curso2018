<?php 

// Funcion a funcion control pasword
	function palabra_encadenada($str_0){

		$str_0 = 'bicicletp tpmbor oruge oerro';

		$array_0 	= 	explode(" ", $str_0);
		$cont_0		=	count($array_0);

		for ($x=0;$x<$cont_0-1; $x++) { 

			// Primera palabra
			$palabra_0_fin = substr($array_0[$x], -2);		// dos ultimos digitos palabra

			// Segunda palabra
			$palabra_1_ini = substr($array_0[$x+1], 0, 2);	// dos primeros digitos palabra
				
			echo "palabras comparadas --> $palabra_0_fin $palabra_1_ini <br>";

			// condicion de NO palabra encadenada
			if ($palabra_0_fin != $palabra_1_ini){
				return false;
			}
		}

		return true;

	} //FIN de la funcion

// otro metodo de calculo seria --->>>>

	function new_cadena_palabra ($str_0){
		$str_0 = strtolower(trim($str_0));	// trim : quita los espaciones en blanco de cada punta

		$arrayS =explode(" ", $str_0);
		$encadenada = true;

		for ($i=0; $i <count($arrayS) ; $i++) { 
			$actual =$array[$i];
			if ($i!=0) {
				$primePart 	= substr($actual, 0, 2);
				$ultimaPart = substr($anterior, -2);
				if($primePart != $ultimaPart){
					$encadenada= false;
					break;
				}
			
			}
			$anterior = $actual;
		}
		return $encadenada;

	}

?>
