<?php

$pagefiles = array("home.php");
$pageU = $_GET["page"].".php";

if (in_array($pageU,$pagefiles))
{
	$page = "apps/".$pageU;
}

require("apps/skel.php");

?>