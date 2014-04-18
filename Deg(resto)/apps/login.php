<?php
$error = "";
$login = "";
if (isset($_POST['login_user'], $_POST['login_pass']))
{
	$login = mysqli_real_escape_string($db, $_POST['login_user']);
	$pass = mysqli_real_escape_string($db, $_POST['login_pass']);
	$request = 'SELECT * FROM users WHERE login="'.$login.'"';
	$res = mysqli_query($db, $request);
	if ($res)
	{
		$data = mysqli_fetch_assoc($res);
		if ($data)
		{
			if ($pass == $data['password'])
			{
				$_SESSION['login'] = $data['login'];
				$_SESSION['id'] = $data['id_users'];
				if ($data['admin'] == 1)
					$_SESSION['admin'] = true;
				else
					$_SESSION['admin'] = false;
				// header('Location:index.php?page=home');
				// return;
			}
			else
				$error = "Incorrect Password.";
		}
		else
			$error = "Login not found.";
	}
	else
		$error = "Internal Error.";

 }

require('views/login.html');
?>