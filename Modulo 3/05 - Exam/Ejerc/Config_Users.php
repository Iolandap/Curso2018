<?php

	// *********************************
	// 				LOG IN
	// *********************************
	if(isset($_POST["log_in"])){

	    // Definiciones iniciales
	    $username = $_POST["username"];
	    $pasword  = $_POST["pasword"];

	    // Llamada a funcion control password. 
	    // Si esta en la BD. 	Inicia sesion
	    // Si NO esta en la BD. No hace nada
	    ctr_pasword($username, $pasword);
	    
	    // print_r($_SESSION);  mostrar valores de array
   		// var_dump($_SESSION);	mostrar valores de array
	}// FIN condicional Log In



	// *********************************
	// 				LOG NEW
	// *********************************
	if(isset($_POST["log_new"])){

	    // Definiciones iniciales
	    $username 	= $_POST["username1"];
	    $nombre		= $_POST["username_full"];
	    $email		= $_POST["email"];
	    $pasword1 	= $_POST["pasword1"];

	    // Llamada a funcion New User 
	    new_user($username, $nombre, $email, $pasword1);
	    
	    // print_r($_SESSION);  mostrar valores de array
   		// var_dump($_SESSION);	mostrar valores de array
	}// FIN condicional Log In



	// *********************************
	// 				LOG OUT
	// *********************************
 	if(isset($_POST['log_out'])){
		if($_POST["log_out"]=="log_out"){
			unset($_SESSION["usuario"]);
			session_destroy();
			header('Location: Index.php');
		} // FIN del if(isset())
	} // FIN condicional Log Out
 
?>