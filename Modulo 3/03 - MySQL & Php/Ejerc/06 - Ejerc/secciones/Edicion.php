<?php
	// Condicion pulsacion Borrar
 	if(isset($_POST['Editar'])){
		// Carga valores introducidos en PHP
		$id_producto 		= $_POST["id_producto-edit"];
		$producto 			= $_POST["nombre-edit"];
		$descripcion 		= $_POST["descripcion-edit"];
		$precio 			= $_POST["precio-edit"];
		$fecha 				= $_POST["fecha-edit"];

		// Condicional para verficar si hemos subido una nueva IMG
		if (is_uploaded_file($_FILES['new_img']['tmp_name'])){

			// Si se ha subido un fichero IMG....
			// Definiciones nombres ficheros IMG a usar (Nuevo y antiguo)
			$old_img 	= $_POST["Img_Producto-edit"];
			$new_img	= $_FILES['new_img']['name'];

			// Definiciones generales
			$nombreDirectorio	= "img/";
			$idUnico			= time();
			$nombreFichero_new	= $idUnico. "-" . $_FILES['new_img']['name'];
			$nombreCompleto		= $nombreDirectorio. $nombreFichero_new;

			//	Grabacion nuevo fichero IMG en el ordenador
			move_uploaded_file(
				$_FILES['new_img']['tmp_name'],
				$nombreCompleto);

			// --------------------------------------
			// 		Update de los datos en SQL, incluida foto
			// --------------------------------------
				// SQL update campos, incluido el nuevo nombre de la foto
				$sql = 	"UPDATE `productos`
							SET
 								`Nombre`		= '$producto', 
								`Descripcion`	= '$descripcion', 
								`Precio`		= '$precio', 
								`Img_Producto`	= '$nombreFichero_new', 
								`Fecha`			= '$fecha' 
							WHERE
								`id_producto` 	= '$id_producto '
						";

				// Generamos objeto sql
				mysqli_query($conexion, $sql)
							or die ("Fallo en la consulta".mysqli_error($conexion));
			// -----------------------------
			// 		FIN update datos
			// -----------------------------

			// Borrado fichero imagen antiguo
			unlink($nombreDirectorio.$old_img);

		}else{
			// NO se ha subido un fichero IMG....

			// --------------------------------------
			// 		Update de los datos en SQL, sin foto actualizada
			// --------------------------------------
				// SQL update campos menos el de la foto que se mantiene
				$sql = 	"UPDATE `productos`
							SET
 								`Nombre`		= '$producto', 
								`Descripcion`	= '$descripcion', 
								`Precio`		= '$precio', 
								`Fecha`			= '$fecha' 
							WHERE
								`id_producto` 	= '$id_producto '
						";

				// Generamos objeto sql
				mysqli_query($conexion, $sql)
							or die ("Fallo en la consulta".mysqli_error($conexion));
			// -----------------------------
			// 		FIN update datos
			// -----------------------------	

		} // FIN if(is_uploaded())

		// Regresamos a la URL inicial dentro de la pagina tres "edit_elim"
		header("location: index.php?pagina=3");
	
	}else{
?>
		<!-- Modal emergente Confirmar Borrado que se activa si no se ha pulsado el boton de borrar-->
		<div class="modal fade" id="edicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
					<form 	method="post"
							enctype = "multipart/form-data">
			      		<div class="modal-body">
				      		<input 
				      			type = "hidden" 
				      			name = "id_producto-edit" 
				      			id 	 = "id_producto-edit">
					  		<div>
						  		<br>
								<label for="nombre-edit">nombre</label>
						  		<input type="text" name="nombre-edit" id="nombre-edit"> 
							</div>
					  		<div>
						  		<br>
								<label for="nombre-edit">Descripcion </label>
						  		<input type="text" name="descripcion-edit" id="descripcion-edit"> 
							</div>
							<div>
						  		<br>
								<label for="nombre-edit">Precio </label>
						  		<input type="text" name="precio-edit" id="precio-edit"> 
							</div>
							<div>
						  		<br>
								<label for="imagen">Imagen del producto: </label>
								<img id="dummyimage" src=""	width="100" height="80">
								<!-- Nombre imagen original -->
						  		<input type="hidden" name="Img_Producto-edit" id="Img_Producto-edit"> 
						  		<!-- Nuevo nombre de imagen -->
						  		<input type="hidden" name="max_file_size" value='1024000'>
						  		<input type="file" 	 name="new_img" size="44" id="new_img" >
							</div>
							<div>
						  		<br>
								<label for="nombre-edit">fecha </label>
						  		<input type="text" name="fecha-edit" id="fecha-edit"> 
							</div>

			      		</div>
			      		<div class="modal-footer">
				        	<button type ="button" class="btn btn-secondary" data-dismiss="modal">Anular</button>
				        	<button type ="submit" 
				        			class="btn btn-primary" 
				        			name ="Editar" 
				        			value="Editar">
				        			Modificar
				        	</button>
			        	</div>
			    	</form>
		    	</div>
		  	</div>
		</div> <!-- FIN Modal Confirmar Borrado -->
<?php
	} // FIN if(isset())
?>