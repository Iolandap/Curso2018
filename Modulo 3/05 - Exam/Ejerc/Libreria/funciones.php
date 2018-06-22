<?php 

	// Definiciones iniciales
    // Ruta libreria ficheros .php
    $libreria ="libreria/";
    
// **********************************************
// 			Funcion control pasword
// **********************************************
	function ctr_pasword($user0, $pasword){

		// Conexion servidor y conexion base de datos
		include("Config_BD.php");
		// Decodificacion pasword entrada a formato almacenado en BD
		$pasword0 = md5(sha1($pasword,true)."1");
		// SQL a mostrar
		$sql = 	"SELECT *
					FROM usuarios
					WHERE 	Nombre_usuario 	= '$user0' 		AND
							Contrasenya		= '$pasword0' 	AND
							Activado		= '1'
				";

		// Generamos objeto sql
		$consulta = mysqli_query($conexion, $sql)
					or die ("Fallo en la consulta".mysqli_error($conexion));
		//echo "$sql";

		// Miramos la longitud de la informacion obtenida
		$nfila = mysqli_num_rows($consulta);
		//echo $nfila;

		// Cierre base de datos.
		// La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
		mysqli_close($conexion);

		// ********************************
		// 	Condicion carga sesion usuario
		// ********************************
		if ($nfila > 0 ){
			// Si >CERO lineas, SI encontrado usuario y pasword. Solo puede ser un usuario
			// Cojemos la informacion y la guardamos en la matriz $_SESSION
			$fila = mysqli_fetch_assoc($consulta);
	 		// 	Iniciamos sesion
	 		 		$_SESSION['usuario'] 	= $fila['Nombre_usuario'];
	 		 		$_SESSION['Id_usser']	= $fila['Id_usuario'];
		 		//	y lo enviamos al home
			// Retorno data
	 		return true;
		}else{
			// Si =CERO filas, NO encontrado usuario y pasword
			// No hacemos nada con la sesion
			return false;
			// o lo podemos enviar al home donde enviamos el error
			// 		header ("location: home.php?er=1");		
		} // FIN condicion >0
	} // FIN funcion ctr_pasword()

// **********************************************
// 			Funcion New User
// **********************************************

	function new_user($username, $nombre, $email, $pasword1){

		// Proteccion pasword entrada
		$pasword_save = md5(sha1($pasword1,true)."1");

		// Generacion codigo activacion
		$code= sha1(mt_rand().time().mt_rand().$_SERVER['REMOTE_ADDR']);

		// *********************************************
		// 		Consulta existencia o no del usuario
		// *********************************************
		// Conexion servidor y conexion base de datos
		include("Config_BD.php");
		// SQL control usuario no duplicado
		$sql = 	"SELECT *
					FROM usuarios
					WHERE Nombre_usuario 	=	'$username'
				";

		// Generamos objeto sql
		$consulta = mysqli_query($conexion, $sql)
					or die ("Fallo en la consulta".mysqli_error($conexion));
		echo "$sql";

		// Miramos la longitud de la informacion obtenida
		$nfila = mysqli_num_rows($consulta);
		// echo $nfila;

		// **********************************************
		// 	Verificacion existencia usuario y grabacion
		// **********************************************
		if ($nfila == 0 ){
			// Si = 0, Dar de alta usuario

				// -----------------------------
				// 		Grabacion de los datos
				// -----------------------------

				// SQL insertar campos
				$sql = 	"INSERT INTO `usuarios`
								(`Id_usuario`, 
								`Nombre_usuario`,
								`Contrasenya`,					
								`Correo_electronico`, 
								`Nombre_completo`,
								`rol`,
								`Activado`)
							VALUES 
								(NULL,
								'$username',
								'$pasword_save',								
								'$email',
								'$nombre',
								'comprador',
								'0')
						";
				// Generamos objeto sql
				mysqli_query($conexion, $sql)
							or die ("Fallo en la consulta".mysqli_error($conexion));
				// *************** FIN Grabacion ****************

				// ----------------------------------
				// 		Grabacion codigos activacion
				// ----------------------------------

				// Generacion objeto SQL donde guardamos el codigo de activacion generado previamente
				// mysqli_insert_id($conexion) : Da el ultimo ID generado en la conexion de la BD
				$Id_activ = mysqli_insert_id($conexion);

				$sql_activ = "INSERT INTO activacion (`code`, `userid`) 
								VALUES ('$code', '$Id_activ')";

				mysqli_query($conexion, $sql_activ)
							or die ("Fallo en la consulta".mysqli_error($conexion));
				// *************** FIN Grabacion ****************

				// ----------------------------------
				// 		@mail confirmacion 
				// ----------------------------------

				// Envio email confirmacion
				//include("envio_gmail.php");
				//envio_email($username, $email, $code);  // Funcion dentro de envio_gmail.php

			// Cierre base de datos.
			mysqli_close($conexion);

			// Retorno data
	 		return true;
		}else{
			// Cierre base de datos.
			mysqli_close($conexion);

			// Si Diferente CERO. Existe, no dar de alta otra vez
			echo "ERROR !!!! usuario existente";
			return false;
		} // FIN condicion =0
	} // FIN funcion New User()



// **********************************************
// 			Funcion MENU segun NIVEL USUARIO
// **********************************************
	function get_menu($rol){

	 	$menu = array();

	  	switch ($rol){
	  		case 'comprador':
	  			$menu = array( 		'3' => 'Mis Datos',
	  				  		);
	  			break;
	  	}
	  	return $menu;
	} // FIN funcion
?>