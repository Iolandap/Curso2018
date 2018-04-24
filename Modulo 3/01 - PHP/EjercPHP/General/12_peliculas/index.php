<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <!-- Fichero favicom-->
    <link rel="icon" href="img/favicon.jpg" type="image/x-icon"/>
    <!-- Fichero externo CSS -->
    <link rel="stylesheet" href="css/index.css" title="style">
     <!-- Iconos Fontqwesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Fichero externo JS -->
    <script src="js/codigo1.js"></script>
	<?php 
		// incluimos un fichero php con funciones
		require("libreria/funciones.php");  
		// Inicializacion sesion
		session_start();
	?>

</head>
<body>

    <?php

        // Configuracion inicial
        include ("cfg.php");

        // Head
        include($libreria."head.php");
        // Container
        include($libreria."container.php");
        // Footer
        include($libreria."footer.php");

        // Modal polica de Log In
        include($libreria."log_in.php");
        // Modal polica de Log Out
        include($libreria."log_out.php");
        // Modal polica de Cookies
        include($libreria."pol.php");
    ?>

</body>
</html>
