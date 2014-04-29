<?php
$msg ="";

require("models/user_class.php");

if(isset($_SESSION['pass_success']))
{
    $msg = htmlentities($_SESSION['pass_success']);
    unset($_SESSION['pass_success']);
}

if (isset($_SESSION["login"]))
{
    if ($_SESSION["login"] == $data["login"] && $_SESSION["pass"] == $data["password"])
    {
        if (isset($_POST["update_pass_sub"]))
        {
            if (empty($_POST["update_old_pass"]) || empty($_POST["update_new_pass"]) || empty($_POST["update_new_pass_chk"]))
            {
                $msg = "Des champs requis sont manquants";
            }
            else
            {
                $idUser = htmlentities($_GET["id"]);
                $queryMDP = 'SELECT password, id_users FROM users WHERE id_users = "'.$idUser.'" ';
                $resQueryMDP = mysqli_query($db,$queryMDP);
                $resMDP = mysqli_fetch_object($resQueryMDP, "User");

                if (!password_verify($_POST["update_old_pass"],$resMDP->getPassword()))
                {
                    $msg = "L'ancien mot de passe n'est pas correct";
                }

                elseif ($_POST["update_new_pass"] !== $_POST["update_new_pass_chk"])
                {
                    $msg = "La vérification du nouveau mot de passe à échouée";
                }

                else
                {
                    $resMDP->setPassword($_POST["update_new_pass"]);

                    $modif_mdp = "UPDATE users SET password = '".mysqli_real_escape_string($db,$resMDP->getPassword())."' WHERE id_users = '".$resMDP->getIdUser()."'";
                    $request_edit = mysqli_query($db,$modif_mdp);

                    $_SESSION["pass"] = $resMDP->getPassword();

                    $_SESSION["pass_success"] = "Le mot de passe à bien été changé";
                }
            }
        }
        require('views/edit_mdp.html');
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