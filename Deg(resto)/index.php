<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
$pagefiles = array("home.php","login");
$pageU = $_GET["page"].".php";
$page = "apps/home.php";
if(isset($_GET['page'])){
	if (in_array($pageU,$pagefiles))
	{
		$page = "apps/".$pageU;
	}
	else{
		$page = "apps/404.php";
	}
}
else
    header('location:index.php?page=home');
require("apps/skel.php");

?>