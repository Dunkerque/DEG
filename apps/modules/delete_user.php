<?php

$msg = "";

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            $idUser = htmlentities($_GET["iduser"]);

            $querySUser = 'SELECT * FROM users WHERE id_users = "'.$idUser.'"';
            $resQuerySUser = mysqli_query($db,$querySUser);
            $resSUser = mysqli_fetch_assoc($resQuerySUser);

            $loginSU = htmlentities($resSUser["login"]);
            $nameSU = htmlentities($resSUser["nom"]);
            $surnameSU = htmlentities($resSUser["prenom"]);
            $emailSU = htmlentities($resSUser["email"]);
            $adressSU = htmlentities($resSUser["adresse"]);
            $cpSU = htmlentities($resSUser["email"]);
            $citySU = htmlentities($resSUser["ville"]);
            $infosSU = htmlentities($resSUser["info_complementaire"]);
            $registerDateSU = $resSUser["register_date"];

            if (isset($_POST["delete_user_sub"]))
            {
                echo "delete";

            }

            require("views/delete_user.html");
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