<?php 

// Funcion calculadora
	function validacion($nombre, $edad, $email){
		//Defincion array inicial
		$resultado = array();

		// Validacion nombre
		if ($nombre == "") {
			$resultado[0]= true;
		}else{
			$resultado[0]= false;
		}
		// Validacion edad
		if($edad < 18){
			$resultado[1]= true;
		}else{
			$resultado[1]= false;
		}
		// Validacion email
		if($email == "") {
			$resultado[2]= true;
		}else{
			$resultado[2]= false;
		}

		// Devolvemos un Array con los resultados de las validaciones
		return $resultado;
	}

?>