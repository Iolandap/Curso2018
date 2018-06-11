<!DOCTYPE html>
<html>
<head>

	<?php 
		// incluimos un fichero php con funciones
		require("funciones/control.php");
		include("envio_gmail.php");
		// Conexion servidor y conexion base de datos
        include("config.php");
	?>
   	<link rel="stylesheet" type="text/css" href="css/ejercicio.css" title="style">
</head>
<body>
	<?php

		// Definiciones iniciales
		$nombre 	= "";
		$apellido 	= "";
		$pasword 	= "";
		$edad 		= "";
		$email 		= "";
		$comentarios= "";
		$res 		= array(false,false,false);
		$save_ok 	= 3;
		
		if(isset($_POST["ok"])){
			// Carga valores introducidos en PHP
			$nombre 	= $_POST["nombre"];
			$apellido 	= $_POST["apellido"];
			$pasword 	= $_POST["pasword"];
			$edad 		= $_POST["edad"];
			$email		= $_POST["email"];
			$comentarios= $_POST["comentarios"];

			// Llamada funcion validacion campos
			$res = validacion($nombre, $edad, $email);

			if($res[0] =='' AND $res[1] =='' AND $res[2] ==''){

				// -----------------------------
				// 		Grabacion de los datos
				// -----------------------------
				// SQL insertar campos
				$sql = 	"INSERT INTO `Clientes`
								(`id_cliente`, 
								`Nombre`, 
								`Apellidos`, 
								`Pasword`, 
								`Edad`, 
								`Email`,
								`Comentarios`) 
							VALUES 
								(NULL,
								'$nombre',
								'$apellido',
								'$pasword',
								'$edad',
								'$email',
								'$comentarios')
						";
				// Generamos objeto sql
				mysqli_query($conexion, $sql)
							or die ("Fallo en la consulta".mysql_error($conexion));
				// Envio email confirmacion 
				envio_email($nombre, $email);
				// Cierre base de datos.
				mysqli_close($conexion);
				// -----------------------------
				// 		FIN grabacion datos
				// -----------------------------

				$save_ok = 1;
			}else{
				// Hay un error al entras los datos, No se Grabara nada
				$save_ok = 0;
			}	// FIN condicion todo ok para grabar
		} // FIN del if(isset())
	?>

	<!-- Formulario entrada datos -->

	<form method="post">
		 <fieldset>
  			<legend>Alta en el servicio</legend>
			<h1>Formulario</h1>

			<!-- Campo nombre -->
			<div>
				<label for="nombre">Nombre*: </label>
		  		<input 	type="text" name="nombre" id="nombre" >
		  			<!-- Verificamos el valor de control para este campo y imprimimos mensaje si hay un error -->
		  			<?php 
		  				if($res[0]){
		  					echo "ERROR. has de introducir datos en el campo nombre";
		  				} 
		  			?>
	  		</div>

	  		<!-- Campo apellido -->
	  		<div>
		  		<br>
				<label for="apellido">Apellidos: </label>
		  		<input type="text" name="apellido" id="apellido">
			</div>

	  		<!-- Campo pasword -->
	  		<div>
		  		<br>
				<label for="pasword">Pasword: </label>
		  		<input type="password" name="pasword" id="pasword">
			</div>

	  		<!-- Campo edad -->
	  		<div>
		  		<br>
				<label for="edad">Edad: </label>
		  		<input type="number" name="edad" id="edad"> 
		  			<!-- Verificamos el valor de control para este campo y imprimimos mensaje si hay un error -->
		  			<?php 
		  				if($res[1]){
		  					echo "ERROR. La edad ha de ser superior a 18 años";
		  				} 
		  			?>
			</div>

	  		<!-- Campo email -->
	  		<div>
		  		<br>
		  		<label for="email">@mail*: </label>
		  		<input type="text" name="email" id="email">
		  			<!-- Verificamos el valor de control para este campo y imprimimos mensaje si hay un error -->
		  			<?php 
		  				if($res[2]){
		  					echo "ERROR. has de introducir datos en el campo Email";
		  				} 
		  			?>
			</div>

	  		<!-- Campo comentarios -->
	  		<div>
	  		<br>
		  		<label for="comentarios">Comentarios: </label>
		  		<textarea rows="4" cols="50" name="comentarios">Comentarios...</textarea>
	  		</div>

	  		<!-- Envio formulario -->
	  		<br>
	  		<input type="submit" name="ok" value="ok">
	  			<!-- Confirmacion grabado correctamente -->
	  			<?php 
	  				if($save_ok == 1){
	  					echo "Grabado correctamente";
	  				}else if($save_ok == 0){
	  					echo "Problemas en la grabacion...";
	  				}
	  			?>
			<br><br>
	  	</fieldset>
	</form>

</body>
</html>
