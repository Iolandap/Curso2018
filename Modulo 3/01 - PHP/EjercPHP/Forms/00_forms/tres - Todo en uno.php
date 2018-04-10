<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!-- Activamos PHP -->
	<?php 
		// Preguntamos si hay valor en la variable edad o podemos usar la variable del boton en la condicion
		if(isset($_POST["edad"])){
			// Carga valor en la variable
			$edad=$_POST["edad"];	
			print("La edad es:$edad");
		
		}else{ 
	?>
<!-- Hemos cerrado PHP y pasamos a HTML -->

			<!-- Si no se ha entrado ningun dato se activa el formulario. Condicion que viene de PHP, el 'else' -->
			<form action="" method="POST">
				Edad: <input type="text" name="edad">
				<input type="submit" name="submit" value="aceptar">
			</form>

<!-- Activamos PHP -->
	<?php 
		}  // Cerramos el condicional del else que estaba abierto
	?>
<!-- Hemos cerrado PHP y pasamos a HTML -->
</body>
</html>

