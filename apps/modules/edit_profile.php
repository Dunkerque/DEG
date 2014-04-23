<?php
$msg ="";

if (isset($_SESSION["login"]))
{

	if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
	{
		echo "compte ok";
	}

	else
	{
		header("location:index.php?page=logout");
	}
}

else
{
	header("location:index.php?page=home");
}


if (isset($_POST["update_profil_sub"]))
{

}
if(isset($_POST['update_pass'],$_POST['update_adresse'],$_POST['update_cp'],$_POST['update_ville'], $_POST['update_email']))
{
	$modif_adresse = mysqli_real_escape_string($db, $_POST['update_adresse']);
	$modif_cp = mysqli_real_escape_string($db, $_POST['update_cp']);
	$modif_ville = mysqli_real_escape_string($db, $_POST['update_ville']);
	$modif_email = mysqli_real_escape_string($db, $_POST['update_email']);
	$modif_infos = mysqli_real_escape_string($db, $_POST['update_infos']);

	$modif_u = "UPDATE users SET password = '".$modif_pass."', email = '".$modif_email."', adresse = '".$modif_adresse."', code_postal = '".$modif_cp."',ville = '".$modif_ville."' WHERE id_users = $idU";
	$request_edit = mysqli_query($db,$modif_u);
	if($request_edit)
	{
		$_SESSION['pass'] = $u_pass;
		header("Location:index.php?page=profile&idU&success=true");
	}
	else{
		$msg = "Une erreur est survenue";
	}
}
require('views/edit_profile.html');

?>