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
                $userEdit = new User();

                $userEdit->setIdUser($idUser);
                $userEdit->setLogin($_POST["update_login"]);
                $userEdit->setName($_POST["update_name"]);
                $userEdit->setSurname($_POST["update_surname"]);
                $userEdit->setEmail($_POST["update_email"]);
                $userEdit->setAdress($_POST["update_adress"]);
                $userEdit->setCp($_POST["update_cp"]);
                $userEdit->setCity($_POST["update_city"]);
                $userEdit->setInfos($_POST["update_info_comp"]);

                $queryEditUser = 'UPDATE users SET login = "'.$userEdit->getLogin().'",
                nom = "'.$userEdit->getName().'",
                prenom = "'.$userEdit->getSurname().'",
                email = "'.$userEdit->getEmail().'",
                adresse = "'.$userEdit->getAdress().'" ,
                code_postal = "'.$userEdit->getCp().'",
                ville = "'.$userEdit->getCity().'",
                info_complementaire = "'.$userEdit->getInfos().'" WHERE id_users = "'.$userEdit->getIdUser().'" ';
                $resQueryEditUser = mysqli_query($db,$queryEditUser);

                if ($userEdit->getError() === null)
                {
                    $msg = "Le profil à bien été modifié";
                }

                else
                {
                    $msg = $userEdit->getError();
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