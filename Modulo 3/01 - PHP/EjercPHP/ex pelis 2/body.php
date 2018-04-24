<?php
		if(isset($_POST['seccio'])){
			if($_POST['seccio']=="home"){
				include("body/home.php");
			}
			if($_POST['seccio']=="pelis"){
				$dir="obras/pelis";
				$dir2="img/pelis";
		
				include("body/obras.php");
			}
			elseif ($_POST['seccio']=="series") {
				$dir="obras/series";
				$dir2="img/series";
		
				include("body/obras.php");
			}
			elseif ($_POST['seccio']=="upload"|| $_POST['seccio']=="uploading") {
				$subsec=$_POST['seccio'];
				include("body/upload.php");
			}
			elseif ($_POST['seccio']=="login") {
				include("body/login.php");
			}
			elseif ($_POST['seccio']=="unlogin") {
				session_destroy();
				header('Location: index.php');	}
			elseif ($_POST['seccio']=="libros") {
				$dir="obras/libros";
				$dir2="img/libros";
		
				include("body/obras.php");
			}
		}else{
				include("body/home.php");
			}
?>