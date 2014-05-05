<?php
header('Content-Type: text/html; charset=utf-8');
require('apps/config.php');
require('models/secure.class.php');
// classe pour securiser les données bdd et l'affichage ds les views
$secure = new Securite();
// PHP Linux  
setlocale(LC_ALL,  'fr_FR.utf8','fra');  
// PHP Windows  
// setlocale(LC_ALL, 'frc');  
session_start();
/*| Il faut vérifier si la connection mysql a reussi ! |*/
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Définit le jeu de caractères en utf8
mysqli_set_charset($db, "utf8");
if($db === false)
die("Erreur server");
	$pagefiles = scandir("apps/modules");
	$page = "apps/modules/"."home.php";
	if(isset($_GET["page"]))
	{
		// J'EXPLODE MA CHAINE APRES le index.php? POUR RECUPERE QUE LE MODULE EN COURS;
		/*$url = explode("?", basename(trim($_SERVER['REQUEST_URI'])));
		$url = $url[1];*/
		$pageU = strtolower(htmlentities($_GET["page"]));
		if (in_array($pageU.".php",$pagefiles))
			$page = "apps/modules/".$pageU.".php";
		else
			$page = "apps/modules/"."404.php";
	}
	// on regarde s'il y'a eu une requete ajax
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']))
		require($page);
	else
	require("apps/skel.php");
?>

