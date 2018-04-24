
<?php session_start(); ?>
<?php session_destroy();?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<?php include ("funcions.php");?>
<link rel="stylesheet" type="text/css" href="style.css">
<script>

</script>
</head>
<body>

<?php 
	if(!isset($_SESSION['cfg'])){
		$_SESSION['cfg']=initCfg();
	}
	
	include("cabecera.php");
	include("body.php");
	include("pie.php");

?>

</body>
</html>