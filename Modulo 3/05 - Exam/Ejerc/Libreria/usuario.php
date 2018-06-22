<head>
	<link rel="stylesheet" type="text/css" href="css/Edit_elim.css" title="style">
</head> 

<?php
	// Definiciones iniciales
	$id_borrar 	= "";
	$id_editar 	= "";
	// Conexion servidor y conexion base de datos
    include("Config_BD.php");
    include("usuario_edit.php");
    //echo $_SESSION['Id_usser'];
?>

<table align="center" class="table">
  	<thead>
	    <tr>
		    <th scope="col">Usuario 			</th>
		    <th scope="col">Correo Electronico	</th>
		    <th scope="col">Nombre completo		</th>
	    </tr>
  	</thead>
	<tbody>

	<?php
			// SQLa mostrar
			$user0 = $_SESSION['Id_usser'];
			$sql = 	"SELECT * 
						FROM usuarios
						WHERE Id_usuario = $user0";
	
			// Generamos objeto sql
			$consulta = mysqli_query($conexion, $sql)
						or die ("Fallo en la consulta".mysqli_error($conexion));
			// Hallamos la longitud del objeto obtenido
			$nfilas = mysqli_num_rows($consulta);

			// Verificamos que tenemos datos dentro de la busqueda
			if($nfilas>0){
				// Visulizacion data
				while ($fila = mysqli_fetch_assoc($consulta)){
	?>
					<!-- HTML para mostrar la tabla -->
		  			<tr>
						<td> <?= $fila['Nombre_usuario'] 	?> 	</td>
						<td> <?= $fila['Correo_electronico']?> 	</td>
						<td> <?= $fila['Nombre_completo'] 	?> 	</td>
						<!-- Botones -->
						<td>
							<!-- Hacemos dos forms separados para que los botones no compartan resultado 
								Otro metodo seria haciendo onclick() -->
							<form method="post">
								<a 	class 	= "btn nav-link" 
									href 	= "#" 
									onclick = "edicion 	(	'<?= $_SESSION['Id_usser']?>',
															'<?= $fila['Nombre_usuario']?>',
															'<?= $fila['Contrasenya']?>',
															'<?= $fila['Correo_electronico']?>',
															'<?= $fila['Nombre_completo']?>',
														)" 
									id		= "btnEdit">
									<input 	id  = "editar"	
											name= "editar" 
											type= "hidden" 
											value="<?= $_SESSION['Id_usser'] ?>" />
									<i class="fa fa-edit"></i>
								</a>
							</form>
						</td>
					</tr>
	<?php 
				} // FIN del WHILE
			}else{
	 ?>
	        Producto no encontrado
	 <?php 
	    	} // FIN del if($nfilas)

			// Cierre base de datos.
			// La informacion a trabajar posteriormente no esta afectada, ya que esta en la variable $consulta
			mysqli_close($conexion);
	?>

	</tbody>
</table>

<script>
    // Proceso edicion
   	function edicion(id, usuario, contrasenya, email, nombre){

   		//alert ("Hola !!!!");
   		
  		// Carga variales desde el onclick()
       	$("#id_usser_edit")	.val(id);
       	$("#usuario_edit")	.val(usuario);
       	$("#contrasenya_edit")	.val(contrasenya);
       	$("#email_edit")	.val(email);
       	$("#nombre_edit")	.val(nombre);       	

       	// Llamada a Modal Editar
        $("#edicion").modal();
    }

</script>