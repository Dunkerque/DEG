<?php	
$date = "";
$signature = "";
	if (isset($_SESSION['login'])) {

		if(isset($_POST['commentaire']))
		{
			$date = date("Y-m-d");
			$content = mysqli_real_escape_string($db,$_POST['commentaire']);
			$signature = $_SESSION['login'];
			$insert_comment ='INSERT INTO livre_or (`date`, commentaires, users_id_users) 
			VALUES("'.$date.'","'.$content.'","'.$signature.'")';
		}
	} else {
		header('location:index.php');
	}
		require("views/livre_or.html");

		var_dump($_POST);
?>

<!-- ajouter submit -->