<?php

$querySUsers = 'SELECT * FROM users ORDER BY login';
$resQuerySUsers = mysqli_query($db,$querySUsers);

while($resSUsers = mysqli_fetch_assoc($resQuerySUsers))
{
    $loginSU = htmlentities($resSUsers["login"]);
    $idSU = $resSUsers["id_users"];
    $registerDateSU = $resSUsers["register_date"];
    require("views/display_edit_users.html");
}
?>