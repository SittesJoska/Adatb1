<?php

include_once 'lekerdezesek.php';

if(!($conn = connect())) {
	return false;
}

$berleti_dij = $_POST["berleti_dij"];
$berles_kezdete = $_POST["berles_kezdete"];
$berles_vege = $_POST["berles_vege"];
$adoszam = $_POST["adoszam"];
$lakasszam = $_POST["lakasszam"];

$selected1 = $_POST["selected1"];
$selected2 = $_POST["selected2"];


if(ISSET($_POST["edit"]) && !empty($berleti_dij) && !empty($berles_kezdete) && !empty($adoszam)
	&& !empty($lakasszam)) {
	editBerles($berleti_dij, $berles_kezdete, $berles_vege, $adoszam, $lakasszam, $selected1, $selected2);
	header("Location: berlesek.php");
}

if(ISSET($_POST["delete"])) {
	deleteBerles($selected1, $selected2);
	header("Location: berlesek.php");
}
?>