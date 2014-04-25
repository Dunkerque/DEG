<?php
require ("apps/model_user.php");

$userSelect = new User();
$userEdit = new User();

$msg = "";

$idUser = htmlentities($_GET["iduser"]);

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            $resSUser = $userSelect->selectSpecUser($db,$idUser);

            $userEdit->setidUser($_GET["iduser"]);
            $userEdit->setLogin($resSUser["login"]);
            $userEdit->setName($resSUser["nom"]);
            $userEdit->setSurname($resSUser["prenom"]);
            $userEdit->setEmail($resSUser["email"]);
            $userEdit->setAdress($resSUser["adresse"]);
            $userEdit->setCp($resSUser["code_postal"]);
            $userEdit->setCity($resSUser["ville"]);
            $userEdit->setInfos($resSUser["info_complementaire"]);


            if (isset($_POST["update_user_sub"]))
            {
                echo "post ok";
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