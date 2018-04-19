<?php 

// Funcion a funcion control pasword
	function ctr_pasword($string_0){
		// Definiciones paswords
		$pasword_A = sha1("123");
		$pasword_B = sha1("1234");
		$pasword_C = sha1("12345");

		// Nivel usuario segun pasword
		if (sha1($string_0) === $pasword_A) {  // '===' :compara contenido y tipo contenido
			return 'A';
		}elseif (sha1($string_0) === $pasword_B) {
			return 'B';
		}elseif (sha1($string_0) === $pasword_C) {
			return 'C';
		};
		return false;
	}

// Funcion opciones menu segun usuario
	function get_menu($usuario){

	 	$menu = array();

	  	switch ($usuario){
	  		case 'A':
	  			$menu = array( 		'link1' => 'Home 1', 
	  								'link2' => 'Noticias 1', 
	  								'formulario/formulario' => 'Editar 1', 
	  								'link4' => 'borrar 1');
	  			break;
	  		case 'B':
	  			$menu = array( 		'link1' => 'Home 2', 
	  								'link2' => 'Noticias 2', 
	  								'link3' => 'Editar 2', 
	  								'link4' => 'borrar 2');
	  			break;
	  		case 'C':
	  			$menu = array( 		'link1' => 'Home 3', 
	  								'link2' => 'Noticias 3', 
	  								'link3' => 'Editar 3', 
	  								'link4' => 'borrar 3');
	  	}
	  	return $menu;
	}

?>
