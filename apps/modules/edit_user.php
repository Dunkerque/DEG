<?php
require ("models/user_class.php");

$msg = "";

$idUser = htmlentities($_GET["iduser"]);

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            $querySUser = 'SELECT * FROM users WHERE id_users = "'.$idUser.'"';
            $resQuerySUser = mysqli_query($db,$querySUser);
            $resSUser = mysqli_fetch_object($resQuerySUser, "User"); //on fait un retour sous forme d'objet. Les variables privées de la classe sont remplies automatiquement. Ici on peut afficher les infos remplies auto avec les GETTERS. voir fichier user_class.php
            if (isset($_POST["update_user_sub"]))
            {
                $resSUser->setLogin($_POST["update_login"]);
                $resSUser->setName($_POST["update_name"]);
                $resSUser->setSurname($_POST["update_surname"]);
                $resSUser->setEmail($_POST["update_email"]);
                $resSUser->setAdress($_POST["update_adress"]);
                $resSUser->setCp($_POST["update_cp"]);
                $resSUser->setCity($_POST["update_city"]);
                $resSUser->setInfos($_POST["update_info_comp"]);

                $queryEditUser = 'UPDATE users SET 
                login = "'.mysqli_real_escape_string($db,$resSUser->getLogin()).'",
                nom = "'.mysqli_real_escape_string($db,$resSUser->getName()).'",
                prenom = "'.mysqli_real_escape_string($db,$resSUser->getSurname()).'",
                email = "'.mysqli_real_escape_string($db,$resSUser->getEmail()).'",
                adresse = "'.mysqli_real_escape_string($db,$resSUser->getAdress()).'" ,
                code_postal = "'.mysqli_real_escape_string($db,$resSUser->getCp()).'",
                ville = "'.mysqli_real_escape_string($db,$resSUser->getCity()).'",
                info_complementaire = "'.mysqli_real_escape_string($db,$resSUser->getInfos()).'" WHERE id_users = "'.$resSUser->getIdUser().'" ';
                $resQueryEditUser = mysqli_query($db,$queryEditUser);

                if ($resSUser->getError() === null)
                {
                    $msg = "Le profil à bien été modifié";
                }

                else
                {
                    $msg = $resSUser->getError();
                }
            }
            require("views/edit_user.html");
        }

        else
        {
            header("location:index.php");
        }
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