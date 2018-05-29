
<?php

 	// Definiciones iniciales
	$variablePHP 	= "";
	$producto 		= "";

	// Condicion pulsacion Borrar
 	if(isset($_POST['Borrar'])){
 		// Podemos recuperar la variable por dos sitios diferentes
 		$id_producto 	= $_POST["id_producto"];
 		$variablePHP 	= "<script> document.write(valor) </script>";

 		echo "$id_producto ".$id_producto;
		echo "$variablePHP ".$variablePHP;

		// -----------------------------
		// 		Borrado datos
		// -----------------------------

		// NOTA: Hemos de realizar dos borrados:
		//		1 - Fichero .IMG que esta en una carpeta
		//		2 - Fila de la base de datos
		//		3 - No reindexamos porque impplica tener la tabla vacia

		// SQL borrado base datos
		$sql = 	"DELETE FROM productos 
					WHERE id_producto = '$id_producto'";
		// SQL borrado fisica imagen en carpeta 
		$sql_img 	= "SELECT Img_Producto
						FROM productos
						WHERE id_producto = '$id_producto'";

		// BORRADO FICHERO IMG - Generamos objeto sql
		// IMPORTANTE: Se ha de generar siempre antes del borrado de la fila
		$consulta_img 	= mysqli_query($conexion, $sql_img)
					or die ("Fallo en la consulta".mysqli_error($conexion));
		// BORRADO FILA BASE DATOS - Generamos objeto sql
		mysqli_query($conexion, $sql)
					or die ("Fallo en la consulta".mysqli_error($conexion));

		// Proceso borrado fichero fisico IMG
			// Cargamos data en array fila
			$fila 		= mysqli_fetch_assoc($consulta_img);
			// Definiciones generales - borrado fisica imagen en carpeta 
			$nombreDirectorio	= "img/";
			// Borrado fichero img
			unlink($nombreDirectorio.$fila['Img_Producto']);

		// Proceso de borrado de la tabla
		// 	OJO: Hace un reset del ID pero borra todos los campos. Si quiero hacer un Re-index la tabla tendria de estar vacia. Por lo que no es operativo
		// Dejo las instrucciones comentadas como informacion

		//		$result = mysqli_query($conexion,'TRUNCATE TABLE productos');
		//			if ($result) {
		//			   	echo "Request ID table has been truncated";  
		//			}
		//			else echo "Something went wrong: " . mysqli_error();

		// Cierre base de datos.
		// NO SE HACE CERRAR
		// Porque si lo hacemos cerramos la conexion y nos afectaria la consulta siguiente que la necesuta abierta

		//			mysqli_close($conexion);

		// -----------------------------
		// 		FIN borrado datos
		// -----------------------------

		echo "BORRADO!!!!";
		// Regresamos a la URL inicial dentro de la pagina tres "edit_elim"
		header("location: index.php?pagina=3#");
	}
	else{
?>
		<!-- Modal emergente Confirmar Borrado que se activa si no se ha pulsado el boton de borrar-->
		<div class="modal fade" id="borrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-body">
						<form method="post"> <!-- OJO usar un solo 'from' si ponemos dos se lia -->
							<!-- Lo marcamos como type="hiddeen" para que no se va el valor del id_producto -->
				      		<input 
				      			type = "text" 
				      			name = "id_producto" 
				      			id 	 = "id_producto">
				      			Vamos a proceder a borrar el registro seleccionado !!!!
				      		
				      		<div class="modal-footer">
					        	<button type ="button" class="btn btn-secondary" data-dismiss="modal">Anular</button>
					        	<button type ="submit" 
					        			class="btn btn-primary" 
					        			name ="Borrar" 
					        			value ="Borrar" 
					        			onclick = "mostrar()" >	
					        			<!-- No hace falta hacer el onclick() porque ya recojo el data con el POST. lo dejo como muestra de -->
					        			Borrar
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
<script>

	// No hace falta el onclick() ni esta funcion, lo he dejado como muestra de
	function mostrar(){
		var valor = document.getElementById("id_producto").value;
		alert(valor);
	}

</script>