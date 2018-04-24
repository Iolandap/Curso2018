<head>
	<link href="css/container.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<div id="container">
    <div id="Contenido">
		<!-- Carga el fichero que viene de JS y iniciado desde el "onclick"-->
		<?php 

			// Definiciones iniciales
			$selec 	= "";

			if(isset($_GET["selec"])){
				 // Definiciones iniciales
				 $num_pag 		= $_GET["selec"];
				 // Definicion directorio segun seleccion menu
				switch ($num_pag) {
				 	case 1:
				 			$dir = "txt/libros/";
				 		break;
				 	case 2:
				 			$dir = "txt/peliculas/";
				 		break;
				 	case 3:
				 			$dir = "txt/series/";
				 		break;
				} // FIN switch
				$files1 = scandir($dir);
		?>
        		<ul>
        <?php
        			// carga nombres ficheros
					foreach($files1 as $clave=>$valor){
						// Condicion para sacar blancos y puntos
						if($valor !=" " && $valor !="." && $valor !=".."){
							// Impresion nombre ficheros
		                    print(	"<br><li><h4><u>
		                    			$valor
		                    		</u></h4></li><br><br>");

		                    // Pasamos el fichero a array
							$lines = file($dir.$valor);
								// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
								foreach($lines as $line){
									echo ($line.'<br>');	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
								} // FIN impresion contenido fichero

		                } // FIN Condicion para sacar blancos y puntos
					} // FIN bucle para buscar ficheros .TXT
   		?>
        		</ul>
 		<?php
 		
			} // FIN if(isset($_GET["selec"]
		?>
    </div>
</div>