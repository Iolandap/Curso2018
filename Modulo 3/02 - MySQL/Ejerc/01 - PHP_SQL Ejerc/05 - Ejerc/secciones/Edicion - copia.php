<?php
	// Definiciones iniciales
	$producto 	= "";
	$descripcion= "";
	$precio 	= "";
	$imagen 	= "";
	$fecha 		= "";
	$res 		= array(false,false,false);

	$variablePHP 	= "";
	$producto 		= "";

	// SQLa mostrar
	$sql = 	"SELECT * 
				FROM productos";
						
	// Condicion pulsacion Borrar
 	if(isset($_POST['Confirmar'])){
 		// Recuperamos la variable del POST
 		$id_producto 	= $_POST["id_producto"];

 		echo $id_producto;
 		echo "HOLA !!!!!...";

		// header("location: index.php?pagina=3#");
	}
	else{

?>
		<!-- Modal emergente Edicion que se activa si no se ha pulsado el boton de borrar-->
		<div class="modal fade" id="edicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-body">
						<form method="post"> <!-- OJO usar un solo 'from' si ponemos dos se lia -->
							<!-- Lo marcamos como hiddeen para que no se va el valor del id_producto -->
				      		<input 
				      			type = "hidden" 
				      			name = "id_producto" 
				      			id 	 = "id_producto">
				      			Vamos editar !!!!



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



				      		<div class="modal-footer">
					        	<button type ="button" class="btn btn-secondary" data-dismiss="modal">Anular</button>
					        	<button type ="submit" 
					        			class="btn btn-primary" 
					        			name ="confirmar" 
					        			value ="confirmar">
					        			Confirmar
					        	</button>
				        	</div>
			        	</form>
		      		</div>
		    	</div>
		  	</div>
		</div> <!-- FIN Modal Confirmar Borrado -->

<?php
	} // FIN if(isset())
?>