<?php
	if(isset($_POST['login'])){
			checkUser($_POST['user'],$_POST['pass']);
		}
	if(!isset($_SESSION['cfg'])){
			$_SESSION['cfg']=initCfg();
		}
?>