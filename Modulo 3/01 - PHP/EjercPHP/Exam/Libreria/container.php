<head>
	<link href="css/container.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<div id="container">
    <div id="Contenido">
		<!-- Carga el fichero que viene de JS y iniciado desde el "onclick"-->
		<?php 

			// Definiciones iniciales
			$selec 	= "";

			if ( isset($_SESSION["usuario"])){
	             echo "Buenos dias usuario ".$_SESSION["usuario"];
			}

			// Condicional segun pulsacion menu
			if(isset($_GET["selec"])){
				 // Definiciones iniciales
				 $num_pag 		= $_GET["selec"];
				 // Definicion directorio segun seleccion menu
				switch ($num_pag) {
				 	case 1:
				 			include($libreria."/seccion/visualizacion_exp.php");
				 		break;
				 	case 2:
				 			$dir_txt = "txt/Montana/";
				 			$dir_img = "img/Montana/";
				 			include($libreria."/seccion/visualizacion.php");
				 		break;
				 	case 3:
				 			$dir_txt = "txt/Agua/";
				 			$dir_img = "img/Agua/";
				 			include($libreria."/seccion/visualizacion.php");
				 		break;
				 	case 4:
				 			$dir_txt = "txt/Aire/";
				 			$dir_img = "img/Aire/";
				 			include($libreria."/seccion/visualizacion.php");
				 		break;
				 	case 5:
				 			$dir_txt = "txt/Aire/";
				 			$dir_img = "img/Aire/";
				 			include($libreria."/seccion/upload.php");
				 		break;
				} // FIN switch
			} // FIN if(isset($_GET["selec"]
		?>
    </div>
</div>