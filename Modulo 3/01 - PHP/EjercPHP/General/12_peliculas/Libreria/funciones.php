<?php 

// Funcion inicializacion usuarios
	function initCfg(){
		// Nivel usuario
		$cfg['user'] = "";
		$cfg['pass'] = "";
		// Nivel admin
		$cfg['saved_user'] = "pepito";
		$cfg['saved_pass'] = "1234";

		$cfg['saved_hash'] = md5($cfg['saved_pass']);
		$cfg['userlogtipus'] = $_SESSION['tipus']="none";

		return $cfg;
	}	


// Funcion a funcion control pasword
	function ctr_pasword($username, $pasword){

		// Nivel usuario segun user y pasword. 
		// Cogemos los datos de la sesion que estan dentro de la array
		// '===' :compara contenido y tipo contenido
		if (	$username	 	==  $_SESSION['cfg']['saved_user'] && 
				md5($pasword) 	=== $_SESSION['cfg']['saved_hash']) { 
			// Nivel Admin
			return 'admin';
		};
	}

// Funcion opciones menu segun usuario
	function get_menu($usuario){

	 	$menu = array();

	  	switch ($usuario){
	  		case 'admin':
	  			$menu = array( 		'link3' => 'Añadir',
	  				  				'link4' => 'Borrar');
	  			break;
	  	}
	  	return $menu;
	}
?>
