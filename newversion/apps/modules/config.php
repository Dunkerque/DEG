<?php 
	// JE RECUPERE LURL EN COURS (index.php?page=module)
	$url_en_cours = basename($_SERVER['REQUEST_URI']);
	// J'EXPLODE MA CHAINE APRES le index.php? POUR RECUPERE QUE LE MODULE EN COURS;
	$url = explode("?", basename(trim($_SERVER['REQUEST_URI'])));
	$url = $url[1];
	// $encours[1] = page=lemodule
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "troiswa");
define("DB_NAME", "restodeg");
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>