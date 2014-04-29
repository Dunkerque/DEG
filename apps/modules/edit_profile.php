<?php

require("models/usermanager.class.php");

$msg ="";

if (isset($_SESSION["login"]))
{
	if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
	{
        $queryEditP = 'SELECT * FROM users WHERE id_users = "'.$idUser.'"';
        $resQueryEditP = mysqli_query($db,$queryEditP);
        $resEditP = mysqli_fetch_object($resQueryEditP,"User");

		if (isset($_POST["update_profil_sub"]))
		{
			if (empty($_POST["update_email"]) || empty($_POST["update_name"]) || empty($_POST["update_surname"]) || empty($_POST["update_adress"]) || empty($_POST["update_cp"]) || empty($_POST["update_city"]))
			{
				$msg = "Des champs requis sont manquants";
			}
			else
			{
                $resEditP->setEmail($_POST["update_email"]);
                $resEditP->setName($_POST["update_name"]);
                $resEditP->setSurname($_POST["update_surname"]);
                $resEditP->setAdress($_POST["update_adress"]);
                $resEditP->setCp($_POST["update_cp"]);
                $resEditP->setCity($_POST["update_city"]);
                $resEditP->setInfos($_POST["update_info_comp"]);

                $modif_u = "UPDATE users SET
                email = '".mysqli_real_escape_string($db,$resEditP->getEmail())."',
                nom = '".mysqli_real_escape_string($db,$resEditP->getName())."',
                prenom = '".mysqli_real_escape_string($db,$resEditP->getSurname())."',
                adresse = '".mysqli_real_escape_string($db,$resEditP->getAdress())."',
                code_postal = '".mysqli_real_escape_string($db,$resEditP->getCp())."',
                ville = '".mysqli_real_escape_string($db,$resEditP->getCity())."',
                info_complementaire = '".mysqli_real_escape_string($db,$resEditP->getInfos())."' WHERE id_users = '".$idUser."'";
                $request_edit = mysqli_query($db,$modif_u);

                if ($resEditP->getError() === null)
                {
                    $msg = "Le profil à bien été modifié";
                }

                else
                {
                    $msg = $resEditP->getError();
                }
			}
		}
		require('views/edit_profile.html');
	}

	else
	{
		header("location:index.php?page=logout");
	}
}

else
{
	header("location:index.php");
}
?>