<?php
$showAll = "SELECT * FROM livre_or ORDER BY id_livre_or DESC";
$request = mysqli_query($db, $showAll);
if(mysqli_num_rows($request) == 0)
{
	$erreur = "Il y'a pas de post actuellement ";
	require('views/display_noPost.html'); 
}
else{
	while($dataL = mysqli_fetch_assoc($request))
	{
		$idPost = intval($dataL['id_livre_or']);
		$logU = intval($dataL['users_id_users']);
		$showLogin = "SELECT * FROM users WHERE $logU = id_users";
		$sendRequest =  mysqli_query($db, $showLogin);
		$resultL = mysqli_fetch_assoc($sendRequest);
		$idL = intval($dataL['users_id_users']);
		$dateL = htmlentities($dataL['date']);
		$commentL = nl2br(htmlentities($dataL['commentaires']));
		$loginL = htmlentities($resultL['login']);
	 	require('views/display_livreOr.html'); 
	}
}
?>