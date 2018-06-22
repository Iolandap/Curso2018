<?php

	include("../Config_BD.php");

	// Cogemos la informacion recibida desde la URL, bloqueando el uso de caracteres raros
	$code = mysqli_real_escape_string($conexion, $_GET['code']);
	//echo $code;

	// Generamos objeto de tabla Activacion con los datos del codigo entrado por GET
	$sql = mysqli_query($conexion,"SELECT * FROM activacion WHERE code='$code'");

	// Condicion si hay datos en el Objeto
	if(mysqli_num_rows($sql)==0) {
		// No hay datos en objeto. Es decir codigo no valido
		echo "Lo siento, el codigo de activacion no existe";
	} else {
		//secuencia para activar la cuenta
		// Si hay datos en el objeto
		// Cargamos objeto en una matriz
		$fila = mysqli_fetch_assoc($sql);
		// Cargamos IdUsuario comun en las dos BD (usuarios & activacion)
		$user = $fila['UserId'];
		//echo " --- Usuario:".$user;

		// Actualizamos la BD usuario, activando el usuario
		mysqli_query($conexion, 
					"UPDATE usuarios 
						SET activado = '1' 
						WHERE Id_usuario = $user LIMIT 1
					");
		// Borramos en la BD el usuario y su codigo de activacion
		mysqli_query($conexion,
					"DELETE FROM activacion 
						WHERE UserId = $user LIMIT 1");
		echo "Usuario activado correctamente!!!!!";
?>
	<form>
		<br/>
		<br/>
		<br/>
		<input type="button" value="Empezar a trabajar!!!!" onclick="openWin()">
	</form>

	<script>
		function openWin() {
		    window.open("http://localhost/exam/index.php");
		}
	</script>
<?php
	}
?>