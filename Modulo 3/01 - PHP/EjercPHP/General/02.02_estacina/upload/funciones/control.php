<?php 

// Funcion calculadora
	function validacion($producto, $precio){
		//Defincion array inicial
		$resultado = array();

		// Validacion nombre
		if ($producto == "") {
			$resultado[0]= true;
		}else{
			$resultado[0]= false;
		}
		// Validacion precio
		if($precio < 1){
			$resultado[1]= true;
		}else{
			$resultado[1]= false;
		}

		// Devolvemos un Array con los resultados de las validaciones
		return $resultado;
	}

?>