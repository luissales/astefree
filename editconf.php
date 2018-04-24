<?php
$config = $_GET['config'];
if($config == 'editconf'){
	$filename = '\dbconnect';
	$filepath = "C:\wamp64\www\projeto\Arrays_FuncoesEspeciais". $filename.".php";
	shell_exec("del ". $filepath);
}
header("Location: dbconfig.php"); 
