<?php 

// Funcion a funcion control pasword
	function ctr_pasword($pasword, $user0){

		// Conexion servidor y conexion base de datos
        include("config.php");

		// SQLa mostrar
		$sql = 	"SELECT *
					FROM usuarios
					WHERE 	nombre 	=	'$user0' AND
							pasword = 	'$pasword'
				";
			// si tuvieramos de controlar usuario y pasword
	 		//			SELECT tipus, CONCAT(nombre,' ', apellidos) as nomc 
			//				FROM usuarios
			//				WHERE 	user ='$user' AND 
			//						Pasword = '$string_0'

		// Generamos objeto sql
		$consulta = mysqli_query($conexion, $sql)
					or die ("Fallo en la consulta".mysql_error($conexion));
		echo "$sql";

		// Miramos la longitud de la informacion obtenida
		$nfila = mysqli_num_rows($consulta);

		// Cierre base de datos.
		// La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
		mysqli_close($conexion);

		// Si hay mas de CERO lineas, teoricamente el pasword es unico
		if ($nfila > 0 ){
			// Cojemos la informacion y la guardamos en la matriz
			$fila = mysqli_fetch_assoc($consulta);
	 		// 	se podria abrir directamente la sesion
	 		 		$_SESSION['usuario'] = $fila['Nombre'];
		 		//	y lo enviamos al home
			// Retorno data
	 		return true;

		}else{
			// Si no hay data devuelve un "blanco"
			return false;
			// o lo podemos enviar al home donde enviamos el error
			// 		header ("location: home.php?er=1");		

		} // FIN condicion >0

	} // FIN funcion

?>
