<?php
class Securite
{
	public function bdd($data)
	{
		if(ctype_digit($data))
		{
			$data = intval($data);
		}
		return $data;
	}
	public function html($data)
	{
		return htmlentities($data);
	}
}
?>