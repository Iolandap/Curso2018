<!DOCTYPE html>
<html>
<head>
	<?php 
		require("libreria/funciones.php");  // incluimos un fichero php con funciones
	?>
</head>
<body>

	<?php // Activamos PHP
		// Preguntamos si hay valor en la variable edad o podemos usar la variable del boton en la condicion
		if(isset($_POST["aceptar"])){
			// Carga valor en la variable
			$str_0=$_POST["str_0"];

			// Llamada a funcion control password
			if(palabra_encadenada($str_0) == 1){
				// Devuelve 1
	    		echo 	str_repeat('<br>', 2)
	    				."<h1 style='color:white; background-color: green; display:inline;'>
	    					Palabra encadenada
	    				</h1>";
			}else{
				// Devuelve 0
				echo 	str_repeat('<br>', 2)
						."<h1 style='color:white; background-color: red; display:inline;'>
							Palabra NO encadenada
						</h1>";
			} // Fin condiciona llamada funcion

		}else{ 
	?><!-- Hemos cerrado PHP y pasamos a HTML -->

			<!-- Si no se ha entrado ningun dato se activa el formulario. Condicion que viene de PHP, el 'else' -->
			<form method="POST">
				Introducir cadena: <input type="text" name="str_0">
				<input type="submit" name="aceptar" value="Submit">
			</form>

	<?php // Activamos PHP
		}  // Cerramos el condicional del if(isset()) que estaba abierto
	?><!-- Hemos cerrado PHP y pasamos a HTML -->

</body>
</html>