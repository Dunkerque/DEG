<?php
	if(isset($_POST['boissons'])){ //sera vrai si au moins un moins un checkbox à été coché
	 
		foreach($_POST['boissons'] as $check_box_boissons){
	 
			//ici à chaque passage, $check_box_boissons contiendra la valeur de l'attribut value d'une des cases à cocher
			echo "Vous avez cochée: "$check_box_entrees; 		 
		}		 
		}
	}
?>