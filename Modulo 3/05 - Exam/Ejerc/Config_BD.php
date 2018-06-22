<?php

	// Definicion variables iniciales
	$host	="localhost";
	$user	="root";					// Usuario
	$bd 	="prueba_final_php_sql";	// Base de datos
	$pass	="\$lila1630"; 	// pasword: Da problemas al usar el simbolo $ como pasword por lo que se pone la barra

	// Definicion Array bade de datos
	$cfg = array (	"host"	=>$host,
					"user"	=>$user,
					"pass"	=>$pass,
					"bd"	=>$bd,
				);

	// Conexion con el servidor
	$conexion = mysqli_connect($cfg['host'], $cfg['user'], $cfg['pass']) 
				or die ("no se puede conectar con el servidor".mysql_error($conexion));

	// Si la carga es correcta
	if ($conexion){
		"Conexion exitosa";
	}

	// Seleccion de la base de datos
	mysqli_select_db($conexion,$cfg['bd'])
	or die ("no se puede seleccionar la base de datos".mysql_error($conexion));

?>