<head>
	<link rel="stylesheet" type="text/css" href="css/Edit_elim.css" title="style">
</head> 

<?php
	// Definiciones iniciales
	$id_borrar 	= "";
	$id_editar 	= "";
    // Modal de borrado
    include("borrado.php");
    include("Edicion.php");
?>

<table align="center" class="table">
  	<thead>
	    <tr>
		    <th scope="col">Id_producto	</th>
		    <th scope="col">Nombre		</th>
		    <th scope="col">Descripcion	</th>
		    <th scope="col">Precio		</th>
		    <th scope="col">Imagen		</th>
		    <th scope="col">Fecha		</th>
	    </tr>
  	</thead>
	<tbody>

	<?php
			// SQLa mostrar
			$sql = 	"SELECT * 
						FROM productos";
	
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
						<td> <?= $fila['Id_producto'] 	?> 	</td>
						<td> <?= $fila['Nombre']		?> 	</td>
						<td> <?= $fila['Descripcion'] 	?> 	</td>
						<td> <?= $fila['Precio'] 		?> 	</td>
						<!-- Mostrar imagen -->
						<td> 
							<img src=" <?= "img/".$fila['Img_Producto'] ?>"
								 alt=" <?=  $fila['Img_Producto'] 		?>"
								 width="100" height="80">
						</td>
						<td> <?= $fila['Fecha'] 		?> 	</td>

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
								<!-- Llamada a funcion Javascript para correr el modal Borrar, le enviamos la variable posicion linea-->
								<a 	class 	= "btn nav-link" 
									href 	= "#" 
									onclick = "borrar 	('<?= 	$fila['Id_producto'] ?>')" 
									id		= "btnBorrar">
									<input 	id 	= "borrar" 
											name= "borrar" 
											type= "hidden"
											value="<?= $fila['Id_producto'] ?>" />
									<i class="fa fa-trash"></i>
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

	// Proceso borrado
   	function borrar(id){
  		// Definicion variable con posicion fila a borrar
       	$("#id_producto").val(id);
       	// Llamada a Modal Borrar
        $("#borrado").modal();
    }

    // Proceso edicion
   	function edicion(id, nom, desc, pr, img, fecha){

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