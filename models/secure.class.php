<?php
class Securite
{
	public function bdd($data)
	{
		if(ctype_digit($data))
		{
			$data = intval($data);
		}
		else{
			$data = mysqli_real_escape_string($db, $data);
		}
		return $data;
	}
	public function html($data)
	{
		return htmlentities($data);
	}
}
?>