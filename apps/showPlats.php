<?php

$showAll = "SELECT id_plats, nom_plats, contenu_plats, tarif_plats FROM plats";
$request_showAll = mysqli_query($db, $showAll);
while($data = mysqli_fetch_assoc($request_showAll))
{
	$id_plats = intval($data['id_plats']);
	$nom_plats = htmlentities($data['nom_plats']);
	$contenu_plats = htmlentities($data['contenu_plats']);
	$tarif_plats = floatval($data['tarif_plats']);
	require('views/showPlats.html');
}
?>
