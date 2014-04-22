<?php
$showAll = "SELECT * FROM livre_or ORDER BY id_livre_or DESC";
$request = mysqli_query($db, $showAll);
while($dataL = mysqli_fetch_assoc($request))
{
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

?>