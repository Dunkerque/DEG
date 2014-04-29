<?php
	if(isset($_POST['entrees'])){ //sera vrai si au moins un moins un checkbox à été coché
	 
		foreach($_POST['entrees'] as $check_box_entrees){
	 
			//ici à chaque passage, $check_box_entrees contiendra la valeur de l'attribut value d'une des cases à cocher
			echo "Vous avez cochée: "$check_box_entrees;
		}
	}
?>
