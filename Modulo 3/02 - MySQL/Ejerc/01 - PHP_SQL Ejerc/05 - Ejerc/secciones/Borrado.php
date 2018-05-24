
 <?php

 	// Definiciones iniciales
	$variablePHP 	= "";
	$producto 		= "";

	// Condicion pulsacion Borrar
 	if(isset($_POST['Borrar'])){
 		$producto 		= $_POST["id_producto"];
 		$variablePHP 	= "<script> document.write(valor) </script>";

 		echo "$producto ".$producto;
		echo "$variablePHP ".$variablePHP;
		// recibido el Id_Producto. ahora se puede borrar tras la confirmacion
		// ************************
		// ************************
		// ************************
		// ************************
		// ***
	}

?>
	<!-- Modal emergente LOG OUT-->
	<div class="modal fade" id="borrado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-body">
					<form method="post">
			      		<input type="text" name="id_producto" id="id_producto">
			      		<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Anular</button>
				        	<button type="submit" 
				        			class="btn btn-primary" 
				        			name="Borrar" 
				        			value="Borrar" 
				        			onclick = "mostrar()" >	
				        			<!-- No hace falta hacer en onclick() porque ya recojo el data con el POST -->
				        			Borrar
				        	</button>
			        	</div>
		        	</form>
	      		</div>
	    	</div>
	  	</div>
	</div> <!-- FIN Modal Log Out -->

<script>

	// No hace falta el onclick() ni esta funcion, lo he dejado como muestra de
	function mostrar(){
		var valor = document.getElementById("id_producto").value;
		alert(valor);
	}

</script>

