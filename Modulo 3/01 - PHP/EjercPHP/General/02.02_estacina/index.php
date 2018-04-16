
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <!-- FAVICON -->
    <link rel="icon" href="img/PC_box_favi.ico" type="image/x-icon"/>

    <!-- CSS de libreriaBxSlider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Iconos Fontqwesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Llamada a libreriaBxSlider -->
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <!-- Fichero externo CSS -->
    <link rel="stylesheet" href="css/index.css" title="style">

    <!-- Fichero externo JS -->
    <script src="js/codigo1.js"></script>

	<title>Estacina</title>
	<?php 
		require("libreria/funciones.php");  // incluimos un fichero php con funciones
	?>
</head>
	 
	<body>

		<!-- Log in -->
			<!-- Form input -->
			<form action="" method="post" id="frmLogin">
					<label for="login">Username</label>
					<input name="user_name" type="text" id="user_name" >
					<label for="password">Password</label>
					<input name="password" type="password" id="password">

					<input type="submit" name="login" value="Login"></span>
			</form>

			<!-- password control -->
			<?php 

				// Definiciones iniciales
				if(isset($_POST["login"])){
					$str_0	= $_POST["password"];

					// Llamada a funcion control password
					if(ctr_pasword($str_0) == 1){
						// Devuelve 1 es OK la password
			    		// llamada a php de carga de ficheros
						header('Location: http:upload/upload.php');
					}else{
						// Devuelve 0
						echo 	"<p style='color:white; background-color: red; display:inline;'>
									INCORRECTO, no cuadra con el codigo almacenado
								</p>";
					}

				}

			?>

		<!-- Cabecera -->
		<h1> ESTACINA - Recetas de Temporada</h1>

        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Recetas</h4>
                    <ul class="menu">

                    	<!-- Carga menu lateral solo con ficheros .TXT -->
                    	<?php

                    		// Definicion variables y arrays iniciales
                    			$mesActual  = 	date ('n');		// Almacena el numero del mes actual
								$estacion;

								// Arrays con los meses de cada estacion
								$invierno	=	["1","2","3"];
								$primavera	=	["4","5","6"];
								$verano		=	["7","8","9"];
								$otono		=	["10","11","12"];

							// Condicional para encontrar la estacion
								if (in_array($mesActual, $invierno)){
									$estacion = "invierno";

								}elseif (in_array($mesActual, $primavera)){
									$estacion = "primavera";

								}elseif (in_array($mesActual, $verano)){
									$estacion = "verano";

								}elseif (in_array($mesActual, $otonyo)){
									$estacion = "otono";
								}

                    		$dir    = "txt/$estacion";
                    		$files1 = scandir($dir);

                			foreach($files1 as $clave=>$valor){

							// Bucle para buscar los ficheros .TXT
								// Condicion para sacar blancos y puntos
								if($valor !=" " && $valor !="." && $valor !=".."){

									// Condicion .TXT buscando los ultimos 4 digitos de todos los ficheros del directorio
									if(substr($valor,-4) ==".txt"){

                                        print(
                                        	"<li>
                                        		<a 	class=\"enlace\" 
                                        			href=\"#\"
                                        			// Llamada a funcion en JS (en fichero externo)para cargar la estacion y el txt
		                                   			onclick=\"CargarContenido('$valor ','$estacion');\">
		                                   			$valor
		                                        </a>
		                                    </li>"
		                                );

									} // FIN condicion .TXT
								} // FIN Condicion para sacar blancos y puntos
							} // FIN bucle para buscar ficheros .TXT

                    	?>


                    </ul>
                </div>

                <div class="col-sm-10">

						<?php
								echo('<h3>Recetas para '.$estacion.'</h3>');
						?>

					<!-- Carga el fichero que viene de JS y iniciado desde el "onclick"-->
					<div id="contenido"> </div>
					
                </div>
            </div>
        </div>

	    <footer>
	        <div class="container">
	            <div class="row">
	                <div class="col-sm">
	                    <p>&#169;2018 Yo mismo</p> 
	                </div>
	            </div>
	            <p>Este sitio web puede utilizar algunas <em>'cookies'</em> para mejorar su experiencia de navegación. Por favor, antes de continuar con su navegación por nuestro sitio web, le recomendamos que lea la 
	                <a href="#" style="color:orange" data-toggle="modal" data-target="#politica_cookies">
	                    política de cookies
	                </a>
	            </p>
	        </div>
		</footer>

	</body>
</html>
