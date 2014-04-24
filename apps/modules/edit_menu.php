<?php 
	$msg_menu = '';
	$edit_nom_menu = '';
	$edit_contenu_menu = '';
	$edit_tarif_menu = '';
    $t ="";
if (isset($_POST["form_edit_menu"]))
{
    $edit_nom_menu = $_POST['nom_menu'];
    $edit_contenu_menu = $_POST['contenu_menu'];
    $edit_tarif_menu = $_POST['tarif_menu'];
    
}

if(isset($_POST['form_edit_menu']))
{
	if (empty($_POST["nom_menu"]) ||
		empty($_POST["contenu_menu"]) ||
		empty($_POST["tarif_menu"]))
		{
			$msg_menu = "Des champs requis sont manquants";
		}
		else
		{
				if (!preg_match("#^[a-zA-Z -]{3,32}$#",$_POST["nom_menu"]))
		        {
		        	$msg_menu = "Le nom  du menu ne peut contenir que des lettres ne pas dépasser 32 caractères.";
		        }

		        elseif (!preg_match("#^[a-zA-Z -]{3,128}$#",$_POST["contenu_menu"]))
		        {
		        	$msg_menu = "Le contenu du menu ne peut contenir que des lettres ne pas dépasser 128 caractères.";
		        }

		        elseif (!floatval(,$_POST["tarif_menu"]))
		        {
		        	$msg_menu = "Le prix du menu ne peut contenir que des chiffres décimaux.";
		        }

				else
				{
					$edit_nom_menu = mysqli_real_escape_string($db, $_POST['nom_menu']);
					$edit_contenu_menu = mysqli_real_escape_string($db, $_POST['contenu_menu']);
					$edit_tarif_menu = mysqli_real_escape_string($db,$_POST['tarif_menu']);
					$check_nom_menu = 'SELECT * FROM menu WHERE nom_menu = "'.$edit_nom_menu.'"';
					$res_nom_menu = mysqli_query($db, $check_nom_menu);
					$ligne = mysqli_fetch_assoc($res_nom_menu);
					if (!$ligne) 
					{
						$insert_menu = 'INSERT INTO menu (nom_menu,contenu_menu,tarif_menu)
						VALUES ("'.$edit_nom_menu.'", "'.$edit_contenu_menu.'","'.$edit_tarif_menu.'")';
						$res_insert_menu = mysqli_query($db, $insert_user);
						$msg_menu = 'Votre menu à bien été créé';
					} 
					else 
					{
						$msg_menu = 'Ce menu  existe déjà, veuillez en choisir un autre.';
					}	
			}
	}
}


require("views/menu.html");
?>
