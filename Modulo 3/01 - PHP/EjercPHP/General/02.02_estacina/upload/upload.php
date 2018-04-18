<!DOCTYPE html>
<html>
<head>

	<?php 
		require("funciones/control.php");  // incluimos un fichero php con funciones
	?>
   	<link rel="stylesheet" type="text/css" href="css/ejercicio.css" title="style">
</head>
<body>
	<?php

		// Definiciones iniciales
		$producto 	= "";
		$descripcion= "";
		$precio 	= "";
		$imagen 	= "";
		$fecha 		= "";
		$res 		= array(false,false,false);
		$load_error	= "";
		$estacion 	= $_GET["estacion"];
		
		// Control pulsacion boton "ok"
		if(isset($_POST["ok"])){
			// Carga valores introducidos en PHP
			$producto 	= $_POST["producto"];
			$descripcion= $_POST["descripcion"];
			$precio 	= $_POST["precio"];
			$fecha 		= $_POST["fecha"];

			// Llamada funcion validacion campos
			$res = validacion($producto, $precio);

			// Carga ficheros
			if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
				// Si se ha subido un fichero....

				// Definiciones generales
				$nombreDirectorio	= "../txt/".$estacion."/";
				$idUnico			= time();
				$nombreFichero		= $idUnico. "-" . $_FILES['imagen']['name'];
				$nombreCompleto		= $nombreDirectorio. $nombreFichero;

				//Filtro extension ".txt"
				// strpos : Busca el caracter indicado en una cadena
				$filtro = ".txt";
				$ficheroCargado = $_FILES['imagen']['name'];

				// Condicional segun extension del fichero subido
				if (strpos($ficheroCargado, $filtro)) {
					// SI hay extension .txt
					move_uploaded_file(
						$_FILES['imagen']['tmp_name'],
						$nombreCompleto);
					
					echo "	<h4 style='color:white; background-color: green; display:inline;'>
								Fichero cargado correctamente
							</h4>";

				}else{
					// NO hay extension .txt
					$load_error = "<h4 style='color:white; background-color: red; display:inline;'>
									ERROR. Cargar un ficherto .txt
								</h4>";
				} // FIN if(strpos())

			// Control errores si no se carga el fichero
			}else{
				// Muestra codigo de error si se produce algun error
				switch ($_FILES['imagen']['error']) {
					case '2':
						$load_error ="<h4 style='color:white; background-color: red; display:inline;'>
									Fichero subido demasiado grande
								</h4>";
						break;
					case '3':
						$load_error ="El fichero fue sólo parcialmente subido.";
						break;	
					case '4':
						$load_error =	"<h4 style='color:white; background-color: red; display:inline;'>
									No se subió ningún fichero.
								</h4>";
						break;	
					case '6':
						$load_error = "Falta la carpeta tempora.";
						break;	
					case '7':
						$load_error =" No se pudo escribir el fichero en el disco.";
						break;	
				}; // FIN switch
			}  // FIN if(is_uploaded_file())
		} // FIN if(isset())

		// Control pulsacion "regresar"
		if(isset($_POST["regresar"])){
    		// llamada a php de carga de ficheros
			header("Location: ../index.php");

		} // FIN del if(isset())
	?>

	<!-- Formulario entrada datos -->

	<form 	id 		= "form" 
			name 	= "form" 
			method 	= "post" 
			enctype = "multipart/form-data">

		 <fieldset>
  			<legend>Alta de productos</legend>
			<h1>Formulario</h1>

			<!-- Campo producto -->
			<div>
				<label for="producto">Nombre del producto*: </label>
		  		<input 	type="text" name="producto" id="prodcuto" 
		  				value="<?php echo $producto;?>">
		  			<!-- Verificamos el valor de control para este campo y imprimimos mensaje si hay un error -->
		  			<?php 
		  				if($res[0]){
		  					echo "ERROR. has de introducir datos en el campo producto";
		  				} 
		  			?>
	  		</div>

	  		<!-- Campo descripcion -->
	  		<div>
		  		<br>
				<label for="descripcion">Descripcion: </label>
		  		<input type="text" name="descripcion" id="descripcion" 
		  				value="<?php 
		  						echo $descripcion; // para mantener los datos tras hacer el submit
		  						?>"> 
			</div>

	  		<!-- Campo precio -->
	  		<div>
		  		<br>
				<label for="precio">Precio: </label>
		  		<input type="number" name="precio" id="precio" 
		  				value="<?php 
		  						echo $precio; // para mantener los datos tras hacer el submit
		  						?>">
		  			<!-- Verificamos el valor de control para este campo y imprimimos mensaje si hay un error -->
		  			<?php 
		  				if($res[1]){
		  					echo "ERROR. El precio ha de ser superior a 18 ";
		  				} 
		  			?>
			</div>

	  		<!-- Campo imagen -->
	  		<div>
		  		<br>
		  		<label for="imagen">Imagen del producto: </label>
		  		<input type="hidden" name="max_file_size" value='1024000'>
		  		<input type="file" 	 name="imagen" size="44" id="imagen" 
		  				value="<?php echo $imagen;?>">

			</div>

	  		<!-- Campo fecha actual -->
	  		<div>
	  		<br>
		  		<label for="fecha">Fecha Actual: </label>
		  		<input type="date" name="fecha" id="fecha" 
		  				value="<?php echo $fecha;?>">
	  		</div>

	  		<!-- Envio formulario -->
	  		<br>
	  		<input type="submit" name="ok" value="Enviar">
			<!-- Impresion mensaje error en PHP -->
			<?php echo $load_error ?> 

			<!-- Regreso a menu principal -->
	  		<input type="submit" name="regresar" value="Volver">

	  	</fieldset>
	</form>

</body>
</html>
