<!DOCTYPE html>
<html>
<head>

	<?php 
		require("funciones/calculadora.php");  // incluimos un fichero php con funciones
	?>

</head>
<body>

	<h1>Calculadora</h1>

	<!-- Formulario entrada datos -->
	<form method="post">
		<label for="num_1">Primer Numero: </label>
  		<input type="number" name="num_1" id="num_1"><br>
		<label for="num_2">Segundo Numero: </label>
  		<input type="number" name="num_2" id="num_2"><br><br>

  		<input type="submit" name="oper" value="suma">
  		<input type="submit" name="oper" value="resta">
  		<input type="submit" name="oper" value="multiplicacion">
  		<input type="submit" name="oper" value="division"><br><br>
	</form>

	<?php 

		// Definiciones iniciales
			if(isset($_POST["oper"])){
				$num_1=$_POST["num_1"];
				$num_2=$_POST["num_2"];
				$operacion=$_POST["oper"];

			// Llamada a funcion e impresion resultado
				$c=calculadora($operacion,$num_1, $num_2);
				print $operacion." -->  ".$c;
			}
	?>

</body>
</html>
