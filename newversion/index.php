<?php
header('Content-Type: text/html; charset=utf-8');
require('apps/modules/config.php');
// PHP Linux  
setlocale(LC_ALL, 'fr_CA');  
// PHP Windows  
setlocale(LC_ALL, 'frc');  
session_start();
/*| Il faut vérifier si la connection mysql a reussi ! |*/
if($db)
{
	$pagefiles = scandir("apps/modules");
	$pageU = strtolower(htmlentities($_GET["page"]));
	if(isset($_GET["page"])){
		if (in_array("$pageU.php",$pagefiles))
			$page = "apps/modules/$pageU.php";
		else
			$page = "apps/modules/404.php";
	}
	else
	   header('location:index.php?page=home');
	require("apps/skel.php");
	
}
else{
	die("Problème technique");
}
?>
