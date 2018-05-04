<?php

// Definicion variables iniciales
$host	="localhost";
$user	="root";
$bd 	="vuelos";
$pass	="\$lila1630"; // Da problemas al usar el simbolo $ como pasword por lo que se pone la barra

// Definicion Array bade de datos
$cfg=array (	"host"	=>$host,
				"user"	=>$user,
				"bd"	=>$bd,
				"pass"	=>$pass,
			);

// Abrimos la base de datos con la configuracion que tenemos en la array
$mysqli = new mysqli($cfg['host'], $cfg['user'], $cfg['pass'], $cfg['bd']);
	// Si hay un error al cargar la base de datos
	if ($mysqli->connect_errno) {
	    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
}

// Generamos objeto sql
$resultado 	= $mysqli->query("SELECT * FROM vuelos WHERE ID_Vuelo > 1");
// Genera array asociativo con los datos de la electo
$fila 		= $resultado->fetch_assoc();  
// Mostramos los campos de la SELECT que tenemos en la array, y los seleccionamos por la clave de la array
echo $fila['ID_Vuelo'];
echo $fila['Fecha_Origen'];
echo $fila['Aeropuerto_Origen'];
echo $fila['Fecha_Destino'];
echo $fila['Aeropuerto_Destino'];
echo $fila['ID_Avion'];

?>