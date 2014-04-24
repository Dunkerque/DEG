<?php 
	// Danny style:
	// $showAll = "SELECT * FROM plats";
	// $res = mysqli_query($db, $showAll);
	// while($data = mysqli_fetch_assoc($res))
	// {
	// 	$namePlats = $data['nom_plats'];
	// 	//var_dump($data);
	// }

	$display_plats = mysqli_query(SELECT nom_plats FROM plats); 
	while ($res = mysqli_fetch_array(display_plats)) {
		# code...
	}
	$namePlats='';	

	require("views/scroll_plats.html");	
?>
