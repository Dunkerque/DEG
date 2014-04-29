<?php

class User
{

    // indiquer les mêmes noms de champs que dans la BDD, ce qui permet de les remplir automatiquement lorsque l'on fait une requete avec mysqli_fetch_object : voir edit_user.php ligne 16
	private $id_users;
	private $login;
    private $unprotected_password;
    private $password;
    private $admin;
    private $email;
    private $nom;
    private $prenom;
    private $adresse;
    private $code_postal;
    private $ville;
    private $info_complementaire;
    private $birthday;
    private $register_date;
    private $fidel_point;
    private $error;

    // GETTERS

    public function getIdUser()
    {
        return $this->id_users;
    }

    public function getLogin()
    {
    	return $this->login;
    }

    public function getPassword()
    {
        if (!empty($this->unprotected_password))
        {
            echo "rempli";
        }
        return $this->password;
    }

    public function getName()
    {
    	return $this->nom;
    }

    public function getSurname()
    {
    	return $this->prenom;
    }

    public function getEmail()
    {
    	return $this->email;
    }

    public function getAdress()
    {
    	return $this->adresse;
    }

    public function getCp()
    {
    	return $this->code_postal;
    }

    public function getCity()
    {
    	return $this->ville;
    }

    public function getInfos()
    {
    	return $this->info_complementaire;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getRegisterDate()
    {
        return $this->register_date;
    }

    public function getFidelPoint()
    {
        return $this->fidel_point;
    }

    public function getError()
    {
        return $this->error;
    }

    // SETTERS

    public function setIdUser($idUser)
    {
        intval($idUser);
        $this->id_users = $idUser;
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

    public function setPassword($password)
    {
        if (strlen($password) < 5)
        {
            $this->error = "Le mot de passe est trop court (Min 5 caractères)";
        }

        else
        {
            $this->unprotected_password = $password;
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
                $this->nom = $name;
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
                $this->prenom = $surname;
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
        $this->adresse = $adress;
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
                $this->code_postal = $cp;
            }
        }

        else
        {
            $this->error = "Le format du code postal n'est pas correct";
        }
    }

    public function setCity($city)
    {
        $this->ville = $city;
    }

    public function setInfos($infos)
    {
        $this->info_complementaire = $infos;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function setRegisterDate($registerDate)
    {
        $this->register_date = $registerDate;
    }

    public function setFidelPoint($fidelPoint)
    {
        $this->fidel_point = $fidelPoint;
    }
}
?>