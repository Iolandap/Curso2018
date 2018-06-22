<head>
	<link rel="stylesheet" type="text/css" href="css/Edit_elim.css" title="style">
</head> 

<?php
	// Definiciones iniciales
	$id_borrar 	= "";
	$id_editar 	= "";
	// Conexion servidor y conexion base de datos
    include("Config_BD.php");
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
									onclick = "edicion 	('<?= 	$fila['Id_producto']?>',
														'<?= 	$fila['Nombre']		?>',
														'<?=	$fila['Descripcion']?>',
														'<?=	$fila['Precio'] 	?>',
														'<?=	$fila['Img_Producto']?>',
														'<?=	$fila['Fecha']		?>' 
														)" 
									id		= "btnEdit">
									<input 	id  = "editar"	
											name= "editar" 
											type= "hidden" 
											value="<?= $fila['Id_producto'] ?>" />
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
   	function edicion(id, nom, desc, pr, img, fecha){

   		alert ("Hola !!!!");

   		
  		// Carga variales desde el onclick()
       	$("#id_producto-edit")	.val(id);
       	$("#nombre-edit") 		.val(nom);
       	$("#descripcion-edit")	.val(desc);
       	$("#precio-edit")		.val(pr);
       	$("#Img_Producto-edit")	.val(img);
       	$("#fecha-edit")		.val(fecha);
       	// Carga imagen y ruta
       	$("#dummyimage")		.attr("src","img/"+img);

       	// Llamada a Modal Editar
        $("#edicion").modal();
    }

</script>