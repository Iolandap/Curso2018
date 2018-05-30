<?php

	if (is_uploaded_file($_FILES['file_txt']['tmp_name'])){
		// Si se ha subido un fichero....

		// Definiciones generales .TXT
		$nombreDir_txt			= "Experiencias/".$deporte."/";
		$idUnico				= time();
		$nombreFichero_txt		= $idUnico. "-" . $_FILES['file_txt']['name'];
		$nombreCompleto_txt		= $nombreDir_txt. $nombreFichero_txt;

		// Carga ficheros
		move_uploaded_file(
			$_FILES['file_txt']['tmp_name'],$nombreCompleto_txt);

	}else{
		// Muestra codigo de error si se produce alguno

		print("No se ha podido subir el fichero\n");
		echo "ERROR Numero --> ".$_FILES['imagen']['error'];

	} // FIN is_uploaded_file
?>