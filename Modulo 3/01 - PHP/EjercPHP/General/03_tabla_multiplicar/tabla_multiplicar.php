<!DOCTYPE html>
<html>
<head>
	<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
			margin: 0 auto;							/*Centrado tabla*/
			margin-top: 10em;
			font-weight: bolder;
		}

		td, th {
		    border: 4px solid #dddddd;
		    text-align: center;
		    width: 3em;
		    height: 2em;
		}

		/*	otro metodo para pintar las filas

			tr:nth-child(even) {						
			    background-color: #ffffcc;
			    font-style: oblique;
		}*/

		/*Pintado filas segun par o impar usando un class variable*/
		.green {										
		    background-color: green;
		    font-style: oblique;	
		}
		.red {											
		    background-color: red;	
		}


	</style>
</head>
<body>

	<h1>Tabla multiplicar</h1>

	<table>
		<!-- Bucle para generar las filas -->
		<?php for($a=1; $a<11; $a++){ 
			// Condicional para cambiar el estilo segun fila par o impar
			if($a%2==0){
				$clasp="red";
			}else{
				$clasp="green";
			} ?>				
		 	
		 	<tr class=" <?= $clasp ?> ">    <!-- Tenemos una class que viene dada por una variable -->

		  		<!-- Bucle para generar las columnas -->
		  		<?php for($i=1; $i<11; $i++){ ?>	
		  			<td> <?= $a*$i ?> </td>   			<!-- Hacemos la multiplicacion -->
		  		<?php } ?>

		  	</tr>
		<?php } ?>
	</table>

</body>
</html>
