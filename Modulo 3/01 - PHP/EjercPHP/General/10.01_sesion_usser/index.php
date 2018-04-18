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
		// Inicializacion sesion
		session_start();

		//Condicion pulsacion boton Verificar
		if(isset($_POST["verificar"])){
			// Definiciones iniciales
			$str_0	= $_POST["str_0"];

			// Llamada a funcion control password
			if(ctr_pasword($str_0) == 1){
				// Devuelve 1. Password correcto
				// Definicion variable sesion
				$_SESSION["usuario"] = "Felipe";
				// Código para usuarios autorizados
				echo "<br><br>buenos dias ".$_SESSION["usuario"]." como estas hoy??  ";
	?>			<!-- Aparicion boton especial del usuario -->
				<form method="post">
					<input type="submit" name="opc_especiales" value="Opciones especiales">
				</form>
  	<?php
			}else{
				// Devuelve 0. Password incorrecto
				echo 	str_repeat('<br>', 2)
						."<h1 style='color:white; background-color: red; display:inline;'>
							INCORRECTO, no cuadra con el codigo almacenado
						</h1>";
			} //FIN control paswords
		} // FIN control boton verificar

		// Condicion pulsacion boton opciones especiales
		if(isset($_POST["opc_especiales"])){
			header("Location: formulario/formulario.php");
		} // FIN control boton opciones especiales

	?>

</body>
</html>
