<?php 

// 	Definiciones iniciales
	session_start();

// 	Control que el usuario esta activo (que no entre copiando URL directamente sin poner password). 
//	Si no esta activo lo devuelve a home
	if(!isset($_SESSION['usuario'])) header("Location: ../index.php");

?>