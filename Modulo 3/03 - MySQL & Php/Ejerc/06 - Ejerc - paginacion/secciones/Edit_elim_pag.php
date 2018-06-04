<head>
	<link rel="stylesheet" type="text/css" href="css/Edit_elim_pag.css" title="style">
</head> 

<?php
	// Definiciones iniciales
	$id_borrar 	= "";
	$id_editar 	= "";
	$CantidadMostrar = 5;  // items por pagina

    // ****************************************************************************
    // 			Seccion calculo longitud filas de la tabla
    // ****************************************************************************

	// SQL para longitud filas
	$sql = 	"SELECT * 
				FROM productos";
	// Generamos objeto sql
	$consulta = mysqli_query($conexion, $sql)
				or die ("Fallo en la consulta".mysqli_error($conexion));
	// Hallamos la longitud del objeto obtenido
	$TotalReg = mysqli_num_rows($consulta);

	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  = ceil($TotalReg/$CantidadMostrar);
	//echo "<b>La cantidad de registro se dividió a: </b>".$TotalRegistro." para mostrar ".$CantidadMostrar." en 
	//		".$CantidadMostrar."<br>";
	//echo "Variable GET --> $compag\n";
	//echo "Cantidad Registros a mostar --> $TotalReg\n";
	//echo "Veces a mostrar los registros --> $TotalRegistro\n";


 	// Validado del valor de la variable GET. Damos un valor inicial por defecto
    //$compag         = (int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 

    if((!isset($_GET['pag']))){
		$compag = 1;
    }else{
		$compag =$_GET['pag'];
    }

    // ****************************************************************************
    // 			Seccion filas limitadas a registro inicial y maximo registros 5 (segun variable $CantidadMostrar)
    // ****************************************************************************

	// Consulta SQL
	// LIMIT empezar, cantidad
	$consultavistas = "SELECT * 
						FROM 
							productos
						ORDER BY
							Id_producto ASC
						LIMIT 
							".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
	// Generamos objeto sql
	$consulta = mysqli_query($conexion, $consultavistas)
				or die ("Fallo en la consulta".mysqli_error($conexion));

?>
	<!-- *********************************************** -->
	<!-- 				Impresion tabla 				 -->
	<!-- *********************************************** -->
	<table align="center" class="table">
		<!-- Cabecera tabla -->
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
	  	<!-- Cuerpo tabla -->
		<tbody>
<?php
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
				</tr>
<?php 
			} // FIN del WHILE
?>
		</tbody>
	</table>
<?php

			// Cierre base de datos.
// ****************************************************************************
//			OJO FALTA CERRAR LA BASE DE DATOS !!!!!!!!!!!!!!!!!!!!!!!!!
// ****************************************************************************

   	// ************************************************ //
	//			  Sector de Paginacion 					//
   	// ************************************************ //

    // Operacion matematica para dar valores a los botones siguiente y atrás
	// Sube o baja los valores segun la posicion en la que estamos

		// **********************
    	// 		Boton ATRAS
		// **********************
   		//$DecrementNum =(($compag -1))<1 ? 1: ($compag -1);
		if(($compag -1)<1){
			$DecrementNum = 1;
		}else{
			$DecrementNum = ($compag -1);
		}

		// **********************
    	// 		Boton SIGUIENTE
		// **********************
		//$IncrimentNum =(($compag +1)<=$TotalRegistro) ? ($compag +1):1;
		if(($compag +1)<=$TotalRegistro){
			$IncrimentNum = ($compag +1);
		}else{
			$IncrimentNum = 1;
		}

		//echo "Variable IncrimentNum --> $IncrimentNum\n";
		//echo "Variable DecrementNum --> $DecrementNum\n";

?>
	<ul class="botonera">
		<!-- ****************** -->	
		<!-- 	Boton ATRAS 	-->
		<!-- ****************** -->
		<li class="btn">
				<a href="index.php?pagina=5&pag= <?php echo $DecrementNum ?> ">◀</a>
		</li>
<?php
		    //Se resta y suma con el numero de pag actual con el cantidad de números  a mostrar
		    $Desde = $compag - (ceil($CantidadMostrar/2)-1);
		    $Hasta = $compag + (ceil($CantidadMostrar/2)-1);
		    // echo "Desde --> $Desde\n";
		    // echo "Hasta --> $Hasta\n";

		    //Se validan los valores minimos y maximos a visualizar
		    	//$Desde = ($Desde<1)?1: $Desde;
			    if($Desde<1){
					$Desde = 1;
			    }

		    	// $Hasta = ($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
			    if($Hasta<$CantidadMostrar){
					$Hasta = $CantidadMostrar;
			    }

			    // echo "Desde --> $Desde\n";
			    // echo "Hasta --> $Hasta\n";

			//  ****************** 	//	
			// 	  Numeros paginas	//
			//  ****************** 	//	
		    //Se muestra los números de paginas (paginacion)
		    for($i=$Desde; $i<=$Hasta;$i++){
		     	//Se valida la paginacion total de registros
		     	if($i<=$TotalRegistro){
		     		//Validamos la pag activo
		 	  		if($i==$compag){
		           		echo 	"<li class=\"active\">
		           					<a href=\"index.php?pagina=5&pag=".$i."\">".$i."</a>
		           				</li>";
		     	  	}else {
		     	  		echo 	"<li>
		     	  					<a href=\"index.php?pagina=5&pag=".$i."\">".$i."</a>
		     	  				</li>";
		     	  	}     		
		     	}
		     }
		    // echo "HOLA--> $IncrimentNum ";
?>
		<!-- ****************** -->	
		<!-- 	Boton SIGUIENTE	-->
		<!-- ****************** -->
		<li class="btn">
			<a href="index.php?pagina=5&pag= <?php echo $IncrimentNum ?> ">▶</a>
		</li>
	</ul>
