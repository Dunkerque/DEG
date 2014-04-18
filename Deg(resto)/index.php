<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
$pagefiles = array("home","login","menu","livre_or","coordonnee","command");
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