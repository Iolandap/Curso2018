<?php
	// Condicion pulsacion Borrar
 	if(isset($_POST['Editar'])){
		// Carga valores introducidos en PHP
		$id_usuario 	= $_POST["id_usser_edit"];
		$usuario		= $_POST["usuario_edit"];
		$pasword_old	= $_POST["contrasenya_edit"];	// Nueva pasword
		$pasword_new	= $_POST["pasword2"];			// Nueva pasword
		$email			= $_POST["email_edit"];
		$nombre			= $_POST["nombre_edit"];

		if ($pasword_new =="") {
			$pasword_save = $pasword_old;
		}else{
			// Proteccion pasword entrada
			$pasword_save = md5(sha1($pasword_new,true)."1");
		}


			// --------------------------------------
			// 		Update de los datos en SQL, sin foto actualizada
			// --------------------------------------
				// SQL update campos menos el de la foto que se mantiene
				$sql = 	"UPDATE `usuarios`
							SET
 								`Nombre_usuario`	= '$usuario', 
								`Contrasenya`		= '$pasword_save', 
								`Correo_electronico`= '$email', 
								`Nombre_completo`	= '$nombre' 
							WHERE
								`id_usuario` 		= '$id_usuario '
						";

				// Generamos objeto sql
				mysqli_query($conexion, $sql)
							or die ("Fallo en la consulta".mysqli_error($conexion));
			// -----------------------------
			// 		FIN update datos
			// -----------------------------	



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
				      			name = "id_usser_edit" 
				      			id 	 = "id_usser_edit">
						    <div class="md-form form-sm mb-5">
                                <i class="fa fa-user prefix"></i>
                                <input type="text" id="usuario_edit" name="usuario_edit" class="form-control form-control-sm validate" readonly>
                                <label data-error="wrong" data-success="right" for="usuario_edit">Usuario</label>
                            </div>
                            <!-- Nombre completo -->
                            <div class="md-form form-sm mb-5">
                                <i class="fa fa-user prefix"></i>
                                <input type="text" id="nombre_edit" name="nombre_edit" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="nombre_edit">Nombre completo</label>
                            </div>
                            <!-- @mail -->
                            <div class="md-form mb-5">
                                <i class="fa fa-envelope prefix grey-text"></i>
                                <input type="email" id="email_edit" name="email_edit" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="email_edit">@mail</label>
                            </div>
                           <!-- Pasword -->                                
                            <div class="md-form form-sm mb-5">
                            	<input 
				      			type = "hidden" name ="contrasenya_edit" id="contrasenya_edit">
                                <i class="fa fa-lock prefix"></i>
                                <input type="password" id="pasword2" name="pasword2" class="form-control form-control-sm validate">
                                <label data-error="wrong" data-success="right" for="pasword2">Your password</label>
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