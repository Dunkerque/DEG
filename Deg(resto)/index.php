<?php
header('Content-Type: text/html; charset=utf-8');
$db = mysqli_connect("localhost","root","troiswa","restodeg");
session_start();
<<<<<<< HEAD
$pagefiles = array("home","menu","livre_or","coordonnee","command","logout");
=======
$pagefiles = array("home","login","menu","livre_or","coordonnee","command",'register');
>>>>>>> ffd5e2b00c2e1d8a0ba529dadcce908c9395e21d
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