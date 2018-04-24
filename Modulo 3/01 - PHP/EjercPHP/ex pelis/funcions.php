<?php

function initCfg(){

	$cfg['user']="";
	$cfg['pass']="";
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
	if($user==$saved_user || $saved_userhash==md5($pass)){
		$_session['tipus']=="user";
	}
	elseif($user=$saved_admin || $saved_adminhash==md5($pass))
	{
		$_session['tipus']=="admin";
	}else{
		$_session['tipus']=="";
		return false;
	}
	return true;
}


?>