<!DOCTYPE html>
<html>
<head>

	<?php 
		require("funciones/control.php");  // incluimos un fichero php con funciones
	?>
   	<link rel="stylesheet" type="text/css" href="css/ejercicio.css" title="style">
</head>
<body>
	<?php

		// Definiciones iniciales
		$nombre 	= "";
		$apellido 	= "";
		$edad 		= "";
		$email 		= "";
		$comentarios= "";
		$res 		= array(false,false,false);
		
		if(isset($_POST["ok"])){
			// Carga valores introducidos en PHP
			$nombre 	= $_POST["nombre"];
			$apellido 	= $_POST["apellido"];
			$edad 		= $_POST["edad"];
			$email		= $_POST["email"];
			$comentarios= $_POST["comentarios"];

			// Llamada funcion validacion campos
			$res = validacion($nombre, $edad, $email);
	
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
		  		<input 	type="text" name="nombre" id="nombre" 
		  				value="<?php echo $nombre;?>">
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
		  		<input type="text" name="apellido" id="apellido" 
		  				value="<?php 
		  						echo $apellido; // para mantener los datos tras hacer el submit
		  						?>"> 
			</div>

	  		<!-- Campo edad -->
	  		<div>
		  		<br>
				<label for="edad">Edad: </label>
		  		<input type="number" name="edad" id="edad" 
		  				value="<?php 
		  						echo $edad; // para mantener los datos tras hacer el submit
		  						?>">
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
		  		<input type="text" name="email" id="email" 
		  				value="<?php echo $email;?>">
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
		  		<textarea rows="4" cols="50" name="comentarios" 
		  					value="<?php echo $comentarios;?>">Comentarios...</textarea>
	  		</div>

	  		<!-- Envio formulario -->
	  		<br>
	  		<input type="submit" name="ok" value="ok"><br><br>

	  	</fieldset>
	</form>

</body>
</html>
