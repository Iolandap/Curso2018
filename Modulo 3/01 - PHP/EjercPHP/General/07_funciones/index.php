<!DOCTYPE html>
<html>
<head>

	<?php 
		require("libreria/funciones.php");  // incluimos un fichero php con funciones
	?>

</head>
<body>

	<h1>Ejercicio libreria funciones PHP</h1>

	<!-- Formulario entrada datos -->
	<form method="post">
		<!-- Entrada String -->
		<label for="str_0">Introducir cadena a utilizar: </label>
  		<input type="text" name="str_0" id="str_0"><br>

  		<!-- Puntos cartesianos -->
		<label for="punt_x1">Punto carterisano X 1:</label>
  		<input type="number" name="punt_x1" id="punt_x1"><br>
  		<label for="punt_y1">Punto carterisano Y 1:</label>
  		<input type="number" name="punt_y1" id="punt_y1"><br>

		<label for="punt_x2">Punto carterisano X 2:</label>
  		<input type="number" name="punt_x2" id="punt_x2"><br>
  		<label for="punt_y2">Punto carterisano Y 2:</label>
  		<input type="number" name="punt_y2" id="punt_y2"><br>

  		<!-- Entrada Array Numeros -->
		<label for="num_0">Introducir lista numeros a sumar: </label>
  		<input type="number" name="num_0" id="num_0"><br>

  		<!-- Entrada Idioma conversion "Hola Mundo" -->
		<label for="str_1">Idioma a traducir "Hola Mundo":</label>
  		<input type="radio" name="idioma" value="cat" checked="checked"> Catalan
  		<input type="radio" name="idioma" value="esp"> Español
  		<input type="radio" name="idioma" value="eng"> Ingles<br>

  		  <!-- Entrada numero para saber si es par o impar -->
		<label for="num_1">Introducir numero par o impar: </label>
  		<input type="number" name="num_1" id="num_1"><br>

  		<!-- Entrada fichero con extension -->
		<label for="str_1">Introducir fichero con extension: </label>
  		<input type="text" name="str_1" id="str_1"><br>

  		<!-- Submit -->
  		<br><br>
  		<input type="submit" name="calcular" value="calcular">

	</form>

	<?php 

		// Definiciones iniciales
		if(isset($_POST["calcular"])){
			$str_0	= $_POST["str_0"];
			$x1 	= $_POST["punt_x1"];
			$y1 	= $_POST["punt_y1"];
			$x2 	= $_POST["punt_x2"];
			$y2 	= $_POST["punt_y2"];
			$num_0	= $_POST["num_0"];
			$idioma = $_POST['idioma'];
			$par_impar = $_POST["num_1"];
			$str_1	= $_POST["str_1"];

			// Llamada a funcion tag <p>
				echo str_repeat('<br>', 2)."Resultado funcion tag P --> ".tag_p($str_0);

			// Llamada a funcion tag <h1>
				echo str_repeat('<br>', 2)."Resultado funcion tag H1 --> ".tag_h1($str_0);

			// Llamada a funcion tag <p> y HREF
				echo str_repeat('<br>', 2)."Resultado funcion tag P y HREF --> ".tag_p_href($str_0);

			// Llamada a funcion Estacion
				echo str_repeat('<br>', 2)."Resultado estacion actual segun dia --> ".estacion();

			// Llamada a funcion Estacion
				echo 	str_repeat('<br>', 2)	
						."Resultado distancia puntos carterisanos ("
						.$x1.",".$y1.")-(".$x2.",".$y2.")--> "
						.dist_punt_cartesiano($x1,$y1,$x2,$y2);

			// Llamada a funcion array suma
				echo 	str_repeat('<br>', 2)
						."Resultado sumar lista numeros ". $num_0." --> "
						.array_suma($num_0);

			// Llamada a funcion idioma "Hola Mundo"
				echo 	str_repeat('<br>', 2)
						."Idioma selecionado:".'<b>'.$idioma.'</b>'
						." para traducir \"Hola mundo\" --> "
						.traductor($idioma);

			// Llamada a funcion Estacion
				echo 	str_repeat('<br>', 2)
						."El numero introducido ".'<b>'.$par_impar.'</b>'." es --> "
						.par_impar($par_impar);

			// Llamada a funcion extension fichero
				echo 	str_repeat('<br>', 2)."Fichero ".'<b>'.$str_1.'</b>'." del tipo ".'<b>'
						.extension($str_1).'</b>';
		}

	?>

</body>
</html>
