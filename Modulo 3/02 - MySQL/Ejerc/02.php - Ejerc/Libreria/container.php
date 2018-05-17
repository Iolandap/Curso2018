<head>
	<link href="css/container.css" rel="stylesheet" type="text/css" media="screen" />
</head> 

<div id="container">

	<table align="center" class="table">
	  	<thead>
		    <tr>
			      <th scope="col">id_cliente 	</th>
			      <th scope="col">nombre		</th>
			      <th scope="col">limitecredito	</th>
		    </tr>
	  	</thead>
  		<tbody>

			<?php
					// SQLa mostrar
					$sql = 	"SELECT * 
								FROM clientes";
					// Generamos objeto sql
					$consulta = mysqli_query($conexion, $sql)
								or die ("Fallo en la consulta".mysql_error($conexion));
					// Visulizacion data
					while ($fila = mysqli_fetch_assoc($consulta)){
			?>
					<!-- HTML para mostrar la tabla -->
			  			<tr>
							<td> <?= $fila['id_cliente'] 	?> 	</td>
							<td> <?= $fila['nombre']		?> 	</td>
							<td> <?= $fila['limitecredito'] ?> 	</td>
						</tr>
			<?php 
					} // FIN del WHILE
			?>

  		</tbody>
  	</table>
</div>