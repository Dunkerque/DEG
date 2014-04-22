<?php 
$msg ="";
if(isset($_POST['update_pass'],$_POST['update_adresse'],$_POST['update_cp'],$_POST['update_ville'], $_POST['update_email']))
{
	$u_pass = mysqli_real_escape_string($db, sha1($_POST['update_pass']));
	$u_adresse = mysqli_real_escape_string($db, $_POST['update_adresse']);
	$u_cp = mysqli_real_escape_string($db, $_POST['update_cp']);
	$u_ville = mysqli_real_escape_string($db, $_POST['update_ville']);
	$u_email = mysqli_real_escape_string($db, $_POST['update_email']);
	$u_infos = mysqli_real_escape_string($db, $_POST['update_infos']);

	$modif_u = "UPDATE users SET password = '".$u_pass."', email = '".$u_email."', adresse = '".$u_adresse."', code_postal = '".$u_cp."',ville = '".$u_ville."' WHERE id_users = $idU";
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