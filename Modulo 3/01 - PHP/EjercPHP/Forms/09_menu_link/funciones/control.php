<?php 

		// Definiciones iniciales
		$pagina 		= "";
		$array_pagina 	= array("Home", "estas en la pagina Home");

	if(isset($_GET["pagina"])){

		// Definiciones iniciales
		$num_pag 		= $_GET["pagina"];

		// Definicion array menu y cuerpo, segun pagina pulsada
		switch ($num_pag) {
			case 1:
					$array_pagina[0] = "Home";
					$array_pagina[1] = "estas en la pagina Home";
				break;
			case 2:
					$array_pagina[0] = "Noticias";
					$array_pagina[1] = "estas en la pagina Noticias";
				break;
			case 3:
					$array_pagina[0] = "Contactos";
					$array_pagina[1] = "estas en la pagina Contactos";
				break;
			case 4:
					$array_pagina[0] = "Sobre Nosotros";
					$array_pagina[1] = "estas en la pagina Sobre Nosotros";
				break;
		}

	} // FIN del if(isset())
?>