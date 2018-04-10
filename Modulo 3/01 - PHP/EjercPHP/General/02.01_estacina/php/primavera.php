
<!-- El fichero codigo1.js llama a este fichero y recibe una variable para saber que file.txt ha de abrir -->

	<p>Hola, estamos en primavera <?= $_POST['nomArxiu'];?></p>

	<img src="img/primavera.jpg" alt="primavera">

	<!-- apertura del file.txt recibido desde JS -->
	<?php 
		$link = "../txt/primavera/".$_POST['nomArxiu'];
		$lines = file( $link);

		// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
		foreach($lines as $line){
			echo ($line.'<br>');	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
		}
	?>