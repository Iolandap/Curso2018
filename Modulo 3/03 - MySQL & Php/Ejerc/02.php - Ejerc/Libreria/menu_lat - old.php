<head>
<link href="css/menu_lat.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<div id="Menu">
    <div id="menucontainer">
	   	<?php
    		$dir    = "txt/";
    		$files1 = scandir($dir);
        ?>
        <ul>
        <?php
			foreach($files1 as $clave=>$valor){

			// Bucle para buscar los ficheros .TXT
				// Condicion para sacar blancos y puntos
				if($valor !=" " && $valor !="." && $valor !=".."){

					// Condicion .TXT buscando los ultimos 4 digitos de todos los ficheros del directorio
					if(substr($valor,-4) ==".txt"){
                        // Extraemos la extension del fichero
                        $file = explode('.',$valor); 
                        $file = $file[0]; 
                        // Impresion lista ficheros
                        print(
                        	"<li>
                                <br>
                        		<a 	class=\"enlace\" 
                        			href=\"#\"
                        			// Llamada a funcion en JS (en fichero externo)para cargar la estacion y el txt
                           			onclick=\"CargarContenido('$valor');\">
                           			$file
                                </a>
                            </li>"
                        );
					} // FIN condicion .TXT
				} // FIN Condicion para sacar blancos y puntos
			} // FIN bucle para buscar ficheros .TXT
    	?>
        </ul>
    </div>
</div>