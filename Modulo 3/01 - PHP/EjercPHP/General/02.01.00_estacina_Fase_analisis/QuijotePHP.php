<?php

	$dir    = '.';	

	// Cargamos los ficheros del directorio en una matriz
		// '.'  en el directorio donde estoy
		// '..' en el directorio anterior
	$files1 = scandir($dir);

	// Bucle para buscar los ficheros .TXT
	foreach($files1 as $clave=>$valor){

		// Condicion para sacar blancos y puntos
		if($valor !=" " && $valor !="." && $valor !=".."){
			echo "<br>$valor<br>";		// Impresion de los ficheros del directorio

			// Condicion .TXT buscando los ultimos 4 digitos de todos los ficheros del directorio
			if(substr($valor,-4) ==".txt"){

				// Si es OK. Abre el fichero .TXT y lo guarda en una matriz
				$lines = file("$valor");

				// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
				foreach($lines as $line){
					echo ($line.'<br>');	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
				}

			} // FIN condicion .TXT
		} // FIN Condicion para sacar blancos y puntos
	} // FIN bucle para buscar ficheros .TXT


?> 