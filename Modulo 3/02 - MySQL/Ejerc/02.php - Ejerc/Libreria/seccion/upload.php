<!DOCTYPE html>
<html>
<head>
   	<link rel="stylesheet" type="text/css" href="css/ejercicio.css" title="style">
</head>
<body>
	<?php

		// Definiciones iniciales
		$file_txt	= "";
		$imagen 	= "";
		$deporte 	= "";

		// Control pulsacion boton "ok"
		if(isset($_POST["ok"])){
			$deporte=$_POST["deporte"];

			// Carga ficheros
			if ($_SESSION["usuario"] =="admin") {
				include("funciones/carga_admin.php");
			}elseif ($_SESSION["usuario"] =="standar") {
				include("funciones/carga_standar.php");
			}
		} // FIN del if(isset())

		// Control pulsacion "regresar"
		if(isset($_POST["regresar"])){
    		// llamada a php de carga de ficheros
			header("Location: ../exam/index.php");

		} // FIN del if(isset())
	?>

	<!-- Formulario entrada datos -->

	<form 	id 		= "form" 
			name 	= "form" 
			method 	= "post" 
			enctype = "multipart/form-data">

		 <fieldset>
		 	<!-- legend segun tipo usuario -->
			<?php 
	  			if ($_SESSION["usuario"] =="admin") {
			?>
	  			  	<legend>Alta deportes</legend>
			<?php
	  			 }else{
			?>
	  			 	<legend>Alta experiencias</legend>
			<?php
	  			 }
			?>

			<!-- Campo producto -->
	  		<div>
		  		<br>
		  		<label for="file_txt">Fichero texto: </label>
		  		<input type="hidden" name="max_file_size" value='1024000'>
		  		<input type="file" 	 name="file_txt" size="44" id="file_txt" 
		  				value="<?php echo $file_txt;?>">

			</div>
	  		<!-- Campo imagen -->
	  		<!-- campo imagen segun tipo usuario -->
			<?php 
	  			if ($_SESSION["usuario"] =="admin") {
			?>
	  				<div>
				  		<br>
				  		<label for="imagen">Imagen del producto: </label>
				  		<input type="hidden" name="max_file_size" value='1024000'>
				  		<input type="file" 	 name="file_img" size="44" id="file_img" 
				  				value="<?php echo $imagen;?>">
					</div>

			<?php
	  			}
			?>
			<!-- Campo deporte -->
			  <input type="radio" name="deporte" value="Montana" checked> Montaña<br>
			  <input type="radio" name="deporte" value="Agua"> Agua<br>
			  <input type="radio" name="deporte" value="Aire"> aire  

	  		<!-- Envio formulario -->
	  		<br>
	  		<input type="submit" name="ok" value="Enviar">

			<!-- Regreso a menu principal -->
	  		<input type="submit" name="regresar" value="Volver">

	  	</fieldset>
	</form>

</body>
</html>
