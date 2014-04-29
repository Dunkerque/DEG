<?php
	if(isset($_POST['menus'])){ //sera vrai si au moins un moins un checkbox à été coché
	 
		foreach($_POST['menus'] as $check_box_menus){
	 
			//ici à chaque passage, $check_box_menus contiendra la valeur de l'attribut value d'une des cases à cocher
			echo "Vous avez choisis: "$check_box_entrees; 		 
		}	 
		}
	}
?>