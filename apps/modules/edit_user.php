<?php

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

            $loginSU = htmlentities($resSUser["login"]);
            $nameSU = htmlentities($resSUser["nom"]);
            $surnameSU = htmlentities($resSUser["prenom"]);
            $emailSU = htmlentities($resSUser["email"]);
            $adressSU = htmlentities($resSUser["adresse"]);
            $cpSU = intval($resSUser["code_postal"]);
            $citySU = htmlentities($resSUser["ville"]);
            $infosSU = htmlentities($resSUser["info_complementaire"]);

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