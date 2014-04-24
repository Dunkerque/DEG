<?php 
	
	$showAll = "SELECT * FROM plats";
	$res = mysqli_query($db, $showAll);
	$select_open = '<select name="contenu_menu" value="<?= $edit_contenu_menu; ?>">';
	while($data = mysqli_fetch_assoc($res))
	{
		$namePlats = $data['nom_plats'];
	}
	$select_end = "</select>";
	require("views/scroll_plats.html");
	
?>
