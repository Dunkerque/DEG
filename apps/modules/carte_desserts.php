<?php
	if(isset($_POST['desserts'])){ //sera vrai si au moins un moins un checkbox à été coché
	 
		foreach($_POST['desserts'] as $check_box_desserts){
	 
			//ici à chaque passage, $check_box_desserts contiendra la valeur de l'attribut value d'une des cases à cocher
			echo "Vous avez cochée: "$check_box_entrees; 		 
		}		 
		}
	}
?>