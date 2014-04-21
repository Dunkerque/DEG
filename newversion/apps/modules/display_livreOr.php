<?php
$showAll = "SELECT * FROM livre_or";
$request = mysqli_query($db, $showAll);
while($dataL = mysqli_fetch_assoc($request))
{
	$idL = intval($dataL['id_livre_or']);
	$dateL = htmlentities($dataL['date']);
	$commentL = nl2br(htmlentities($dataL['commentaires']));
	echo $date;
 	require('views/display_livreOr.html'); 
}

?>