<!DOCTYPE html>
<html>
<head>

	<?php 
		require("funciones/control.php");  // incluimos un fichero php con funciones
	?>
   	<link rel="stylesheet" type="text/css" href="css/ejercicio.css" title="style">
</head>
<body>

	<?php

		echo '<h2>'.$array_pagina[0].'</h2>';
		
	?>

	<ul>
	  <li><a href="index.php?pagina=1">	Home</a></li>
	  <li><a href="index.php?pagina=2">	Noticias</a></li>
	  <li><a href="index.php?pagina=3">	Contacto</a></li>
	  <li><a href="index.php?pagina=4">	Sobre nosotros</a></li>
	</ul>

	<?php

		echo '<p>'.$array_pagina[1].'</p>';
		
	?>

</body>
</html>
