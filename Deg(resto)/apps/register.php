                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <?php 
	$msg_register = '';

	if (isset($_POST['login'], $_POST['password'])) {
		$login = mysqli_real_escape_string($db, $_POST['login']);
		$password = mysqli_real_escape_string($db, sha1($_POST['password'])); // sha1 pour sécurisé le password
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$nom = mysqli_real_escape_string($db, $_POST['nom']);
		$prenom = mysqli_real_escape_string($db, $_POST['prenom']);
		$adresse = mysqli_real_escape_string($db, $_POST['adresse']);
		$code_postal = intval($_POST['code_postal']);
		$code_postal = intval($db, $_POST['code_postal']);
		$ville = mysqli_real_escape_string($db, $_POST['ville']);
		$info_complementaire = mysqli_real_escape_string($db, $_POST['info_complementaire']);
		$birthday = mysqli_real_escape_string($db, $_POST['birthday']);
		
		$checklogin = 'SELECT * FROM users WHERE login = "'.$login.'"';
		$res_checklogin = mysqli_query($db, $checklogin);
		$ligne = mysqli_fetch_assoc($res_checklogin);

		if (!mysqli_num_rows($res_checklogin)) {
			$insert_user = 'INSERT INTO users (login, password, email, nom, prenom, adresse, code_postal, ville, info_complementaire, birthday)
			VALUES ("'.$login.'", "'.$password.'","'.$email.'","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$code_postal.'","'.$ville.'","'.$info_complementaire.'","'.$birthday.'")';
			$res_insert_user = mysqli_query($db, $insert_user);
			$msg_register = 'Votre compte à bien été créé <br /><br />';
			require('views/register.html');
		} else {
			$msg_register = 'Ce login  existe déjà, veuillez en choisir un autre. <br /><br />';
			require('views/register.html'); 
		}

		$id_users = mysqli_insert_id($db);

		if ($id_users >= 0) {
			$msg_register = '';
		} else {
			$msg_register = "Erreur d'insertion SQL: ".mysqli_error($db)."<br /><br />";
			require('views/register.html'); 
		}
	}else{
		require('views/register.html'); 
	}

	
?>