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
    private $error;

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

    public function getError()
    {
        return $this->error;
    }

    // SETTERS

    public function setIdUser($iduser)
    {
        intval($iduser);
        $this->idUser = $iduser;
    }

    public function setLogin($login)
    {
        if (strlen($login) < 3)
        {
            $this->error = "Le login est trop court (Min 3 caractères)";
        }

        elseif (strlen($login) > 16)
        {
            $this->error = "Le login est trop long (Max 16 caractères)";
        }

        else
        {
            $this->login = $login;
        }
    }

    public function setName($name)
    {
        if (ctype_alpha($name))
        {
            if (strlen($name) < 3)
            {
                $this->error = "Le nom est trop court (Min 3 caractères)";
            }

            elseif (strlen($name) > 45)
            {
                $this->error = "Le nom est trop long (Max 45 caractères)";
            }

            else
            {
                $this->name = $name;
            }
        }

        else
        {
            $this->error = "Le nom ne peut pas comporter de chiffre";
        }
    }

    public function setSurname($surname)
    {
        if (ctype_alpha($surname))
        {
            if (strlen($surname) < 3)
            {
                $this->error = "Le prénom est trop court (Min 3 caractères)";
            }

            elseif (strlen($surname) > 45)
            {
                $this->error = "Le prénom est trop long (Max 45 caractères)";
            }

            else
            {
                $this->surname = $surname;
            }
        }

        else
        {
            $this->error = "Le prénom ne peut pas comporter de chiffre";
        }
    }

    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->email = $email;
        }

        else
        {
            $this->error = "Le format de l'email n'est pas correct";
        }
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    public function setCp($cp)
    {
        if (filter_var($cp, FILTER_VALIDATE_INT))
        {
            if (strlen($cp) < 2)
            {
                $this->error = "Le code postal est trop court (Min 2 caractères)";
            }

            elseif (strlen($cp) > 5)
            {
                $this->error = "Le code postal est trop long (Max 5 caractères)";
            }

            else
            {
                $this->cp = $cp;
            }
        }

        else
        {
            $this->error = "Le format du code postal n'est pas correct";
        }
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setInfos($infos)
    {
        $this->infos = $infos;
    }
}
?>