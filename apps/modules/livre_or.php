<?php	
$dateA = htmlentities(date("Y-m-d"));
$signature = "";
$message ="";

if(isset($_SESSION['msg_success']))
{
	$message = htmlentities($_SESSION['msg_success']);
	unset($_SESSION['msg_success']);
}
	if (isset($_SESSION['login'])) {

		$login = htmlentities($_SESSION['login']);
		if(isset($_POST['commentaire']))
		{
			$dateA = mysqli_real_escape_string($db,$dateA);
			$content = mysqli_real_escape_string($db,$_POST['commentaire']);
			
			$insert_comment = "INSERT INTO livre_or (`date`, commentaires, users_id_users) VALUES ('".$dateA."','".$content."', '".$idU."')";
			$request = mysqli_query($db, $insert_comment);
			$idArticle = mysql_insert_id($db);
			if($request)
			{
				$_SESSION['msg_success'] = "Votre message à bien été ajouter";
				header("Location:index.php?$url");
			}
			else{
				$message = "Une erreur est survenue";
			}
		}
	} 
	else{
		$message = "Veuillez vous connectez pour voir le contenu";
	}
require("views/livre_or.html");


?>

<!-- ajouter submit -->