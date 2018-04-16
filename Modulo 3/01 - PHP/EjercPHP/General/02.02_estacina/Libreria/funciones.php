<?php 

// Funcion a funcion control pasword
	function ctr_pasword($string_0){

		$pasword_ini = '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'; // password = 1234

		if (sha1($string_0) === $pasword_ini) {  // '===' :compara contenido y tipo contenido
			return true;
		}else{
			return false;
		};
	}


?>
