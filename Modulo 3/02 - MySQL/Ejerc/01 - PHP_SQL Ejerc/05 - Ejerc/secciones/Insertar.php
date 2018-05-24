<head>
	<?php 
		// Conexion servidor y conexion base de datos
        include("config.php");
	?>
   	<link rel="stylesheet" type="text/css" href="css/insertar.css" title="style">
</head>

<?php

	// Definiciones iniciales
	$producto 	= "";
	$descripcion= "";
	$precio 	= "";
	$imagen 	= "";
	$fecha 		= "";
	$res 		= array(false,false,false);

	// ----------------------------------------
	// 		Condicion pulsacion boton ok
	// ----------------------------------------
	if(isset($_POST["ok"])){
		// Carga valores introducidos en PHP
		$producto 	= $_POST["producto"];
		$descripcion= $_POST["descripcion"];
		$precio 	= $_POST["precio"];
		$fecha 		= $_POST["fecha"];

		// Llamada funcion validacion campos
		$res = validacion($producto, $precio);

		// Carga fichero IMG y Grabacion en SQL
		if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
			// Si se ha subido un fichero....

			// Definiciones generales
			$nombreDirectorio	= "img/";
			$idUnico			= time();
			$nombreFichero		= $idUnico. "-" . $_FILES['imagen']['name'];
			$nombreCompleto		= $nombreDirectorio. $nombreFichero;

			//	Grabacion fichero IMG en el ordenador
			move_uploaded_file(
				$_FILES['imagen']['tmp_name'],
				$nombreCompleto);

			// --------------------------------------
			// 		Grabacion de los datos en SQL
			// --------------------------------------
				// SQL insertar campos
				$sql = 	"INSERT INTO `productos`
								(`Id_producto`, 
								`Nombre`, 
								`Descripcion`, 
								`Precio`, 
								`Img_Producto`, 
								`Fecha`) 
							VALUES 
								(NULL,
								'$producto',
								'$descripcion',
								'$precio',
								'$nombreFichero',
								'$fecha')
						";

				// Generamos objeto sql
				mysqli_query($conexion, $sql)
							or die ("Fallo en la consulta".mysql_error($conexion));
				// Cierre base de datos.
				mysqli_close($conexion);
			// -----------------------------
			// 		FIN grabacion datos
			// -----------------------------

		}else{
			// Muestra codigo de error si se produce alguno

			print("No se ha podido subir el fichero\n");
			echo "ERROR Numero --> ".$_FILES['imagen']['error'];

		}  // FIN del if(is_uploaded_file())
	} // FIN del if(isset())

	// ----------------------------------------
	// 		Condicion pulsacion boton salida
	// ----------------------------------------
	if(isset($_POST["out"])){
		unset( $_SESSION['usuario']);
		header("Location: index.php");
	} // FIN del if(isset())

?>

<!-- Formulario entrada datos -->

<form 	id 		= "form" 
		name 	= "form" 
		method 	= "post" 
		enctype = "multipart/form-data">

	 <fieldset>
			<legend>Alta de productos</legend>

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
  		<input type="submit" name="ok" value="ok">

  		<!-- Salida formulario -->
  		<input type="submit" name="out" value="salida"><br><br>

  	</fieldset>
</form>