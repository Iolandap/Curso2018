<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<!-- DEFINCION ARRAY -->
	<?php
	$array_base = array(	
					'a'	=>	23,
					'b'	=>	56,
					'c'	=>	123,
					'd'	=>	20,
					'e'	=>	35,
					'f'	=>	10,
					'g'	=>	78,
					'h'	=>	30,
					'i'	=>	80	);
	?>

	<!-- SUMATORIO -->
		<h1>Array: Sumatorio</h1>
			<?php
				$Sumatorio = 0;
				foreach($array_base as $clave=>$valor){
					echo "Clave: $clave; valor: $valor\n" ;
					$Sumatorio += $valor;
				}
				print "<br><br> sumatorio = $Sumatorio";
			?>

	<!-- MAXIMO Y MINIMO-->
		<h1>Array: Maximo y Minimo</h1>
			<?php
				$cont = 0;
				foreach($array_base as $clave=>$valor){
					// Inicializacion variable a guardar el valor maximo y minimo, poniendo el valor de la primera posicion array
					if($cont==0){
						$Maximo = $valor;
						$Minimo = $valor;
					}

					// Busqueda valor maximo
					if($Maximo < $valor){
						$Maximo = $valor;
					}

					// Busqueda valor minimo
					if($Minimo > $valor){
						$Minimo = $valor;
					}

					$cont++;
				}

				echo "<br> Maximo = $Maximo";
				echo "<br> Minimo = $Minimo";
			?>

	<!-- PROMEDIO -->
		<h1>Array: Promedio</h1>
			<?php
				$cont = 1;
				$Sumatorio = 0;

				foreach($array_base as $clave=>$valor){
					$Sumatorio = $Sumatorio + $valor;
					$cont++;
					$Promedio = $Sumatorio / $cont;
				}
				 
				echo "<br> Promedio = $Promedio";
			?>

</body>
</html>
