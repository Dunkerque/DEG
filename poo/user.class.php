<?php
class User
{
	private $nom;
	private $prenom;
	private $age;

	public function __construct($nom, $prenom, $age)
	{
		$this->setNom($nom);
		$this->setPrenom($prenom);
		$this->setAge($age);
	}
	public function setNom($nom)
	{
		if (ctype_alpha($nom))
		{
			$this->nom = $nom;
			return true;
		}
		return false;
	}
	public function setPrenom($prenom)
	{
		if (ctype_alpha($prenom))
		{
			$this->prenom = $prenom;
			return true;
		}
		return false;
	}
	public function setAge($age)
	{
		$age = intval($age);
		if ($age > 0 && $age < 101)
		{
			$this->age = $age;
			return true;
		}
		return false;
	}
	public function getNom()
	{
		return $this->nom;
	}
	public function getPrenom()
	{
		return $this->prenom;
	}
	public function getAge()
	{
		return $this->age;
	}
}

$user = new User("alphabet", 654654654, "camion");
/*
$nom = $user->setNom("alphabet");
if ($nom === false)
	echo "Erreur : Nom incorrect<br/>";
$prenom = $user->setPrenom(654646464);
if ($prenom === false)
	echo "Erreur : Prenom incorrect<br/>";
$age = $user->setAge("camion");
if ($age === false)
	echo "Erreur : Age incorrect<br/>";
*/

echo "<hr>";


echo "Nom : ".$user->getNom().'<br />';
echo "Prenom : ".$user->getPrenom().'<br />';
echo "Age : ".$user->getAge().'<br />';
?>