<?php 

// Funcion a funcion control pasword
	function ctr_pasword($string_0){

		$pasword_ini = '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'; // password = 1234

		echo str_repeat('<br>', 2)."Tu codigo sha1 seria --> ".sha1($string_0);
		echo str_repeat('<br>', 2)."Tu codigo md5 seria --> ".md5($string_0);
		echo str_repeat('<br>', 2)."Tu codigo md5 de sha1+'1' seria --> ".md5(sha1($string_0,true)+1);	

		if (sha1($string_0) === $pasword_ini) {  // '===' :compara contenido y tipo contenido
			return true;
		}else{
			return false;
		};
	}


?>
