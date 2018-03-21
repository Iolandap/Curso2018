
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="iconshock-tiny-bugs-ladybug.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="css/ejercicio.css" title="style">
	<script src="js/codigo.js"></script>
	<title>Estacina</title>
</head>
	 
	<body>

		<?php

			// Defincion variables y arrays iniciales

				$mesActual  = 	date ('n');		// Almacena el numero del mes actual
				$estacion	=	"";

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

			// Llamada pagina estacion
				echo('<link rel="stylesheet" href="css/'.$estacion.'.css" title="style">');
				include("php/".$estacion.".php");

		?>

	</body>
</html>
