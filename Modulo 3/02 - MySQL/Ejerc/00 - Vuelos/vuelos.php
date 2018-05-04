<?php
// ***********************************************************
// 		Visualizacion de una linea de la tabla, dos metodos
// ***********************************************************

// Definicion variables iniciales
$host	="localhost";
$user	="root";		// Usuario
$bd 	="vuelos";		// Base de datos
$pass	="\$lila1630"; 	// pasword: Da problemas al usar el simbolo $ como pasword por lo que se pone la barra

// Definicion Array bade de datos
$cfg = array (	"host"	=>$host,
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
echo $fila['ID_Avion']."<br>";

// Otro metodo seria mostrar todo con un foreach
foreach ($fila as $clave => $valor) {
	echo $valor." - ";
}

// ***********************************************************
// 			Carga masiva de datos en la tabla por bucle
// ***********************************************************

$i=0; 
while ($i<10000){

	// DEFAULT : deja que el SQL genere el codigo del ID que toque, se usa para las claves
	// Vamos a cargar en un campo un valor= string+variable 'Barcelona -$i'
	// Los otros campos del fichero han de ser cargados, pero como estan predefinidos como nulo no hace falta cargarlos
	$query = "INSERT INTO vuelos(ID_vuelo,Aeropuerto_Destino) 
				VALUES (DEFAULT,'Barcelona -$i')";
	// vemos la query y si hay un error lo ponemos en MyPHPadmin directamente para ver que error hay y buscar la solucion
	echo "<br>".$query;

	// Carga de datos y imprime conforme esta insertado el campo
	if($mysqli->query($query)=== TRUE){
		printf("Se creo con exito $i.\n");
	}else{
		echo "error";
	}

$i+=1;
};

?>