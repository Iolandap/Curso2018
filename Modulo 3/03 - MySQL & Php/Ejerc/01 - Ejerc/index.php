<!DOCTYPE html>
<html>
<head>

	<?php 
		// incluimos un fichero php con funciones
		require("libreria/funciones.php");  
		// Conexion servidor y conexion base de datos
        include("config.php");
	?>

</head>
<body>

	<h1>Ejercicio passwords</h1>

	<!-- Formulario entrada datos -->
	<form method="post">
		<!-- Entrada Usuario -->
		<label for="user">Usuario: </label>
  		<input type="text" name="user" id="user"><br>

		<!-- Entrada Password -->
		<label for="pasword">Pasword: </label>
  		<input type="text" name="pasword" id="pasword">

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
			$user		= $_POST["user"];
			$pasword	= $_POST["pasword"];

			// Llamada a funcion control password
			if(ctr_pasword($pasword, $user) != ''){
				// Devuelve 1. Password correcto
				// Definicion variable sesion
				// Código para usuarios autorizados
				echo "<br><br>buenos dias ".$_SESSION['usuario']." como estas hoy??  ";
	?>			<!-- Aparicion boton especial del usuario -->
				<form method="post">
					<input type="submit" name="opc_especiales" value="Opciones especiales">
				</form>
  	<?php
			}else{
				// Devuelve 0. Password incorrecto
				echo 	str_repeat('<br>', 2)
						."<h1 style='color:white; background-color: red; display:inline;'>
							INCORRECTO, no te conozco!!!
						</h1>";
			} //FIN control paswords
		} // FIN control boton verificar

		// Condicion pulsacion boton opciones especiales
		if(isset($_POST["opc_especiales"])){
			echo "HOLA!!!!!!!!!!";
			header("Location: formulario/formulario.php");
		} // FIN control boton opciones especiales

	?>

</body>
</html>
