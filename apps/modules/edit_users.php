<?php

require("models/usermanager.class.php");

$msg = "";

if (isset($_SESSION["success_deleteU"]))
{
    $msg = $_SESSION["success_deleteU"];
    unset($_SESSION["success_deleteU"]);
}

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if ($_SESSION["admin"] === 1)
        {
            require("views/edit_users.html");
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