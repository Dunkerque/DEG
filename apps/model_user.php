<?php

class User
{
	private $idUser;
	private $login;
    private $name;
    private $surname;
    private $email;
    private $adress;
    private $cp;
    private $city;
    private $infos;

    // GETTERS

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getLogin()
    {
    	return $this->login;
    }

    public function getName()
    {
    	return $this->name;
    }

    public function getSurname()
    {
    	return $this->surname;
    }

    public function getEmail()
    {
    	return $this->email;
    }

    public function getAdress()
    {
    	return $this->adress;
    }

    public function getCp()
    {
    	return $this->cp;
    }

    public function getCity()
    {
    	return $this->city;
    }

    public function getInfos()
    {
    	return $this->infos;
    }

    // SETTERS

    public function setIdUser($data)
    {
        intval($data);
        $this->idUser = $data;
    }

    public function setLogin($data)
    {
        $this->login = $data;
    }

    public function setName($data)
    {
        $this->name = $data;
    }
    public function setSurname($data)
    {
        $this->surname = $data;
    }

    public function setEmail($data)
    {
        $this->email = $data;
    }

    public function setAdress($data)
    {
        $this->adress = $data;
    }
    public function setCp($data)
    {
        $this->cp = $data;
    }

    public function setCity($data)
    {
        $this->city = $data;
    }

    public function setInfos($data)
    {
        $this->infos = $data;
    }

    public function selectSpecUser($db,$iduser)
    {
    	$idSUser = intval($iduser);

    	$querySUser = 'SELECT * FROM users WHERE id_users = "'.$idSUser.'"';
        $resQuerySUser = mysqli_query($db,$querySUser);
        $resSUser = mysqli_fetch_assoc($resQuerySUser);

        return $resSUser;
    }

    public function editSpecUser($db)
    {
        $idUser = $this->idUser;
        $login = $this->login;

        $queryEditUser = 'UPDATE users SET login = "'.$login.'" WHERE id_users = "'.$idUser.'"';
        $resQueryEditUser = mysqli_query($db,$queryEditUser);

        var_dump($queryEditUser);
    }
}


?>