<?php	
$date = "";
$signature = "";
$notLogged = "";
$message ="";

	if (isset($_SESSION['login'])) {

		$login = htmlentities($_SESSION['login']);
		if(isset($_POST['commentaire']))
		{
			$date = mysqli_real_escape_string($db,date("Y-m-d"));
			$content = mysqli_real_escape_string($db,$_POST['commentaire']);
			
			$insert_comment = "INSERT INTO livre_or (`date`, commentaires, users_id_users) VALUES ('".$date."','".$content."', '".$idU."')";
			$request = mysqli_query($db, $insert_comment);
			if($request)
			{
				$message = "Votre message à bien été ajouter";
				header("refresh:2;url=index.php?$url");
			}
			else{
				$message = "Une erreur est survenue";
			}
		}
		require("views/livre_or.html");
	} 
	else 
		$notLogged = "Veuillez vous connectez pour voir le contenu";
		require("views/no_session.html");
?>

<!-- ajouter submit -->