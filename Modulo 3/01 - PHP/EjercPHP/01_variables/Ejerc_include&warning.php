<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<title>Mi primer programa en PHP</title> 		<!-- Titulo de la pestaña en HTML -->
	</head>

	<body>

		<?php
			include("html/cabecera.html");			//Incluye un warning si falla la pagina
		?>

		<!-- Progracion HMTL -->

		<?php
			require("php/cuerpo.php");				//da un error fatal si falla la pagina
		?>

		<!-- Progracion HMTL -->

		<?php
			include("html/pie.html");				//Incluye un warning si falla la pagina
		?>

	</body>

</html>