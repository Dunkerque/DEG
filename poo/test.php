<?php
// views.class.php
class Views
{
	public function displayHeader()
	{

	}
	public function displayContent()
	{

	}
	public function display()
	{

	}
	public function load($page)
	{
		require('views/'.$page.'.html');
	}
}


// models/carte.class.php
class Plat
{
	private $id_plats;
	private $nom_plats;
	private $contenu_plats;
	private $tarif_plats;

	public function display()
	{
		
	}
	public function getShortContenu()
	{
		return substr($this->contenu_plats, 0, 10).'...';
	}
	public function displayInTab()
	{
		require('test.html');
	}
	public function displayFull()
	{

	}
	public function displayShort()
	{

	}
}
/*
$view = new Views();
$page = $_GET['page'];
require('app/affPlat.php');
$view->load($page, $data);
*/

require('models/plat.class.php');
$mysqli = mysqli_connect("localhost","root","troiswa","restodeg");
$res = mysqli_query($mysqli, "SELECT * FROM plats");


echo "<table border=1>";
$data = array();
while ($plat = mysqli_fetch_object($res, 'Plat'))
{
	//echo $plat->getShortContenu().'<br />';
	$plat->displayInTab();
	$data[] = $plat;
}
echo "</table>";
?>