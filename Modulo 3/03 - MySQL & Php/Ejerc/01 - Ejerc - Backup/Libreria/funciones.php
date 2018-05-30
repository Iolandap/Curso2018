<?php 

// Funcion a funcion control pasword
	function ctr_pasword($string_0){

		// Conexion servidor y conexion base de datos
        include("config.php");

		// SQLa mostrar
		$sql = 	"SELECT *
					FROM usuarios
					WHERE Pasword = '$string_0'
				";
			// si tuvieramos de controlar usuario y pasword
	 		//			SELECT tipus, CONCAT(nombre,' ', apellidos) as nomc 
			//				FROM usuarios
			//				WHERE 	user ='$user' AND 
			//						Pasword = '$string_0'

		// Generamos objeto sql
		$consulta = mysqli_query($conexion, $sql)
					or die ("Fallo en la consulta".mysql_error($conexion));

		// Miramos la longitud de la informacion obtenida
		$nfila = mysqli_num_rows($consulta);

		// Cierre base de datos.
		// La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
		mysqli_close($conexion);

		// Si hay mas de CERO lineas, teoricamente el pasword es unico
		if ($nfila > 0 ){
			// Cojemos la informacion y la guardamos en la matriz
			$fila = mysqli_fetch_assoc($consulta);

			// Retorno data
	 		return $fila['Nombre'];
	 		// 	se podria abrir directamente la sesion
	 		// 		$_SESSION['nom'] = $fila["nombre"]." ".$fila["apellidos"];
	 		//			NOTA: se puede concatenar en SQL
	 		//				SELECT tipus, CONCAT(nombre,' ', apellidos) as nomc 
			//					FROM usuarios
			//					WHERE Pasword = '$string_0'
			//				$_SESSION['nom'] = $fila["nomc"]
	 		// 		$_SESSION['tipo'] = $fila["tipos"];
	 		//	y lo enviamos al home
	 		// 		header ("location: home.php");

		}else{
			// Si no hay data devuelve un "blanco"
			return false;
			// o lo podemos enviar al home donde enviamos el error
			// 		header ("location: home.php?er=1");		

		} // FIN condicion >0

	} // FIN funcion

?>
