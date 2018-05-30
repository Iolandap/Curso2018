<?php

	// Conexion servidor y conexion base de datos
	include("config.php");

	// SQL
	$sql = 	"SELECT * 
				FROM clientes";

	// Generamos objeto sql
	$consulta = mysqli_query($conexion, $sql)
				or die ("Fallo en la consulta".mysql_error($conexion));

	// Visulizacion data
	while ($fila = mysqli_fetch_assoc($consulta)){
		echo "Id_cliente :"		.$fila['id_cliente'];
		echo "nombre :"			.$fila['nombre'];
		echo "limitecredito :"	.$fila['limitecredito'];
	}

?>