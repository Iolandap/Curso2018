<!DOCTYPE html>
<html>
<head>

	<?php 
		require("funciones/contador_str.php");  // incluimos un fichero php con funciones
	?>

</head>
<body>

	<h1>Contador letras en un STRING</h1>

	<!-- Formulario entrada datos -->
	<form method="post">
		<label for="str_0">Introducir cadena a analizar: </label>
  		<input type="text" name="str_0" id="str_0"><br>

  		<input type="submit" name="calcular" value="calcular">

	</form>

	<?php 

		// Definiciones iniciales
			if(isset($_POST["calcular"])){
				$str_0=$_POST["str_0"];

			// Llamada a funcion e impresion resultado
				$array_contador 	= contador_str($str_0);

				// print_r($array_contador);

			}
	?>

</body>
</html>
