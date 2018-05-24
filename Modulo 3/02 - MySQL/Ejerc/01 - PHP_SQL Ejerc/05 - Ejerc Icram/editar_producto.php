<?php

	include("conexion.php");

	$matricula 	= $_POST["matricula"];
	$id 		= $_POST["id_producto"];

	//echo $_FILES['file']['name'];

	$sql = "UPDATE avion 
				SET Matricula='$matricula' 
				where IdAvion =$id";
				
	$res = mysqli_query($conecion, $sql) or die(mysqli_error($conecion));

	if($res) echo "ok";
	else echo "error";

	mysqli_close($conecion);

?>