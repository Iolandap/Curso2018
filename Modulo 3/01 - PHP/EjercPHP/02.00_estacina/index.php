
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="iconshock-tiny-bugs-ladybug.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/index.css" title="style">
	<script src="js/codigo.js"></script>
	<title>Estacina</title>
</head>
	 
	<body>

		<h1> Pagina principal</h1>

		<?php

			// Defincion variables y arrays iniciales

				$mesActual  = 	date ('n');		// Almacena el numero del mes actual
				$estacion;

				// Arrays con los meses de cada estacion
				$invierno	=	["1","2","3"];
				$primavera	=	["4","5","6"];
				$verano		=	["7","8","9"];
				$otono		=	["10","11","12"];

			// Condicional para encontrar la estacion
				if (in_array($mesActual, $invierno)){
					$estacion = "invierno";

				}elseif (in_array($mesActual, $primavera)){
					$estacion = "primavera";

				}elseif (in_array($mesActual, $verano)){
					$estacion = "verano";

				}elseif (in_array($mesActual, $otonyo)){
					$estacion = "otono";
				}

				echo('<h3>Estamos en '.$estacion.'<h3>');

			// Llamada pagina estacion
				echo('<link rel="stylesheet" href="css/'.$estacion.'.css" title="style">');
				require("php/".$estacion.".php");

		?>

		<h3>Continuamos en la pagina principal</h3>

	</body>
</html>
