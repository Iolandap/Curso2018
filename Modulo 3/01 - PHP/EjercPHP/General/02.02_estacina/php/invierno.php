
<!DOCTYPE html>
<head>
    <!-- Fichero externo CSS -->
    <link rel="stylesheet" href="css/invierno.css" title="style">

</head>
<div class="invierno">

	<div id="menu">
		<img src="img/invierno.jpg" alt="Invierno">
	</div>

		<?php


			$v1 = $_GET ['valor'];
			$dir = "../txt/".$v1;
				$lines = file($dir);

			// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
			foreach($lines as $line){
				echo ($line.'<br>');	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
			}
		?> 

</div>

