<?php
require('models/panier.class.php');
$error = "";
$panier = new Panier();
if(isset($_SESSION['erreur']))
{
	$error = $secure->html($_SESSION['erreur']);
	unset($_SESSION['erreur']);
}
if(isset($_GET['id']))
{
	$product_id = $secure->bdd($_GET['id']);
	$product_plats = "SELECT id_plats FROM plats WHERE id_plats = '".$product_id."'";
	$request_product_plats = mysqli_query($db, $product_plats);
	$res = mysqli_fetch_assoc($request_product_plats);
	if($res == false)
		$_SESSION['erreur'] = "Ce produit n'existe pas";
	$panier->add($res['id_plats']);
}
if(isset($_GET['a'] ) && $_GET['a'] === "delete")
{
	$panier->delPanier();
}
 require('views/command.html'); 

 var_dump($_SESSION)
 ?>
