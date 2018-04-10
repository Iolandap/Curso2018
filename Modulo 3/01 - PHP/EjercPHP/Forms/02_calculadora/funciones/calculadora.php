<?php 

// Funcion calculadora
	function calculadora ($oper, $x, $y){
		switch ($oper) {
			case 'suma':
				return $x+$y;
			case 'resta':
				return $x-$y;
			case 'multiplicacion':
				return $x*$y;
			case 'division':
				// Bloqueador de divisiones con ceros
				if($x == 0 || $y == 0){
					return "Error!!!! no se puede dividir por CERO";
				}else{
					return $x/$y;}
		}
	}

?>