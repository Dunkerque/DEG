<?php
require ("models/user_class.php");

$msg = "";

$idUser = mysqli_real_escape_string($db,$_GET["iduser"]);

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            $querySUser = 'SELECT * FROM users WHERE id_users = "'.$idUser.'"';
            $resQuerySUser = mysqli_query($db,$querySUser);
            $resSUser = mysqli_fetch_assoc($resQuerySUser);

            $loginEdit = htmlentities($resSUser["login"]);
            $nameEdit = htmlentities($resSUser["nom"]);
            $surnameEdit = htmlentities($resSUser["prenom"]);
            $emailEdit = htmlentities($resSUser["email"]);
            $adresseEdit = htmlentities($resSUser["adresse"]);
            $cpEdit = intval($resSUser["code_postal"]);
            $cityEdit = htmlentities($resSUser["ville"]);
            $infosEdit = htmlentities($resSUser["info_complementaire"]);

            if (isset($_POST["update_user_sub"]))
            {
                $userEdit = new User();

                $userEdit->setIdUser($resSUser["id_users"]);
                $userEdit->setLogin($_POST["update_login"]);
                $userEdit->setName($_POST["update_name"]);
                $userEdit->setSurname($_POST["update_surname"]);
                $userEdit->setEmail($_POST["update_email"]);
                $userEdit->setAdress($_POST["update_adress"]);
                $userEdit->setCp($_POST["update_cp"]);
                $userEdit->setCity($_POST["update_city"]);
                $userEdit->setInfos($_POST["update_info_comp"]);

                $loginEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_login"]));
                $nameEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_name"]));
                $surnameEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_surname"]));
                $emailEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_email"]));
                $adresseEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_adress"]));
                $cpEdit = intval(mysqli_real_escape_string($db,$_POST["update_cp"]));
                $cityEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_city"]));
                $infosEdit = htmlentities(mysqli_real_escape_string($db,$_POST["update_info_comp"]));

                if ($userEdit->getError() === null)
                {
                    $queryEditUser = 'UPDATE users SET login = "'.$userEdit->getLogin().'",
                    nom = "'.$userEdit->getName().'",
                    prenom = "'.$userEdit->getSurname().'",
                    email = "'.$userEdit->getEmail().'",
                    adresse = "'.$userEdit->getAdress().'" ,
                    code_postal = "'.$userEdit->getCp().'",
                    ville = "'.$userEdit->getCity().'",
                    info_complementaire = "'.$userEdit->getInfos().'" WHERE id_users = "'.$userEdit->getIdUser().'" ';
                    $resQueryEditUser = mysqli_query($db,$queryEditUser);

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