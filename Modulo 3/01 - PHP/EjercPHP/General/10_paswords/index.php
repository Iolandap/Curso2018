<!DOCTYPE html>
<html>
<head>

	<?php 
		require("libreria/funciones.php");  // incluimos un fichero php con funciones
	?>

</head>
<body>

	<h1>Ejercicio passwords</h1>

	<!-- Formulario entrada datos -->
	<form method="post">
		<!-- Entrada String -->
		<label for="str_0">Introducir password: </label>
  		<input type="text" name="str_0" id="str_0">

  		<!-- Submit -->
		&nbsp; &nbsp; &nbsp;
  		<input type="submit" name="verificar" value="Verificar">
	</form>

	<?php 

		// Definiciones iniciales
		if(isset($_POST["verificar"])){
			$str_0	= $_POST["str_0"];

			// Llamada a funcion control password
			if(ctr_pasword($str_0) == 1){
				// Devuelve 1
	    		echo 	str_repeat('<br>', 2)
	    				."<h1 style='color:white; background-color: green; display:inline;'>
	    					CORRECTO, puedes acceder...
	    				</h1>";
			}else{
				// Devuelve 0
				echo 	str_repeat('<br>', 2)
						."<h1 style='color:white; background-color: red; display:inline;'>
							INCORRECTO, no cuadra con el codigo almacenado
						</h1>";
			}

		}

	?>

</body>
</html>
