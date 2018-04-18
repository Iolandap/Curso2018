
<!-- El fichero codigo1.js llama a este fichero y recibe una variable para saber que file.txt ha de abrir -->
<style>
/*	body {background-image: url("img/primavera.jpg")};*/
	/* Container holding the image and the text */
	.containerp {
	    position: relative;
	    text-align: center;
	    color: green;
	    background-color: red;

	}
	/* Top left text */
	.top-left {
	    position: absolute;
	    top: 8px;
	    left: 16px;
	}
	/* Centered text */
	.centered {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	}
</style>

<div class="containerp">

	<img src="img/primavera.jpg" alt="primavera">

	<div class="top-left">	
		<p>Hola, estamos en primavera <?= $_POST['nomArxiu'];?></p>
	</div>

	<div class="centered">
		<!-- apertura del file.txt recibido desde JS -->
		<?php 
			$link = "../txt/primavera/".$_POST['nomArxiu'];
			$lines = file( $link);

			// Bucle para mostrar el contenido de la matriz que forma el fichero .TXT
			foreach($lines as $line){
				echo ($line.'<br>');	// <BR> en este caso hace el salto de linea, tal como esta en el TXT
			}
		?>
	</div>

</div>