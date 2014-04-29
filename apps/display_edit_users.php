<?php

$msg="";

if (isset($_SESSION["success_deleteU"]))
{
	$msg = $_SESSION["success_deleteU"];
	unset($_SESSION["success_deleteU"]);
}
$querySUsers = 'SELECT * FROM users ORDER BY login';
$resQuerySUsers = mysqli_query($db,$querySUsers);

while($resSUsers = mysqli_fetch_object($resQuerySUsers,"User"))
{
    require("views/display_edit_users.html");
}
?>