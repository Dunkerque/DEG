<?php
require("models/user.class.php");

class Usermanager
{

	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getUser($iduser)
	{
		$queryUser = 'SELECT * FROM users WHERE id_users = "'.$iduser.'"';
        $resQueryUser = mysqli_query($this->db,$queryUser);
        $resUser = mysqli_fetch_object($resQueryUser, "User"); //on fait un retour sous forme d'objet. Les variables privées de la classe sont remplies automatiquement. Ici on peut afficher les infos remplies auto avec les GETTERS.

		return $resUser;
	}

    public function getAllUsers()
    {
        $queryUsers = 'SELECT * FROM users ORDER BY login';
        $resQueryUsers = mysqli_query($this->db,$queryUsers);
        while($resUsers = mysqli_fetch_object($resQueryUsers,"User"))
        {
            $resUsers->displayEditUsers(); // renvoi vers la fonction display de la classe User qui est instanciée grace à la requete sql
        }
    }

	public function editUser($login,$name,$surname,$email,$adress,$cp,$city,$infos,$iduser)
	{
		$queryEditUser = 'UPDATE users SET
        login = "'.mysqli_real_escape_string($this->db,$login).'",
        nom = "'.mysqli_real_escape_string($this->db,$name).'",
        prenom = "'.mysqli_real_escape_string($this->db,$surname).'",
        email = "'.mysqli_real_escape_string($this->db,$email).'",
        adresse = "'.mysqli_real_escape_string($this->db,$adress).'" ,
        code_postal = "'.mysqli_real_escape_string($this->db,$cp).'",
        ville = "'.mysqli_real_escape_string($this->db,$city).'",
        info_complementaire = "'.mysqli_real_escape_string($this->db,$infos).'" WHERE id_users = "'.$iduser.'" ';
        $resQueryEditUser = mysqli_query($this->db,$queryEditUser);
	}

    public function deleteUser($iduser)
    {
        $queryDeleteU = 'DELETE FROM users WHERE id_users = "'.$iduser.'"';
        $resQueryDeleteU = mysqli_query($this->db,$queryDeleteU);
    }
}


?>