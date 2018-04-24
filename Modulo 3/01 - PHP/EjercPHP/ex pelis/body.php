<?php
		if(isset($_POST['seccio'])){
			if($_POST['seccio']=="home"){
				include("body/home.php");
			}
			if($_POST['seccio']=="pelis"){
				$dir="obras/pelis";
				include("body/obras.php");
			}
			elseif ($_POST['seccio']=="series") {
				$dir="obras/series";
				include("body/obras.php");
			}
			elseif ($_POST['seccio']=="upload") {
				include("body/upload.php");
			}
			elseif ($_POST['seccio']=="loggin") {
				include("body/loggin.php");
			}
			elseif ($_POST['seccio']=="unloggin") {
				session_destroy();
				include("body/home.php");
			}
			elseif ($_POST['seccio']=="libros") {
				$dir="obras/libros";
				include("body/obras.php");
			}
		}else{
				include("body/home.php");
			}
?>