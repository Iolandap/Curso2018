<?php

function initCfg(){

	$cfg['user']="";
	$cfg['hash']="";
	$cfg['saved_user']="pepito";
	$cfg['saved_pass']="1234";
	$cfg['saved_hash']=md5($cfg['saved_pass']);
	$cfg['userlogtipus']=$_SESSION['tipus']="none";

	return $cfg;
}
function getFiles($dir){
		// Sort in ascending order - this is default
		$files = scandir($dir);
		unset($files[0]);
		unset($files[1]);		
		return $files;
}

function checkUser($user,$pass){
	if($user==$_SESSION['cfg']['saved_user'] && $_SESSION['cfg']['saved_hash']==md5($pass)){
		$_SESSION['cfg']['userlogtipus']="user";
		$_SESSION['cfg']['user']="$user";
		$_SESSION['cfg']['hash']=md5($pass);
	}else{
		return false;
	}
	return true;
}

function uploadFiles($seccio){
	if(isset($_FILES['fileToUpload']['tmp_name'])){

		if ((is_uploaded_file($_FILES['fileToUpload']['tmp_name'])&&(is_uploaded_file($_FILES['imageToUpload']['tmp_name'])))){
			if(isset($_POST['tipus'])){
				$tipus=$_POST['tipus'];
			}
			$nombreDirectorio= "obras/".$seccio."/";
			$nombreFichero= $_FILES['fileToUpload']['name'];
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$nombreDirectorio. $nombreFichero);

			$nombreDirectorio= "img/".$seccio."/";
			$filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $_FILES['fileToUpload']['name']);
			$nombreFichero= $filename.".jpg";
			move_uploaded_file($_FILES['imageToUpload']['tmp_name'],$nombreDirectorio. $nombreFichero);
			return true;
		}
		else{
			return false;
		}
	}
}
?>