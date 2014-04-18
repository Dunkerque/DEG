<?php 
	$msg_login = '';

	if (isset($_POST['login'], $_POST['password'])) {
		$login = mysqli_real_escape_string($restodeg, $_POST['login']);
		$password = mysqli_real_escape_string($restodeg, $_POST['password']);
		$email = mysqli_real_escape_string($restodeg, $_POST['email']);
		$nom = mysqli_real_escape_string($restodeg, $_POST['nom']);
		$prenom = mysqli_real_escape_string($restodeg, $_POST['prenom']);
		$adresse = mysqli_real_escape_string($restodeg, $_POST['adresse']);
		$code_postal = mysqli_real_escape_string($restodeg, $_POST['code_postal']);
		$ville = mysqli_real_escape_string($restodeg, $_POST['ville']);
		$info_complementaire = mysqli_real_escape_string($restodeg, $_POST['info_complementaire']);
		$birthday = mysqli_real_escape_string($restodeg, $_POST['birthday']);
		
		$checklogin = 'SELECT * FROM users WHERE login = "'.$login.'"';
		$res_checklogin = mysqli_query($restodeg, $checklogin);
		$ligne = mysqli_fetch_assoc($res_checklogin);

		if (!mysqli_num_rows($res_checklogin)) {
			$insert_user = 'INSERT INTO users (login, password, email, nom, prenom, adresse, code_postal, ville, info_complementaire, birthday)
			VALUES ("'.$login.'", "'.$password.'")';
		}
	}

	require('views/register.html'); 
?>