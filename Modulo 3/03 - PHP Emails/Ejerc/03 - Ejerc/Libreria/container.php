<head>
	<link href="css/container.css" rel="stylesheet" type="text/css" media="screen" />
</head> 
<div id="container">
	<!-- Carga el fichero que viene de JS y iniciado desde el "onclick"-->
	<?php 
		// Definiciones iniciales
		$selec 	= "";
		// Condicional segun pulsacion menu
		if(isset($_GET["selec"])){
			 // Definiciones iniciales
			 $num_pag 		= $_GET["selec"];
			 // Definicion directorio segun seleccion menu
			switch ($num_pag) {
			 	case 1:
			 			include($libreria."/Listar.php");
			 		break;
			 	// Crear
			 	case 2: 
			 			include($libreria."/alta_noticia.php");
			 		break;
			 	// Modificar
			 	case 3: 
			 			include($libreria."/Listar_edit.php");
			 		break;
			 	// Eliminar
			 	case 4:
			 			include($libreria."/Listar.php");
			 		break;
			 	case 5:
			 			include($libreria."/Listar.php");
			 		break;
			} // FIN switch
		} // FIN if(isset($_GET["selec"]
	?>
</div>