<?php

require("models/usermanager.class.php");

$msg = "";

$idSelectedUser = htmlentities($_GET["iduser"]);

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            if ($idSelectedUser === $_SESSION["id"])
            {
                header("location:index.php?page=edit_users");
            }

            else
            {
                $userManager = new Usermanager($db);
                $selectUser = $userManager->getUser($idSelectedUser);

                if (isset($_POST["delete_user_sub"]))
                {
                    $userManager->deleteUser($selectUser->getIdUser());

                    $_SESSION["success_deleteU"] = "L'utilisateur à bien été supprimé";
                    header("location:index.php?page=edit_users");
                }
                require("views/delete_user.html");
            }
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