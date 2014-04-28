<?php
require ("models/user_class.php");

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
            $querySUser = 'SELECT * FROM users WHERE id_users = "'.$idUser.'"';
            $resQuerySUser = mysqli_query($db,$querySUser);
            $resSUser = mysqli_fetch_assoc($resQuerySUser);

            $idUserEdit = $userEdit->setidUser($_GET["iduser"]);
            $loginEdit = $userEdit->setLogin($resSUser["login"]);
            $nameEdit = $userEdit->setName($resSUser["nom"]);
            $surnameEdit = $userEdit->setSurname($resSUser["prenom"]);
            $emailEdit = $userEdit->setEmail($resSUser["email"]);
            $adresseEdit = $userEdit->setAdress($resSUser["adresse"]);
            $cpEdit = $userEdit->setCp($resSUser["code_postal"]);
            $cityEdit = $userEdit->setCity($resSUser["ville"]);
            $infosEdit = $userEdit->setInfos($resSUser["info_complementaire"]);

            $idUserEdit = $userEdit->getIdUser();
            $loginEdit = $userEdit->getLogin();
            $nameEdit = $userEdit->getName();
            $surnameEdit = $userEdit->getSurname();
            $emailEdit = $userEdit->getEmail();
            $adresseEdit = $userEdit->getAdress();
            $cpEdit = $userEdit->getCp();
            $cityEdit = $userEdit->getCity();
            $infosEdit = $userEdit->getInfos();

            if (isset($_POST["update_user_sub"]))
            {
                echo $userEdit->getLogin();
                echo $userEdit->getError();

                

                //$userEdit->editSpecUser($db);
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