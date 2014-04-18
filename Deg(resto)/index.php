<?php
header('Content-Type: text/html; charset=utf-8');
$db = mysqli_connect("localhost","root","troiswa","restodeg");
/*| Il faut vérifier si la connection mysql a reussi ! |*/
session_start();
$pagefiles = array("home","menu","livre_or","coordonnee","command","logout", "register","admin","profile");
$pageU = $_GET["page"];
$page = "apps/home";
if(isset($pageU)){
	if (in_array(strtolower($pageU),$pagefiles))
	{
		$page = "apps/".$pageU;
	}
	else{
		$page = "apps/404";
	}
}
else
    header('location:index.php?page=home');
require("apps/skel.php");

?>