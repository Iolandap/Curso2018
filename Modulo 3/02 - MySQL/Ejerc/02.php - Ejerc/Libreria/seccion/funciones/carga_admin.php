<?php

	if (is_uploaded_file($_FILES['file_img']['tmp_name']) &&
		is_uploaded_file($_FILES['file_txt']['tmp_name'])
		){
			// Si se ha subido un fichero....

			// Definiciones generales .TXT
			$nombreDir_txt			= "txt/".$deporte."/";
			$idUnico				= time();
			$nombreFichero_txt		= $idUnico. "-" . $_FILES['file_txt']['name'];
			$nombreCompleto_txt		= $nombreDir_txt. $nombreFichero_txt;

			// Definiciones generales .IMG
			$nombreDir_img			= "img/".$deporte."/";
			$idUnico				= time();
			$nombreFichero_img		= $idUnico. "-" . $_FILES['file_img']['name'];
			$nombreCompleto_img		= $nombreDir_img. $nombreFichero_img;

			// Carga ficheros
			move_uploaded_file(
				$_FILES['file_txt']['tmp_name'],$nombreCompleto_txt);
			move_uploaded_file(
				$_FILES['file_img']['tmp_name'],$nombreCompleto_img);

	}else{
		// Muestra codigo de error si se produce alguno

		print("No se ha podido subir el fichero\n");
		echo "ERROR Numero --> ".$_FILES['imagen']['error'];

	} // FIN is_uploaded_file
?>