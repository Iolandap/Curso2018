<?php 

	// Definiciones iniciales
	session_start();

	include("conexion.php");
	$user 		= $_POST["user"];
	$password 	= $_POST["password"];

	$sql="SELECT tipus, CONCAT(nombre, ' ',apellidos) as nomC 
			FROM usuaris 
			WHERE 	user 	 = '$user' 	and  
					password = '$password'";

	// Obtenemos el objeto del la query
	$res = mysqli_query($conecion,$sql);

	// Contar filas obtenidad de la query
	$nfilas = mysqli_num_rows($res);

	// Cerrar fichero
	mysqli_close($conecion);

	if($nfilas>0){
		// Carga datos query en una array
	    $fila = mysqli_fetch_assoc($res);

	    $_SESSION['nomC'] = $fila["nomC"].;
	    $_SESSION["tipo"] = $fila["tipus"];

	    echo "ok";

	}else{
		// si hemos tenido CERO filas de la query
	   	echo "error";
	}


?>