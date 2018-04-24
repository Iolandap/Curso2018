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
				 			$dir_txt = "txt/libros/";
				 			$dir_img = "img/libros/";
				 		break;
				 	case 2:
				 			$dir_txt = "txt/peliculas/";
				 			$dir_img = "img/peliculas/";
				 		break;
				 	case 3:
				 			$dir_txt = "txt/series/";
				 			$dir_img = "img/series/";
				 		break;
				} // FIN switch
				$files1 = scandir($dir_txt);
		?>
        		<ul>
        <?php
        			// carga nombres ficheros
					foreach($files1 as $clave=>$valor){
						// Condicion para sacar blancos y puntos
						if($valor !=" " && $valor !="." && $valor !=".."){

							// Impresion nombre ficheros
		                    print(	"<br><br><li><h4><u>
		                    			$valor
		                    		</u></h4></li>");

		                    // Impresion imagen
		                    // Extraemos la extension del fichero
	                        $fichero0 = explode('.',$valor); 
	                        $fichero1 = $fichero0[0]; 
		                    echo "<img src=\"$dir_img$fichero1.jpg\">";

		                    // Impresion contenido fichero .TXT
		                    // Pasamos el fichero a array
							$lines = file($dir_txt.$valor);
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