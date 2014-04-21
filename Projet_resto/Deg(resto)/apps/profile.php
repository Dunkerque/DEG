<?php

$pageProfile = "";
$loginU = $data["login"];

if (isset($_SESSION["login"]))
{
	$queryUser = 'SELECT * FROM users WHERE login = "'.$loginU.'"';
	$resQueryUser = mysqli_query($db,$queryUser);
	$resUser = mysqli_fetch_assoc($resQueryUser);

	if ($resUser)
	{
		if ($resUser["admin"] == 1)
		{
			$pageProfile = "apps/profile_admin.php";
		}

		else
		{
			$pageProfile = "apps/profile_member.php";
		}
	}

	else 
	{
		header("location:index.php");
	}
	require("views/profile.html");
}

else
{
	header("location:index.php");
}

?>