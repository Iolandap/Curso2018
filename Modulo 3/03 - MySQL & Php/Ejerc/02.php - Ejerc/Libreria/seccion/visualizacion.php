<ul>
    <?php

    	$files1 = scandir($dir_txt);
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

                    // Imprimimos imagen siempre que no sea la pagina 1 (Experiencias)
                    if($num_pag != 1){
                    	echo "<img src=\"$dir_img$fichero1.jpg\">";
                    }

                // Impresion contenido fichero .TXT
                // Pasamos el fichero a array
				$lines = file($dir_txt.$valor);
					// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
					foreach($lines as $line){
						echo ($line);	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
					} // FIN impresion contenido fichero

            } // FIN Condicion para sacar blancos y puntos
		} // FIN bucle para buscar ficheros .TXT
	?>
</ul>
