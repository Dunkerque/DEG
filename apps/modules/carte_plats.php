<?php
	if(isset($_POST['plats'])){ //sera vrai si au moins un moins un checkbox à été coché
	 
		foreach($_POST['plats'] as $check_box_plats){
	 
			//ici à chaque passage, $check_box_plats contiendra la valeur de l'attribut value d'une des cases à cocher
			echo "Vous avez cochée: "$check_box_entrees; 		 
		}		 
		}
	}
?>