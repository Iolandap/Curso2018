<?php

    // Ruta libreria ficheros .php
    $libreria ="/libreria/";


	//Condicion pulsacion log_in
	if(isset($_POST["log_in"])){
	    // Definiciones iniciales
	    $username = $_POST["username"];
	    $pasword  = $_POST["pasword"];

	    // Llamada a funcion control password
	    $_SESSION["usuario"] = ctr_pasword($username, $pasword);
	}// FIN condicional Log In


    // Control sesion abierta, se llama a funcion si no esta inicializados los usuarios
    if(!isset($_SESSION['cfg'])){
        // Guardamos en la array de la sesion los datos de los usuarios
        $_SESSION['cfg']=initCfg();
    };
?>