<?php
		if(isset($_POST['seccio'])){
			if($_POST['seccio']=="home"){
				include("body/home.php");
			}
			if($_POST['seccio']=="pelis"){
				include("body/pelis.php");
			}
			elseif ($_POST['seccio']=="series") {
				include("body/obras.php");
			}
			elseif ($_POST['seccio']=="upload") {
				include("body/upload.php");
			}
			elseif ($_POST['seccio']=="login") {
					include("body/login.php");
			}
			elseif ($_POST['seccio']=="unlogin") {
				session_destroy();
				include("body/home.php");
			}
			elseif ($_POST['seccio']=="libros") {
				include("body/libros.php");
			}
		}else{
				include("body/home.php");
			}
?>