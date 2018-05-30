<?php 

// Funcion inicializacion usuarios
	function initCfg(){
		// Nivel usuario
		$cfg['user'] = "";
		$cfg['pass'] = "";
		// Nivel standar
		$cfg['saved_st_user'] = "jose";
		$cfg['saved_st_pass'] = "1234";
		$cfg['saved_st_hash'] = md5($cfg['saved_st_pass']);
		// Nivel admin
		$cfg['saved_adm_user'] = "pepito";
		$cfg['saved_adm_pass'] = "1234";
		$cfg['saved_adm_hash'] = md5($cfg['saved_adm_pass']);

		$cfg['userlogtipus'] = $_SESSION['tipus']="none";

		return $cfg;
	} // FIN funcion


// Funcion a funcion control pasword
	function ctr_pasword($username, $pasword){

		// Nivel usuario segun user y pasword. 
		// Cogemos los datos de la sesion que estan dentro de la array
		// '===' :compara contenido y tipo contenido
		if ( $username 		== 	$_SESSION['cfg']['saved_adm_user'] && 
			 md5($pasword) 	=== $_SESSION['cfg']['saved_adm_hash']){
			// Nivel Admin
			return 'admin';
		}else{
			if ( $username 	== 	$_SESSION['cfg']['saved_st_user'] && 
			 md5($pasword) 	=== $_SESSION['cfg']['saved_st_hash']){
			// Nivel Admin
			return 'standar';
			};
		};

	} // FIN funcion

// Funcion opciones menu segun usuario
	function get_menu($usuario){

	 	$menu = array();

	  	switch ($usuario){
	  		case 'admin':
	  			$menu = array( 		'5' => 'Añadir',
	  				  				'6' => 'Borrar');
	  			break;
	  		case 'standar':
	  			$menu = array( 		'5' => 'Añadir',
	  				  				'6' => 'Borrar');
	  			break;
	  	}
	  	return $menu;
	} // FIN funcion
?>
