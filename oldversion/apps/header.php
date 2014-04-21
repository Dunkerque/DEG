
<?php
$erreur = '';
$page_login = "";
if(isset($_SESSION['login']))
{
	$request_checkLogin = 'SELECT * FROM users WHERE login = "'.$_SESSION['login'].'"';
	$res = mysqli_query($db, $request_checkLogin);
	$data = mysqli_fetch_assoc($res);

	if($_SESSION['login'] == $data['login'] && $_SESSION['pass'] == $data['password'])
	{
		$page_login = 'apps/logged.php';
	}
	else
	{
		require('logout.php');
	}
}
else if(isset($_POST['login_user'], $_POST['login_pass']))
	{
		$login_user = mysqli_real_escape_string($db,$_POST['login_user']);
		$login_pass = mysqli_real_escape_string($db,sha1($_POST['login_pass']));
		$request_checkUser = 'SELECT * FROM users WHERE login = "'.$login_user.'"';
		$resUser = mysqli_query($db,$request_checkUser);
		$dataUser = mysqli_fetch_assoc($resUser);
	if($resUser)
	{
		if($dataUser)
		{
			if($login_pass == $dataUser['password'])
			{
				$_SESSION['id'] = $dataUser['id_users'];
				$_SESSION['login'] = $dataUser['login'];
				$_SESSION['pass'] = $dataUser['password'];
				if($dataUser['admin'] == 1)
				$_SESSION['admin'] = 1;
				else
				$_SESSION['admin'] = 0;
				header('Location:index.php');
			}	
			else{
				$erreur = 'Password incorrect';
				$page_login = "apps/login.php";
			}
		}
		else{
			$erreur = 'Login incorrect';
			$page_login = "apps/login.php";
		}
	}
	else{
		$erreur = "Erreur Internet";
	}
}
else{
	$page_login = "apps/login.php";
}

require("views/header.html");
?>
