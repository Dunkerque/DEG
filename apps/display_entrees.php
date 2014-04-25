<?php 
	$showEntrees = "SELECT * FROM entrees";
	$resEntrees = mysqli_query($db, $showEntrees);
	while($dataEntrees = mysqli_fetch_assoc($resEntrees))
	{
		$nameEntrees = htmlentities($dataEntrees['nom_entree']);
		echo '<option value="'.$dataEntrees['id_entree'].'">'.$nameEntrees.'</option>';
	}
?>