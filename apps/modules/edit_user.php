<?php
require ("models/usermanager.class.php");

$msg = "";

$idUser = htmlentities($_GET["iduser"]);

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            $userManager = new Usermanager($db); // on instanci le manager avec la BDD en parametre
            $selectUser = $userManager->getUser($idUser); // on crée une variable qui appel la fonction getUser du manager en lui donnat un paramètre. $selectUser->getLogin(); equivaut à : $userManager->getUser($idUser)->getLogin();

            if (isset($_POST["update_user_sub"]))
            {
                $selectUser->setLogin($_POST["update_login"]);
                $selectUser->setName($_POST["update_name"]);
                $selectUser->setSurname($_POST["update_surname"]);
                $selectUser->setEmail($_POST["update_email"]);
                $selectUser->setAdress($_POST["update_adress"]);
                $selectUser->setCp($_POST["update_cp"]);
                $selectUser->setCity($_POST["update_city"]);
                $selectUser->setInfos($_POST["update_info_comp"]);

                $userManager->editUser($selectUser->getLogin(),$selectUser->getName(),$selectUser->getSurname(),$selectUser->getEmail(),$selectUser->getAdress(),$selectUser->getCp(),$selectUser->getCity(),$selectUser->getInfos(),$selectUser->getIdUser());

                if ($selectUser->getError() === null)
                {
                    $msg = "Le profil à bien été modifié";
                }

                else
                {
                    $msg = $selectUser->getError();
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