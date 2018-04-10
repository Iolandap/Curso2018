<!DOCTYPE html>
<html>
<head>

	<?php 
		require("funciones/calculadora.php");  // incluimos un fichero php con funciones
	?>

</head>
<body>
	<?php

			$num_1 ="";
			$num_2 ="";

		// Definiciones iniciales
			if(isset($_POST["oper"])){

				$num_1=$_POST["num_1"];
				$num_2=$_POST["num_2"];

				$operacion=$_POST["oper"];

				// Verificamos que tipo de operacion hacemos (variable o array)
				if(is_array($operacion)){
					// Si tenemos una array (caso del CHECKBOX) corremos bucle para la funcion
					foreach ($operacion as $key => $value) {
						$c=calculadora($value,$num_1, $num_2);
	?>

						<input 	type="text" 
								name="resultado" 
								value="<?php echo $value."--> ".$c; ?>" 
								readonly/>  <!-- Casilla solo para lectura -->

	<?php
					} // FIN del Foreach

				}else{
					// Si es una variable normal, corremos la funcion
					$c=calculadora($operacion,$num_1, $num_2);
					//print $operacion." -->  ".$c;
	?>
					<input 	type="text" 
							name="resultado" 
							value="<?php echo $operacion." -->  ".$c; ?>" 
							readonly/>	<!-- Casilla solo para lectura -->

	<?php

				} // FIN del if(is_array())
			} // FIN del if(isset())
	?>

	<!-- Formulario entrada datos -->
	<form method="post">
		<h1>Calculadora con SUBMIT</h1>
			<label for="num_1">Primer Numero: </label>
	  		<input 	type="number" name="num_1" id="num_1" 
	  				value="<?php echo $num_1;?>"><br>
			<label for="num_2">Segundo Numero: </label>
	  		<input type="number" name="num_2" id="num_2" 
	  				value="<?php echo $num_2;?>"><br><br><br>
	  		<input type="submit" name="oper" value="suma">
	  		<input type="submit" name="oper" value="resta">
	  		<input type="submit" name="oper" value="multiplicacion">
	  		<input type="submit" name="oper" value="division"><br><br>
	  	
	</form>

	<!-- Formulario entrada datos -->
	<form method="post">
		<h1>Calculadora con RADIO</h1>
			<label for="num_1">Primer Numero: </label>
	  		<input 	type="number" name="num_1" id="num_1"
	  			  	value="<?php echo $num_1;?>"><br><br>
			<label for="num_2">Segundo Numero: </label>
	  		<input type="number" name="num_2" id="num_2"
	  				value="<?php echo $num_2;?>"><br><br>
	  	

			<INPUT TYPE="radio" NAME="oper" VALUE="suma" CHECKED> +
			<INPUT TYPE="radio" NAME="oper" value="resta"> -
			<INPUT TYPE="radio" NAME="oper" value="multiplicacion"> *
			<INPUT TYPE="radio" NAME="oper" value="division"> / 
			<input type="submit" name="enviar_radio" value="enviar"><br><br>
	</form>

	<!-- Formulario entrada datos -->
	<form method="post">
		<h1>Calculadora con CHECKBOX</h1>
			<label for="num_1">Primer Numero: </label>
	  		<input 	type="number" name="num_1" id="num_1"
	  				value="<?php echo $num_1;?>"><br><br>
			<label for="num_2">Segundo Numero: </label>
	  		<input type="number" name="num_2" id="num_2"
	  				value="<?php echo $num_2;?>"><br><br>
	  	
			<INPUT TYPE="checkbox" NAME="oper[]" VALUE="suma"> +
			<INPUT TYPE="checkbox" NAME="oper[]" value="resta"> -
			<INPUT TYPE="checkbox" NAME="oper[]" value="multiplicacion"> *
			<INPUT TYPE="checkbox" NAME="oper[]" value="division"> / 
			<input type="submit" name="enviar_radio" value="enviar"><br><br>
	</form>

	<!-- Formulario entrada datos -->
	<form method="post">
		<h1>Calculadora con SELECT</h1>
			<label for="num_1">Primer Numero: </label>
	  		<input 	type="number" name="num_1" id="num_1"
	  				value="<?php echo $num_1;?>"><br><br>
			<label for="num_2">Segundo Numero: </label>
	  		<input type="number" name="num_2" id="num_2"
	  				value="<?php echo $num_2;?>"><br><br>
	  	
			<SELECT NAME="oper">
				<OPTION VALUE="suma" SELECTED>Suma</OPTION>
				<OPTION VALUE="resta">Resta </OPTION>
				<OPTION VALUE="multiplicacion">Multiplicacion</OPTION>
				<OPTION VALUE="division">Division </OPTION>
			</SELECT>
			<input type="submit" name="enviar_radio" value="enviar"><br><br>
	</form>

		<br><br> 

</body>
</html>
