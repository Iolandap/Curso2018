<div id="container">
	<!-- Carga el fichero que viene de JS y iniciado desde el "onclick"-->
	<?php 

		// Definiciones iniciales
		$pagina 	= "";

		if ( isset($_SESSION["usuario"])){
             echo "Buenos dias usuario ".$_SESSION["usuario"];
		}

		// Condicional segun pulsacion menu
		if(isset($_GET["pagina"])){
			 // Definiciones iniciales
			 $num_pag 		= $_GET["pagina"];
			 // Definicion directorio segun seleccion menu
			switch ($num_pag) {
			 	case 1:
			 		break;
			 	case 2:
			 			include("Insertar.php");
			 		break;
			 	case 3:
			 			include ("Edit_elim.php");
			 		break;
			 	case 4:
			 		break;
			 	case 5:
			 		break;
			} // FIN switch
		} // FIN if(isset($_GET["pagina"]
	?>
</div>