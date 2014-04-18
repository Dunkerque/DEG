<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
$pagefiles = array("home.php");
$pageU = $_GET["page"].".php";

if(isset($_GET['page'])){
	if (in_array($pageU,$pagefiles))
	{
		$page = "apps/".$pageU;
	}
	else{
		$page = "apps/404.php";
	}
}
require("apps/skel.php");

?>