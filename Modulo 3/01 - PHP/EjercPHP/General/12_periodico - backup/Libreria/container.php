<head>
	<link href="css/container.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<div id="container">
    <div id="Contenido1">
           <p>contenido1</p>

   			<!-- Carga el fichero que viene de JS y iniciado desde el "onclick"-->
			<div id="contenido"> 

				<?php 

					if(isset($_POST['nomArxiu'])){

						$link = "../txt/".$_POST['nomArxiu'];
						$lines = file($link);

						// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
						foreach($lines as $line){
							echo ($line.'<br>');	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
						}

					}
				?>

			</div> 

    </div>
</div>